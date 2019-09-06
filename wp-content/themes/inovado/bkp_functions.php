<?php
/* ------------------------------------------------------------------------ */
/* Translation
/* ------------------------------------------------------------------------ */
	
	/* ------------------------------------------------------------------------ */
	/* Translations can be filed in the framework/languages/ directory */
	load_theme_textdomain( 'minti', get_template_directory() . '/framework/languages' );
	load_theme_textdomain( 'minti-framework', get_template_directory() . '/framework/languages' );
	
	$locale = get_locale();
	$locale_file = get_template_directory() . "/framework/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);
	   
/* ------------------------------------------------------------------------ */
/* Inlcudes
/* ------------------------------------------------------------------------ */

	/* ------------------------------------------------------------------------ */
	/* Misc Includes */
	include_once('framework/inc/googlefonts.php'); // Load Google Fonts
	include_once('framework/inc/enqueue.php'); // Enqueue JavaScripts & CSS
	include_once('framework/inc/customcss.php'); // Load Custom CSS
	include_once('framework/inc/customjs.php'); // Load Custom JS
	include_once('framework/inc/sidebar-generator.php'); // Include Sidebar Generator
	include_once('framework/inc/breadcrumbs.php'); // Load Breadcrumbs
	include_once('framework/inc/shortcodes.php'); // Load Shortcodes
	include_once('framework/inc/cpt-portfolio.php'); // Portfolio
	
	/* -------------------------------- ---------------------------------------- */
	/* Widget Includes */
	include_once('framework/inc/widgets/embed.php');
	include_once('framework/inc/widgets/facebook.php');
	include_once('framework/inc/widgets/flickr.php');
	include_once('framework/inc/widgets/sponsor.php');
	include_once('framework/inc/widgets/contact.php');
	include_once('framework/inc/widgets/portfolio.php');
	include_once('framework/inc/widgets/custommenu.php');
	
	/* ------------------------------------------------------------------------ */
	/* Include SMOF */
	require_once('admin/index.php'); // Slightly Modified Options Framework
	
	/* ------------------------------------------------------------------------ */
	/* Include Meta Box Script */
    define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/framework/inc/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/framework/inc/meta-box' ) );
    require_once RWMB_DIR . 'meta-box.php';
    include 'framework/inc/meta-boxes.php';
    
    /* ------------------------------------------------------------------------ */
	/* Automatic Plugin Activation */
	require_once('framework/inc/plugin-activation.php');
	
	add_action('tgmpa_register', 'minti_register_required_plugins');
	function minti_register_required_plugins() {
		$plugins = array(
			array(
				'name'     				=> 'Slider Revolution', // The plugin name
				'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'FlexSlider', // The plugin name
				'slug'     				=> 'flexslider', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/flexslider.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Post Types Order', // The plugin name
				'slug'     				=> 'post-types-order', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/post-types-order.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'CF-Post-Formats', // The plugin name
				'slug'     				=> 'cf-post-formats', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/cf-post-formats.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Recent Tweets Widget', // The plugin name
				'slug'     				=> 'recent-tweets-widget', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/recent-tweets-widget.zip', // The plugin source
				'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
            	'name'      => 'Contact Form 7',
            	'slug'      => 'contact-form-7',
            	'required'  => false,
            ),
		);
	
		// Change this to your theme text domain, used for internationalising strings
		$theme_text_domain = 'minti-framework';
	
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa($plugins, $config);
		
	}

