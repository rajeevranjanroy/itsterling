<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
	

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		$of_options_select = array("one","two","three","four","five"); 
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$url =  ADMIN_DIR . 'assets/images/';

/* ------------------------------------------------------------------------ */
/* General
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "General",
					"type" => "heading");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "General",
					"icon" => false,
					"type" => "info");

$of_options[] = array( "name" => "Disable Comments for all Content Pages (not Blog)",
					"desc" => "<strong>Be careful:</strong> Page specific Settings get overwritten.",
					"id" => "check_disablecomments",
					"std" => 0,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics Code (or other) here.",
					"id" => "textarea_trackingcode",
					"std" => "",
					"type" => "textarea"); 
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Favicons",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Favicon Upload (16x16)",
					"desc" => "Upload your Favicon (16x16px ico/png - use <a href='http://www.favicon.cc/' target='_blank'>favicon.cc</a> to make sure it's fully compatible)",
					"id" => "media_favicon",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple iPhone Icon Upload (57x57)",
					"desc" => "Upload your Apple Touch Icon (57x57px png)",
					"id" => "media_favicon_iphone",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple iPhone Retina Icon Upload (114x114)",
					"desc" => "Upload your Apple Touch Retina Icon (114x114px png)",
					"id" => "media_favicon_iphone_retina",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple iPad Icon Upload (72x72)",
					"desc" => "Upload your Apple Touch Retina Icon (144x144px png)",
					"id" => "media_favicon_ipad",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Apple iPad Retina Icon Upload (144x144px)",
					"desc" => "Upload your Apple Touch Retina Icon (144x144px png)",
					"id" => "media_favicon_ipad_retina",
					"std" => "",
					"mod" => "min",
					"type" => "media");

/* ------------------------------------------------------------------------ */
/* Layout
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Layout",
					"type" => "heading");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Layout Options",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Enable Responsive Layout",
					"desc" => "Check to enable Responsive Layout",
					"id" => "check_responsive",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Enable to Zoom on Mobile Devices",
					"desc" => "Check to enable Zoom on Mobile Devices (If Responsive Mode is active I would recommend to leave it disabled.)",
					"id" => "check_mobilezoom",
					"std" => 0,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Layout Style",
					"desc" => "Choose your Layout Style",
					"id" => "select_layoutstyle",
					"std" => "Fullwidth",
					"type" => "select",
					"options" => array('Fullwidth', 'Boxed Layout', 'Boxed Layout with margin'));	
					
$of_options[] = array( "name" => "Enable Striped Border",
					"desc" => "Check to enable Striped Border (after Header & before Footer)",
					"id" => "check_stripedborder",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => "Headline Style",
					"desc" => "Choose your Layout Style",
					"id" => "select_headlinestyle",
					"std" => "Striped Background",
					"type" => "select",
					"options" => array('Striped Background', 'Border Bottom'));	
					
$of_options[] = array( "name" => "Tile Bar Image Grid Opacity",
					"desc" => "Opacity of the grid for Featured Image Title. Between 0 (0%) and 1 (100%). Default: 0.8",
					"id" => "titlebar_gridopacity",
					"std" => "0.8",
					"type" => "text");

$of_options[] = array( "name" => "Title Divider",
					"desc" => "Enter your Divider between Title & Subtitle",
					"id" => "text_titledivider",
					"std" => ". ",
					"type" => "text");  
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Boxed Layout Options (only work when Boxed Layout is enabled)",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Default Background Image",
					"desc" => "Upload default Background or paste Image URL",
					"id" => "media_bg",
					"std" => "",
					"mod" => "min",
					"type" => "media");

$of_options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select Background Repeat Option for the default Background.",
					"id" => "select_bg",
					"std" => "Stretch Image",
					"type" => "select",
					"options" => array('Stretch Image', 'repeat', 'no-repeat', 'repeat-x', 'repeat-y')
					);
					
$of_options[] = array( "name" => "Default Background Color",
					"desc" => "Select Color for default Background",
					"id" => "color_bg",
					"std" => "#999999",
					"type" => "color"); 
																
/* ------------------------------------------------------------------------ */
/* Header
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Header",
					"type" => "heading");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Select Header Layout",
					"icon" => false,
					"type" => "info");	
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "header_layout",
					"std" => "v1",
					"type" => "images",
					"options" => array(
						"v1" => get_bloginfo('template_directory')."/framework/images/headers/header1.jpg",
						"v2" => get_bloginfo('template_directory')."/framework/images/headers/header2.jpg",
						"v3" => get_bloginfo('template_directory')."/framework/images/headers/header3.jpg",
						"v4" => get_bloginfo('template_directory')."/framework/images/headers/header4.jpg",
						"v5" => get_bloginfo('template_directory')."/framework/images/headers/header5.jpg"
					));
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Top Bar Options",
					"icon" => false,
					"type" => "info");				

$of_options[] = array( "name" => "Show Topbar",
					"desc" => "Check to show Topbar (Callus Text & Social Media)",
					"id" => "check_topbar",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Call Us Text",
					"desc" => "Enter your Call us Text (HTML allowed)",
					"id" => "text_callus",
					"std" => "Call Us: (1)118 234 678 - Mail info@example.com",
					"type" => "textarea"); 
					
$of_options[] = array( "name" => "Show Social Icons in Topbar",
					"desc" => "Check to show Social Icons in Topbar (Configure Icons in Social Media)",
					"id" => "check_socialtopbar",
					"std" => 1,
					"type" => "checkbox");
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "General Logo & Search Options",
					"icon" => false,
					"type" => "info"); 
					
$of_options[] = array( "name" => "Logo Upload",
					"desc" => "Upload your Logo",
					"id" => "media_logo",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Show Searchform",
					"desc" => "Check to show Searchform in Navigation Bar",
					"id" => "check_searchform",
					"std" => 1,
					"type" => "checkbox");
					
$of_options[] = array( "name" => "Activate Sticky Header (Experimental)",
					"desc" => "Check to activate sticky Header  (Experimental)",
					"id" => "check_stickyheader",
					"std" => 0,
					"type" => "checkbox");
					
/* ------------------------------------------------------------------------ */ 
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Header-V1 Options",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Header Height (without px)",
					"desc" => "Header Height (Default: 90)",
					"id" => "style_headerheight",
					"std" => "90",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Logo Top Margin",
					"desc" => "Enter your Top margin value for the Logo in pixels (Default: 33px)",
					"id" => "style_logotopmargin",
					"std" => "33px",
					"type" => "text");
					
