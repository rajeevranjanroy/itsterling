<?php
/*
Template Name: Portfolio: 4 Columns
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'framework/inc/titlebar' ); ?>

<div id="page-wrap" class="container portfolio">

	<!-- Content -->
	<div id="content" class="sixteen columns">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">
		
			<div class="entry">
				
				<?php the_content(); ?>
				
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

		</article>

		<?php endwhile; endif; ?>
	</div>
	<!-- End: content -->
	
<div id="filters" class="sixteen columns">
<?php	$portfolio_filters = get_terms('portfolio_filter');
		if($portfolio_filters): ?>
			<ul class="clearfix">
				<li><a href="#" data-filter="*" class="active"><?php _e('All', 'minti'); ?></a></li>	
				<?php foreach($portfolio_filters as $portfolio_filter): ?>
					<?php if(get_post_meta(get_the_ID(), 'minti_portfoliofilter', false)  && !in_array('0', get_post_meta(get_the_ID(), 'minti_portfoliofilter', false))): ?>
						<?php if(in_array($portfolio_filter->term_id, get_post_meta(get_the_ID(), 'minti_portfoliofilter', false))): ?>
							<li><a href="#" data-filter=".term-<?php echo $portfolio_filter->slug; ?>"><?php echo $portfolio_filter->name; ?></a></li>
						<?php endif; ?>
					<?php else: ?>
						<li><a href="#" data-filter=".term-<?php echo $portfolio_filter->slug; ?>"><?php echo $portfolio_filter->name; ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
</div>
 
<div id="portfolio-wrap">
	
		<?php
			global $wp_query;
			$portfolioitems = $data['text_portfolioitems']; // Get Items per Page Value
			$paged = get_query_var('paged') ? get_query_var('paged') : 1;
			$args = array(
				'post_type' 		=> 'portfolio',
				'posts_per_page' 	=> $portfolioitems,
				'post_status' 		=> 'publish',
				'orderby' 			=> 'date',
				'order' 			=> 'DESC',
				'paged' 			=> $paged
			);
			
			// Only pull from selected Filters if chosen
			$selectedfilters = get_post_meta(get_the_ID(), 'minti_portfoliofilter', false);
			if($selectedfilters && $selectedfilters[0] == 0) {
				unset($selectedfilters[0]);
			}
			if($selectedfilters){
				$args['tax_query'][] = array(
					'taxonomy' 	=> 'portfolio_filter',
					'field' 	=> 'ID',
					'terms' 	=> $selectedfilters
				);
			}
			
			$wp_query = new WP_Query($args);
			
			while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

			<?php $terms = get_the_terms( get_the_ID(), 'portfolio_filter' ); ?>              	
			<div class="<?php if($terms) : foreach ($terms as $term) { echo 'term-'.$term->slug.' '; } endif; ?>portfolio-item four columns">
				
				<?php 
				
				// ---- Define if Lightbox Link or Not ----
				$embedd = '';
				
				if( get_post_meta( get_the_ID(), 'minti_portfolio-lightbox', true ) == "true") { 
					$lightboxtype = '<span class="overlay-lightbox"></span>';
					if( get_post_meta( get_the_ID(), 'minti_embed', true ) != "") {
							if ( get_post_meta( get_the_ID(), 'minti_source', true ) == 'youtube' ) {
								$link = '<a href="http://www.youtube.com/watch?v='.get_post_meta( get_the_ID(), 'minti_embed', true ).'" class="prettyPhoto" rel="prettyPhoto[portfolio]" title="'. get_the_title() .'">';
		    				} else if ( get_post_meta( get_the_ID(), 'minti_source', true ) == 'vimeo' ) {
		    					$link = '<a href="http://vimeo.com/'. get_post_meta( get_the_ID(), 'minti_embed', true ) .'" class="prettyPhoto" rel="prettyPhoto[portfolio]" title="'. get_the_title() .'">';
		    				} else if ( get_post_meta( get_the_ID(), 'minti_source', true ) == 'own' ) {
		    					$randomid = rand();
		    					$link = '<a href="#embedd-video-'.$randomid.'" class="prettyPhoto" title="'. get_the_title() .'" rel="prettyPhoto[portfolio]">';
		    					$embedd = '<div id="embedd-video-'.$randomid.'" class="embedd-video"><p>'. get_post_meta( get_the_ID(), 'minti_embed', true ) .'</p></div>';
							}
					} else {
						$link = '<a href="'. wp_get_attachment_url( get_post_thumbnail_id() ) .'" class="prettyPhoto" rel="prettyPhoto[portfolio]" title="'. get_the_title() .'">';
		    		}
		    	}
				else{
					$lightboxtype = '<span class="overlay-link"></span>';
					$link = '<a href="'. get_permalink() .'" title="'. get_the_title() .'">';
					$embedd = '';
				} // ---- EOF Lightbox Define ----
				?>
			
				<?php if ( has_post_thumbnail()) { ?> 
					<div class="portfolio-it">
				  		<?php echo $link; ?><span class="portfolio-pic"><?php the_post_thumbnail('eight-columns'); ?><div class="portfolio-overlay"><?php echo $lightboxtype; ?></div></span></a>
				  		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="portfolio-title"><h4><?php the_title(); ?></h4>
				  		<span><?php if(get_post_meta( get_the_ID(), "minti_subtitle", true ) != '' ) { echo get_post_meta( get_the_ID(), "minti_subtitle", true ); } else { echo substr(get_the_excerpt(),0,25).'...'; } ?></span></a>
				  	</div>
				  	<?php echo $embedd; ?>
				<?php } ?>
							
			</div> <!-- end of terms -->
			
		<?php endwhile; ?>
		
	</div>
	
	<div class="sixteen columns">
		<?php get_template_part( 'framework/inc/nav' ); ?>
	</div>
	
</div>


<?php get_footer(); ?>