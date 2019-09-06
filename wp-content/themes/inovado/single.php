<?php get_header(); ?>

<!-- Title Bar -->	
<?php if ( $data['select_blogtitlebar'] == 'Image' ) { ?>

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

<div id="page-wrap" class="container">
	
	<div id="content" class="<?php echo $data['select_blogsidebar']; ?> twelve columns single">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php get_template_part( 'framework/inc/post-format/single', get_post_format() ); ?>
			
			<?php if($data['check_sharebox'] == true) { ?>
				<?php get_template_part( 'framework/inc/sharebox' ); ?>
			<?php } ?>
			
			<?php if($data['check_authorinfo'] == true) { ?>
			<div id="author-info" class="clearfix">
				    <div class="author-image">
				    	<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '35', '' ); ?></a>
				    </div>   
				    <div class="author-bio">
				        <h4><?php _e('About the Author', 'minti'); ?></h4>
				        <?php the_author_meta('description'); ?>
				    </div>
			</div>
			<?php } ?>
				
			<?php if($data['check_relatedposts'] == true) { ?>	
			
			<div id="related-posts">
					<?php
					//for use in the loop, list 5 post titles related to first tag on current post
					$tags = wp_get_post_tags($post->ID);
					if ($tags) {
					?>
					  
					  <h3 class="title"><span><?php _e('Related Posts', 'minti'); ?></span></h3>
					  
					  <ul>
					<?php  $first_tag = $tags[0]->term_id;
					  $args=array(
					    'tag__in' => array($first_tag),
					    'post__not_in' => array($post->ID),
					    'showposts'=>3
					   );
					  $my_query = new WP_Query($args);
					  if( $my_query->have_posts() ) {
					    while ($my_query->have_posts()) : $my_query->the_post(); ?>
					      <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?> <span>(<?php the_time(get_option('date_format')); ?>)</span></a></li>
					      <?php
					    endwhile;
					    wp_reset_query();
					  }
					}
					?>
					 </ul>
			</div>

			<?php } ?>
		
		<div class="comments"><?php comments_template(); ?>
			<?php //if(function_exists("display_saic")) { echo display_saic();} ?> 
		</div>
		
		<div class="post-navigation">
			<div class="alignleft prev"><?php previous_post_link('%link', 'Prev Post', FALSE); ?></div>
			<div class="alignright next"><?php next_post_link('%link', 'Next Post', FALSE); ?> </div>
		</div>
	
		<?php endwhile; endif; ?>
	
	</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
