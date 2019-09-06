<?php get_header(); ?>
		<div id="title">
			<div class="container">
				<div class="ten columns">
					<h1><?php _e('Error 404', 'minti') ?></h1>
				</div>
			</div>
		</div>
		
		<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>

	<div id="page-wrap" class="container">
	
		<div id="content" class="sixteen columns">
				
			<article class="post">
	
				<div class="entry" id="error-404">
						
					<h2 class="error-404"><?php _e("File not Found", "minti") ?></h2>
					<h3 class="error-404"><?php _e("Error 404! Sorry, but we couldn't find the content you were looking for.", "minti") ?></h3>
					<br /><br />
					
					<span align="center"><a href="<?php echo home_url(); ?>" target="_self" class="button alternative-1 large"><?php _e("Back to Home", "minti") ?></a></span>
	
				</div>
	
			</article>
			
		</div> <!-- end content -->
	
	</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>
