<?php get_header(); ?>
<!-- Header Ends Here -->

<!-- Content Begins Here -->
<!-- Main Content Section Begins Here -->
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php endwhile; else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- Main Content Section Ends Here -->
<!-- Content Ends Here -->

<!-- Footer Begins Here -->
<?php get_footer(); ?>