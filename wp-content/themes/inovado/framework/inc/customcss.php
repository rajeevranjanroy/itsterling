<?php

// Add Custom Styles with WP wp_add_inline_style Method

function my_styles_method() {

	global $data; 

	wp_enqueue_style(
		'custom-style',
		get_template_directory_uri() . '/framework/css/custom_script.css'
	);

		// ----------- VARIABLES -----------
        //$color_headerbg = $data['color_headerbg'];
        $font_body_face = $data['font_body']['face'];
		$font_body_size = $data['font_body']['size'];
		$font_body_style = $data['font_body']['style'];
		$font_body_color = $data['font_body']['color'];

		$font_h1_face = $data['font_h1']['face'];
		$font_h1_size = $data['font_h1']['size'];
		$font_h1_style = $data['font_h1']['style'];
		$font_h1_color = $data['font_h1']['color'];

		$font_h2_face = $data['font_h2']['face'];
		$font_h2_size = $data['font_h2']['size'];
		$font_h2_style = $data['font_h2']['style'];
		$font_h2_color = $data['font_h2']['color'];

		$font_h3_face = $data['font_h3']['face'];
		$font_h3_size = $data['font_h3']['size'];
		$font_h3_style = $data['font_h3']['style'];
		$font_h3_color = $data['font_h3']['color'];

		$font_h4_face = $data['font_h4']['face'];
		$font_h4_size = $data['font_h4']['size'];
		$font_h4_style = $data['font_h4']['style'];
		$font_h4_color = $data['font_h4']['color'];

		$font_h5_face = $data['font_h5']['face'];
		$font_h5_size = $data['font_h5']['size'];
		$font_h5_style = $data['font_h5']['style'];
		$font_h5_color = $data['font_h5']['color'];

		$font_h6_face = $data['font_h6']['face'];
		$font_h6_size = $data['font_h6']['size'];
		$font_h6_style = $data['font_h6']['style'];
		$font_h6_color = $data['font_h6']['color'];

		$color_link = $data['color_link']; // LINK COLOR
		$color_hover = $data['color_hover']; // HOVER COLOR

		$font_callus_face = $data['font_callus']['face'];
		$font_callus_size = $data['font_callus']['size'];
		$font_callus_style = $data['font_callus']['style'];
		$font_callus_color = $data['font_callus']['color'];

		$select_infobarstatic = $data['select_infobarstatic'];

		$color_topbarbg = $data['color_topbarbg'];
		$border_topbar_width = $data['border_topbar']['width'];
		$border_topbar_style = $data['border_topbar']['style'];
		$border_topbar_color = $data['border_topbar']['color'];
		$color_topbarlinkhover = $data['color_topbarlinkhover'];

		$color_headerbg = $data['color_headerbg'];
		$font_slogan_face = $data['font_slogan']['face'];
		$font_slogan_size = $data['font_slogan']['size'];
		$font_slogan_style = $data['font_slogan']['style'];
		$font_slogan_color = $data['font_slogan']['color'];

		$style_headerheight = $data['style_headerheight'];
		$style_headerheight_minus = $data['style_headerheight']-3;
		$style_logotopmargin = $data['style_logotopmargin'];
		$style_searchformtopmargin = $data['style_searchformtopmargin'];

		$font_nav_face = $data['font_nav']['face'];
		$font_nav_size = $data['font_nav']['size'];
		$font_nav_style = $data['font_nav']['style'];
		$font_nav_color = $data['font_nav']['color'];
		$color_navlinkhover = $data['color_navlinkhover'];
		$color_navlinkactive = $data['color_navlinkactive'];

		$style_hv2height = $data['style_hv2height'];
		$style_hv2logotopmargin = $data['style_hv2logotopmargin'];
		$style_hv2searchformtopmargin = $data['style_hv2searchformtopmargin'];
		$style_hv2slogantopmargin = $data['style_hv2slogantopmargin'];
		$style_hv2submenumargin = $data['style_hv2submenumargin'];

		$style_hv3height = $data['style_hv3height'];
		$style_hv3logotopmargin = $data['style_hv3logotopmargin'];
		$style_hv3navigationtopmargin = $data['style_hv3navigationtopmargin'];
		$style_hv3searchformtopmargin = $data['style_hv3searchformtopmargin'];
		$style_hv3submenumargin = $data['style_hv3submenumargin'];

		$style_hv4height = $data['style_hv4height'];
		$style_hv4logotopmargin = $data['style_hv4logotopmargin'];
		$style_hv4searchformtopmargin = $data['style_hv4searchformtopmargin'];
		$style_hv4slogantopmargin = $data['style_hv4slogantopmargin'];
		$style_hv4submenumargin = $data['style_hv4submenumargin'];
		$color_hv4bgcolor = $data['color_hv4bgcolor'];

		$style_hv5height = $data['style_hv5height'];
		$style_hv5logotopmargin = $data['style_hv5logotopmargin'];
		$style_hv5slogantopmargin = $data['style_hv5slogantopmargin'];
		$style_hv5submenumargin = $data['style_hv5submenumargin'];

		$color_submenubg = $data['color_submenubg'];
		$color_submenuborder = $data['color_submenuborder'];
		$color_submenulink = $data['color_submenulink'];
		$color_submenulinkborder = $data['color_submenulinkborder'];
		$color_submenulinkhover = $data['color_submenulinkhover'];

		$color_titlebgtop = $data['color_titlebgtop'];
		$color_titlebgbottom = $data['color_titlebgbottom'];
		$border_titlebottom_width = $data['border_titlebottom']['width'];
		$border_titlebottom_style = $data['border_titlebottom']['style'];
		$border_titlebottom_color = $data['border_titlebottom']['color'];
		$border_titletop_width = $data['border_titletop']['width'];
		$border_titletop_style = $data['border_titletop']['style'];
		$border_titletop_color = $data['border_titletop']['color'];

		$font_titleh1_face = $data['font_titleh1']['face'];
		$font_titleh1_size = $data['font_titleh1']['size'];
		$font_titleh1_style = $data['font_titleh1']['style'];
		$font_titleh1_color = $data['font_titleh1']['color'];

		$font_titleh2_face = $data['font_titleh2']['face'];
		$font_titleh2_size = $data['font_titleh2']['size'];
		$font_titleh2_style = $data['font_titleh2']['style'];
		$font_titleh2_color = $data['font_titleh2']['color'];

		$color_titlebreadcrumb = $data['color_titlebreadcrumb'];
		$color_titlebreadcrumbhover = $data['color_titlebreadcrumbhover'];

		$color_alttitlebg1 = $data['color_alttitlebg1'];
		$font_alttitleh1_face = $data['font_alttitleh1']['face'];
		$font_alttitleh1_size = $data['font_alttitleh1']['size'];
		$font_alttitleh1_style = $data['font_alttitleh1']['style'];
		$font_alttitleh1_color = $data['font_alttitleh1']['color'];

		$color_alttitlebg2 = $data['color_alttitlebg2'];
		$font_alttitleh2_face = $data['font_alttitleh2']['face'];
		$font_alttitleh2_size = $data['font_alttitleh2']['size'];
		$font_alttitleh2_style = $data['font_alttitleh2']['style'];
		$font_alttitleh2_color = $data['font_alttitleh2']['color'];

		$color_alttitlebreadcrumbbg = $data['color_alttitlebreadcrumbbg'];

		$border_alttitlebreadcrumb_width = $data['border_alttitlebreadcrumb']['width'];
		$border_alttitlebreadcrumb_style = $data['border_alttitlebreadcrumb']['style'];
		$border_alttitlebreadcrumb_color = $data['border_alttitlebreadcrumb']['color'];

		$color_alttitlebreadcrumblink = $data['color_alttitlebreadcrumblink'];
		$color_alttitlebreadcrumblinkhover = $data['color_alttitlebreadcrumblinkhover'];

		$titlebar_gridopacity = $data['titlebar_gridopacity'];

		$font_alttitle2h1_face = $data['font_alttitle2h1']['face'];
		$font_alttitle2h1_size = $data['font_alttitle2h1']['size'];
		$font_alttitle2h1_style = $data['font_alttitle2h1']['style'];
		$font_alttitle2h1_color = $data['font_alttitle2h1']['color'];

		$font_alttitle2h1_face = $data['font_alttitle2h1']['face'];
		$font_alttitle2h1_size = $data['font_alttitle2h1']['size'];
		$font_alttitle2h1_style = $data['font_alttitle2h1']['style'];
		$font_alttitle2h1_color = $data['font_alttitle2h1']['color'];

		$color_alttitle2bg = $data['color_alttitle2bg'];

		$border_alttitle2border_width = $data['border_alttitle2border']['width'];
		$border_alttitle2border_style = $data['border_alttitle2border']['style'];
		$border_alttitle2border_color = $data['border_alttitle2border']['color'];

		$color_alttitle2breadcrumblink = $data['color_alttitle2breadcrumblink'];
		$color_alttitle2breadcrumblinkhover = $data['color_alttitle2breadcrumblinkhover'];

		$font_sidebarwidget_face = $data['font_sidebarwidget']['face'];
		$font_sidebarwidget_size = $data['font_sidebarwidget']['size'];
		$font_sidebarwidget_style = $data['font_sidebarwidget']['style'];
		$font_sidebarwidget_color = $data['font_sidebarwidget']['color'];

		$font_twitter_face = $data['font_twitter']['face'];
		$font_twitter_size = $data['font_twitter']['size'];
		$font_twitter_style = $data['font_twitter']['style'];
		$font_twitter_color = $data['font_twitter']['color'];
		$color_twitterbg = $data['color_twitterbg'];

		$border_footertop_width = $data['border_footertop']['width'];
		$border_footertop_style = $data['border_footertop']['style'];
		$border_footertop_color = $data['border_footertop']['color'];

		$color_footerbg = $data['color_footerbg'];
		$color_footertext = $data['color_footertext'];
		$color_footerlink = $data['color_footerlink'];
		$color_footerlinkhover = $data['color_footerlinkhover'];

		$font_footerheadline_face = $data['font_footerheadline']['face'];
		$font_footerheadline_size = $data['font_footerheadline']['size'];
		$font_footerheadline_style = $data['font_footerheadline']['style'];
		$font_footerheadline_color = $data['font_footerheadline']['color'];

		$border_footerheadline_width = $data['border_footerheadline']['width'];
		$border_footerheadline_style = $data['border_footerheadline']['style'];
		$border_footerheadline_color = $data['border_footerheadline']['color'];

		$color_copyrightbg = $data['color_copyrightbg'];
		$color_copyrighttext = $data['color_copyrighttext'];
		$color_copyrightlink = $data['color_copyrightlink'];
		$color_copyrightlinkhover = $data['color_copyrightlinkhover'];

		$color_accent = $data['color_accent'];

		// ----------- STYLES -----------
        $custom_css = "
        	
        	body{ font-family: {$font_body_face}, Arial, Helvetica, sans-serif; font-size: {$font_body_size}; font-weight: {$font_body_style}; color: {$font_body_color}; }

			h1{ font-family: {$font_h1_face}, Arial, Helvetica, sans-serif; font-size: {$font_h1_size}; font-weight: {$font_h1_style}; color: {$font_h1_color}; }
			h2{ font-family: {$font_h2_face}, Arial, Helvetica, sans-serif; font-size: {$font_h2_size}; font-weight: {$font_h2_style}; color: {$font_h2_color}; }
			h3{ font-family: {$font_h3_face}, Arial, Helvetica, sans-serif; font-size: {$font_h3_size}; font-weight: {$font_h3_style}; color: {$font_h3_color}; }
			h4{ font-family: {$font_h4_face}, Arial, Helvetica, sans-serif; font-size: {$font_h4_size}; font-weight: {$font_h4_style}; color: {$font_h4_color}; }
			h5{ font-family: {$font_h5_face}, Arial, Helvetica, sans-serif; font-size: {$font_h5_size}; font-weight: {$font_h5_style}; color: {$font_h5_color}; }
			h6{ font-family: {$font_h6_face}, Arial, Helvetica, sans-serif; font-size: {$font_h6_size}; font-weight: {$font_h6_style}; color: {$font_h6_color}; }

			h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited  { font-weight: inherit; color: inherit; }

			h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, a:hover h1, a:hover h2, a:hover h3, a:hover h4, a:hover h5, a:hover h6 { color: {$color_hover}; }

			.callus{ font-family: {$font_callus_face}, Arial, Helvetica, sans-serif; font-size: {$font_callus_size}; font-weight: {$font_callus_style}; color: {$font_callus_color} !important; }

			a, a:visited{ color: {$color_link}; }
			a:hover, a:focus{ color: {$color_hover}; }
			#infobar{ position: {$select_infobarstatic}; }

			#topbar{ background: {$color_topbarbg}; border-bottom: {$border_topbar_width}px {$border_topbar_style} {$border_topbar_color}; }
			#topbar .callus { color: {$font_callus_color}; }
			#topbar .callus a { color: {$font_callus_color}; }
			#topbar .callus a:hover { color: {$color_topbarlinkhover}; }

			.header{ background: {$color_headerbg}; }
			.header .slogan{ font-family: {$font_slogan_face}, Arial, Helvetica, sans-serif; font-size: {$font_slogan_size}; font-weight: {$font_slogan_style}; color: {$font_slogan_color}; }

			/* Header V1 ------------------------------------------------------------------------ */  

			#header { height: {$style_headerheight}px; }
			#header .logo{ margin-top: {$style_logotopmargin}; }
			#header .select-menu{ background: {$color_headerbg} }

			#header #navigation ul li { height: {$style_headerheight}px; }
			#header #navigation ul li a { height: {$style_headerheight_minus}px; line-height: {$style_headerheight_minus}px; }
			#header #navigation .sub-menu{ top: {$style_headerheight_minus}px; }
			#header #header-searchform{ margin-top: {$style_searchformtopmargin}; }
			#header #header-cart{ margin-top: {$style_searchformtopmargin}; }

			#header #navigation ul li a { font-family: {$font_nav_face}, Arial, Helvetica, sans-serif; font-size: {$font_nav_size}; font-weight: {$font_nav_style}; color: {$font_nav_color}; }
			#header #navigation ul li a:hover { color: {$color_navlinkhover}; border-color: {$color_navlinkhover}; }
			#header #navigation li.current-menu-item a,
			#header #navigation li.current-menu-item a:hover,
			#header #navigation li.current-page-ancestor a,
			#header #navigation li.current-page-ancestor a:hover,
			#header #navigation li.current-menu-ancestor a,
			#header #navigation li.current-menu-ancestor a:hover,
			#header #navigation li.current-menu-parent a,
			#header #navigation li.current-menu-parent a:hover,
			#header #navigation li.current_page_ancestor a,
			#header #navigation li.current_page_ancestor a:hover { color: {$color_navlinkactive}; border-color: {$color_navlinkactive}; }

			/* Header V2 ------------------------------------------------------------------------ */  

			#header-v2 .header-v2-container{ height: {$style_hv2height}; }
			#header-v2 .logo{ margin-top: {$style_hv2logotopmargin}; }
			#header-v2 #header-searchform{ margin-top: {$style_hv2searchformtopmargin}; }
			#header-v2 #header-cart{ margin-top: {$style_hv2searchformtopmargin}; }
			#header-v2 .slogan{ margin-top: {$style_hv2slogantopmargin}; }
			#header-v2 #navigation .sub-menu{ top: {$style_hv2submenumargin}; }

			#header-v2 #navigation ul li a { font-family: {$font_nav_face}, Arial, Helvetica, sans-serif; font-size: {$font_nav_size}; font-weight: {$font_nav_style}; color: {$font_nav_color}; }
			#header-v2 #navigation ul li a:hover { color: {$color_navlinkhover}; border-color: {$color_navlinkhover}; }
			#header-v2 #navigation li.current-menu-item a,
			#header-v2 #navigation li.current-menu-item a:hover,
			#header-v2 #navigation li.current-page-ancestor a,
			#header-v2 #navigation li.current-page-ancestor a:hover,
			#header-v2 #navigation li.current-menu-ancestor a,
			#header-v2 #navigation li.current-menu-ancestor a:hover,
			#header-v2 #navigation li.current-menu-parent a,
			#header-v2 #navigation li.current-menu-parent a:hover,
			#header-v2 #navigation li.current_page_ancestor a,
			#header-v2 #navigation li.current_page_ancestor a:hover { color: {$color_navlinkactive}; border-color: {$color_navlinkactive}; }

			#header-v2 #navigation li.current-menu-item a:after,
			#header-v2 #navigation li.current-page-ancestor a:after,
			#header-v2 #navigation li.current-menu-ancestor a:after,
			#header-v2 #navigation li.current-menu-parent a:after,
			#header-v2 #navigation li.current_page_ancestor a:after{
				border-color: {$color_navlinkactive} transparent transparent transparent;
			}

			/* Header V3 ------------------------------------------------------------------------ */  

			#header-v3 { height: {$style_hv3height}; }
			#header-v3 .logo{ margin-top: {$style_hv3logotopmargin}; }
			#header-v3 #navigation ul{ margin-top: {$style_hv3navigationtopmargin}; }
			#header-v3 #header-searchform{ margin-top: {$style_hv3searchformtopmargin}; }
			#header-v3 #header-cart{ margin-top: {$style_hv3searchformtopmargin}; }
			#header-v3 #navigation .sub-menu{ top: {$style_hv3submenumargin}; }

			#header-v3 #navigation ul li a { font-family: {$font_nav_face}, Arial, Helvetica, sans-serif; font-size: {$font_nav_size}; font-weight: {$font_nav_style}; color: {$font_nav_color}; background: {$color_headerbg}; }

			#header-v3 #navigation ul li a:hover, #header-v3 #navigation ul li.sfHover a  { background: {$color_navlinkhover}; }

			#header-v3 #navigation li.current-menu-item a,
			#header-v3 #navigation li.current-menu-item a:hover,
			#header-v3 #navigation li.current-page-ancestor a,
			#header-v3 #navigation li.current-page-ancestor a:hover,
			#header-v3 #navigation li.current-menu-ancestor a,
			#header-v3 #navigation li.current-menu-ancestor a:hover,
			#header-v3 #navigation li.current-menu-parent a,
			#header-v3 #navigation li.current-menu-parent a:hover,
			#header-v3 #navigation li.current_page_ancestor a,
			#header-v3 #navigation li.current_page_ancestor a:hover { background: {$color_navlinkactive}; }

			/* Header V4 ------------------------------------------------------------------------ */  

			#header-v4 .header-v4-container{ height: {$style_hv4height}; }
			#header-v4 .logo{ margin-top: {$style_hv4logotopmargin}; }
			#header-v4 #header-searchform{ margin-top: {$style_hv4searchformtopmargin}; }
			#header-v4 #header-cart{ margin-top: {$style_hv4searchformtopmargin}; }
			#header-v4 .slogan{ margin-top: {$style_hv4slogantopmargin}; }
			#header-v4 #navigation .sub-menu{ top: {$style_hv4submenumargin}; }

			#header-v4 #navigation{ background: {$color_hv4bgcolor}; }
			#header-v4 #navigation ul li a { font-family: {$font_nav_face}, Arial, Helvetica, sans-serif; font-size: {$font_nav_size}; font-weight: {$font_nav_style}; color: {$font_nav_color}; }

			#header-v4 #navigation ul li a:hover, #header-v4 #navigation ul li.sfHover a { background: {$color_navlinkhover}; }

			#header-v4 #navigation li.current-menu-item a,
			#header-v4 #navigation li.current-menu-item a:hover,
			#header-v4 #navigation li.current-page-ancestor a,
			#header-v4 #navigation li.current-page-ancestor a:hover,
			#header-v4 #navigation li.current-menu-ancestor a,
			#header-v4 #navigation li.current-menu-ancestor a:hover,
			#header-v4 #navigation li.current-menu-parent a,
			#header-v4 #navigation li.current-menu-parent a:hover,
			#header-v4 #navigation li.current_page_ancestor a,
			#header-v4 #navigation li.current_page_ancestor a:hover { background: {$color_navlinkactive}; }

			/* Header V5 ------------------------------------------------------------------------ */  

			#header-v5 .header-v5-container{ height: {$style_hv5height}; }
			#header-v5 .logo{ margin-top: {$style_hv5logotopmargin}; }
			#header-v5 .slogan{ margin-top: {$style_hv5slogantopmargin}; }
			#header-v5 #navigation .sub-menu{ top: {$style_hv5submenumargin}; }

			#header-v5 #navigation ul li a { font-family: {$font_nav_face}, Arial, Helvetica, sans-serif; font-size: {$font_nav_size}; font-weight: {$font_nav_style}; color: {$font_nav_color}; }

			#header-v5 #navigation ul li a:hover { color: {$color_navlinkhover}; }
			        
			#header-v5 #navigation li.current-menu-item a,
			#header-v5 #navigation li.current-menu-item a:hover,
			#header-v5 #navigation li.current-page-ancestor a,
			#header-v5 #navigation li.current-page-ancestor a:hover,
			#header-v5 #navigation li.current-menu-ancestor a,
			#header-v5 #navigation li.current-menu-ancestor a:hover,
			#header-v5 #navigation li.current-menu-parent a,
			#header-v5 #navigation li.current-menu-parent a:hover,
			#header-v5 #navigation li.current_page_ancestor a,
			#header-v5 #navigation li.current_page_ancestor a:hover { color: {$color_navlinkactive}; border-color:{$color_navlinkactive}; }

			/* Sub-Menu Navigation ------------------------------------------------------------------------ */ 

			html body #navigation .sub-menu{ background: {$color_submenubg} !important; border-color: {$color_submenuborder} !important; }
			html body #navigation .sub-menu li a,
			html body #navigation .sub-menu li .sub-menu li a,
			html body #navigation .sub-menu li .sub-menu li .sub-menu li a { font-family: {$font_body_face}, Arial, Helvetica, sans-serif !important; font-size: {$font_body_size} !important; font-weight: {$font_body_style} !important; color: {$color_submenulink} !important; }
			#navigation .sub-menu li{ border-color: {$color_submenulinkborder}; }
			#navigation .sub-menu li a:hover,
			#navigation .sub-menu li .sub-menu li a:hover,
			#navigation .sub-menu li.current-menu-item a,
			#navigation .sub-menu li.current-menu-item a:hover,
			#navigation .sub-menu li.current_page_item a,
			#navigation .sub-menu li.current_page_item a:hover { color: {$color_submenulinkhover} !important; }

			#title {
				background: {$color_titlebgtop};
			    background-image: linear-gradient(bottom, {$color_titlebgbottom} 0%, {$color_titlebgtop} 100%);
			    background-image: -o-linear-gradient(bottom, {$color_titlebgbottom} 0%, {$color_titlebgtop} 100%);
			    background-image: -moz-linear-gradient(bottom, {$color_titlebgbottom} 0%, {$color_titlebgtop} 100%);
			    background-image: -webkit-linear-gradient(bottom, {$color_titlebgbottom} 0%, {$color_titlebgtop} 100%);
			    background-image: -ms-linear-gradient(bottom, {$color_titlebgbottom} 0%, {$color_titlebgtop} 100%);
			    border-bottom: {$border_titlebottom_width}px {$border_titlebottom_style} {$border_titlebottom_color};
			    border-top: {$border_titletop_width}px {$border_titletop_style} {$border_titletop_color};
			}
			#title h1 { font-family: {$font_titleh1_face}, Arial, Helvetica, sans-serif; font-size: {$font_titleh1_size}; font-weight: {$font_titleh1_style}; color: {$font_titleh1_color}; }
			#title h2 { font-family: {$font_titleh2_face}, Arial, Helvetica, sans-serif; font-size: {$font_titleh2_size}; font-weight: {$font_titleh2_style}; color: {$font_titleh2_color}; }
			#title #breadcrumbs { color: {$color_titlebreadcrumb}; }
			#title #breadcrumbs a { color: {$color_titlebreadcrumb}; }
			#title #breadcrumbs a:hover { color: {$color_titlebreadcrumbhover}; }

			#alt-title h1 { background:{$color_alttitlebg1}; font-family: {$font_alttitleh1_face}, Arial, Helvetica, sans-serif; font-size: {$font_alttitleh1_size}; font-weight: {$font_alttitleh1_style}; color: {$font_alttitleh1_color};  }
			#alt-title h2 { background:{$color_alttitlebg2}; font-family: {$font_alttitleh2_face}, Arial, Helvetica, sans-serif; font-size: {$font_alttitleh2_size}; font-weight: {$font_alttitleh2_style}; color: {$font_alttitleh2_color}; }
			#alt-breadcrumbs, #no-title { background:{$color_alttitlebreadcrumbbg}; border-bottom: {$border_alttitlebreadcrumb_width}px {$border_alttitlebreadcrumb_style} {$border_alttitlebreadcrumb_color}; color: {$color_alttitlebreadcrumblink}; }
			#alt-title .grid{ opacity: {$titlebar_gridopacity}; }
			#no-title  #breadcrumbs{ color: {$color_alttitlebreadcrumblink}; }
			#alt-breadcrumbs a, #no-title #breadcrumbs a { color: {$color_alttitlebreadcrumblink}; }
			#alt-breadcrumbs a:hover, #no-title #breadcrumbs a:hover { color: {$color_alttitlebreadcrumblinkhover}; }

			#alt-title-2 h1 { font-family: {$font_alttitle2h1_face}, Arial, Helvetica, sans-serif; font-size: {$font_alttitle2h1_size}; font-weight: {$font_alttitle2h1_style}; color: {$font_alttitle2h1_color}; }
			#alt-title-2 { background-color: {$color_alttitle2bg}; border-top:{$border_alttitle2border_width}px {$border_alttitle2border_style} {$border_alttitle2border_color}; border-bottom:{$border_alttitle2border_width}px {$border_alttitle2border_style} {$border_alttitle2border_color}; }

			#alt-title-2 #breadcrumbs, #alt-title-2 #breadcrumbs a{ color: {$color_alttitle2breadcrumblink}; }
			#alt-title-2 #breadcrumbs a:hover{ color: {$color_alttitle2breadcrumblinkhover}; }

			#sidebar .widget h3 { font-family: {$font_sidebarwidget_face}, Arial, Helvetica, sans-serif; font-size: {$font_sidebarwidget_size}; font-weight: {$font_sidebarwidget_style}; color: {$font_sidebarwidget_color}; }
  

			/* Twitter Bar ------------------------------------------------------------------------ */ 
	
			#twitterbar { font-family: {$font_twitter_face}, Arial, Helvetica, sans-serif; font-size: {$font_twitter_size}; font-weight: {$font_twitter_style}; color: {$font_twitter_color}; background: {$color_twitterbg}; }
			#twitterbar .twitterpost a { color: {$font_twitter_color}; }

			/* Footer ------------------------------------------------------------------------ */  
	
			#footer{ border-top: {$border_footertop_width}px {$border_footertop_style} {$border_footertop_color}; }  
			#footer, #infobar { border-top-color: {$border_footertop_color}; background: {$color_footerbg}; color:{$color_footertext}; }
			#footer a, #infobar a{ color:{$color_footerlink}; }
			#footer a:hover, #infobar a:hover{ color:{$color_footerlinkhover}; }
			#footer .widget h3, #infobar .widget h3 { font-family: {$font_footerheadline_face}, Arial, Helvetica, sans-serif; font-size: {$font_footerheadline_size}; font-weight: {$font_footerheadline_style} !important; color: {$font_footerheadline_color} !important; border-bottom:{$border_footerheadline_width}px {$border_footerheadline_style} {$border_footerheadline_color}; }
			#infobar .no-widgets{ color:{$color_footertext}; }

			/* Copyright ------------------------------------------------------------------------ */  
	        
			#copyright { background: {$color_copyrightbg}; color: {$color_copyrighttext}; }
			#copyright a { color: {$color_copyrightlink}; }
			#copyright a:hover { color: {$color_copyrightlinkhover}; }

			/* Forms ------------------------------------------------------------------------ */  
	    
			input[type='text'], input[type='password'], input[type='email'], textarea, select, button, input[type='submit'], input[type='reset'], input[type='button'] { font-family: {$font_body_face}, Arial, Helvetica, sans-serif; font-size: {$font_body_size}; }
	    
			/* Accent Color ------------------------------------------------------------------------ */ 
	
			::selection { background: {$color_accent} }
			::-moz-selection { background: {$color_accent} }
			.highlight { color: {$color_accent} }
			.post-icon { background: {$color_accent} }
			.single .post-tags a:hover { background: {$color_accent}; border-color: {$color_accent}; }
			#pagination a:hover { border-color: {$color_accent}; background: {$color_accent}; }
			#filters ul li a:hover { color: {$color_accent} }
			#filters ul li a.active { color: {$color_accent} }
			.portfolio-item:hover .portfolio-title { background: {$color_accent}; border-color: {$color_accent}; }
			.projects-nav a:hover,
			.post-navigation a:hover { background-color: {$color_accent} }
			.sidenav li a:hover, .widget_wp_nav_menu_desc li a:hover { color: {$color_accent} }
			.sidenav li.current_page_item a, .widget_wp_nav_menu_desc li.current_page_item a { border-left-color: {$color_accent}; color: {$color_accent}; }
			.sidenav li.current_page_item a, .sidenav li.current_page_item a:hover, .widget_wp_nav_menu_desc li.current_page_item a, .widget_wp_nav_menu_desc li.current_page_item a:hover { background-color: {$color_accent}; }
			#back-to-top a:hover { background-color: {$color_accent} }
			.widget_tag_cloud a:hover { background: {$color_accent}; border-color: {$color_accent}; }
			.widget_flickr #flickr_tab a:hover { background: {$color_accent}; border-color: {$color_accent}; }
			.widget_portfolio .portfolio-widget-item .portfolio-pic:hover { background: {$color_accent}; border-color: {$color_accent}; }
			#footer .widget_tag_cloud a:hover,
			#infobar .widget_tag_cloud a:hover { background: {$color_accent}; border-color: {$color_accent}; }
			#footer .widget_flickr #flickr_tab a:hover,
			#infobar .widget_flickr #flickr_tab a:hover { background: {$color_accent}; border-color: {$color_accent}; }
			#footer .widget_portfolio .portfolio-widget-item .portfolio-pic:hover,
			#infobar .widget_portfolio .portfolio-widget-item .portfolio-pic:hover { background: {$color_accent}; border-color: {$color_accent}; }
			.flex-direction-nav a:hover { background-color: {$color_accent} }
			a.button.alternative-1 { background: {$color_accent}; border-color: {$color_accent}; }
			.gallery img:hover { background: {$color_accent}; border-color: {$color_accent} !important; }
			.skillbar .skill-percentage { background: {$color_accent} }
			.latest-blog .blog-item:hover h4 { color: {$color_accent} }
			.tp-caption.big_colorbg{ background: {$color_accent}; }
			.tp-caption.medium_colorbg{ background: {$color_accent}; }
			.tp-caption.small_colorbg{ background: {$color_accent}; }
			.tp-caption.customfont_color{ color: {$color_accent}; }
			.tp-caption a { color: {$color_accent}; }
			.tp-leftarrow.default:hover,
			.tp-rightarrow.default:hover { background-color: {$color_accent} !important; }
			.wooslider-direction-nav a:hover { background-color: {$color_accent}; }

			/* WooCommerce */

			.product .onsale{ background: {$color_accent}; }
			.woocommerce button, .woocommerce input[type=submit]{ color: {$color_accent}; }
			.products li .price{ color: {$color_accent}; }
			.product .price{ color: {$color_accent}; }
			.woocommerce-tabs .panel h2{ color: {$color_accent}; }
			.checkout .shop_table .total{ color: {$color_accent}; }
			.woocommerce .form-row input[type=submit], 
			.woocommerce .form-row button{ color: {$color_accent}; }

        ";

        // ----------- ADD INLINE STYLES -----------
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );

