<!-- SideBar Begins Here -->
	<?php if(is_front_page() && is_home()){ #Default homepage ?>
		<div class="margin-bottom-lg">
			<h3 class="text-center b-d">Events</h3>
				<?php echo do_shortcode('[ai1ec view="agenda"]');?>
		</div>
		<div class="margin-bottom-sm">
			<h3 class="text-center b-d">Social</h3>
			<div id="tw-widget"></div>
		</div>
		<div class="margin-bottom-sm">
			<div id="fb-widget"><div class="fb-page" data-href="https://www.facebook.com/PSAPhiBetaKappa" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/PSAPhiBetaKappa"><a href="https://www.facebook.com/PSAPhiBetaKappa">Puget Sound Association of Phi Beta Kappa</a></blockquote></div></div></div>
		</div>
	<?php }elseif(is_front_page()){ #static homepage ?>
			
	<?php	}elseif(is_home()){ #blog page ?>

	<?php }else{ #everything else ?>
	
	<?php   } ?>
<!-- SideBar Ends Here -->