$of_options[] = array( "name" => "Searchform Top Margin",
					"desc" => "Enter your Top margin value for the Searchform in pixels (Default: 29px)",
					"id" => "style_searchformtopmargin",
					"std" => "29px",
					"type" => "text");
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Header-V2 Options",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Header Height",
					"desc" => "Header Height (Default: 90px)",
					"id" => "style_hv2height",
					"std" => "90px",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Logo Top Margin",
					"desc" => "Enter your Top margin value for the Logo in pixels (Default: 33px)",
					"id" => "style_hv2logotopmargin",
					"std" => "33px",
					"type" => "text");
					
$of_options[] = array( "name" => "Searchform Top Margin",
					"desc" => "Enter your Top margin value for the Searchform in pixels (Default: 28px)",
					"id" => "style_hv2searchformtopmargin",
					"std" => "28px",
					"type" => "text");
					
$of_options[] = array( "name" => "Slogan Top Margin",
					"desc" => "Enter your Top margin value for the Slogan in pixels (Default: 33px)",
					"id" => "style_hv2slogantopmargin",
					"std" => "33px",
					"type" => "text");
					
$of_options[] = array( "name" => "Sub-Menu Top Margin",
					"desc" => "Enter your Top margin value for the Sub-Menu in pixels (Default: 41px)",
					"id" => "style_hv2submenumargin",
					"std" => "41px",
					"type" => "text");
					
$of_options[] = array( "name" => "Slogan",
					"desc" => "Enter your Slogan",
					"id" => "text_hv2slogan",
					"std" => "Enter any Slogan or Link here.",
					"type" => "textarea"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Header-V3 Options",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Header Height",
					"desc" => "Header Height (Default: 90px)",
					"id" => "style_hv3height",
					"std" => "90px",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Logo Top Margin",
					"desc" => "Enter your Top margin value for the Logo in pixels (Default: 33px)",
					"id" => "style_hv3logotopmargin",
					"std" => "33px",
					"type" => "text");
					
$of_options[] = array( "name" => "Searchform Top Margin",
					"desc" => "Enter your Top margin value for the Searchform in pixels (Default: 30px)",
					"id" => "style_hv3searchformtopmargin",
					"std" => "30px",
					"type" => "text");
					
$of_options[] = array( "name" => "Navigation Top Margin",
					"desc" => "Enter your Top margin value for the Navigation in pixels (Default: 26px)",
					"id" => "style_hv3navigationtopmargin",
					"std" => "26px",
					"type" => "text");
					
$of_options[] = array( "name" => "Sub-Menu Top Margin",
					"desc" => "Enter your Top margin value for the Sub-Menu in pixels (Default: 37px)",
					"id" => "style_hv3submenumargin",
					"std" => "37px",
					"type" => "text");
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Header-V4 Options",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Header Height",
					"desc" => "Header Height (Default: 90px)",
					"id" => "style_hv4height",
					"std" => "90px",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Logo Top Margin",
					"desc" => "Enter your Top margin value for the Logo in pixels (Default: 33px)",
					"id" => "style_hv4logotopmargin",
					"std" => "33px",
					"type" => "text");
					
$of_options[] = array( "name" => "Searchform Top Margin",
					"desc" => "Enter your Top margin value for the Searchform in pixels (Default: 28px)",
					"id" => "style_hv4searchformtopmargin",
					"std" => "28px",
					"type" => "text");
					
$of_options[] = array( "name" => "Slogan Top Margin",
					"desc" => "Enter your Top margin value for the Slogan in pixels (Default: 33px)",
					"id" => "style_hv4slogantopmargin",
					"std" => "33px",
					"type" => "text");
					
$of_options[] = array( "name" => "Sub-Menu Top Margin",
					"desc" => "Enter your Top margin value for the Sub-Menu in pixels (Default: 41px)",
					"id" => "style_hv4submenumargin",
					"std" => "41px",
					"type" => "text");
					
$of_options[] = array( "name" => "Slogan",
					"desc" => "Enter your Slogan",
					"id" => "text_hv4slogan",
					"std" => "Enter any Slogan or Link here.",
					"type" => "textarea"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Header-V5 Options",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Header Height",
					"desc" => "Header Height (Default: 107px)",
					"id" => "style_hv5height",
					"std" => "107px",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Logo Top Margin",
					"desc" => "Enter your Top margin value for the Logo in pixels (Default: 33px)",
					"id" => "style_hv5logotopmargin",
					"std" => "33px",
					"type" => "text");
					
