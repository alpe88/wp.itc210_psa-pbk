<div class="container">
	<div class="row">
		<div class="col-xs-4">
			<a href="<?php echo home_url(); ?>">
				<img class="center-block img-responsive" src="<?php bloginfo('template_directory');?>/images/puget-sound-association-phi-beta-kappa-honor-society-logo.svg" alt="Puget Sound Association of The Phi Beta Kappa Honor Society - Logo." />
			</a>
		</div>
		<div class="col-xs-4">
			<ul class="nobulletpoints footer-menu col-sm-6 hidden-xs">
				<?php wp_nav_menu(
								array( 
												'theme_location' => 'footer-menu',
												'menu'           => 'Footer Menu',
												'depth'          => '2',
												'container'      => '', 
												'container_id'   => '',
												'container_class'=> '',
												'menu_id'        => '',
												'menu_class'     => '',
												'items_wrap'     => '%3$s',
												'fallback_cb'	 => '',
												'walker'		 => new Two_Column_Menu_Walker(),
											));
				?>
			</ul>
			<a id="copy" title="Email Us!" href="/contact/">&copy; <?php $curYear = date('Y'); #Keeps the year updated
				echo $curYear;
				?> Puget Sound Association of Phi Beta Kappa
			</a>
		</div>
		<div class="col-xs-4">
			<ul class="social-menu center-block text-center margin-bottom-lg">
				<?php wp_nav_menu(
								array( 
									'theme_location' => 'social-menu',
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
			<div><?php get_search_form();?></div>
		</div>
	</div>
</div>

	<!-- Begin Scripts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   	<script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo('template_directory');?>/js/bs.hover.js"></script>
	<!-- FlexSlider -->
  	<script src="<?php bloginfo('template_directory');?>/flexslider/jquery.flexslider-min.js"></script>
	<script src="<?php bloginfo('template_directory');?>/js/smooth-scroll.js"></script>	
  	<script type="text/javascript">
		$(document).ready(function() {
			/*//handles menu on mobile, when called in walker file.
			function clickMe(obj){ 
				if($(obj).data('clicked') == 'true'){
					location.href = $(obj).attr('href');
				}
				 else{
				$(obj).data('clicked','true');
				}
			}*/
		});
	</script>
<?php wp_footer(); ?>
<!-- Footer Ends Here -->
</body>
<!-- Body Ends Here -->
</html>
<!-- Document Ends Here -->