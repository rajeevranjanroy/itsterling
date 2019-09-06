<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

add_action( 'admin_init', 'rw_register_meta_boxes' );
function rw_register_meta_boxes()
{
	
	global $meta_boxes;
	global $data;
	global $wpdb;

	$prefix = 'minti_';
	$meta_boxes = array();
	
	/* ----------------------------------------------------- */
	// REGISTER CUSTOM RRAYS
	/* ----------------------------------------------------- */
	// REVSLIDER ARRAY
	$revolutionslider = array();
	
	
	if(class_exists('RevSlider')){
		$revolutionslider[0] = 'Select a Slider';
	    $slider = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		foreach($arrSliders as $revSlider) { 
			$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
		}
	}
	else{
		$revolutionslider[0] = 'Install RevolutionSlider Plugin first...';
	}
	
	/* ----------------------------------------------------- */
	// PORTFOLIO FILTER ARRAY
	$types = get_terms('portfolio_filter', 'hide_empty=0');
	$types_array[0] = 'All categories';
	if($types) {
		foreach($types as $type) {
			$types_array[$type->term_id] = $type->name;
		}
	}
	
	/* ----------------------------------------------------- */
	// FLEXSLIDER FILTER ARRAY
	if (is_plugin_active('flexslider/wooslider.php')) {
	
		$flexslider = get_terms('slide-page');
		$flexslider_array[0] = 'Select a Slider';
		if($flexslider) {
			foreach($flexslider as $slider) {
				$flexslider_array[$slider->slug] = $slider->name;
			}
		}
		
	}
	else{
		$flexslider_array[0] = 'Install FlexSlider Plugin first...';
	}
	
	/* ----------------------------------------------------- */
	// Page Settings
	/* ----------------------------------------------------- */
	
	$meta_boxes[] = array(
		'id' => 'pagesettings',
		'title' => 'Page Settings',
		'pages' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
			array(
					'name'		=> 'Title Bar',
					'id'		=> $prefix . "titlebar",
					'type'		=> 'select',
					'options'	=> array(
						'titlebar'			=> 'Title & Subtitle',
						'featuredimage'		=> 'Featured Image Style #1',
						'featuredimage2'	=> 'Featured Image Style #2',
						'notitlebar'		=> 'No Title Bar',
						'revslider'			=> 'Revolution Slider',
						'flexslider'		=> 'FlexSlider'
					),
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),
			array(
				'name'		=> 'Subtitle',
				'id'		=> $prefix . 'subtitle',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			),
			array(
				'name'		=> 'Show Breadcrumbs?',
				'id'		=> $prefix . "featuredimage-breadcrumbs",
				'type'		=> 'checkbox',
				'std'		=> true
			),
			array(
				'name'		=> 'Revolution Slider',
				'id'		=> $prefix . "revolutionslider",
				'type'		=> 'select',
				'options'	=> $revolutionslider,
				'multiple'	=> false
			),
			array(
				'name'		=> 'FlexSlider',
				'id'		=> $prefix . "flexslider",
				'type'		=> 'select',
				'options'	=> $flexslider_array,
				'multiple'	=> false
			),
			array(
				'name' => 'Select Portfolio Filters',
				'id' => $prefix . "portfoliofilter",
				'type' => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options' => $types_array,
				// Select multiple values, optional. Default is false.
				'multiple' => true,
				'desc' => 'Optional: Choose what portfolio category you want to display on this page (If Portfolio Template chosen).'
			)
		)
	);
	
	/* ----------------------------------------------------- */
	// Project Info Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id' => 'portfolio_info',
		'title' => 'Project Information',
		'pages' => array( 'portfolio' ),
		'context' => 'normal',
		
		
	
		'fields' => array(
			array(
					'name'		=> 'Title Bar',
					'id'		=> $prefix . "titlebar",
					'type'		=> 'select',
					'options'	=> array(
						'titlebar'			=> 'Title & Subtitle',
						'notitlebar'		=> 'No Title Bar'
					),
					'multiple'	=> false,
					'std'		=> array( 'title' )
			),
			array(
				'name'		=> 'Subtitle',
				'id'		=> $prefix . 'subtitle',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			),	
			array(
				'name'		=> 'Client',
				'id'		=> $prefix . 'portfolio-client',
				'desc'		=> 'Leave empty if you do not want to show this.',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			),
			array(
				'name'		=> 'Project link',
				'id'		=> $prefix . 'portfolio-link',
				'desc'		=> 'URL to the Project if available (Do not forget the http://)',
				'clone'		=> false,
				'type'		=> 'text',
				'std'		=> ''
			),
			array(
				'name'		=> 'Detail Layout',
				'id'		=> $prefix . 'portfolio-detaillayout',
				'desc'		=> 'Choose Layout for Detailpage',
				'type'		=> 'select',
				'options'	=> array(
					'wide'			=> 'Full Width',
					'sidebyside'	=> 'Side by Side'
				),
				'multiple'	=> false,
				'std'		=> array( 'no' )
			),
			array(
				'name'		=> 'Show Project Details?',
				'id'		=> $prefix . "portfolio-details",
				'type'		=> 'checkbox',
				'std'		=> true
			),
			array(
				'name'		=> 'Show Related Projects?',
				'id'		=> $prefix . "portfolio-relatedposts",
				'type'		=> 'checkbox',
				'desc'		=> 'This overwrites the global settings from Theme Options'
			),
			array(
					'name'		=> 'Link to Lightbox',
					'id'		=> $prefix . "portfolio-lightbox",
					'type'		=> 'select',
					'options'	=> array(
						'false'		=> 'false',
						'true'		=> 'true'
					),
					'multiple'	=> false,
					'std'		=> array( 'false' ),
					'desc'		=> 'Open Image in a Lightbox (on Overview, Homepage & Related Posts)'
			)
		)
	);
	
	/* ----------------------------------------------------- */
	// Project Slides Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id'		=> 'portfolio_slides',
		'title'		=> 'Project Slides',
		'pages'		=> array( 'portfolio' ),
		'context' => 'normal',
	
		'fields'	=> array(
			array(
				'name'	=> 'Project Slider Images',
				'desc'	=> 'Upload up to 20 project images for a slideshow - or only one to display a single image. <br /><br /><strong>Notice:</strong> The Preview Image will be the Image set as Featured Image.',
				'id'	=> $prefix . 'screenshot',
				'type'	=> 'plupload_image',
				'max_file_uploads' => 20,
			)
			
		)
	);
	
	/* ----------------------------------------------------- */
	// Project Video Metabox
	/* ----------------------------------------------------- */
	$meta_boxes[] = array(
		'id'		=> 'portfolio_video',
		'title'		=> 'Project Video',
		'pages'		=> array( 'portfolio' ),
		'context' => 'normal',
	
		'fields'	=> array(
			array(
				'name'		=> 'Video Source',
				'id'		=> $prefix . 'source',
				'type'		=> 'select',
				'options'	=> array(
					'youtube'		=> 'Youtube',
					'vimeo'			=> 'Vimeo',
					'own'			=> 'Own Embed Code'
				),
				'multiple'	=> false,
				'std'		=> array( 'no' )
			),
			array(
				'name'	=> 'Video URL or own Embedd Code<br />(Audio Embedd Code is possible, too)',
				'id'	=> $prefix . 'embed',
				'desc'	=> 'Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br />This will show the Video <strong>INSTEAD</strong> of the Image Slider.<br /><strong>Of course you can also insert your Audio Embedd Code!</strong><br /><br /><strong>Notice:</strong> The Preview Image will be the Image set as Featured Image..',
				'type' 	=> 'textarea',
				'std' 	=> "",
				'cols' 	=> "40",
				'rows' 	=> "8"
			)
		)
	);
	
	foreach ( $meta_boxes as $meta_box ) {
		new RW_Meta_Box( $meta_box );
	}
}