$of_options[] = array( "name" => "Slogan Top Margin",
					"desc" => "Enter your Top margin value for the Slogan in pixels (Default: 4px)",
					"id" => "style_hv5slogantopmargin",
					"std" => "4px",
					"type" => "text");
					
$of_options[] = array( "name" => "Sub-Menu Top Margin",
					"desc" => "Enter your Top margin value for the Sub-Menu in pixels (Default: 41px)",
					"id" => "style_hv5submenumargin",
					"std" => "41px",
					"type" => "text");
					
$of_options[] = array( "name" => "Slogan",
					"desc" => "Enter your Slogan",
					"id" => "text_hv5slogan",
					"std" => "Enter any Slogan or Link here.",
					"type" => "textarea"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Infobar Options",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Show Infobar",
					"desc" => "Check to show Infobar",
					"id" => "check_infobar",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Infobar Static of Fixed",
					"desc" => "Select if you want the Infobar to be static of fixed. The Fixed option will keep the bar always visible.",
					"id" => "select_infobarstatic",
					"std" => "fixed",
					"type" => "select",
					"options" => array(
						'fixed' => 'fixed',
						'absolute' => 'absolute'
					));
				
$of_options[] = array( "name" => "Infobar Text (If no Widgets are in this area)",
					"desc" => "Enter your Infobar Text (HTML allowed)<br /><strong>If you drop Widgets in this area, this text will not be shown.</strong>",
					"id" => "textarea_infobar",
					"std" => "Enter your Infotext or Widgets here...",
					"type" => "textarea");
					
$of_options[] = array( "name" => "Infobar Widget Columns",
					"desc" => "Select how many Widgets you want in the Infobar if you decide to use Widgets.",
					"id" => "select_infobarcolumns",
					"std" => "4",
					"type" => "select",
					"options" => array(
						'4' => '4',
						'3' => '3',
						'2' => '2',
						'1' => '1'
					)); 
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Optional: Retina Logo Options",
					"icon" => false,
					"type" => "info");
				
