<?php get_header(); ?>
<!-- Header Ends Here -->

<!-- Content Begins Here -->
	
	<!-- About Page 1 of 2 -->
	<div class="container">
		<div class="row">
			<div id="1" class="col-xs-12 nopadding margin-bottom-xxl">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!-- About Page - Post Header Caption -->
					<div class="row">
						<div class="row-height">
							<div class="col-xs-8 col-height col-middle">
								<div class="inside">
									<div class="content">
										<p class="text-right text-xl uppercase"><?=showMeta('Post Header Caption');?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 force-fluid-right col-height">
								<div class="inside">
									<div class="content">
										<p class="text-xl">&nbsp; &nbsp; &nbsp;<!-- ... --></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- About Page - Page Title & Excerpt -->
					<div class="row">
						<div class="row-height">
							<div class="col-xs-12 col-height">
								<div class="inside">
									<div class="content">
										<h1 class="text-center uppercase"><?php the_title().' Phi Beta Kappa';?></h1>
										<p class="text-center"><?the_content();?></p>
									</div>
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
			</div>
		</div>
	</div>
	
	<!-- Child Pages  -->
	<div class="container-fluid">
		<div class="row-fluid">
			<div id="2" class="col-xs-12 nopadding">
				<?php
					$args = array(
								'post_parent' => $post->ID,
								'post_type' => 'page',
								'post_status' 	 => 'publish',
								);
						$p = new WP_Query($args);
				?>
				<?php if ( $p->have_posts() ) : $post_counter = 0; while ( $p->have_posts() ) : $p->the_post(); ?>
				<?php $post_counter++; ?>
				<?php if( $post_counter % 2 != 0){#odd ?>
					<div class="row">
						<div class="row-height">
							<div class="col-xs-6 col-height col-middle nopadding">
								<div class="inside nomargin">
									<div class="content nopadding">
										<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "img-responsive center-block cover"));}?>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-height col-middle">
								<div class="inside">
									<div class="content">
										<div class="">
											<h3 class="uppercase"><?php the_title();?></h3>
										</div>
										<div class="">
											<?php the_excerpt();?>
										</div>
										<div class="">
											<a class="uppercase" href="<?php the_permalink();?>">
											Read More <i class="icon-circle-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } else {#even ?>
					<div class="row">
						<div class="row-height">
							<div class="col-xs-6 col-height col-middle">
								<div class="inside">
									<div class="content">
										<div class="">
											<h3 class="uppercase"><?php the_title();?></h3>
										</div>
										<div class="">
											<?php the_excerpt();?>
										</div>
										<div class="">
											<a class="uppercase" href="<?php the_permalink();?>">
											Read More <i class="icon-circle-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-height col-middle nopadding">
								<div class="inside nomargin">
									<div class="content nopadding">
										<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "img-responsive center-block cover"));}?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
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
			</div>
		</div>
	</div>
	
	<!-- About Page 2 of 2 -->
	<div class="container">
		<div class="row">
			<div id="3" class="col-xs-12 nopadding margin-bottom-xxl">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!-- About Page - Post Header Caption -->
					<div class="row">
						<div class="row-height">
							<div class="col-xs-2 force-fluid-left col-height">
								<div class="inside">
									<div class="content">
										&nbsp; &nbsp; &nbsp;<!-- ... -->
									</div>
								</div>
							</div>
							<div class="col-xs-8 col-height col-middle">
								<div class="inside">
									<div class="content">
										<p class="text-left text-xl uppercase"><?=showMeta('Post Footer Caption');?></p>
									</div>
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
			</div>
		</div>
	</div>

<!-- Content End Here -->	
<div class="margin-bottom-md"></div>
<!-- Footer Begins Here -->
<?php get_footer(); ?>
