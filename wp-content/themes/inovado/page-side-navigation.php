<?php
/*
Template Name: Page: Side Navigation
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'framework/inc/titlebar' ); ?>

<div id="page-wrap" class="container">

	<div id="content" class="sidebar-left twelve columns">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">
		
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

	<div id="sidebar" class="four columns">
	<ul class="sidenav">
			<?php 	
				$post_ancestors = get_post_ancestors($post->ID);
				$post_parent = end($post_ancestors);
			?>
			
			<li <?php if(is_page($post_parent)): ?> class="current_page_item"<?php endif; ?>>
				<a href="<?php echo get_permalink($post_parent); ?>"><?php echo get_the_title($post_parent); ?></a>
			</li>
			
			<?php
			if($post_parent) {
				$children = wp_list_pages("title_li=&child_of=".$post_parent."&echo=0");
			} else {
				$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
			}
			
			if ($children) { echo $children;  } ?>			
	</ul>
	
	<?php 
	if(is_page()){
		/* Page Sidebar */
		generated_dynamic_sidebar(); 
	} else {
		/* Blog Sidebar */
		if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Blog Widgets') );
	}
	?>
	
	</div>
	
</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>
