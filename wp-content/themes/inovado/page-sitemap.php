<?php
/*
Template Name: Page: Sitemap
*/
?>

<?php get_header(); ?>

	<?php get_template_part( 'framework/inc/titlebar' ); ?>

	<div id="page-wrap" class="container">
	
		<div id="content" class="sixteen columns">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="entry">
	
					<div class="one-third columns alpha">		
						<?php the_content(); ?>
					</div>
					
					<div class="one-third columns">

					    <h3 class="title"><span><?php _e('Feeds','minti'); ?></span></h3>
				        <ul>  
				            <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>  
				            <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>  
				        </ul>

					    <h3 class="title"><span><?php _e('Blog Categories','minti'); ?></span></h3>  	
					    <?php $args = array(
					          'orderby' => 'name',
					          'order' => 'ASC',
					          'style' => 'list',
					          'show_count' => 0,
					          'hide_empty' => 1,
					          'use_desc_for_title' => 1,
					          'child_of' => 0,
					          'hierarchical' => true,
					          'title_li' => '',
					          'number' => NULL
					        );
					    ?> 
					    <ul>
					    <?php wp_list_categories( $args ); ?>
					    </ul>
					        
					    <h3 class="title"><span><?php _e('Tags','minti'); ?></span></h3>
					    <?php wp_tag_cloud(array(
					        'format' => 'list',
					        'smallest' => 12,
					        'largest' => 12,
					        'unit' => 'px',
					        'number' => 20,
					        'orderby'  => 'name',
					        'order' => 'ASC',
					        'taxonomy' => 'post_tag'
					        ));
					    ?>
					
					    <h3 class="title"><span><?php _e('Archives by Month','minti'); ?></span></h3>
					    <ul>
					        <?php wp_get_archives('type=monthly&limit=10'); ?>
					    </ul>
					    
					</div>
					
					<div class="one-third columns omega">
					    
					    <h3 class="title"><span><?php _e('Pages','minti'); ?></span></h3>
					    <ul><?php wp_list_pages("title_li=" ); ?></ul> 
					
					</div>
					
					<div class="clear"></div>

				</div>
	
			</article>
	
			<?php endwhile; endif; ?>
		</div> <!-- end content -->
	
	</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>