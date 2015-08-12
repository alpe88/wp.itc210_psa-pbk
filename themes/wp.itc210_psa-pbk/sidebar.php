<!-- SideBar Begins Here -->
	<?php if(is_front_page() && is_home()){ #Default homepage ?>
		<div class="col-xs-12">
			<?php dynamic_sidebar('social');?>
		</div>

	<?php }elseif(is_front_page()){ #static homepage ?>
			
	<?php	}elseif(is_home()){ #blog page ?>

	<?php }else{ #everything else ?>
	
	<?php   } ?>
<!-- SideBar Ends Here -->