<?php get_header(); ?>
<!-- Header Ends Here -->

<!-- START CONTENT -->
<div class="container">
	<div class="row">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>     
		<?php the_content('<p class="serif">More &raquo;</p>'); ?>
       
	</div>
   
	<?php endwhile; endif; ?>  
    
</div>
<!-- END CONTENT -->

<!-- Footer Begins Here -->
<?php get_footer(); ?>



