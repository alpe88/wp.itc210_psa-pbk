
<div class="navbar navbar-default nomargin">
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
						<a id="footer-banner" href="<?php echo home_url(); ?>"><img id="footer-logo" class="img-responsive center-block sized" src="<?php bloginfo('template_directory');?>/images/
						puget-sound-association-phi-beta-kappa-honor-society-logo-key-gold.svg"
						alt="an image of the Puget Sound Association of Phi Beta Kappa's Key Logo of Golden Color." />
						</a>
					</div>
					<div class="col-xs-12 text-center">
						<a id="copy" title="Email Us!" href="/contact/">&copy; <?php $curYear = date('Y'); #Keeps the second year updated
											echo $curYear;
										?> Puget Sound Association of Phi Beta Kappa
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Begin Scripts -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   	<script src="<?php bloginfo('template_directory');?>/js/bootstrap.min.js"></script>
	<script src="<?php bloginfo('template_directory');?>/js/bs.hover.js"></script>
	<!-- FlexSlider -->
  	<script src="<?php bloginfo('template_directory');?>/flexslider/jquery.flexslider-min.js"></script>
  	<script type="text/javascript">
		$(document).ready(function() {
			//handles menu on mobile, when called in walker file.
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
			var w = $(document).width(); console.log(w);
			if(w < 768){
				//handles mobile search hover
				var cc = 1
				$('.search-button').click(function(e){
					$('input[type="text"]#s').focus();
					var input = $('input[type="text"]#s').val().length;console.log(input);
					if(input <= 0){
						e.preventDefault();
					}else{
						if(cc%2==0){//even
							return true;
						}
						if(cc%2==1){//odd
							e.preventDefault();
						}
						cc++;	
					}
				});
			}
		});
	</script>
<?php wp_footer(); ?>
<!-- Footer Ends Here -->
</body>
<!-- Body Ends Here -->
</html>
<!-- Document Ends Here -->