<?php
    require_once('aq_resizer.php');
	add_shortcode( 'tumblr_photoset', 'cq_tumblrphotoset_shortcode_func');
	function cq_tumblrphotoset_shortcode_func($attr){
        wp_enqueue_script('cq_tumblr_photoset_script', plugins_url('js/jquery.photoset-grid.min.js', __FILE__), array('jquery'));
        wp_register_script('colorbox', plugins_url('js/jquery.colorbox.min.js', __FILE__), array('jquery'));
        wp_enqueue_script('colorbox');
        wp_register_style('colorbox', plugins_url('css/colorbox.css', __FILE__));
        wp_enqueue_style('colorbox');
		extract(shortcode_atts(array(
			'post_type' => 'cq_pinterest',
			'id' => '',
			'orderby' => 'title'
		   	)
		, $attr));
		$id = (NULL === $id) ? $post->ID : $id;
		$meta = get_post_meta( $id, '');
		$cq_tumblr_photoset_fields = unserialize($meta['cq_tumblr_photoset_fields'][0]);
		$setting_arr = $cq_tumblr_photoset_fields[0]['setting_arr'];
        $output = '';
        if($cq_tumblr_photoset_fields){
            $output .= '<div class="cq-tumblr-photoset" id="cq-tumblr-photoset'.$id.'" data-layout="'.$setting_arr['cq_tumblr_photoset_layout'].'" data-gutter="'.$setting_arr['cq_tumblr_photoset_gutter'].'" style="visibility: hidden;" data-largeimageas="'.$setting_arr['cq_tumblr_photoset_largeimageas'].'" data-galleryid="cq-tumblr-photoset'.$id.'" data-miniwidth="'.$setting_arr['cq_tumblr_photoset_miniwidth'].'" data-slideshow="'.$setting_arr['cq_tumblr_photoset_slideshow'].'" data-delay="'.$setting_arr['cq_tumblr_photoset_delay'].'" style="visibility: hidden;">';
            foreach ($cq_tumblr_photoset_fields as $field) {
                $output .= '<img src="'.aq_resize($field["thumb_url"][0], ($setting_arr['cq_tumblr_photoset_miniwidth']==""?300:$setting_arr['cq_tumblr_photoset_miniwidth'])).'" data-highres="'.$field["thumb_url"][0].'" style="border-radius:0;">';
            }
            $output .= '</div>';
        }
		return html_entity_decode($output);
	};

?>
