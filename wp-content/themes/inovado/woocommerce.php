<?php get_header(); ?>

<!-- Start Shop Titlebar -->
<?php if ( $data['select_woocommercetitlebar'] == 'Background-Image Style 1' ) { ?>

	<div id="alt-title" class="post-thumbnail" style="background-image: url( <?php echo $data['media_woocommercetitlebar']; ?> );">
		<div class="grid"></div>
		<div class="container">
			<h1><?php echo $data['text_woocommercetitle']; ?><?php if($data['text_titledivider'] != "") { echo $data['text_titledivider']; } ?></h1>
			<?php if($data['text_woocommercesubtitle']){ echo '<h2>'.$data['text_woocommercesubtitle'].'</h2>'; } ?>
		</div>
	</div>
	<?php if($data['check_woocommercebreadcrumbs'] == 0){ ?>
		<div id="alt-breadcrumbs">
			<div class="container">
				<?php minti_breadcrumbs(); ?>
			</div>
		</div>
	<?php } ?>
	<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>
	
<?php } elseif ( $data['select_woocommercetitlebar'] == 'Background-Image Style 2' ) { ?>

	<div id="alt-title-2" class="post-thumbnail" style="background-image: url( <?php echo $data['media_woocommercetitlebar']; ?> );">
		<div class="container">
			<div class="ten columns">
				<h1><?php echo $data['text_woocommercetitle']; ?><?php if($data['text_titledivider'] != "") { echo $data['text_titledivider']; } ?></h1>
			</div>
			<?php if($data['check_woocommercebreadcrumbs'] == 0){ ?>
				<div id="breadcrumbs" class="six columns">
					<?php  minti_breadcrumbs(); ?>
				</div>
			<?php } ?>
		</div>
	</div>

<?php } elseif ($data['select_woocommercetitlebar'] == 'No Titlebar') { ?>
		
		<?php if($data['check_woocommercebreadcrumbs'] == 0){ ?>
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
				<h1><?php echo $data['text_woocommercetitle']; ?><?php if($data['text_titledivider'] != "") { echo $data['text_titledivider']; } ?></h1>
				<?php if($data['text_woocommercesubtitle']){ echo '<h2>'.$data['text_woocommercesubtitle'].'</h2>'; } ?>
			</div>
				<?php if($data['check_woocommercebreadcrumbs'] == 0){ ?>
				<div id="breadcrumbs" class="six columns <?php if($data['text_woocommercesubtitle']){ echo 'breadrcumbpadding'; } /* to align middle */ ?>">
					<?php minti_breadcrumbs(); ?>
				</div>
				<?php } ?>
		</div>
	</div>
	
	<?php if($data['check_stripedborder']) { ?><div class="hr-border"></div><?php } ?>

<?php } ?>
<!-- End Shop Titlebar -->

<?php 
// Get WooCommerce Layout from Theme Options
if($data['select_woocommercesidebar'] == 'sidebar-left' && !is_product())  {
	$wooclass = 'sidebar-left twelve columns';
}
elseif($data['select_woocommercesidebar'] == 'sidebar-right' && !is_product())  {
	$wooclass = 'sidebar-right twelve columns';
}
else{
	$wooclass = 'no-sidebar sixteen columns';
}
?>

<div id="page-wrap" class="container">

	<div id="content" class="<?php echo $wooclass; ?>">
		<?php woocommerce_content(); ?>
	</div> <!-- end content -->
	
	<?php if($data['select_woocommercesidebar'] != 'no-sidebar' && !is_product())  { ?>
	<div id="sidebar" class="four columns">
		<?php if(is_woocommerce()){
			/* WooCommerce Sidebar */
			if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Shop Widgets') );
		} ?>
	</div>
	<?php } ?>
	
</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>
