<?php
/*
Plugin Name: JM HTML5 and Responsive Gallery
Plugin URI: http://wp.jmperso.eu
Description: Meant to replace poor native gallery markup with HTML5 and to add responsive CSS.
Author: Julien Maury
Author URI: http://wp.jmperso.eu
Version: 1.8
License: GPL
*/

/*
* Sources: -http://www.screenfeed.fr/blog/du-pola-dans-wordpress-customiser-les-galeries-0132/
*          -http://codex.wordpress.org/Determining_Plugin_and_Content_Directories    
 *         -http://www.geekpress.fr/wordpress/tutoriel/fichier-javascript-shortcode-1120/
*           
*/
         
          //1) Change markup (I use a function written by Screenfeed to add some HTML5 markup)

         

	if( !(function_exists( 'sf_post_gallery' ) ) ) { // In case the function is already implemented in functions.php (Great comment by Julio Potier : http://jmperso.eu/plugin/new-plugin-jm-html5-and-responsive-gallery#comment-192)
            add_filter('post_gallery', 'sf_post_gallery', 10, 2);
         
function sf_post_gallery($null, $attr = array()) {
	global $post, $wp_locale;
	static $instance = 0;
	$instance++;
						// We don't need the "apply_filters" function here, unless you want to mess up all. So we delete it
	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'span',		// We don't need 'dl'
		'icontag'    => 'figure',		// We don't need 'dt'
		'captiontag' => 'figcaption',		// We don't need 'dd'
		'columns'    => 3,
		'size'       => 'medium',	// We'll use medium instead of thumbnail
		'include'    => '',
		'exclude'    => ''
	), $attr));
 
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';
 
	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
 
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
 
	if ( empty($attachments) )
		return '';
 
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}
 
	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';
 
	$output = "<div id='gallery-{$instance}' class='gallery galleryid-{$id}'>";	// We don't need the style tag, so we delete it
 
	if($itemtag != '' && $icontag != '' && $captiontag != '') {			// If we have specified the tags in the shortcode, let's use them with the original structure
		$i = 0;
		foreach ( $attachments as $id => $attachment ) {
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
 
			$output .= "<{$itemtag} class='gallery-item'>";
			$output .= "
				<{$icontag} class='gallery-icon'>
					$link
				</{$icontag}>";
			if ( $captiontag && trim($attachment->post_excerpt) ) {
				$output .= "
					<{$captiontag} class='gallery-caption'>
					" . wptexturize($attachment->post_excerpt) . "
					</{$captiontag}>";
			}
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '<br style="clear: both" />';
		}
	} else {												// Else, we use our custom gallery
		foreach ( $attachments as $id => $attachment ) {
			$thumb = wp_get_attachment_image_src( $id, $size );					// We get the medium size image representing, it returns an array [url] [width] [height]
			$caption = wptexturize($attachment->post_excerpt);					// The caption text
			$output .= '[caption id="attachment_'.$id.'" align="alignleft" width="'.$thumb[1].'" caption="' . $caption . '&nbsp;"]';	// We use the caption shortcode
			if (isset($attr['link']) && 'file' == $attr['link']) {					// If we want to link directly to the file
				$image = wp_get_attachment_image_src( $id, 'full' );				// We get the full size image representing, we'll use it to retrieve its url with $image[0]
				$output .= '<a href="'.$image[0].'" rel="prettyPhoto[pp'.$instance.']">';	// The link: $image[0] is the url, we put a rel attribute for a lightbox (you can put what you want)
				$output .= '<img class="attachment-'.$size.'" width="'.$thumb[1].'" height="'.$thumb[2].'" title="'.$caption.'" alt="'.$caption.'" src="'.$thumb[0].'" />';	// The "thumbnail"
				$output .= '</a>';
			} else {
				$output .= wp_get_attachment_link($id, $size, true, false);			// Link to the attachment page
			}
			$output .= '[/caption] ';								// We close the caption shortcode
		}
		$output = do_shortcode($output);								// We finally apply a do_shortcode for the... caption shortcodes
	}
 
	$output .= "
			<br style='clear: both;' />
		</div>\n";											// Clear the thumbs floats and close the gallery div
 
	return $output;
  }
}
          
          //2) Call our stylesheet and our JavaScript only when the shortcode [gallery] is used :
          // feel free to add your own js e.g a lightbox or a slider
          
          function enqueue_my_files() //It's made by BAW (http://boiteaweb.fr) / I slightly modified it.
               {
                   global $post;
                   if( !$post ) return;
                   $matches = array();
                   $pattern = get_shortcode_regex();
                   preg_match_all( '/' . $pattern . '/s', $post->post_content, $matches );
                   foreach( $matches[2] as $value ) {
                       if( $value == 'gallery' ) {
                       /*JUST DECOMMENT TO SEE THE SLIDESHOW IN ACTION * < add comment here
                           wp_enqueue_script( 'gallery-js-lib', plugins_url( '/js/jquery.cycle.lite.js', __FILE__ ),'1.0', true); //it's a lite version feel free to get the entire script
                           wp_enqueue_script( 'gallery-js', plugins_url( '/js/jm-html5-responsive-gallery-example.js', __FILE__ ),'1.0', true); 
                           remove comment here > */   wp_enqueue_style( 'gallery-style', plugins_url( '/css/jm-html5-responsive-gallery.css', __FILE__ ));
                           //don't forget to decomment in css too to see in action
                           //just updated handle to avoid conflict. Never use the same handle or it won't work.
                           break;
                       }
                   }
               }
               //UPDATE : change hooks according to this thread  : http://make.wordpress.org/core/2011/12/12/use-wp_enqueue_scripts-not-wp_print_styles-to-enqueue-scripts-and-styles-for-the-frontend/
               add_action( 'wp_enqueue_scripts', 'enqueue_my_files' );
          
          
          
          
