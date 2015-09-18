<?php get_header(); ?>
<!-- Header Ends Here -->
<!-- Content Begins Here -->
<!-- Main Content Section Begins Here -->
<div class="container">
	<div class="row">
		<div class="<?php display_content();?>">
			<article id="post-content-<?php the_ID(); ?>" class="post-content">
				<div class="col-xs-12 margin-bottom-md">
					<div class="col-xs-12">
							<h1>Not Found.</h1>
							<p><?php _e( 'Sorry, unfortunately there is nothing found at this location. Why not try a search instead?' ); ?></p>
							<?php get_search_form();?>
					</div>
				</div>
			</article>
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