<?php
function minti_styles_custom() {
global $data; 
?>

<!-- Custom CSS Codes
========================================================= -->
	
<style>
	body{ font-family: <?php echo $data['font_body']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_body']['size']; ?>; font-weight: <?php echo $data['font_body']['style']; ?>; color: <?php echo $data['font_body']['color']; ?>;
	<?php if($data['select_layoutstyle'] == 'Boxed Layout' || $data['select_layoutstyle'] == 'Boxed Layout with margin' ) { ?>
		
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
		
	<?php } ?>
	}
	h1{ font-family: <?php echo $data['font_h1']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_h1']['size']; ?>; font-weight: <?php echo $data['font_h1']['style']; ?>; color: <?php echo $data['font_h1']['color']; ?>; }
	h2{ font-family: <?php echo $data['font_h2']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_h2']['size']; ?>; font-weight: <?php echo $data['font_h2']['style']; ?>; color: <?php echo $data['font_h2']['color']; ?>; }
	h3{ font-family: <?php echo $data['font_h3']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_h3']['size']; ?>; font-weight: <?php echo $data['font_h3']['style']; ?>; color: <?php echo $data['font_h3']['color']; ?>; }
	h4{ font-family: <?php echo $data['font_h4']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_h4']['size']; ?>; font-weight: <?php echo $data['font_h4']['style']; ?>; color: <?php echo $data['font_h4']['color']; ?>; }
	h5{ font-family: <?php echo $data['font_h5']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_h5']['size']; ?>; font-weight: <?php echo $data['font_h5']['style']; ?>; color: <?php echo $data['font_h5']['color']; ?>; }
	h6{ font-family: <?php echo $data['font_h6']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_h6']['size']; ?>; font-weight: <?php echo $data['font_h6']['style']; ?>; color: <?php echo $data['font_h6']['color']; ?>; }
	h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, h1 a:visited, h2 a:visited, h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited  { font-weight: inherit; color: inherit; }
	h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, 
	a:hover h1, a:hover h2, a:hover h3, a:hover h4, a:hover h5, a:hover h6 { color: <?php echo $data['color_hover']; ?>; }
	
	.callus{ font-family: <?php echo $data['font_callus']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_callus']['size']; ?>; font-weight: <?php echo $data['font_callus']['style']; ?>; color: <?php echo $data['font_callus']['color']; ?> !important; }
	a, a:visited{ color: <?php echo $data['color_link']; ?>; }
	a:hover, a:focus{ color: <?php echo $data['color_hover']; ?>; }
	#infobar{ position: <?php echo $data['select_infobarstatic']; ?>; }
	
	/* Top Bar ------------------------------------------------------------------------ */
	
	#topbar{ background: <?php echo $data['color_topbarbg']; ?>; border-bottom: <?php echo $data['border_topbar']['width']; ?>px <?php echo $data['border_topbar']['style']; ?> <?php echo $data['border_topbar']['color']; ?>; }
	#topbar .callus { color: <?php echo $data['font_callus']['color']; ?>; }
	#topbar .callus a { color: <?php echo $data['font_callus']['color']; ?>; }
	#topbar .callus a:hover { color: <?php echo $data['color_topbarlinkhover']; ?>; }
	    
	 <?php if($data['check_responsive'] == true) { ?>
	@media only screen and (max-width: 767px) {
		#topbar .callus{ background: <?php echo $data['color_topbarresponsive']; ?>; }	
	}
	<?php } ?>
	
	.header{ background: <?php echo $data['color_headerbg']; ?>; }
	.header .slogan{ font-family: <?php echo $data['font_slogan']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_slogan']['size']; ?>; font-weight: <?php echo $data['font_slogan']['style']; ?>; color: <?php echo $data['font_slogan']['color']; ?>; }
	
	/* Header V1 ------------------------------------------------------------------------ */  
	
	#header { height: <?php echo $data['style_headerheight']; ?>px; }
	#header .logo{ margin-top: <?php echo $data['style_logotopmargin']; ?>; }
	#header .select-menu{ background: <?php echo $data['color_headerbg']; ?>; }
	
	#header #navigation ul li { height: <?php echo $data['style_headerheight']; ?>px; }
	#header #navigation ul li a { height: <?php echo $data['style_headerheight']-3; ?>px; line-height: <?php echo $data['style_headerheight']-3; ?>px; }
	#header #navigation .sub-menu{ top: <?php echo $data['style_headerheight']-3; ?>px; }
	#header #header-searchform{ margin-top: <?php echo $data['style_searchformtopmargin']; ?>; }
	
	#header #navigation ul li a { font-family: <?php echo $data['font_nav']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_nav']['size']; ?>; font-weight: <?php echo $data['font_nav']['style']; ?>; color: <?php echo $data['font_nav']['color']; ?>; }
	#header #navigation ul li a:hover { color: <?php echo $data['color_navlinkhover']; ?>; border-color: <?php echo $data['color_navlinkhover']; ?>; }
	#header #navigation li.current-menu-item a,
	#header #navigation li.current-menu-item a:hover,
	#header #navigation li.current-page-ancestor a,
	#header #navigation li.current-page-ancestor a:hover,
	#header #navigation li.current-menu-ancestor a,
	#header #navigation li.current-menu-ancestor a:hover,
	#header #navigation li.current-menu-parent a,
	#header #navigation li.current-menu-parent a:hover,
	#header #navigation li.current_page_ancestor a,
	#header #navigation li.current_page_ancestor a:hover { color: <?php echo $data['color_navlinkactive']; ?>; border-color: <?php echo $data['color_navlinkactive']; ?>; }
	
	/* Header V2 ------------------------------------------------------------------------ */  
	
	#header-v2 .header-v2-container{ height: <?php echo $data['style_hv2height']; ?>; }
	#header-v2 .logo{ margin-top: <?php echo $data['style_hv2logotopmargin']; ?>; }
	#header-v2 #header-searchform{ margin-top: <?php echo $data['style_hv2searchformtopmargin']; ?>; }
	#header-v2 .slogan{ margin-top: <?php echo $data['style_hv2slogantopmargin']; ?>; }
	#header-v2 #navigation .sub-menu{ top: <?php echo $data['style_hv2submenumargin']; ?>; }
	
	#header-v2 #navigation ul li a { font-family: <?php echo $data['font_nav']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_nav']['size']; ?>; font-weight: <?php echo $data['font_nav']['style']; ?>; color: <?php echo $data['font_nav']['color']; ?>; }
	#header-v2 #navigation ul li a:hover { color: <?php echo $data['color_navlinkhover']; ?>; border-color: <?php echo $data['color_navlinkhover']; ?>; }
	#header-v2 #navigation li.current-menu-item a,
	#header-v2 #navigation li.current-menu-item a:hover,
	#header-v2 #navigation li.current-page-ancestor a,
	#header-v2 #navigation li.current-page-ancestor a:hover,
	#header-v2 #navigation li.current-menu-ancestor a,
	#header-v2 #navigation li.current-menu-ancestor a:hover,
	#header-v2 #navigation li.current-menu-parent a,
	#header-v2 #navigation li.current-menu-parent a:hover,
	#header-v2 #navigation li.current_page_ancestor a,
	#header-v2 #navigation li.current_page_ancestor a:hover { color: <?php echo $data['color_navlinkactive']; ?>; border-color: <?php echo $data['color_navlinkactive']; ?>; }
	
	#header-v2 #navigation li.current-menu-item a:after,
	#header-v2 #navigation li.current-page-ancestor a:after,
	#header-v2 #navigation li.current-menu-ancestor a:after,
	#header-v2 #navigation li.current-menu-parent a:after,
	#header-v2 #navigation li.current_page_ancestor a:after{
		border-color: <?php echo $data['color_navlinkactive']; ?> transparent transparent transparent;
	}
	
	/* Header V3 ------------------------------------------------------------------------ */  
	
	#header-v3 { height: <?php echo $data['style_hv3height']; ?>; }
	#header-v3 .logo{ margin-top: <?php echo $data['style_hv3logotopmargin']; ?>; }
	#header-v3 #navigation ul{ margin-top: <?php echo $data['style_hv3navigationtopmargin']; ?>; }
	#header-v3 #header-searchform{ margin-top: <?php echo $data['style_hv3searchformtopmargin']; ?>; }
	#header-v3 #navigation .sub-menu{ top: <?php echo $data['style_hv3submenumargin']; ?>; }
	
	#header-v3 #navigation ul li a { font-family: <?php echo $data['font_nav']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_nav']['size']; ?>; font-weight: <?php echo $data['font_nav']['style']; ?>; color: <?php echo $data['font_nav']['color']; ?>; }
	
	#header-v3 #navigation ul li a:hover, #header-v3 #navigation ul li.sfHover a  { background: <?php echo $data['color_navlinkhover']; ?>; }
	
	#header-v3 #navigation li.current-menu-item a,
	#header-v3 #navigation li.current-menu-item a:hover,
	#header-v3 #navigation li.current-page-ancestor a,
	#header-v3 #navigation li.current-page-ancestor a:hover,
	#header-v3 #navigation li.current-menu-ancestor a,
	#header-v3 #navigation li.current-menu-ancestor a:hover,
	#header-v3 #navigation li.current-menu-parent a,
	#header-v3 #navigation li.current-menu-parent a:hover,
	#header-v3 #navigation li.current_page_ancestor a,
	#header-v3 #navigation li.current_page_ancestor a:hover { background: <?php echo $data['color_navlinkactive']; ?>; }
	
	/* Header V4 ------------------------------------------------------------------------ */  
	
	#header-v4 .header-v4-container{ height: <?php echo $data['style_hv4height']; ?>; }
	#header-v4 .logo{ margin-top: <?php echo $data['style_hv4logotopmargin']; ?>; }
	#header-v4 #header-searchform{ margin-top: <?php echo $data['style_hv4searchformtopmargin']; ?>; }
	#header-v4 .slogan{ margin-top: <?php echo $data['style_hv4slogantopmargin']; ?>; }
	#header-v4 #navigation .sub-menu{ top: <?php echo $data['style_hv4submenumargin']; ?>; }
	
	#header-v4 #navigation{ background: <?php echo $data['color_hv4bgcolor']; ?>; }
	#header-v4 #navigation ul li a { font-family: <?php echo $data['font_nav']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_nav']['size']; ?>; font-weight: <?php echo $data['font_nav']['style']; ?>; color: <?php echo $data['font_nav']['color']; ?>; }
	
	#header-v4 #navigation ul li a:hover, #header-v4 #navigation ul li.sfHover a { background: <?php echo $data['color_navlinkhover']; ?>; }
	
	#header-v4 #navigation li.current-menu-item a,
	#header-v4 #navigation li.current-menu-item a:hover,
	#header-v4 #navigation li.current-page-ancestor a,
	#header-v4 #navigation li.current-page-ancestor a:hover,
	#header-v4 #navigation li.current-menu-ancestor a,
	#header-v4 #navigation li.current-menu-ancestor a:hover,
	#header-v4 #navigation li.current-menu-parent a,
	#header-v4 #navigation li.current-menu-parent a:hover,
	#header-v4 #navigation li.current_page_ancestor a,
	#header-v4 #navigation li.current_page_ancestor a:hover { background: <?php echo $data['color_navlinkactive']; ?>; }
	
	/* Header V5 ------------------------------------------------------------------------ */  
	
	#header-v5 .header-v5-container{ height: <?php echo $data['style_hv5height']; ?>; }
	#header-v5 .logo{ margin-top: <?php echo $data['style_hv5logotopmargin']; ?>; }
	#header-v5 .slogan{ margin-top: <?php echo $data['style_hv5slogantopmargin']; ?>; }
	#header-v5 #navigation .sub-menu{ top: <?php echo $data['style_hv5submenumargin']; ?>; }
	
	#header-v5 #navigation ul li a { font-family: <?php echo $data['font_nav']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_nav']['size']; ?>; font-weight: <?php echo $data['font_nav']['style']; ?>; color: <?php echo $data['font_nav']['color']; ?>; }

    #header-v5 #navigation ul li a:hover { color: <?php echo $data['color_navlinkhover']; ?>; }
	        
	/* Active Status ---------------------------------------------------- */
	#header-v5 #navigation li.current-menu-item a,
	#header-v5 #navigation li.current-menu-item a:hover,
	#header-v5 #navigation li.current-page-ancestor a,
	#header-v5 #navigation li.current-page-ancestor a:hover,
	#header-v5 #navigation li.current-menu-ancestor a,
	#header-v5 #navigation li.current-menu-ancestor a:hover,
	#header-v5 #navigation li.current-menu-parent a,
	#header-v5 #navigation li.current-menu-parent a:hover,
	#header-v5 #navigation li.current_page_ancestor a,
	#header-v5 #navigation li.current_page_ancestor a:hover { color: <?php echo $data['color_navlinkactive']; ?>; border-color:<?php echo $data['color_navlinkactive']; ?>; }
	
	/* Sub-Menu Navigation ------------------------------------------------------------------------ */ 
	
	html body #navigation .sub-menu{ background: <?php echo $data['color_submenubg']; ?> !important; border-color: <?php echo $data['color_submenuborder']; ?> !important; }
	html body #navigation .sub-menu li a,
	html body #navigation .sub-menu li .sub-menu li a,
	html body #navigation .sub-menu li .sub-menu li .sub-menu li a { font-family: <?php echo $data['font_body']['face']; ?>, Arial, Helvetica, sans-serif !important; font-size: <?php echo $data['font_body']['size']; ?> !important; font-weight: <?php echo $data['font_body']['style']; ?> !important; color: <?php echo $data['color_submenulink']; ?> !important; }
	#navigation .sub-menu li{ border-color: <?php echo $data['color_submenulinkborder']; ?>; }
	#navigation .sub-menu li a:hover,
	#navigation .sub-menu li .sub-menu li a:hover,
	#navigation .sub-menu li.current-menu-item a,
	#navigation .sub-menu li.current-menu-item a:hover,
	#navigation .sub-menu li.current_page_item a,
	#navigation .sub-menu li.current_page_item a:hover { color: <?php echo $data['color_submenulinkhover']; ?> !important; }
	
	#title {
		background: <?php echo $data['color_titlebgtop']; ?>;
	    background-image: linear-gradient(bottom, <?php echo $data['color_titlebgbottom']; ?> 0%, <?php echo $data['color_titlebgtop']; ?> 100%);
	    background-image: -o-linear-gradient(bottom, <?php echo $data['color_titlebgbottom']; ?> 0%, <?php echo $data['color_titlebgtop']; ?> 100%);
	    background-image: -moz-linear-gradient(bottom, <?php echo $data['color_titlebgbottom']; ?> 0%, <?php echo $data['color_titlebgtop']; ?> 100%);
	    background-image: -webkit-linear-gradient(bottom, <?php echo $data['color_titlebgbottom']; ?> 0%, <?php echo $data['color_titlebgtop']; ?> 100%);
	    background-image: -ms-linear-gradient(bottom, <?php echo $data['color_titlebgbottom']; ?> 0%, <?php echo $data['color_titlebgtop']; ?> 100%);
	    border-bottom: <?php echo $data['border_titlebottom']['width']; ?>px <?php echo $data['border_titlebottom']['style']; ?> <?php echo $data['border_titlebottom']['color']; ?>;
	    border-top: <?php echo $data['border_titletop']['width']; ?>px <?php echo $data['border_titletop']['style']; ?> <?php echo $data['border_titletop']['color']; ?>;
	}
	#title h1 { font-family: <?php echo $data['font_titleh1']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_titleh1']['size']; ?>; font-weight: <?php echo $data['font_titleh1']['style']; ?>; color: <?php echo $data['font_titleh1']['color']; ?>; }
	#title h2 { font-family: <?php echo $data['font_titleh2']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_titleh2']['size']; ?>; font-weight: <?php echo $data['font_titleh2']['style']; ?>; color: <?php echo $data['font_titleh2']['color']; ?>; }
	#title #breadcrumbs { color: <?php echo $data['color_titlebreadcrumb']; ?>; }
	#title #breadcrumbs a { color: <?php echo $data['color_titlebreadcrumb']; ?>; }
	#title #breadcrumbs a:hover { color: <?php echo $data['color_titlebreadcrumbhover']; ?>; }
	#alt-title h1 { background: <?php echo $data['color_alttitlebg1']; ?>; font-family: <?php echo $data['font_alttitleh1']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_alttitleh1']['size']; ?>; font-weight: <?php echo $data['font_alttitleh1']['style']; ?>; color: <?php echo $data['font_alttitleh1']['color']; ?>; }
	#alt-title h2 { background: <?php echo $data['color_alttitlebg2']; ?>; font-family: <?php echo $data['font_alttitleh2']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_alttitleh2']['size']; ?>; font-weight: <?php echo $data['font_alttitleh2']['style']; ?>; color: <?php echo $data['font_alttitleh2']['color']; ?>; }
	#alt-breadcrumbs, #no-title { background: <?php echo $data['color_alttitlebreadcrumbbg']; ?>;border-bottom: <?php echo $data['border_alttitlebreadcrumb']['width']; ?>px <?php echo $data['border_alttitlebreadcrumb']['style']; ?> <?php echo $data['border_alttitlebreadcrumb']['color']; ?>; color: <?php echo $data['color_alttitlebreadcrumblink']; ?>; }
	#alt-title .grid{ opacity: <?php echo $data['titlebar_gridopacity']; ?>; }
	#no-title  #breadcrumbs{ color: <?php echo $data['color_alttitlebreadcrumblink']; ?> }
	#alt-breadcrumbs a, #no-title #breadcrumbs a { color: <?php echo $data['color_alttitlebreadcrumblink']; ?> }
	#alt-breadcrumbs a:hover, #no-title #breadcrumbs a:hover { color: <?php echo $data['color_alttitlebreadcrumblinkhover']; ?> }
	
	#alt-title-2 h1 { font-family: <?php echo $data['font_alttitle2h1']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_alttitle2h1']['size']; ?>; font-weight: <?php echo $data['font_alttitle2h1']['style']; ?>; color: <?php echo $data['font_alttitle2h1']['color']; ?>; }
	#alt-title-2 { background-color: <?php echo $data['color_alttitle2bg']; ?>; border-top:<?php echo $data['border_alttitle2border']['width']; ?>px <?php echo $data['border_alttitle2border']['style']; ?> <?php echo $data['border_alttitle2border']['color']; ?>; border-bottom:<?php echo $data['border_alttitle2border']['width']; ?>px <?php echo $data['border_alttitle2border']['style']; ?> <?php echo $data['border_alttitle2border']['color']; ?>; }
	
	#alt-title-2 #breadcrumbs, #alt-title-2 #breadcrumbs a{ color: <?php echo $data['color_alttitle2breadcrumblink']; ?> }
	#alt-title-2 #breadcrumbs a:hover{ color: <?php echo $data['color_alttitle2breadcrumblinkhover']; ?> }
	
	
	#sidebar .widget h3 { font: <?php echo $data['font_sidebarwidget']['style']; ?> <?php echo $data['font_sidebarwidget']['size']; ?> <?php echo $data['font_sidebarwidget']['face']; ?>, Arial, Helvetica, sans-serif; color: <?php echo $data['font_sidebarwidget']['color']; ?>; }
	
	/* Twitter Bar ------------------------------------------------------------------------ */ 
	
	#twitterbar { font-family: <?php echo $data['font_twitter']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_twitter']['size']; ?>; font-weight: <?php echo $data['font_twitter']['style']; ?>; color: <?php echo $data['font_twitter']['color']; ?>; background: <?php echo $data['color_twitterbg']; ?>; }
	#twitterbar .twitterpost a { color: <?php echo $data['font_twitter']['color']; ?>; }
	    
	/* Footer ------------------------------------------------------------------------ */  
	
	#footer{ border-top: <?php echo $data['border_footertop']['width']; ?>px <?php echo $data['border_footertop']['style']; ?> <?php echo $data['border_footertop']['color']; ?>; }  
	#footer, #infobar { border-top-color: <?php echo $data['border_footertop']['color']; ?>; background: <?php echo $data['color_footerbg']; ?>; color:<?php echo $data['color_footertext']; ?>; }
	#footer a, #infobar a{ color:<?php echo $data['color_footerlink']; ?>; }
	#footer a:hover, #infobar a:hover{ color:<?php echo $data['color_footerlinkhover']; ?>; }
	#footer .widget h3, #infobar .widget h3 { font-family: <?php echo $data['font_footerheadline']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_footerheadline']['size']; ?>; font-weight: <?php echo $data['font_footerheadline']['style']; ?> !important; color: <?php echo $data['font_footerheadline']['color']; ?> !important; border-bottom:<?php echo $data['border_footerheadline']['width']; ?>px <?php echo $data['border_footerheadline']['style']; ?> <?php echo $data['border_footerheadline']['color']; ?>; }
	#infobar .no-widgets{ color:<?php echo $data['color_footertext']; ?>; }
	
	/* Copyright ------------------------------------------------------------------------ */  
	        
	#copyright { background: <?php echo $data['color_copyrightbg']; ?>; color: <?php echo $data['color_copyrighttext']; ?>; }
	#copyright a { color: <?php echo $data['color_copyrightlink']; ?>; }
	#copyright a:hover { color: <?php echo $data['color_copyrightlinkhover']; ?>; }
	    
	/* Forms ------------------------------------------------------------------------ */  
	    
	input[type="text"], input[type="password"], input[type="email"], textarea, select, button, input[type="submit"], input[type="reset"], input[type="button"] { font-family: <?php echo $data['font_body']['face']; ?>, Arial, Helvetica, sans-serif; font-size: <?php echo $data['font_body']['size']; ?>; }
	    
	/* Accent Color ------------------------------------------------------------------------ */ 
	
	::selection { background: <?php echo $data['color_accent']; ?> }
	::-moz-selection { background: <?php echo $data['color_accent']; ?> }
	.highlight { color: <?php echo $data['color_accent']; ?> }
	.post-icon { background: <?php echo $data['color_accent']; ?> }
	.single .post-tags a:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	#pagination a:hover { border-color: <?php echo $data['color_accent']; ?>; background: <?php echo $data['color_accent']; ?>; }
	#filters ul li a:hover { color: <?php echo $data['color_accent']; ?> }
	#filters ul li a.active { color: <?php echo $data['color_accent']; ?> }
	.portfolio-item:hover .portfolio-title { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	.projects-nav a:hover,
	.post-navigation a:hover { background-color: <?php echo $data['color_accent']; ?> }
	.sidenav li a:hover, .widget_wp_nav_menu_desc li a:hover { color: <?php echo $data['color_accent']; ?> }
	.sidenav li.current_page_item a, .widget_wp_nav_menu_desc li.current_page_item a { border-left-color: <?php echo $data['color_accent']; ?>; color: <?php echo $data['color_accent']; ?>; }
	.sidenav li.current_page_item a, .sidenav li.current_page_item a:hover, .widget_wp_nav_menu_desc li.current_page_item a, .widget_wp_nav_menu_desc li.current_page_item a:hover { background-color: <?php echo $data['color_accent']; ?>; }
	#back-to-top a:hover { background-color: <?php echo $data['color_accent']; ?> }
	.widget_tag_cloud a:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	.widget_flickr #flickr_tab a:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	.widget_portfolio .portfolio-widget-item .portfolio-pic:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	#footer .widget_tag_cloud a:hover,
	#infobar .widget_tag_cloud a:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	#footer .widget_flickr #flickr_tab a:hover,
	#infobar .widget_flickr #flickr_tab a:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	#footer .widget_portfolio .portfolio-widget-item .portfolio-pic:hover,
	#infobar .widget_portfolio .portfolio-widget-item .portfolio-pic:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	.flex-direction-nav a:hover { background-color: <?php echo $data['color_accent']; ?> }
	a.button.alternative-1 { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?>; }
	.gallery img:hover { background: <?php echo $data['color_accent']; ?>; border-color: <?php echo $data['color_accent']; ?> !important; }
	.skillbar .skill-percentage { background: <?php echo $data['color_accent']; ?> }
	.latest-blog .blog-item:hover h4 { color: <?php echo $data['color_accent']; ?> }
	.tp-caption.big_colorbg{ background: <?php echo $data['color_accent']; ?>; }
	.tp-caption.medium_colorbg{ background: <?php echo $data['color_accent']; ?>; }
	.tp-caption.small_colorbg{ background: <?php echo $data['color_accent']; ?>; }
	.tp-caption.customfont_color{ color: <?php echo $data['color_accent']; ?>; }
	.tp-caption a { color: <?php echo $data['color_accent']; ?>; }
	.tp-leftarrow.default:hover,
	.tp-rightarrow.default:hover { background-color: <?php echo $data['color_accent']; ?> !important; }
	.wooslider-direction-nav a:hover { background-color: <?php echo $data['color_accent']; ?>; }
	
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
	
	<?php echo $data['textarea_csscode']; ?>
	
</style>

<?php }
add_action( 'wp_head', 'minti_styles_custom', 100 );
?>