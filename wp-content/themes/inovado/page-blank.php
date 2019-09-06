<?php
/*
Template Name: Page: Blank Width
*/
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<!-- Basic Page Needs 
========================================================= -->
<meta charset="<?php bloginfo('charset'); ?>">
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

</head>

<body <?php body_class(); ?>>


	<div id="page-wrap nopadding">
	
		<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="entry">
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
				</div>
	
			</article>
			
			<?php if(!$data['check_disablecomments']) { ?>
				<?php comments_template(); ?>
			<?php } ?>
	
			<?php endwhile; endif; ?>
		</div> <!-- end content -->
	
	</div> <!-- end page-wrap -->
	
