<?php global $data; ?>
<div class="sharebox clearfix">
	<h4><?php _e('Share this Story', 'minti'); ?></h4>
	<div class="social-icons clearfix">
		<ul>
			<?php if($data['check_sharingboxfacebook'] == true) { ?>	
			<li class="social-facebook">
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="<?php _e( 'Facebook', 'minti' ) ?>" target="_blank"><?php _e( 'Facebook', 'minti' ) ?></a>
			</li>
			<?php } ?>
			<?php if($data['check_sharingboxtwitter'] == true) { ?>	
			<li class="social-twitter">
				<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" title="<?php _e( 'Twitter', 'minti' ) ?>" target="_blank"><?php _e( 'Twitter', 'minti' ) ?></a>
			</li>
			<?php } ?>
			<?php if($data['check_sharingboxlinkedin'] == true) { ?>	
			<li class="social-linkedin">
				<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" title="<?php _e( 'LinkedIn', 'minti' ) ?>" target="_blank"><?php _e( 'LinkedIn', 'minti' ) ?></a>
			</li>
			<?php } ?>
			<?php if($data['check_sharingboxreddit'] == true) { ?>	
			<li class="social-reddit">
				<a href="http://www.reddit.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Reddit', 'minti' ) ?>" target="_blank"><?php _e( 'Reddit', 'minti' ) ?></a>
			</li>
			<?php } ?>
			<?php if($data['check_sharingboxdigg'] == true) { ?>	
			<li class="social-digg">
				<a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;bodytext=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" target="_blank" title="<?php _e( 'Digg', 'minti' ) ?>"><?php _e( 'Digg', 'minti' ) ?></a>
			</li>
			<?php } ?>
			<?php if($data['check_sharingboxdelicious'] == true) { ?>	
			<li class="social-delicious">
				<a href="http://www.delicious.com/post?v=2&amp;url=<?php the_permalink() ?>&amp;notes=&amp;tags=&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Delicious', 'minti' ) ?>" target="_blank"><?php _e( 'Delicious', 'minti' ) ?></a>
			</li>
			<?php } ?>
			<?php if($data['check_sharingboxgoogle'] == true) { ?>	
			<li class="social-googleplus">
				<a href="http://google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('', '', false)) ?>" title="<?php _e( 'Google+', 'minti' ) ?>" target="_blank"><?php _e( 'Google+', 'minti' ) ?>+</a>
			</li>
			<?php } ?>
			<?php if($data['check_sharingboxemail'] == true) { ?>	
			<li class="social-email">
				<a href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink() ?>" title="<?php _e( 'E-Mail', 'minti' ) ?>" target="_blank"><?php _e( 'E-Mail', 'minti' ) ?>+</a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>