$of_options[] = array( "name" => "Logo Upload Retina",
					"desc" => "Upload your Retina Logo. This should be your Logo in double size (If your logo is 100 x 20px, it should be 200 x 40px)",
					"id" => "media_logo_retina",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
$of_options[] = array( "name" => "Original Logo Width",
					"desc" => "If Retina Logo uploaded, please enter the width of the Standard Logo you've uploaded (not the Retina Logo)",
					"id" => "logo_width",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Original Logo Height",
					"desc" => "If Retina Logo uploaded, please enter the height of the Standard Logo you've uploaded (not the Retina Logo)",
					"id" => "logo_height",
					"std" => "",
					"type" => "text");

/* ------------------------------------------------------------------------ */
/* Footer
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Footer",
					"type" => "heading");				
					
$of_options[] = array( "name" => "Enable Widgetized Footer",
					"desc" => "Check to show widgetized Footer.",
					"id" => "check_footerwidgets",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Footer Widget Columns",
					"desc" => "Select how many columns you want in the footer.",
					"id" => "select_footercolumns",
					"std" => "4",
					"type" => "select",
					"options" => array(
						'4' => '4',
						'3' => '3',
						'2' => '2',
						'1' => '1'
					));
					
$of_options[] = array( "name" => "Enable Twitter-Bar in Footer",
					"desc" => "Check to show Twitter-Bar in Footer.",
					"id" => "check_twitterbar",
					"std" => 0,
					"type" => "checkbox"); 

$of_options[] = array( "name" => "Copyright Text",
					"desc" => "Enter your Copyright Text (HTML allowed)",
					"id" => "textarea_copyright",
					"std" => "Theme by <a href='http://mintithemes.com'>minti</a>",
					"type" => "textarea"); 

$of_options[] = array( "name" => "Show Social Icons in Footer",
					"desc" => "Check to show Social Icons in Footer (Configure Icons in Social Media)",
					"id" => "check_socialfooter",
					"std" => 1,
					"type" => "checkbox"); 
					
/* ------------------------------------------------------------------------ */
/* Typography
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Typography",
					"type" => "heading");
									
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Body",
					"icon" => false,
					"type" => "info");

$of_options[] = array( "name" => "Body Text Font",
					"desc" => "Specify the Body font properties",
					"id" => "font_body",
					"std" => array('size' => '13px','face' => 'Helvetica','style' => 'normal','color' => '#444444'),
					"type" => "typography");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Headlines",
					"icon" => false,
					"type" => "info");
				
$of_options[] = array( "name" => "H1 - Headline Font",
					"desc" => "Specify the H1 Headline font properties",
					"id" => "font_h1",
					"std" => array('size' => '28px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography");  

$of_options[] = array( "name" => "H2 - Headline Font",
					"desc" => "Specify the H2 Headline font properties",
					"id" => "font_h2",
					"std" => array('size' => '23px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography");  
					
$of_options[] = array( "name" => "H3 - Headline Font",
					"desc" => "Specify the H3 Headline font properties",
					"id" => "font_h3",
					"std" => array('size' => '18px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography");  

$of_options[] = array( "name" => "H4 - Headline Font",
					"desc" => "Specify the H4 Headline font properties",
					"id" => "font_h4",
					"std" => array('size' => '16px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography");  
					
$of_options[] = array( "name" => "H5 - Headline Font",
					"desc" => "Specify the H5 Headline font properties",
					"id" => "font_h5",
					"std" => array('size' => '15px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography");  

$of_options[] = array( "name" => "H6 - Headline Font",
					"desc" => "Specify the H6 Headline font properties",
					"id" => "font_h6",
					"std" => array('size' => '14px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography"); 
					
/* ------------------------------------------------------------------------ */
/* Styling
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Styling",
					"type" => "heading");
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "General",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Accent Color",
					"desc" => "Default: #289dcc",
					"id" => "color_accent",
					"std" => "#289dcc",
					"type" => "color"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Links",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Link Color",
					"desc" => "Default: #289dcc",
					"id" => "color_link",
					"std" => "#289dcc",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Link Hover Color",
					"desc" => "Default: #666666",
					"id" => "color_hover",
					"std" => "#666666",
					"type" => "color"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Top Bar",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Top Bar Background Color",
					"desc" => "Default: #ffffff",
					"id" => "color_topbarbg",
					"std" => "#ffffff",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Top Bar Border Color",
					"desc" => "Default: 1px solid #efefef",
					"id" => "border_topbar",
					"std" => array('width' => '1','style' => 'solid','color' => '#efefef'),
					"type" => "border"); 
					
$of_options[] = array( "name" => "Callus Text Font",
					"desc" => "Default: #999999",
					"id" => "font_callus",
					"std" => array('size' => '11px','face' => 'Helvetica','style' => 'normal','color' => '#999999'),
					"type" => "typography"); 
					
$of_options[] = array( "name" => "Top Bar Link Hover Color",
					"desc" => "Default: #333333",
					"id" => "color_topbarlinkhover",
					"std" => "#333333",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Top Bar Responsive Background Color (mobile Mode only)",
					"desc" => "Default: #efefef",
					"id" => "color_topbarresponsive",
					"std" => "#efefef",
					"type" => "color"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Header",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Header Background Color",
					"desc" => "Default: #ffffff",
					"id" => "color_headerbg",
					"std" => "#ffffff",
					"type" => "color"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Navigation",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Link Color",
					"desc" => "Default: #666666",
					"id" => "font_nav",
					"std" => array('size' => '13px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography"); 
					
$of_options[] = array( "name" => "Link Hover Color",
					"desc" => "Default: #333333",
					"id" => "color_navlinkhover",
					"std" => "#333333",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Link Active Color",
					"desc" => "Default: #289dcc",
					"id" => "color_navlinkactive",
					"std" => "#289dcc",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Header-V4 Background Color",
					"desc" => "Default: #555555",
					"id" => "color_hv4bgcolor",
					"std" => "#555555",
					"type" => "color"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Slogan",
					"icon" => false,
					"type" => "info"); 
					
$of_options[] = array( "name" => "Slogan Font",
					"desc" => "Default: #666666",
					"id" => "font_slogan",
					"std" => array('size' => '13px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography"); 
					
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Sub-Menu Styling",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Sub-Menu Background Color",
					"desc" => "Default: #999999",
					"id" => "color_submenubg",
					"std" => "#999999",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Sub-Menu Border-Top Color",
					"desc" => "Default: #555555",
					"id" => "color_submenuborder",
					"std" => "#555555",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Sub-Menu Link Color",
					"desc" => "Default: #dedede",
					"id" => "color_submenulink",
					"std" => "#dedede",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Sub-Menu Link Border Color",
					"desc" => "Default: #a5a5a5",
					"id" => "color_submenulinkborder",
					"std" => "#a5a5a5",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Sub-Menu Link Hover Color (also Active Color)",
					"desc" => "Default: #ffffff",
					"id" => "color_submenulinkhover",
					"std" => "#ffffff",
					"type" => "color");
					
/* ------------------------------------------------------------------------ */					

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Titlebar Default",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Title Background Gradient Top",
					"desc" => "Default: #FFFFFF",
					"id" => "color_titlebgtop",
					"std" => "#FFFFFF",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Title Background Gradient Bottom",
					"desc" => "Default: #FAFAFA",
					"id" => "color_titlebgbottom",
					"std" => "#FAFAFA",
					"type" => "color");
					
$of_options[] = array( "name" => "Title Border Top Color",
					"desc" => "Default: 1px solid #e4e4e4",
					"id" => "border_titletop",
					"std" => array('width' => '1','style' => 'solid','color' => '#e4e4e4'),
					"type" => "border"); 
					
$of_options[] = array( "name" => "Title Border Bottom Color",
					"desc" => "Default: 1px solid #e4e4e4",
					"id" => "border_titlebottom",
					"std" => array('width' => '1','style' => 'solid','color' => '#e4e4e4'),
					"type" => "border"); 
					
$of_options[] = array( "name" => "Title h1 Text Font",
					"desc" => "Default: #666666",
					"id" => "font_titleh1",
					"std" => array('size' => '18px','face' => 'Helvetica','style' => 'normal','color' => '#666666'),
					"type" => "typography"); 
					
$of_options[] = array( "name" => "Title h2 Text Font",
					"desc" => "Default: #aaaaaa",
					"id" => "font_titleh2",
					"std" => array('size' => '15px','face' => 'Helvetica','style' => 'normal','color' => '#aaaaaa'),
					"type" => "typography"); 
					
