<div class="post clearfix">

	<?php if ( has_post_thumbnail() ) { ?>
	<div class="post-image">
		<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" title="<?php the_title(); ?>" rel="bookmark">
			<?php the_post_thumbnail('standard'); ?>
		</a>
	</div>
	<?php } ?>
	
	<a href="#" class="post-icon standard"></a>
	
	<div class="post-content">
		<div class="post-title">
			<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'minti'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a></h2>
		</div>
		<div class="post-meta"><?php get_template_part( 'framework/inc/meta' ); ?></div>
		<div class="post-excerpt"><?php the_content(); ?></div>		
		<div class="post-tags clearfix"><?php the_tags( '', '', ''); ?></div>
	</div>

</div>

