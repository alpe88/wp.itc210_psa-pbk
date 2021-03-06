<?php get_header(); ?>
<!-- Header Ends Here -->
<!-- Content Begins Here -->
<!-- Main Content Section Begins Here -->
<div class="container">
	<div class="row">
		<div class="<?php display_content();?>">
			<?php if(have_posts()): ?>
			<!-- the loop -->
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-content-<?php the_ID(); ?>" class="post-content">
						<div class="col-xs-12 margin-bottom-md">
							<div class="col-xs-12">
								<?php if(has_post_thumbnail()){the_post_thumbnail('',
									array('class' => "img-responsive center-block"));} ?>
							</div>
							<div class="col-xs-12">
								<h1><?php the_title(); ?></h1>
									<?php the_content();?>
							</div>
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