/* ------------------------------------------------------------------------ */
/* Basics
/* ------------------------------------------------------------------------ */
	
	function minti_comment( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>
	
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix"> 
	   		
	   		<div class="avatar"><?php echo get_avatar($comment, $size = '50'); ?></div>
	         
	         <div class="comment-text">
	         
				 <div class="author">
				 	<span><?php if($comment->comment_author_url == '' || $comment->comment_author_url == 'http://Website'){ echo get_comment_author(); } else { echo comment_author_link(); } ?></span>
				 	<div class="date">
				 	<?php printf(__('%1$s at %2$s', 'minti'), get_comment_date(),  get_comment_time() ) ?></a><?php edit_comment_link( __( '(Edit)', 'minti'),'  ','' ) ?>
				   	&middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  </div>  
				 </div>
				 
				 <div class="text"><?php comment_text() ?></div>
				 
				 
				 <?php if ( $comment->comment_approved == '0' ) : ?>
		         <em><?php _e( 'Your comment is awaiting moderation.', 'minti' ) ?></em>
		         <br />
		      	<?php endif; ?>
		      	
	      	</div>
	      
	   </div>
	<?php
	}
   
   /* ------------------------------------------------------------------------ */
   /* Pagination */
   
   function pagination($pages = '', $range = 4) {
		$showitems = ($range * 2)+1;
		
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}
		
		if(1 != $pages) {
			echo "<span class='allpages'>" . __('Page', 'minti') . " ".$paged." " . __('of', 'minti') . " ".$pages."</span>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; " . __('First', 'minti') . "</a>";
			if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; " . __('Previous', 'minti') . "</a>";
			
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
				}
			}
		
			if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">" . __('Next', 'minti') . " &rsaquo;</a>";
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>" . __('Last', 'minti') . " &raquo;</a>";
		}
	}
	
	/* ------------------------------------------------------------------------ */
	/* Custom Excerpt Length */

	function new_excerpt_length($length) {
		global $data;
	    return $data['text_excerptlength'];;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
	 
	// Changing excerpt more
	if($data['check_readmore'] != "0") { // Admin Option Check
		function new_excerpt_more($more) {
			global $post;
			return '… <a href="'. get_permalink($post->ID) . '" class="read-more-link">' . '' . __('read more', 'minti') . ' &rarr;' . '</a>';
		}
		add_filter('excerpt_more', 'new_excerpt_more');
	}
	
	// Word Limiter
	function limit_words($string, $word_limit) {
		$words = explode(' ', $string);
		return implode(' ', array_slice($words, 0, $word_limit));
	}

	/* ------------------------------------------------------------------------ */
	/* Post Thumbnails */
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
	
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'standard', 700, 300, true );			// Standard Blog Image
		add_image_size( 'blog-medium', 320, 210, true );		// Medium Blog Image
		add_image_size( 'sixteen-columns', 940, 475, true ); 	// for portfolio wide
		add_image_size( 'ten-columns', 640, 500, true );		// for portfolio side-by-side
		add_image_size( 'eight-columns', 460, 300, true ); 		// perfect for responsive - adjust height in CSS
		add_image_size( 'eight-columns-thin', 460, 250, true ); // Portfolio 1 Col / perfect for responsive - adjust height in CSS
		add_image_size( 'mini', 60, 60, true ); 				// used for widget thumbnail
	}
	
	/* ------------------------------------------------------------------------ */
	/* Define Content Width */
	if ( ! isset( $content_width ) ) $content_width = 960;
	
	/* ------------------------------------------------------------------------ */
	/* Add RSS Links to head section */
	add_theme_support( 'automatic-feed-links' );
	
	/* ------------------------------------------------------------------------ */
	/* WP 3.1 Post Formats */
	add_theme_support( 'post-formats', array('gallery', 'link', 'quote', 'audio', 'video')); 	
	
	/* ------------------------------------------------------------------------ */
	/* Remove Admin Bar */
	//add_filter('show_admin_bar', '__return_false');
	
	/* ------------------------------------------------------------------------ */
	/* Add Custom Primary Navigation */
	add_action('init', 'register_custom_menu');
 
	function register_custom_menu() {
		register_nav_menu('main_navigation', 'Main Navigation');
	}
	
	/* ------------------------------------------------------------------------ */
	/* Add prettyPhoto rel= Tag to slide through photos */
	
	add_filter( 'wp_get_attachment_link', 'sant_prettyadd');
 
	function sant_prettyadd ($content) {
		$content = preg_replace("/<a/","<a rel=\"prettyPhoto[slides]\"",$content,1);
		return $content;
	}
	
	/* ------------------------------------------------------------------------ */
	/* Define Sidebars */
	/* ------------------------------------------------------------------------ */
	
	$footercolumns = "four";

	if($data['select_footercolumns'] == "4"){ $footercolumns = "four"; }
	elseif($data['select_footercolumns'] ==  "3"){ $footercolumns = "one-third"; }
	elseif($data['select_footercolumns'] ==  "2"){ $footercolumns = "eight"; }
	elseif($data['select_footercolumns'] ==  "1"){ $footercolumns = "sixteen"; }
	
	$infobarcolumns = "four";

	if($data['select_infobarcolumns'] == "4"){ $infobarcolumns = "four"; }
	elseif($data['select_infobarcolumns'] ==  "3"){ $infobarcolumns = "one-third"; }
	elseif($data['select_infobarcolumns'] ==  "2"){ $infobarcolumns = "eight"; }
	elseif($data['select_infobarcolumns'] ==  "1"){ $infobarcolumns = "sixteen"; }
	
	if (function_exists('register_sidebar')) {
		
		/* ------------------------------------------------------------------------ */
		/* Blog Widgets */
	
		register_sidebar(array(
			'name' => __('Blog Widgets','minti-framework' ),
			'id'   => 'blog-widgets',
			'description'   => __( 'These are widgets for the Blog sidebar.','minti-framework' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title"><span>',
			'after_title'   => '</span></h3>'
		));
		
		/* ------------------------------------------------------------------------ */
		/* Footer Widgets */
		
		register_sidebar(array(
		   'name' => __('Footer Widgets','minti-framework' ),
		   'id'   => 'footer-widgets',
			'description'   => __( 'These are widgets for the Footer.','minti-framework' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s '.$footercolumns.' columns">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
	   	));
	   	
	   	/* ------------------------------------------------------------------------ */
		/* Infobar Widgets */
		
		register_sidebar(array(
		   'name' => __('Infobar Widgets','minti-framework' ),
		   'id'   => 'infobar-widgets',
			'description'   => __( 'These are widgets for the Infobar.','minti-framework' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s '.$infobarcolumns.' columns">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
	   	));

	   	/* ------------------------------------------------------------------------ */
		/* Shop Widgets */
		
		if (class_exists('Woocommerce')){
			register_sidebar(array(
				'name' => __('Shop Widgets','minti-framework' ),
				'id'   => 'shop-widgets',
				'description'   => __( 'These are widgets for the Shop sidebar.','minti-framework' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="title"><span>',
				'after_title'   => '</span></h3>'
			));
		}
	   	
	}


/* ------------------------------------------------------------------------ */
/* Disable Plugin Stylesheets
/* ------------------------------------------------------------------------ */

	function my_deregister_styles() {
		wp_deregister_style( 'tp_twitter_plugin_css' );
	}
	add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

/* ------------------------------------------------------------------------ */
/* WooCommerce
/* ------------------------------------------------------------------------ */
	
	// Add WooCommerce Theme Support
	add_theme_support('woocommerce');

	// Disable WooCommerce CSS
	define('WOOCOMMERCE_USE_CSS', false);

	// Disable Admin Bar for Subscribers (Not Admins)
	add_action('set_current_user', 'cc_hide_admin_bar');
	function cc_hide_admin_bar() {
	  if (!current_user_can('edit_posts')) {
	    show_admin_bar(false);
	  }
	}

/* ------------------------------------------------------------------------ */
/* EOFhttp://itsterling.com/wp-content/uploads/2014/02/logo-of-itsterling1-150x150.jpg
/* ------------------------------------------------------------------------ */
-------------------admin crazy footer--------------
function replace_wp_logo() {
   echo '<style type="text/css"> h1 a { background-image:url('.get_bloginfo('template_directory').'wp-content/uploads/2014/02/logo-of-itsterling1-150x150.jpg) !important;      background-size: auto 135px !important;  height: 160px !important;width:auto !important; } </style>';
}

add_action('login_head', 'replace_wp_logo');

function my_crazy_admin_footer() {
echo '<style type="text/css">
#wp-admin-bar-wp-logo, #wp-admin-bar-updates, #wp-admin-bar-comments, #wp-admin-bar-new-content,
#dashboard_right_now .b-tags,
#dashboard_right_now .tags, #wpfooter,
#dashboard_right_now .b-comments,
#dashboard_right_now .comments,#dashboard_right_now .b-posts,
#dashboard_right_now .posts,#dashboard_right_now .table_discussion, #screen-meta-links, .plugin-version-author-uri, .plugin-update-tr, .update-plugins, .update-nag, #wp-version-message, #dashboard_right_now .main p {
  display:none;
}
</style>';
}
add_action('admin_footer', 'my_crazy_admin_footer');

//begin hide the meta tag generator from head and rss
function disable_version() {
  return '';
}
?>