$of_options[] = array( "name" => "Title Breadcrumb Color",
					"desc" => "Default: #aaaaaa",
					"id" => "color_titlebreadcrumb",
					"std" => "#aaaaaa",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Title Breadcrumb Hover Color",
					"desc" => "Default: #289dcc",
					"id" => "color_titlebreadcrumbhover",
					"std" => "#289dcc",
					"type" => "color"); 
					
/* ------------------------------------------------------------------------ */					

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Titlebar Featured Image Style #1",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Alternative Title #1 h1 Background Color",
					"desc" => "Default: #289dcc",
					"id" => "color_alttitlebg1",
					"std" => "#289dcc",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Alternative Title #1 h2 Background Color",
					"desc" => "Default: #ffffff",
					"id" => "color_alttitlebg2",
					"std" => "#ffffff",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Alternative Title #1 h1 Text Font",
					"desc" => "Default: #ffffff",
					"id" => "font_alttitleh1",
					"std" => array('size' => '18px','face' => 'Helvetica','style' => 'normal','color' => '#ffffff'),
					"type" => "typography"); 
					
$of_options[] = array( "name" => "Alternative Title #1 h2 Text Font",
					"desc" => "Default: #999999",
					"id" => "font_alttitleh2",
					"std" => array('size' => '15px','face' => 'Helvetica','style' => 'normal','color' => '#999999'),
					"type" => "typography"); 
					
$of_options[] = array( "name" => "Alternative Title #1 Breadcrumb Background",
					"desc" => "Default: #ffffff",
					"id" => "color_alttitlebreadcrumbbg",
					"std" => "#ffffff",
					"type" => "color");
					
$of_options[] = array( "name" => "Alternative Title #1 Border Color",
					"desc" => "Default: 1px solid #e4e4e4",
					"id" => "border_alttitlebreadcrumb",
					"std" => array('width' => '1','style' => 'solid','color' => '#e4e4e4'),
					"type" => "border"); 
					
$of_options[] = array( "name" => "Alternative Title #1 Breadcrumb Link Color",
					"desc" => "Default: #999999",
					"id" => "color_alttitlebreadcrumblink",
					"std" => "#999999",
					"type" => "color");
					
$of_options[] = array( "name" => "Alternative Title #1 Breadcrumb Link Hover",
					"desc" => "Default: #289dcc",
					"id" => "color_alttitlebreadcrumblinkhover",
					"std" => "#289dcc",
					"type" => "color");
					
/* ------------------------------------------------------------------------ */					

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Titlebar Featured Image Style #2",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Alternative Title #2 Background Color",
					"desc" => "Default: #efefef",
					"id" => "color_alttitle2bg",
					"std" => "#efef",
					"type" => "color");
					
$of_options[] = array( "name" => "Alternative Title #2 Border Color",
					"desc" => "Default: 1px solid #e4e4e4",
					"id" => "border_alttitle2border",
					"std" => array('width' => '1','style' => 'solid','color' => '#e4e4e4'),
					"type" => "border"); 
					
$of_options[] = array( "name" => "Alternative Title #2 h1 Text Font",
					"desc" => "Default: #666666",
					"id" => "font_alttitle2h1",
					"std" => array('size' => '18px','face' => 'Helvetica','style' => 'bold','color' => '#666666'),
					"type" => "typography");
					
$of_options[] = array( "name" => "Alternative Title #2 Breadcrumb Link Color",
					"desc" => "Default: #999999",
					"id" => "color_alttitle2breadcrumblink",
					"std" => "#999999",
					"type" => "color");
					
$of_options[] = array( "name" => "Alternative Title #2 Breadcrumb Link Hover",
					"desc" => "Default: #289dcc",
					"id" => "color_alttitle2breadcrumblinkhover",
					"std" => "#289dcc",
					"type" => "color"); 

/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Sidebar",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Sidebar Widgets Headline",
					"desc" => "Default: #666666",
					"id" => "font_sidebarwidget",
					"std" => array('size' => '15px','face' => 'Helvetica','style' => 'bold','color' => '#666666'),
					"type" => "typography"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Twitter Bar",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Twitter Bar Background Color",
					"desc" => "Default: #289dcc",
					"id" => "color_twitterbg",
					"std" => "#289dcc",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Twitter Bar Text Font",
					"desc" => "Default: #ffffff",
					"id" => "font_twitter",
					"std" => array('size' => '13px','face' => 'Helvetica','style' => 'normal','color' => '#ffffff'),
					"type" => "typography"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Footer & Infobar",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Footer Background Color",
					"desc" => "Default: #444444",
					"id" => "color_footerbg",
					"std" => "#444444",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Footer Border Top Color",
					"desc" => "Default: 10px solid #333333",
					"id" => "border_footertop",
					"std" => array('width' => '10','style' => 'solid','color' => '#333333'),
					"type" => "border"); 
					
$of_options[] = array( "name" => "Footer Text Color",
					"desc" => "Default: #999999",
					"id" => "color_footertext",
					"std" => "#999999",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Footer Headline",
					"desc" => "Default: #ffffff",
					"id" => "font_footerheadline",
					"std" => array('size' => '15px','face' => 'Helvetica','style' => 'normal','color' => '#ffffff'),
					"type" => "typography");
					
