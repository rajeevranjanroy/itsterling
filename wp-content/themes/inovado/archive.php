<?php get_header(); ?>

<div id="title">
	<div class="container">
		<div class="ten columns">

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1><?php _e('Category Archive for', 'minti') ?> &#8216;<?php single_cat_title(); ?>&#8217; </h1>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1><?php _e('Posts Tagged', 'minti') ?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1><?php _e('Archive for', 'minti') ?> <?php the_time('F jS, Y'); ?></h1>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1><?php _e('Archive for', 'minti') ?> <?php the_time('F, Y'); ?></h1>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1><?php _e('Archive for', 'minti') ?> <?php the_time('Y'); ?></h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1><?php _e('Author Archive', 'minti') ?></h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1><?php _e('Blog Archives', 'minti') ?></h1>
			<?php } ?>
			
		</div>
		<?php if(get_post_meta( get_option('page_for_posts'), 'minti_featuredimage-breadcrumbs', true ) == true) { ?>
			<div id="breadcrumbs" class="six columns">
				<?php minti_breadcrumbs(); ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>

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
