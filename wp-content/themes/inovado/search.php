<?php get_header(); ?>

<div id="title">
	<div class="container">
		<div class="ten columns">
			<h1><?php _e('Search Results for', 'minti') ?> <?php the_search_query(); ?><h1>
			
		</div>
		<?php if(get_post_meta( get_option('page_for_posts'), 'minti_featuredimage-breadcrumbs', true ) == true) { ?>
			<div id="breadcrumbs" class="six columns">
				<?php minti_breadcrumbs(); ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>

<div id="page-wrap" class="container">
	
	<div id="content" class="<?php echo get_post_meta( get_option('page_for_posts'), 'minti_sidebar', true ); ?> twelve columns search">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<!--<?php $blogtype = 'large'; ?>
			
			<?php get_template_part( 'framework/inc/post-format/content', get_post_format() ); ?>-->
			
			<div class="search-result clearfix">
				
				<div class="search-content">
					<div class="search-title">
						<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'minti'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a></h2>
					</div>
					<div class="search-excerpt"><?php the_excerpt(); ?></div>
				</div>
				
				<div class="clear"></div>
				<div class="search-meta"><?php //get_template_part( 'framework/inc/meta' ); ?></div>
			
			</div>
			
			
	
		<?php endwhile; ?>
		
	
		<?php get_template_part( 'framework/inc/nav' ); ?>
	
		<?php else : ?>
	
			<h2><?php _e('Not Found', 'minti') ?></h2>
	
		<?php endif; ?>
	
	</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