$of_options[] = array( "name" => "Footer Headline Border Color",
					"desc" => "Default: 1px solid #555555",
					"id" => "border_footerheadline",
					"std" => array('width' => '1','style' => 'solid','color' => '#555555'),
					"type" => "border");
					
$of_options[] = array( "name" => "Footer Link Color",
					"desc" => "Default: #999999",
					"id" => "color_footerlink",
					"std" => "#999999",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Footer Link Hover Color",
					"desc" => "Default: #ffffff",
					"id" => "color_footerlinkhover",
					"std" => "#ffffff",
					"type" => "color"); 
					
/* ------------------------------------------------------------------------ */
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Copyright",
					"icon" => false,
					"type" => "info");
					
$of_options[] = array( "name" => "Copyright Background Color",
					"desc" => "Default: #222222",
					"id" => "color_copyrightbg",
					"std" => "#222222",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Copyright Text Color",
					"desc" => "Default: #777777",
					"id" => "color_copyrighttext",
					"std" => "#777777",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Copyright Link Color",
					"desc" => "Default: #888888",
					"id" => "color_copyrightlink",
					"std" => "#888888",
					"type" => "color"); 
					
$of_options[] = array( "name" => "Copyright Link Hover Color",
					"desc" => "Default: #ffffff",
					"id" => "color_copyrightlinkhover",
					"std" => "#ffffff",
					"type" => "color");
					
/* ------------------------------------------------------------------------ */
/* Blog
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Blog",
					"type" => "heading");
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Blog Options",
					"icon" => false,
					"type" => "info"); 
					
$of_options[] = array( "name" => "Blog Layout",
					"desc" => "Choose your Default Blog Layout",
					"id" => "select_bloglayout",
					"std" => "Blog Fullwidth",
					"type" => "select",
					"options" => array('Blog Fullwidth', 'Blog Medium'));	
					
$of_options[] = array( "name" => "Blog Sidebar Position",
					"desc" => "Blog Listing Sidebar Position",
					"id" => "select_blogsidebar",
					"std" => "sidebar-right",
					"type" => "select",
					"options" => array('sidebar-left', 'sidebar-right'));	
					
$of_options[] = array( "name" => "Enable Share-Box on Post Detail",
					"desc" => "Check to enable Share-Box",
					"id" => "check_sharebox",
					"std" => 1,
					"type" => "checkbox"); 

$of_options[] = array( "name" => "Enable Author Info on Post Detail",
					"desc" => "Check to enable Author Info",
					"id" => "check_authorinfo",
					"std" => 1,
					"type" => "checkbox"); 

$of_options[] = array( "name" => "Enable Related Posts on Post Detail",
					"desc" => "Check to enable Related Posts",
					"id" => "check_relatedposts",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Blog Excerpt Length",
					"desc" => "Default: 30. Used for blog page, archives & search results.",
					"id" => "text_excerptlength",
					"std" => "30",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Enable 'Read More' Button",
					"desc" => "Check to enable 'Read More' button on blog entries.",
					"id" => "check_readmore",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Blog Title Settings",
					"icon" => false,
					"type" => "info"); 
					
$of_options[] = array( "name" => "Blog Title",
					"desc" => "",
					"id" => "text_blogtitle",
					"std" => "Blog",
					"type" => "text");

$of_options[] = array( "name" => "Blog Subtitle",
					"desc" => "",
					"id" => "text_blogsubtitle",
					"std" => "Blog Subtitle",
					"type" => "text"); 
					

$of_options[] = array( "name" => "Blog Breadcrumb Name",
					"desc" => "",
					"id" => "text_blogbreadcrumb",
					"std" => "Blog",
					"type" => "text"); 	
					
$of_options[] = array( "name" => "Blog Titlebar",
					"desc" => "Choose your Blog Titlebar Layout",
					"id" => "select_blogtitlebar",
					"std" => "Default",
					"type" => "select",
					"options" => array('Default', 'Background-Image Style 1', 'Background-Image Style 2', 'No Titlebar'));

$of_options[] = array( "name" => "Disable Breadcrumbs for Blog",
					"desc" => "Check to disable Breadcrumbs for Blog & Blog Posts.",
					"id" => "check_blogbreadcrumbs",
					"std" => 0,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Blog Titlebar Image (If Blog Titlebar Layout is set to Image)",
					"desc" => "Upload a Blog Titlebar Image.",
					"id" => "media_blogtitlebar",
					"std" => "",
					"mod" => "min",
					"type" => "media");			

$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Social Sharing Box Icons",
					"icon" => false,
					"type" => "info"); 
					
$of_options[] = array( "name" => "Enable Facebook in Social Sharing Box",
					"desc" => "Check to enable Facebook in Social Sharing Box",
					"id" => "check_sharingboxfacebook",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Enable Twitter in Social Sharing Box",
					"desc" => "Check to enable Twitter in Social Sharing Box",
					"id" => "check_sharingboxtwitter",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Enable LinkedIn in Social Sharing Box",
					"desc" => "Check to enable LinkedIn in Social Sharing Box",
					"id" => "check_sharingboxlinkedin",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Enable Reddit in Social Sharing Box",
					"desc" => "Check to enable Reddit in Social Sharing Box",
					"id" => "check_sharingboxreddit",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Enable Digg in Social Sharing Box",
					"desc" => "Check to enable Digg in Social Sharing Box",
					"id" => "check_sharingboxdigg",
					"std" => 1,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Enable Delicious in Social Sharing Box",
					"desc" => "Check to enable Delicious in Social Sharing Box",
					"id" => "check_sharingboxdelicious",
					"std" => 1,
					"type" => "checkbox");
					
$of_options[] = array( "name" => "Enable Google in Social Sharing Box",
					"desc" => "Check to enable Google in Social Sharing Box",
					"id" => "check_sharingboxgoogle",
					"std" => 1,
					"type" => "checkbox"); 

$of_options[] = array( "name" => "Enable E-Mail in Social Sharing Box",
					"desc" => "Check to enable Google in E-Mail Sharing Box",
					"id" => "check_sharingboxemail",
					"std" => 1,
					"type" => "checkbox");  
					
/* ------------------------------------------------------------------------ */
/* Portfolio
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Portfolio",
					"type" => "heading");
					
$of_options[] = array( "name" => "Portfolio Slug",
					"desc" => "Enter the URL Slug for your Portfolio (Default: portfolio-item) <br /><strong>Go save your permalinks after changing this.</strong>",
					"id" => "text_portfolioslug",
					"std" => "portfolio-item",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Items on Portfolio Overview",
					"desc" => "Enter how many items you want to show on Portfolio Overview before Pagination shows up (Default: 16)",
					"id" => "text_portfolioitems",
					"std" => "16",
					"type" => "text"); 

/* ------------------------------------------------------------------------ */
/* WooCommerce
/* ------------------------------------------------------------------------ */

