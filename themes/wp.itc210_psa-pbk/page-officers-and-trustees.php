<?php get_header(); ?>
<!-- Header Ends Here -->
<!-- Content Begins Here -->
	<!-- Officers and Trustees Page -->
	<!-- Officers and Trustees Page 1 of 2 - Officers -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!-- Featured Image from Officers and Trustees Page - Post Header Caption -->
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

		<!-- Officers and Trustees Page - Post Caption -->
		<div class="container margin-bottom-xl">
			<div class="row">
				<div class="row-height">
					<div class="col-xs-8 col-height col-middle">
						<div class="inside">
							<div class="content">
								<p class="text-right text-xl uppercase"><?=showMeta('Post Caption');?></p>
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

	<!-- Child Pages - Officers  -->
	<div class="container">
		<div class="row">
			<div id="2" class="col-xs-12">
				<?php
					$args = array(
								'post_type' => 'page',
								'order' => 'ASC',
								'meta_query'	=>	array(
									array(
										'key' => 'Position',
										'value' => 'Officer',
									)
								),
								'posts_per_page' => -1,
								);
						$p = new WP_Query($args);
				?>
				<div class="row">
					<?php if ( $p->have_posts() ) : $post_counter = 0; while ( $p->have_posts() ) : $p->the_post(); ?>
					<?php $post_counter++; ?>
					<?php if( $post_counter < 4){ ?>
							
								<div class="col-xs-4">
									<a class="uppercase" href="<?php the_permalink();?>">
										<div class="row">
											<div class="col-xs-12">
												<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "img-responsive center-block cover"));}?>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('Title');?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=the_title();?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('University Attended');?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('Year Graduated');?></p>
											</div>
										</div>
									</a>
								</div>
							
					<?php } else { ?>

								<div class="col-xs-4 col-xs-offset-1">
									<a class="uppercase" href="<?php the_permalink();?>">
										<div class="row">
											<div class="col-xs-12">
												<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "img-responsive center-block cover"));}?>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('Title');?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=the_title();?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('University Attended');?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('Year of Graduation');?></p>
											</div>
										</div>
									</a>
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
				</div>
				<?php wp_reset_postdata();?>
			</div>
		</div>
	</div>


	<!-- Officers and Trustees Page 2 of 2 - Trustees -->
	<div class="container">
		<div class="row">
			<div id="3" class="col-xs-12 margin-bottom-xl">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!-- Officers and Trustees Page - Post Sub Caption -->
					
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
										<p class="text-left text-xl uppercase"><?=showMeta('Post Sub Caption');?></p>
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

		<!-- Child Pages - Trustees -->
	<div class="container">
		<div class="row">
			<div id="4" class="col-xs-12">
				<?php
					$args = array(
								'post_type' => 'page',
								'order' => 'ASC',
								'meta_query'	=>	array(
									array(
										'key' => 'Position',
										'value' => 'Trustee',
									)
								),
								'posts_per_page' => -1,
								);
						$p = new WP_Query($args);
				?>
				<div class="row">
					<?php if ( $p->have_posts() ) : while ( $p->have_posts() ) : $p->the_post(); ?>
							
								<div class="col-xs-4">
									<a class="uppercase" href="<?php the_permalink();?>">
										<div class="row">
											<div class="col-xs-12">
												<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "img-responsive center-block cover"));}?>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('Title');?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=the_title();?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('University Attended');?></p>
											</div>
											<div class="col-xs-12">
												<p class="text-center"><?=showMeta('Year of Graduation');?></p>
											</div>
										</div>
									</a>
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
				</div>
				<?php wp_reset_postdata();?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="row-height">
				<div class="col-xs-12 col-height col-middle force-fluid-right">
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
