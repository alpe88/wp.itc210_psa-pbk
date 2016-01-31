<?php get_header(); ?>
<!-- Header Ends Here -->

<!-- Content Begins Here -->
	<div class="container-fluid nopadding">
		<div class="row-fluid nopadding">
			<div class="col-xs-12 nopadding">
				<?php echo alt_highlight_slider();?>
			</div>
		</div>
	</div>
	
	<!-- Excerpt from About Page -->
	<div class="container">
		<div class="row">
			<div id="1" class="col-xs-12 nopadding">
				<?php
					$abt_args = array('pagename' => 'about');
					$p = new WP_Query($abt_args);
				?>
				<?php if ( $p->have_posts() ) : while ( $p->have_posts() ) : $p->the_post(); ?>
				<div class="row">
					<div class="row-height">
						<div class="col-xs-6 col-height">
							<div class="inside">
								<div class="content">
									<h2><?php echo showMeta('Post Caption'); ?></h2>
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-height col-middle text-center">
							<div class="inside">
								<div class="content">
									<div class="btn btn-primary outline">
										<a href="<?php the_permalink();?>">
										Learn More <i class="icon-circle-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; else : ?>
				<div class="row">
					<div class="row-height">
						<div class="col-xs-12 col-height">
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
			</div>
		</div>
	</div>
	
	<!-- Posts of Events & Image -->
	<div class="container">
		<div class="row">
			<div id="2" class="col-xs-12 nopadding">

				<?php 
					$evt_args = array (
						'post_type'              => array( 'event' ),
						'posts_per_page'         => '2',
						'orderby'                => 'date',
						);
					$e = new WP_Query($evt_args);
				?>
				<div class="row-height">
					<?php if ( $e->have_posts() ) : $post_counter = 0; while ( $e->have_posts() ) : $e->the_post(); ?>
					<?php $post_counter++; ?>
					<?php if( $post_counter == 1 ){?>
							<div class="col-xs-3 col-height nopadding">
								<div class="inside nomargin">
									<div class="content nopadding">
										<!-- Image of 1st Listed Event Goes Here -->
										<?php if(has_post_thumbnail()){
												the_post_thumbnail('',array('class' => "e-fill"));
										}
										?>
									</div>
								</div>
							</div>
							<div class="col-xs-4 col-height col-middle">
								<h4 class="uppercase pull-left">events</h4>
								<div class="inside">
									<div class="content">
										<!-- Content of 1st Listed Event Goes Here -->
										<?php the_excerpt();?>
									</div>
								</div>
							</div>
					<?} else{?>
							<div class="col-xs-4 col-height col-middle">
								<a href="<?php get_site_url(); ?>/events">
									<h4 class="uppercase pull-right">see all events</h4>
								</a>
								<div class="inside">
									<div class="content">
										<!-- Content of 2nd Listed Event Goes Here -->
										<?php the_excerpt();?>
									</div>
								</div>
							</div>
							<div class="col-xs-1 col-height col-middle force-fluid-left">
								<div class="inside">
									<div class="content">
										<a href="<?php get_site_url(); ?>/events">
											<i class="text-lg fa fa-angle-right"></i>
										</a>
									</div>
								</div>
							</div>
					<?}?>
					<?php endwhile; else : ?>
							<div class="col-xs-12 col-height col-middle">
								<div class="inside">
									<div class="content">
										<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
									</div>
								</div>
							</div>
					<?php endif; ?>
					<?php wp_reset_postdata();?>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Love of Learning Divider -->
	<div class="container">
		<div class="row">
			<div id="3" class="col-xs-12 nopadding">
				<?php
					$url = get_template_directory_uri().'/images/fpstock.jpg';
					$url = preg_replace('/\s+/', '_', $url);
				?>
				<div class="cover rel" style="height:200px;min-height:100%;background-image:url(<?php echo $url;?>)">
					<h2 class="uppercase text-center" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">love of learning is the guide of life</h2>
				</div>
			</div>
		</div>
	</div>
	
<!-- Content Ends Here -->
<div class="margin-bottom-md"></div>
<!-- Footer Begins Here -->
<?php get_footer(); ?>
