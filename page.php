<?php get_header(); ?>
<!-- Header Ends Here -->
<!-- Content Begins Here -->
<!-- Main Content Section Begins Here -->
	<?php $parent_id = ( '0' != $post->post_parent ? $post->post_parent : $post->ID ); ?>
	<?if($post->post_parent==$parent_id){ ?>
		<div class="container">
			<div class="row">
					<?php if(have_posts()): ?>
					<!-- the loop -->
						<?php while (have_posts()) : the_post(); ?>
							<article id="post-content-<?php the_ID(); ?>" class="post-content">
								<!--<div class="col-xs-12">
									<?php if(has_post_thumbnail()){the_post_thumbnail('',
										array('class' => "img-responsive center-block"));} ?>
								</div>-->
								<div class="col-xs-12">
									<h1><?php the_title(); ?></h1>
										<?php the_content();?>
								</div>
							</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata();?>
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
				</div>	
			</div>
	<?php }if(is_page($parent_id)){ ?>
		<div class="container">
			<div class="row">
					<?php if(have_posts()): ?>
					<!-- the loop -->
						<?php while (have_posts()) : the_post(); ?>
							<article id="post-content-<?php the_ID(); ?>" class="post-content">
								<!--<div class="col-xs-12">
									<?php if(has_post_thumbnail()){the_post_thumbnail('',
										array('class' => "img-responsive center-block"));} ?>
								</div>-->
								<div class="col-xs-12 text-center">
									<h1><?php the_title(); ?></h1>
										<?php the_excerpt();?>
								</div>
							</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata();?>
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
			</div>	
		</div>
		<div class="container">
			<div class="row">
					<?php 
						$parent_id = ( '0' != $post->post_parent ? $post->post_parent : $post->ID );
						$args = array(
								'post_parent' => $parent_id,
								'post_type' => 'page'
								);
						$posts_query = new WP_Query($args);	?>
					<?php if($posts_query->have_posts()): ?>
					<!-- the loop -->
						<?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
							<article id="post-content-<?php the_ID(); ?>" class="post-content">
								<div class="col-xs-12 margin-bottom-md">
									<div class="col-xs-12 col-sm-3">
										<?php if(has_post_thumbnail()){the_post_thumbnail('medium',
										array('class' => "img-responsive"));} ?>
									</div>
									<div class="col-xs-12 col-sm-9">
										<h3><?php the_title(); ?></h3>
										<?php the_excerpt();?>
										<a class="small read-more" href="<?php the_permalink(); ?>"> Learn More >></a>
									</div>
								</div>	
							</article>
					<?php endwhile; ?>
					<?php wp_reset_postdata();?>
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
				<div class="<?php display_sidebar();?>">
					<?php get_sidebar();?>
				</div>
			</div>
		</div>
	<?php } ?>
<!-- Main Content Section Ends Here -->
<!-- Content Ends Here -->
<div class="margin-bottom-sm"></div>
<!-- Footer Begins Here -->
<?php get_footer(); ?>