<?php
/*
Template Name: Page: Full Width
*/
?>

<?php get_header(); ?>

	<?php get_template_part( 'framework/inc/titlebar' ); ?>

	<div id="page-wrap" class="container">
	
		<div id="content" class="sixteen columns">
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
	
<?php get_footer(); ?>
