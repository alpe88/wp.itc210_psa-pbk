<?php get_header(); ?>
<!-- Header Ends Here -->
<?php $args = array(
								'post_type'              => 'post',
								'post_status'            => 'publish',
								'posts_per_page'         => '1',
								'order'                  => 'DESC',
								'orderby'                => 'date',
								'category__in'			 => '5',
								);
			$posts_query = new WP_Query($args);	?>
<!-- Content Begins Here -->
<!-- Main Content Section Begins Here -->
<div class="container">
	<div class="row">
		<div class="col-xs-12 margin-bottom-lg">
			<?php add_flexslider(); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="<?php display_content();?>">
			<?php if($posts_query->have_posts()): ?>
			<!-- the loop -->
				<?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
					<article id="post-content-<?php the_ID(); ?>" class="post-content welcome-page">
						<?php if(has_post_thumbnail()){the_post_thumbnail('',array('class' => "img-responsive center-block"));} ?>
								<div class="col-xs-12">
									<h1>
										<?php the_title(); ?>
									</h1>
										<?php the_content();?>
								</div>
					</article>
			<?php endwhile; ?>
			<?php wp_reset_postdata();?>
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</div>
		<div class="<?php display_sidebar();?>">
			<?php get_sidebar();?>
		</div>
	</div>
</div>
<!-- Main Content Section Ends Here -->
<!-- Content Ends Here -->
<div class="margin-bottom-sm"></div>
<!-- Footer Begins Here -->
<?php get_footer(); ?>