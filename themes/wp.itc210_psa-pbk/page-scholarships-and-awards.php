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
			<?php 
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $post->ID,
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'post_status' 	 => 'publish'
			 );
			$p = new WP_Query($args);
			?>
			<?php if ( $p->have_posts() ) : $post_counter = 0; while ( $p->have_posts() ) : $p->the_post(); ?>
			<?php $post_counter++;?>
				<div class="container">
					<div class="row">
						<div class="row-height">
							<div class="col-xs-8 col-height col-middle">
								<div class="inside">
									<div class="content">
										<p class="text-right text-xl uppercase"><?=the_title();?></p>
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
				</div>
				<div class="container">
					<div class="row">
						<div class="row-height">
							<div class="col-xs-12 col-height col-middle">
								<div class="inside">
									<div class="content">
										<?php if($post_counter % 2 == 0){//Awards ?>
										
										<div class="col-xs-3 col-height">
											<div class="inside">
												<div class="content">
												<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "e-fill"));}?>
												</div>
											</div>
										</div>
										<div class="col-xs-9 col-height col-middle">
											<div class="inside">
												<div class="content">
													<?php the_content();?>
												</div>
											</div>
										</div>
										
										<!-- Awards Child Pages -->
										<?php $args=array(
												'post_status' => 'publish',
												'orderby' => 'menu_order',
												'order' => 'ASC',
												'posts_per_page' => -1,
												'post_type' => get_post_type( $post->ID ),
												'post_parent' => get_the_ID(),
										);
										$childpages = new WP_Query($args); ?>
										<?php if ( $childpages->have_posts() ) : $childpost_counter = 0; while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
										<?php $childpost_counter++; ?>
											<?php if($childpost_counter % 2 == 0){ ?>
											
														<div class="row">
															<div class="row-height">
																<div class="col-xs-8 col-height col-middle">
																	<div class="inside">
																		<div class="content">
																			<p class="text-right text-xl uppercase"><?=the_title();?></p>
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
														
														<div class="row">
															<div class="row-height">
																<div class="col-xs-12 col-height col-middle">
																	<div class="inside">
																		<div class="content">
																			<?=the_content();?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
											
											<?php } else{ ?>
											
														<div class="row">
															<div class="row-height">
																<div class="col-xs-2 force-fluid-left col-height">
																	<div class="inside">
																		<div class="content">
																			<p class="text-xl">&nbsp; &nbsp; &nbsp;<!-- ... --></p>
																		</div>
																	</div>
																</div>
																<div class="col-xs-8 col-height col-middle">
																	<div class="inside">
																		<div class="content">
																			<p class="text-left text-xl uppercase"><?=the_title();?></p>
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
																			<?=the_content();?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
											<?php } ?>
										<?php 
										endwhile; else :
										endif;
										wp_reset_postdata();
										?>
										
										<?php }else{//Scholarships ?>
										<div class="col-xs-3 col-height">
											<div class="inside">
												<div class="content">
												<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "e-fill"));}?>
												</div>
											</div>
										</div>
										<div class="col-xs-9 col-height col-middle">
											<div class="inside">
												<div class="content">
													<?php the_content();?>
												</div>
											</div>
										</div>
										
										<!-- Scholarships Child Pages -->
										<?php $args=array(
												'post_status' => 'publish',
												'orderby' => 'menu_order',
												'order' => 'ASC',
												'posts_per_page' => -1,
												'post_type' => get_post_type( $post->ID ),
												'post_parent' => get_the_ID(),
										);
										$childpages = new WP_Query($args); ?>
										<?php if ( $childpages->have_posts() ) : $childpost_counter = 0; while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
										<?php $childpost_counter++; ?>
											<?php if($childpost_counter % 2 == 0){ ?>
											
														<div class="row">
															<div class="row-height">
																<div class="col-xs-8 col-height col-middle">
																	<div class="inside">
																		<div class="content">
																			<p class="text-right text-xl uppercase"><?=the_title();?></p>
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
														
														<div class="row">
															<div class="row-height">
																<div class="col-xs-12 col-height col-middle">
																	<div class="inside">
																		<div class="content">
																			<?=the_content();?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
											
											<?php } else{ ?>
											
														<div class="row">
															<div class="row-height">
																<div class="col-xs-2 force-fluid-left col-height">
																	<div class="inside">
																		<div class="content">
																			<p class="text-xl">&nbsp; &nbsp; &nbsp;<!-- ... --></p>
																		</div>
																	</div>
																</div>
																<div class="col-xs-8 col-height col-middle">
																	<div class="inside">
																		<div class="content">
																			<p class="text-left text-xl uppercase"><?=the_title();?></p>
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
																			<?=the_content();?>
																		</div>
																	</div>
																</div>
															</div>
														</div>
											<?php } ?>
										<?php 
										endwhile; else :
										endif;
										wp_reset_postdata();
										?>
										
										
										<?php } ?>
									</div>
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