$of_options[] = array( "name" => "WooCommerce",
					"type" => "heading");
				
$of_options[] = array( "name" => "",
					"desc" => "",
					"id" => "general_heading",
					"std" => "Woocommerce Title Settings",
					"icon" => false,
					"type" => "info"); 

$of_options[] = array( "name" => "Show Cart Icon in Header",
					"desc" => "Check to show Cart Icon in Header",
					"id" => "check_woocommerceicon",
					"std" => 1,
					"type" => "checkbox"); 

$of_options[] = array( "name" => "WooCommerce Sidebar Position",
					"desc" => "WooCommerce Listing Sidebar Position",
					"id" => "select_woocommercesidebar",
					"std" => "no-sidebar",
					"type" => "select",
					"options" => array('no-sidebar', 'sidebar-left', 'sidebar-right'));	
					
$of_options[] = array( "name" => "Woocommerce Title",
					"desc" => "",
					"id" => "text_woocommercetitle",
					"std" => "woocommerce",
					"type" => "text");

$of_options[] = array( "name" => "Woocommerce Subtitle",
					"desc" => "",
					"id" => "text_woocommercesubtitle",
					"std" => "woocommerce Subtitle",
					"type" => "text"); 
										
$of_options[] = array( "name" => "Woocommerce Titlebar",
					"desc" => "Choose your Woocommerce Titlebar Layout",
					"id" => "select_woocommercetitlebar",
					"std" => "Default",
					"type" => "select",
					"options" => array('Default', 'Background-Image Style 1', 'Background-Image Style 2', 'No Titlebar'));

$of_options[] = array( "name" => "Disable Breadcrumbs for Woocommerce",
					"desc" => "Check to disable Breadcrumbs for Woocommerce",
					"id" => "check_woocommercebreadcrumbs",
					"std" => 0,
					"type" => "checkbox"); 
					
$of_options[] = array( "name" => "Woocommerce Titlebar Image (If Woocommerce Titlebar Layout is set to Image)",
					"desc" => "Upload a Woocommerce Titlebar Image.",
					"id" => "media_woocommercetitlebar",
					"std" => "",
					"mod" => "min",
					"type" => "media");
					
