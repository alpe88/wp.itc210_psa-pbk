
<div class="navbar navbar-default">
<div class="margin-bottom-lg"></div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
					<div class="col-xs-6 text-center nopadding">
						<div id="social_navigation_footer">
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
					<div class="col-xs-6 text-center nopadding">
						<a id="footer-banner" href="<?php echo home_url(); ?>">ΦΒΚ
						</a>
					</div>
					<div class="col-xs-12 text-center">
						<a title="Email Us!" href="/contact/">Puget Sound Association of The Phi Beta Kappa Honor Society &nbsp &copy; <?php
											$copyYear = 2015; #Set your website start date
											$curYear = date('Y'); #Keeps the second year updated
											echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
											?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Begin Scripts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   	<script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo('template_directory');?>/js/bs.hover.js"></script>
	<!-- Twitter Fetcher -->
	<script src="<?php bloginfo('template_directory');?>/tw/tf.min.js"></script>
	<!-- FlexSlider -->
  	<script src="<?php bloginfo('template_directory');?>/flexslider/jquery.flexslider-min.js"></script>
  	<script type="text/javascript">
		$(document).ready(function() {
			function clickMe(obj){ 
				if($(obj).data('clicked') == 'true'){
					location.href = $(obj).attr('href');
				}
				 else{
				$(obj).data('clicked','true');
				}
			}
			$('.flexslider').flexslider({
				animation: "fade",
				controlNav: true,
				directionNav: true
			});
		});
	</script>
<?php wp_footer(); ?>
<!-- Footer Ends Here -->
</body>
<!-- Body Ends Here -->
</html>
<!-- Document Ends Here -->