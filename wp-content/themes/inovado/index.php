<?php get_header(); ?>

<!-- Title Bar -->	
<?php if ( $data['select_blogtitlebar'] == 'Background-Image Style 1' ) { ?>

	<div id="alt-title" class="post-thumbnail" style="background-image: url( <?php echo $data['media_blogtitlebar']; ?> );">
		<div class="grid"></div>
		<div class="container">
			<h1><?php echo $data['text_blogtitle']; ?><?php if($data['text_titledivider'] != "") { echo $data['text_titledivider']; } ?></h1>
			<?php if($data['text_blogsubtitle']){ echo '<h2>'.$data['text_blogsubtitle'].'</h2>'; } ?>
		</div>
	</div>
	<?php if($data['check_blogbreadcrumbs'] == 0){ ?>
		<div id="alt-breadcrumbs">
			<div class="container">
				<?php minti_breadcrumbs(); ?>
			</div>
		</div>
	<?php } ?>
	<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>
	
<?php } elseif ( $data['select_blogtitlebar'] == 'Background-Image Style 2' ) { ?>

	<div id="alt-title-2" class="post-thumbnail" style="background-image: url( <?php echo $data['media_blogtitlebar']; ?> );">
		<div class="container">
			<div class="ten columns">
				<h1><?php echo $data['text_blogtitle']; ?><?php if($data['text_titledivider'] != "") { echo $data['text_titledivider']; } ?></h1>
			</div>
			<?php if($data['check_blogbreadcrumbs'] == 0){ ?>
				<div id="breadcrumbs" class="six columns">
					<?php  minti_breadcrumbs(); ?>
				</div>
			<?php } ?>
		</div>
	</div>

<?php } elseif ($data['select_blogtitlebar'] == 'No Titlebar') { ?>
		
		<?php if($data['check_blogbreadcrumbs'] == 0){ ?>
		<div id="no-title">
			<div class="container">
				
					<div id="breadcrumbs" class="sixteen columns <?php if(get_post_meta( get_option('page_for_posts'), 'minti_subtitle', true )){ echo 'breadrcumbpadding'; } /* to align middle */ ?>">
						<?php  minti_breadcrumbs(); ?>
					</div>
				
			</div>
		</div>
			<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>
		<?php } else { ?>
			<div id="no-title-divider"></div>
			<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>
		<?php } ?>
	
<?php } else { ?>

	<div id="title">
		<div class="container">
			<div class="ten columns">
				<h1><?php echo $data['text_blogtitle']; ?><?php if($data['text_titledivider'] != "") { echo $data['text_titledivider']; } ?></h1>
				<?php if($data['text_blogsubtitle']){ echo '<h2>'.$data['text_blogsubtitle'].'</h2>'; } ?>
			</div>
				<?php if($data['check_blogbreadcrumbs'] == 0){ ?>
				<div id="breadcrumbs" class="six columns <?php if($data['text_blogsubtitle']){ echo 'breadrcumbpadding'; } /* to align middle */ ?>">
					<?php minti_breadcrumbs(); ?>
				</div>
				<?php } ?>
		</div>
	</div>
	
	<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>

<?php } ?>
<!-- End: Title Bar -->

<?php 
// Get Blog Layout from Theme Options
if($data['select_bloglayout'] == 'Blog Medium') { 
	$blogclass = 'blog-medium';
	$blogtype = 'medium';
} else {
	$blogclass = 'blog-large';
	$blogtype = 'large';
}
?>

<div id="page-wrap" class="container">
	
	<div id="content" class="<?php echo $data['select_blogsidebar']; ?> twelve columns blog <?php echo $blogclass; ?>">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php get_template_part( 'framework/inc/post-format/content', get_post_format() ); ?>
	
		<?php endwhile; ?>
		
	
		<?php get_template_part( 'framework/inc/nav' ); ?>
	
		<?php else : ?>
	
			<h2><?php _e('Not Found', 'minti') ?></h2>
	
		<?php endif; ?>
	
	</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