/* ------------------------------------------------------------------------ */
/* Social
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Social Media",
					"type" => "heading");
					
$of_options[] = array( "name" => "Twitter Conf",
					"desc" => "",
					"id" => "introduction",
					"std" => "Twitter Configuration API (1.1)<br /><br />
					<span>You need to have a twitter App for your usage of the new Twitter API 1.1, login & create at https://dev.twitter.com/apps</span>",
					"icon" => true,
					"type" => "info");
					
$of_options[] = array( "name" => "Twitter Username",
					"desc" => "Enter your Twitter username",
					"id" => "social_twitter",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Twitter App Consumer Key",
					"desc" => "Enter your Twitter App Consumer Key. ",
					"id" => "social_twitter-consumerkey",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Twitter App Consumer Secret",
					"desc" => "Enter your Twitter App Consumer Secret. ",
					"id" => "social_twitter-consumersecret",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Twitter App Access Token",
					"desc" => "Enter your Twitter App Access Token. ",
					"id" => "social_twitter-accesstoken",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Twitter App Access Token Secret",
					"desc" => "Enter your Twitter App Access Token Secret. ",
					"id" => "social_twitter-accesstokensecret",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Hello there!",
					"desc" => "",
					"id" => "introduction",
					"std" => "Enter your username / URL to show or leave blank to hide Social Media Icons",
					"icon" => true,
					"type" => "info");

$of_options[] = array( "name" => "Forrst URL",
					"desc" => "Enter URL to your Forrst Account",
					"id" => "social_forrst",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Dribbble URL",
					"desc" => "Enter URL to your Dribbble Account",
					"id" => "social_dribbble",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Flickr URL",
					"desc" => "Enter URL to your Flickr Account",
					"id" => "social_flickr",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Facebook URL",
					"desc" => "Enter URL to your Facebook Account",
					"id" => "social_facebook",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Skype URL",
					"desc" => "Enter URL to your Skype Account",
					"id" => "social_skype",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Digg URL",
					"desc" => "Enter URL to your Digg Account",
					"id" => "social_digg",
					"std" => "",
					"type" => "text"); 

$of_options[] = array( "name" => "Google+ URL",
					"desc" => "Enter URL to your Google+ Account",
					"id" => "social_google",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Instagram URL",
					"desc" => "Enter URL to your Instagram Account",
					"id" => "social_instagram",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "LinkedIn URL",
					"desc" => "Enter URL to your LinkedIn Account",
					"id" => "social_linkedin",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Vimeo URL",
					"desc" => "Enter URL to your Vimeo Account",
					"id" => "social_vimeo",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Yahoo URL",
					"desc" => "Enter URL to your Yahoo Account",
					"id" => "social_yahoo",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Tumblr URL",
					"desc" => "Enter URL to your Tumblr Account",
					"id" => "social_tumblr",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "YouTube URL",
					"desc" => "Enter URL to your YouTube Account",
					"id" => "social_youtube",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Picasa URL",
					"desc" => "Enter URL to your Picasa Account",
					"id" => "social_picasa",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "DeviantArt URL",
					"desc" => "Enter URL to your DeviantArt Account",
					"id" => "social_deviantart",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Behance URL",
					"desc" => "Enter URL to your Behance Account",
					"id" => "social_behance",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Pinterest URL",
					"desc" => "Enter URL to your Pinterest Account",
					"id" => "social_pinterest",
					"std" => "",
					"type" => "text");  
					
$of_options[] = array( "name" => "PayPal URL",
					"desc" => "Enter URL to your PayPal Account",
					"id" => "social_paypal",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Delicious URL",
					"desc" => "Enter URL to your Delicious Account",
					"id" => "social_delicious",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "XING URL",
					"desc" => "Enter URL to your XING Account",
					"id" => "social_xing",
					"std" => "",
					"type" => "text"); 
					
$of_options[] = array( "name" => "Show RSS",
					"desc" => "Check to Show RSS Icon",
					"id" => "social_rss",
					"std" => 1,
					"type" => "checkbox"); 
									
/* ------------------------------------------------------------------------ */
/* Lightbox Settings
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Lightbox",
					"type" => "heading");
					
$of_options[] = array( "name" => "Lightbox Theme",
					"desc" => "",
					"id" => "lightbox_theme",
					"std" => "pp_default",
					"type" => "select",
					"options" => array(
						'pp_default' => 'pp_default',
						'light_rounded' => 'light_rounded',
						'dark_rounded' => 'dark_rounded',
						'light_square' => 'light_square',
						'dark_square' => 'dark_square',
						'facebook' => 'facebook'
					));
					
$of_options[] = array( "name" => "Animation Speed",
					"desc" => "",
					"id" => "lightbox_animation_speed",
					"std" => "fast",
					"type" => "select",
					"options" => array('fast' => 'Fast', 'slow' => 'Slow', 'normal' => 'Normal'));

$of_options[] = array( "name" => "Background Opacity",
					"desc" => "",
					"id" => "lightbox_opacity",
					"std" => "0.8",
					"type" => "text");

$of_options[] = array( "name" => "Show title",
					"desc" => "Check to show the title",
					"id" => "lightbox_title",
					"std" => 1,
					"type" => "checkbox");
					
$of_options[] = array( "name" => "Show Gallery Thumbnails",
					"desc" => "Check to show gallery thumbnails",
					"id" => "lightbox_gallery",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => "Autoplay Gallery",
					"desc" => "Check to autoplay the lightbox gallery",
					"id" => "lightbox_autoplay",
					"std" => 0,
					"type" => "checkbox");

$of_options[] = array( "name" => "Autoplay Gallery Speed",
					"desc" => "If autoplay is set to true, select the slideshow speed in ms. (Default: 5000, 1000 ms = 1 second)",
					"id" => "lightbox_slideshow_speed",
					"std" => "5000",
					"type" => "text");

$of_options[] = array( "name" => "Social Icons",
					"desc" => "Check to show social sharing icons",
					"id" => "lightbox_social",
					"std" => 1,
					"type" => "checkbox");		
					
$of_options[] = array( "name" => "Disable Lightbox on Smartphone",
					"desc" => "Check to disable Lightbox on Smartphones. This will link directly to the image",
					"id" => "lightbox_smartphones",
					"std" => 0,
					"type" => "checkbox");	
					
$of_options[] = array( "name" => "Disable automatic Lightbox for Images",
					"desc" => "If checked this will disable automatic Lightbox for Images in the Content.",
					"id" => "lightbox_automatic",
					"std" => 0,
					"type" => "checkbox");			
					
/* ------------------------------------------------------------------------ */
/* Custom CSS
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Custom CSS",
					"type" => "heading");
					
$of_options[] = array( "name" => "Custom CSS",
					"desc" => "Advanced CSS Options. Paste your CSS Code.",
					"id" => "textarea_csscode",
					"std" => "",
					"type" => "textarea"); 
					
/* ------------------------------------------------------------------------ */
/* Backup
/* ------------------------------------------------------------------------ */
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
					
	}
}
?>
