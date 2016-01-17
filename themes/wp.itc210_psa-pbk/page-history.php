<?php get_header(); ?>
<!-- Header Ends Here -->
<!-- Content Begins Here -->
	<!-- Committees Page -->
	<!-- Committees Page 1 of 2 - Main Header Image -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Featured Image from Committees Page - Post Header Caption -->
		<div class="container-fluid nopadding">
			<div class="row-fluid nopadding">
				<div id="1" class="col-xs-12 nopadding">
					
					<?php if(has_post_thumbnail()){
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
							}
					?>

					<div class="cover rel" style="height:200px;min-height:100%;background-image:url(<?php echo $thumb_url;?>)">
						<h2 class="uppercase text-center" style="position: absolute;top: 50%;left: 25%;transform: translate(-50%, -50%);">
							<?=showMeta('Post Header Caption');?>
						</h2>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; else : ?>
					<div class="row">
						<div class="row-height">
							<div class="col-xs-12 col-height col-middle">
								<div class="inside">
									<div class="content">
										<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
	<?php endif; ?>
	<?php wp_reset_postdata();?>
		
	<?php
		$content = ['history'];
	?>
	<div class="container">
		<div class="row">
			<div class="row-height">
				<div class="col-xs-12 col-height col-middle">
					<div class="inside">
						<div class="content">
							<?php echo add_flexslider2($content, "","");?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="row-height">
				<div class="col-xs-12 col-height col-middle force-fluid-left">
					<div class="inside">
						<div class="content">
							<p class="text-sm">&nbsp; &nbsp; &nbsp;<!-- ... --></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Content Ends Here -->
<div class="margin-bottom-md"></div>
<!-- Footer Begins Here -->
<?php get_footer(); ?>