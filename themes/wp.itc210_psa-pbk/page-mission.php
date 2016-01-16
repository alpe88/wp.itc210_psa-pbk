<?php get_header(); ?>
<!-- Header Ends Here -->
<!-- Content Begins Here -->
	<!-- Mission Page -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="container-fluid nopadding">
			<div class="row-fluid nopadding">
				<div class="col-xs-12 nopadding">
					<!-- Featured Image from Mission Page -->
					<?php if(has_post_thumbnail()){
							$thumb_id = get_post_thumbnail_id();
							$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_url = $thumb_url_array[0];
							}
					?>
					<div class="cover rel" style="height:200px;min-height:100%;background-image:url(<?php echo $thumb_url;?>)">
						<h2 class="uppercase" style="position: absolute;top: 50%;left: 25%;transform: translate(-50%, -50%);">
							<?=showMeta('Post Header Caption');?>
						</h2>
					</div>
				</div>
			</div>
		</div>
		<!-- Content from Mission Page -->
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="row-height">
							<div class="col-xs-12 col-height col-middle">
								<div class="inside">
									<div class="content">
										<div class="padding">
											<?=showMeta('Post Content One');?>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>	
					
						<!-- Word Cloud Divider -->
					<div class="row">
						<div class="row-height">
							<!-- Implement via meta... -->
							<style>.divider-image,.divider-image:after{background:url("http://psa-pbk.clients.aleksandar.solutions/hlfg/wp-content/themes/wp.itc210_psa-pbk/images/fpstock.jpg");}</style>
							<div class="col-xs-12 col-height col-middle force-fluid-right divider-image">
								<div class="inside">
									<div class="content">
										<p class="text-xl">&nbsp; &nbsp; &nbsp;<!-- ... --></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="row-height">
							<div class="col-xs-12 col-height col-middle">
								<div class="inside">
									<div class="content">
										<div class="padding">
											<?=showMeta('Post Content Two');?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
			</div>
		</div>
	<?php endwhile; else : ?>
		<div class="container">
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
		</div>
	<?php endif; ?>
	<?php wp_reset_postdata();?>

<!-- Content Ends Here -->
<div class="margin-bottom-md"></div>
<!-- Footer Begins Here -->
<?php get_footer(); ?>