// Add Custom Responsive & Boxed Layout Expressions

function minti_styles_custom() {
global $data; 

?>

	<style>
		
		<?php if($data['select_layoutstyle'] == 'Boxed Layout' || $data['select_layoutstyle'] == 'Boxed Layout with margin' ) { ?>
			body{
			<?php // Specific Page Background defined? 
			if( get_post_meta( get_the_ID(), 'minti_bgurl', true ) != '' ) {
		
				if(get_post_meta( get_the_ID(), 'minti_bgcolor', true )) { echo 'background-color: '.get_post_meta( get_the_ID(), 'minti_bgcolor', true ).';';}
				if(get_post_meta( get_the_ID(), 'minti_bgurl', true )) { echo 'background-image: url('.get_post_meta( get_the_ID(), 'minti_bgurl', true ).');';}
				if(get_post_meta( get_the_ID(), 'minti_bgstyle', true ) != 'stretch') { 
					echo 'background-repeat: '.get_post_meta( get_the_ID(), 'minti_bgstyle', true ).';'; 
				} else { 
					echo '-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;'; 
				}
				
			} // EOF Specific BG
			
			// If No Specific Page Background take Defaults
			else {
				if($data['color_bg'] != "") { echo 'background-color: '. $data['color_bg'] .';'; }
				if($data['media_bg'] != "") { echo 'background-image: url('.$data['media_bg'].');'; } 
				if($data['select_bg'] != 'Stretch Image') { 
					echo 'background-repeat: '.$data['select_bg'].';'; 
				} else { 
					echo '-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;'; 
				}
			} // EOF Default BG ?>
			background-attachment: fixed;
			}
		<?php } ?>
		
		 <?php if($data['check_responsive'] == true) { ?>
		@media only screen and (max-width: 767px) {
			#topbar .callus{ background: <?php echo $data['color_topbarresponsive']; ?>; }	
		}
		<?php } ?>
		
		<?php if($data['select_layoutstyle'] == 'Boxed Layout with margin' ) { ?>
			#boxed-layout{
				margin: 40px auto;
				overflow: hidden;
				border-radius: 6px;
			}
		<?php } ?>
		
		<?php if($data['select_layoutstyle'] != 'Fullwidth' ) { ?>	
			@media only screen and (min-width: 960px) {
				.stuck {
					width: 1000px;
				}
			}
		<?php } ?>
		
		<?php if($data['media_logo_retina'] != '') { ?>
			@media only screen and (-webkit-min-device-pixel-ratio: 2), 
			only screen and (min-device-pixel-ratio: 2) {
				.header .logo .logo_standard{ display: none; }
				.header .logo .logo_retina{ display: inline; }
			}
		<?php } ?>

		<?php if($data['select_headlinestyle'] == 'Border Bottom' ) { ?>

			.title{
				display:block;
				line-height: 1 !important;
				background: none;
				margin:0 0 20px 0;
				border-bottom:1px solid #f1f1f1;
				
			}

			.title span{
				display:inline-block;
				line-height: 1 !important;
				background: none;
				margin: 0 0 -1px 0;
				padding: 0 0 10px 0;
				border-bottom:1px solid #cccccc;
			}

		<?php } ?>
		
		<?php echo $data['textarea_csscode']; ?>
		
	</style>

<?php }
add_action( 'wp_head', 'minti_styles_custom', 100 );
?>