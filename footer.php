<div class="">
<hr />
<div class="container">
	<div class="row">
			<div class="">
				<div id="social_navigation_footer" class="">
					<ul class="nopadding">
						<?php wp_nav_menu(
							array( 
								'theme_location' => 'social_menu',
								'menu'           => 'Social Menu',
						 		'container'      => '', 
						 		'container_id'   => '',
			 			 		'container_class'=> '',
								'menu_id'        => '',
								'menu_class'     => '',
								'items_wrap'     => '%3$s',
								'fallback_cb'	 => '',
								)
							);
						?>
					</ul>
				</div>
			</div>
			<div class="text-center">
					<p class="tagline"><a title="Email Us!" href="/contact/">Puget Sound Association of The Phi Beta Kappa Honor Society &nbsp &copy; <?php
									$copyYear = 2015; #Set your website start date
									$curYear = date('Y'); #Keeps the second year updated
									echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
									?></a></p>
			</div>
	</div>
</div>
</div>
	<!-- Begin Scripts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   	<script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
   	<script src="<?php bloginfo('template_directory');?>/js/bootswatch.js"></script>
	<!-- FlexSlider -->
  	<script src="<?php bloginfo('template_directory');?>/flexslider/jquery.flexslider-min.js"></script>
  	<script type="text/javascript">
		$(document).ready(function() {
			$('.flexslider').flexslider({
				animation: "fade",
				controlNav: false,
				directionNav: false
			});
	</script>
<?php wp_footer(); ?>
<!-- Footer Ends Here -->
</body>
<!-- Body Ends Here -->
</html>
<!-- Document Ends Here -->