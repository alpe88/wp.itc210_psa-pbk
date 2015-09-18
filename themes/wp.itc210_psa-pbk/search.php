<?php get_header(); ?>
<!-- Header Ends Here -->
<!-- Content Begins Here -->
<!-- Main Content Section Begins Here -->
		<div class="container">
			<div class="row">
					<?php if(have_posts()): ?>
					<!-- the loop -->
						<?php while (have_posts()) : the_post(); ?>
							<article id="post-content-<?php the_ID(); ?>" class="post-content">
								<div class="col-xs-12">
									<h1><?php the_title(); ?></h1>
										<?php the_excerpt();?>
								</div>
							</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata();?>
					<?php else : ?>
						
					<?php endif; ?>
			</div>	
		</div>
<!-- Main Content Section Ends Here -->
<!-- Content Ends Here -->
<div class="margin-bottom-sm"></div>
<!-- Footer Begins Here -->
<?php get_footer(); ?>