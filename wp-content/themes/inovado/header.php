<!DOCTYPE html>

<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->

<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->

<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<head>



<!-- Basic Page Needs 

========================================================= -->

<meta charset="<?php bloginfo('charset'); ?>">

<meta name="google-site-verification" content="jYh86baT9xBBDUe60pRsYLuoeL-ifg558-aUk1jlnho" />

<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>



<!--[if lt IE 9]>

	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

<![endif]-->



<?php global $data; ?>



<!-- Mobile Specific Metas & Favicons

========================================================= -->

<?php if($data['check_mobilezoom'] == 0) { ?><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"><?php } ?>



<?php if($data['media_favicon'] != "") { ?><link rel="shortcut icon" href="<?php echo $data['media_favicon']; ?>"><?php } ?>



<?php if($data['media_favicon_iphone'] != "") { ?><link rel="apple-touch-icon" href="<?php echo $data['media_favicon_iphone']; ?>"><?php } ?>



<?php if($data['media_favicon_iphone_retina'] != "") { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo $data['media_favicon_iphone_retina']; ?>"><?php } ?>



<?php if($data['media_favicon_ipad'] != "") { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo $data['media_favicon_ipad']; ?>"><?php } ?>



<?php if($data['media_favicon_ipad_retina'] != "") { ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo $data['media_favicon_ipad_retina']; ?>"><?php } ?>





<!-- WordPress Stuff

========================================================= -->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>



<?php wp_head(); ?>

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-51109918-1', 'itsterling.com');

  ga('send', 'pageview');



</script>


</head>



<body <?php body_class(); ?>>



	<?php if($data['select_layoutstyle'] == 'Boxed Layout' || $data['select_layoutstyle'] == 'Boxed Layout with margin' ) { ?>	

	<div id="boxed-layout">

	<?php } ?>

	

	<?php if($data['check_topbar'] == true) { ?>

	<div id="topbar" class="clearfix <?php if($data['check_socialtopbar'] == false) { echo 'no-social'; } ?>">

	

		<div class="container">

		

			<div class="eight columns">

				<?php if($data['text_callus'] != "") { ?>

					<div class="callus"><?php echo $data['text_callus']; ?></div>

					<div class="clear"></div>

				<?php } ?>

			</div>

			

			<?php if($data['check_socialtopbar'] == true) { ?>

			<div class="eight columns">

				<div class="social-icons clearfix">

					<ul>

						<?php if($data['social_twitter'] != "") { ?>

							<li class="social-twitter"><a href="http://www.twitter.com/<?php echo $data['social_twitter']; ?>" target="_blank" title="<?php _e( 'Twitter', 'minti' ) ?>"><?php _e( 'Twitter', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_forrst'] != "") { ?>

							<li class="social-forrst"><a href="<?php echo $data['social_forrst']; ?>" target="_blank" title="<?php _e( 'Forrst', 'minti' ) ?>"><?php _e( 'Forrst', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_dribbble'] != "") { ?>

							<li class="social-dribbble"><a href="<?php echo $data['social_dribbble']; ?>" target="_blank" title="<?php _e( 'Dribbble', 'minti' ) ?>"><?php _e( 'Dribbble', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_flickr'] != "") { ?>

							<li class="social-flickr"><a href="<?php echo $data['social_flickr']; ?>" target="_blank" title="<?php _e( 'Flickr', 'minti' ) ?>"><?php _e( 'Flickr', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_facebook'] != "") { ?>

							<li class="social-facebook"><a href="<?php echo $data['social_facebook']; ?>" target="_blank" title="<?php _e( 'Facebook', 'minti' ) ?>"><?php _e( 'Facebook', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_skype'] != "") { ?>

							<li class="social-skype"><a href="<?php echo $data['social_skype']; ?>" target="_blank" title="<?php _e( 'Skype', 'minti' ) ?>"><?php _e( 'Skype', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_digg'] != "") { ?>

							<li class="social-digg"><a href="<?php echo $data['social_digg']; ?>" target="_blank" title="<?php _e( 'Digg', 'minti' ) ?>"><?php _e( 'Digg', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_google'] != "") { ?>

							<li class="social-google"><a href="<?php echo $data['social_google']; ?>" target="_blank" title="<?php _e( 'Google', 'minti' ) ?>"><?php _e( 'Google+', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_instagram'] != "") { ?>

							<li class="social-instagram"><a href="<?php echo $data['social_instagram']; ?>" target="_blank" title="<?php _e( 'Instagram', 'minti' ) ?>"><?php _e( 'Instagram', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_linkedin'] != "") { ?>

							<li class="social-linkedin"><a href="<?php echo $data['social_linkedin']; ?>" target="_blank" title="<?php _e( 'LinkedIn', 'minti' ) ?>"><?php _e( 'LinkedIn', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_vimeo'] != "") { ?>

							<li class="social-vimeo"><a href="<?php echo $data['social_vimeo']; ?>" target="_blank" title="<?php _e( 'Vimeo', 'minti' ) ?>"><?php _e( 'Vimeo', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_yahoo'] != "") { ?>

							<li class="social-yahoo"><a href="<?php echo $data['social_yahoo']; ?>" target="_blank" title="<?php _e( 'Yahoo', 'minti' ) ?>"><?php _e( 'Yahoo', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_tumblr'] != "") { ?>

							<li class="social-tumblr"><a href="<?php echo $data['social_tumblr']; ?>" target="_blank" title="<?php _e( 'Tumblr', 'minti' ) ?>"><?php _e( 'Tumblr', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_youtube'] != "") { ?>

							<li class="social-youtube"><a href="<?php echo $data['social_youtube']; ?>" target="_blank" title="<?php _e( 'YouTube', 'minti' ) ?>"><?php _e( 'YouTube', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_picasa'] != "") { ?>

							<li class="social-picasa"><a href="<?php echo $data['social_picasa']; ?>" target="_blank" title="<?php _e( 'Picasa', 'minti' ) ?>"><?php _e( 'Picasa', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_deviantart'] != "") { ?>

							<li class="social-deviantart"><a href="<?php echo $data['social_deviantart']; ?>" target="_blank" title="<?php _e( 'DeviantArt', 'minti' ) ?>"><?php _e( 'DeviantArt', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_behance'] != "") { ?>

							<li class="social-behance"><a href="<?php echo $data['social_behance']; ?>" target="_blank" title="<?php _e( 'Behance', 'minti' ) ?>"><?php _e( 'Behance', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_pinterest'] != "") { ?>

							<li class="social-pinterest"><a href="<?php echo $data['social_pinterest']; ?>" target="_blank" title="<?php _e( 'Pinterest', 'minti' ) ?>"><?php _e( 'Pinterest', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_paypal'] != "") { ?>

							<li class="social-paypal"><a href="<?php echo $data['social_paypal']; ?>" target="_blank" title="<?php _e( 'PayPal', 'minti' ) ?>"><?php _e( 'PayPal', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_delicious'] != "") { ?>

							<li class="social-delicious"><a href="<?php echo $data['social_delicious']; ?>" target="_blank" title="<?php _e( 'Delicious', 'minti' ) ?>"><?php _e( 'Delicious', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_xing'] != "") { ?>

							<li class="social-xing"><a href="<?php bloginfo('social_xing'); ?>" target="_blank" title="<?php _e( 'XING', 'minti' ) ?>"><?php _e( 'XING', 'minti' ) ?></a></li>

						<?php } ?>

						<?php if($data['social_rss'] == true) { ?>

							<li class="social-rss"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="<?php _e( 'RSS', 'minti' ) ?>"><?php _e( 'RSS', 'minti' ) ?></a></li>

						<?php } ?>

					</ul>

				</div>

			</div>

			<?php } ?>

		

		</div>

	

	</div> <!-- end topbar -->

	<?php } ?>



	<?php

	

	if($data['header_layout']) {

		if(is_page('header-2')) {

			include_once('framework/inc/headers/header-v2.php');

		} elseif(is_page('header-3')) {

			include_once('framework/inc/headers/header-v3.php');

		} elseif(is_page('header-4')) {

			include_once('framework/inc/headers/header-v4.php');

		} elseif(is_page('header-5')) {

			include_once('framework/inc/headers/header-v5.php');

		} else {

			include_once('framework/inc/headers/header-'.$data['header_layout'].'.php');

		}

	} else {

		if(is_page('header-2')) {

			include_once('framework/inc/headers/header-v2.php');

		} elseif(is_page('header-3')) {

			include_once('framework/inc/headers/header-v3.php');

		} elseif(is_page('header-4')) {

			include_once('framework/inc/headers/header-v4.php');

		} elseif(is_page('header-5')) {

			include_once('framework/inc/headers/header-v5.php');

		} else {

			include_once('framework/inc/headers/header-v1.php');

		}

	}

	

	?>		