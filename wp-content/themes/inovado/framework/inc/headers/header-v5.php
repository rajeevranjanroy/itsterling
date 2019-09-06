<header id="header-v5" class="header clearfix">
		
		<div class="container header-v5-container clearfix">
			
			<div class="sixteen columns">
			
					<div class="logo">
						<?php if($data['media_logo'] != "") { ?>
							<a href="<?php echo home_url(); ?>/"><img src="<?php echo $data['media_logo']; ?>" alt="<?php bloginfo('name'); ?>" class="logo_standard" /></a>
							<?php if($data['media_logo_retina'] != '') { ?><a href="<?php echo home_url(); ?>/"><img src="<?php echo $data['media_logo_retina'] ?>" width="<?php echo $data['logo_width']; ?>" height="<?php echo $data['logo_height']; ?>" alt="<?php bloginfo('name'); ?>" class="logo_retina" /></a><?php } ?>
						<?php } else { ?>
							<a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
						<?php } ?>
					</div>
				
					<div class="slogan"><?php echo pre_process_shortcode($data['text_hv5slogan']); ?></div>
			
			</div>

		</div>
		
		<div class="clear"></div>
		
		<div id="navigation" class="sixteen columns clearfix alpha omega">
			<div class="container">
				<div class="sixteen columns">
					<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'menu_id' => 'nav')); ?>
				</div>
			</div>
		</div>
		
</header>
	
	