/* ----------------------------------------------------- */
// Background Styling
/* ----------------------------------------------------- */
	
if($data['select_layoutstyle'] == 'Boxed Layout' || $data['select_layoutstyle'] == 'Boxed Layout with margin' ) {
	
	add_action( 'admin_init', 'rw_register_meta_boxes_background' );
	function rw_register_meta_boxes_background()
	{
	
		global $meta_boxes;

		$prefix = 'minti_';
		$meta_boxes = array();
	
		$meta_boxes[] = array(
			'id' => 'styling',
			'title' => 'Background Styling Options',
			'pages' => array( 'post', 'page', 'portfolio' ),
			'context' => 'side',
			'priority' => 'low',
		
			// List of meta fields
			'fields' => array(
				array(
					'name'		=> 'Background Image URL',
					'id'		=> $prefix . 'bgurl',
					'desc'		=> '',
					'clone'		=> false,
					'type'		=> 'text',
					'std'		=> ''
				),
				array(
					'name'		=> 'Style',
					'id'		=> $prefix . "bgstyle",
					'type'		=> 'select',
					'options'	=> array(
						'stretch'		=> 'Stretch Image',
						'repeat'		=> 'Repeat',
						'no-repeat'		=> 'No-Repeat',
						'repeat-x'		=> 'Repeat-X',
						'repeat-y'		=> 'Repeat-Y'
					),
					'multiple'	=> false,
					'std'		=> array( 'stretch' )
				),
				array(
					'name'		=> 'Background Color',
					'id'		=> $prefix . "bgcolor",
					'type'		=> 'color'
				)
			)
		);
		
		foreach ( $meta_boxes as $meta_box ) {
			new RW_Meta_Box( $meta_box );
		}
	}
	
}