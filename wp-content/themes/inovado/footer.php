	<div class="clear"></div>
	
	<?php global $data; ?>
	
	<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>
	
	<?php if($data['check_twitterbar'] == true) { ?>
	<div id="twitterbar" class="clearfix">
		<div class="container">
			<div class="sixteen columns">
				<div class="twitterpost"><?php _e('loading...', 'minti') ?></div>
				<?php if($data['social_twitter'] != '') { ?>
				<script type='text/javascript'>
				jQuery(document).ready(function($){
					$('.twitterpost').tweet({
						modpath: '<?php echo get_template_directory_uri(); ?>/framework/js/twitter/index.php',
						username: '<?php echo $data['social_twitter']; ?>',
						count: "1"
					});
				});
				</script>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<?php if($data['check_footerwidgets'] == true) { ?>
	<footer id="footer">
		<div class="container">
			<div class="clearfix">
				<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets')); ?>		
			</div>
		</div>
	</footer>
	<?php } ?>
		
	<div id="copyright" class="clearfix">
		<div class="container">
			
			<div class="copyright-text eight columns">
				<?php if($data['textarea_copyright'] != "") { ?>
					<?php echo $data['textarea_copyright']; ?>
				<?php } else { ?>
					&copy; Copyright <?php echo date("Y"); echo " "; bloginfo('name'); ?>
				<?php } ?>
			</div>
			
			<?php if($data['check_socialfooter'] == true) { ?>
			<div class="eight columns">
				<div class="social-icons clearfix">
					<ul>
						<?php if($data['social_twitter'] != "") { ?>
							<li class="social-twitter"><a href="http://www.twitter.com/<?php echo $data['social_twitter']; ?>" target="_blank" title="<?php _e( 'Twitter', 'minti' ) ?>"><?php _e( 'Twitter', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_forrst'] != "") { ?>
							<li class="social-forrst"><a href="<?php echo $data['social_forrst']; ?>" target="_blank" title="<?php _e( 'Forrst', 'minti' ) ?>"><?php _e( 'Forrst', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_dribbble'] != "") { ?>
							<li class="social-dribbble"><a href="<?php echo $data['social_dribbble']; ?>" target="_blank" title="<?php _e( 'Dribbble', 'minti' ) ?>"><?php _e( 'Dribbble', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_flickr'] != "") { ?>
							<li class="social-flickr"><a href="<?php echo $data['social_flickr']; ?>" target="_blank" title="<?php _e( 'Flickr', 'minti' ) ?>"><?php _e( 'Flickr', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_facebook'] != "") { ?>
							<li class="social-facebook"><a href="<?php echo $data['social_facebook']; ?>" target="_blank" title="<?php _e( 'Facebook', 'minti' ) ?>"><?php _e( 'Facebook', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_skype'] != "") { ?>
							<li class="social-skype"><a href="<?php echo $data['social_skype']; ?>" target="_blank" title="<?php _e( 'Skype', 'minti' ) ?>"><?php _e( 'Skype', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_digg'] != "") { ?>
							<li class="social-digg"><a href="<?php echo $data['social_digg']; ?>" target="_blank" title="<?php _e( 'Digg', 'minti' ) ?>"><?php _e( 'Digg', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_google'] != "") { ?>
							<li class="social-google"><a href="<?php echo $data['social_google']; ?>" target="_blank" title="<?php _e( 'Google', 'minti' ) ?>"><?php _e( 'Google+', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_instagram'] != "") { ?>
							<li class="social-instagram"><a href="<?php echo $data['social_instagram']; ?>" target="_blank" title="<?php _e( 'Instagram', 'minti' ) ?>"><?php _e( 'Instagram', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_linkedin'] != "") { ?>
							<li class="social-linkedin"><a href="<?php echo $data['social_linkedin']; ?>" target="_blank" title="<?php _e( 'LinkedIn', 'minti' ) ?>"><?php _e( 'LinkedIn', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_vimeo'] != "") { ?>
							<li class="social-vimeo"><a href="<?php echo $data['social_vimeo']; ?>" target="_blank" title="<?php _e( 'Vimeo', 'minti' ) ?>"><?php _e( 'Vimeo', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_yahoo'] != "") { ?>
							<li class="social-yahoo"><a href="<?php echo $data['social_yahoo']; ?>" target="_blank" title="<?php _e( 'Yahoo', 'minti' ) ?>"><?php _e( 'Yahoo', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_tumblr'] != "") { ?>
							<li class="social-tumblr"><a href="<?php echo $data['social_tumblr']; ?>" target="_blank" title="<?php _e( 'Tumblr', 'minti' ) ?>"><?php _e( 'Tumblr', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_youtube'] != "") { ?>
							<li class="social-youtube"><a href="<?php echo $data['social_youtube']; ?>" target="_blank" title="<?php _e( 'YouTube', 'minti' ) ?>"><?php _e( 'YouTube', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_picasa'] != "") { ?>
							<li class="social-picasa"><a href="<?php echo $data['social_picasa']; ?>" target="_blank" title="<?php _e( 'Picasa', 'minti' ) ?>"><?php _e( 'Picasa', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_deviantart'] != "") { ?>
							<li class="social-deviantart"><a href="<?php echo $data['social_deviantart']; ?>" target="_blank" title="<?php _e( 'DeviantArt', 'minti' ) ?>"><?php _e( 'DeviantArt', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_behance'] != "") { ?>
							<li class="social-behance"><a href="<?php echo $data['social_behance']; ?>" target="_blank" title="<?php _e( 'Behance', 'minti' ) ?>"><?php _e( 'Behance', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_pinterest'] != "") { ?>
							<li class="social-pinterest"><a href="<?php echo $data['social_pinterest']; ?>" target="_blank" title="<?php _e( 'Pinterest', 'minti' ) ?>"><?php _e( 'Pinterest', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_paypal'] != "") { ?>
							<li class="social-paypal"><a href="<?php echo $data['social_paypal']; ?>" target="_blank" title="<?php _e( 'PayPal', 'minti' ) ?>"><?php _e( 'PayPal', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_delicious'] != "") { ?>
							<li class="social-delicious"><a href="<?php echo $data['social_delicious']; ?>" target="_blank" title="<?php _e( 'Delicious', 'minti' ) ?>"><?php _e( 'Delicious', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_xing'] != "") { ?>
							<li class="social-xing"><a href="<?php bloginfo('social_xing'); ?>" target="_blank" title="<?php _e( 'XING', 'minti' ) ?>"><?php _e( 'XING', 'minti' ) ?></a></li>
						<?php } ?>
						<?php if($data['social_rss'] == true) { ?>
							<li class="social-rss"><a href="<?php bloginfo('rss2_url'); ?>" target="_blank" title="<?php _e( 'RSS', 'minti' ) ?>"><?php _e( 'RSS', 'minti' ) ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<?php } ?>
			
		</div>
	</div><!-- end copyright -->
		
	<div class="clear"></div>
		
	<?php if($data['select_layoutstyle'] == 'Boxed Layout' || $data['select_layoutstyle'] == 'Boxed Layout with margin' ) { ?>
	</div> <!-- end boxed -->
	<?php } ?>

	<div id="back-to-top"><a href="#"><?php _e( 'Back to Top', 'minti' ) ?></a></div>
	
	<?php if($data['check_infobar'] == true) { ?>
	<div id="infobar" class="clearfix">
		<div class="container clearfix">
			<?php 
				if (function_exists('dynamic_sidebar') && dynamic_sidebar('Infobar Widgets')){

				}
				else{ 
					echo '<div class="no-widgets">'.$data['textarea_infobar'].'</div>'; 
				}
			?>	
		</div>
		<a href="#" class="close-infobar"></a>
	</div>
	<?php } ?>
	
	<?php if($data['textarea_trackingcode'] != '') { echo $data['textarea_trackingcode']; } ?>
	
	<?php wp_footer(); ?>
	
</body>

</html>
