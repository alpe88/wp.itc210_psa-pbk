<!-- Document Begins Here -->
<!DOCTYPE html>
<html lang="en">
<!-- Header Begins Here -->
	<head>
	<title><?php SEO_title(); ?></title>
	<!-- Begin Favicon Information -->
	<link rel="shortcut icon" type="image/png" href="" />
	<!-- Begin Meta Information -->

	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	 <meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>" /> 
	 <meta name="keywords" content="" /> 
	 <meta name="robots" content="no index, no follow" /> 
	 <meta http-equiv="Cache-Control" content="no-cache" /> 
	 <meta http-equiv="Pragma" content="no-cache" /> 
	 <meta http-equiv="Expires" content="-1" /> 
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" /> 

	<!-- Begin Style Sheets -->
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/flexslider/flexslider.css" type="text/css">
	<!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
	<?php wp_head(); ?>
	</head>
	<!-- Header Ends Here -->
	<!-- Body Begins Here -->
	<body <?php body_class(''); ?> >
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
<<<<<<< HEAD
		<nav id="nav_wrap" class="navbar navbar-default custom-navbar" role="navigation">
			<div class="margin-bottom-xs"></div>
=======
		<nav id="nav_wrap" class="navbar navbar-default" role="navigation">
			<div class="margin-bottom-xs"></div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php get_search_form();?>
					</div>
				</div>
			</div>
			<a href="<?php echo home_url(); ?>"><img class="margin-bottom-sm center-block img-responsive" src="<?php bloginfo('template_directory');?>/images/puget-sound-association-phi-beta-kappa-honor-society-logo.gif" alt="Puget Sound Association of The Phi Beta Kappa Honor Society - Logo." />
							</a>
>>>>>>> origin/master
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php get_search_form();?>
					</div>
				</div>
			</div>
			<a href="<?php echo home_url(); ?>"><img class="margin-bottom-sm center-block img-responsive" src="<?php bloginfo('template_directory');?>/images/puget-sound-association-phi-beta-kappa-honor-society-logo.gif" alt="Puget Sound Association of The Phi Beta Kappa Honor Society - Logo." />
							</a>
			<div class="container-fluid nopadding">
				<div class="row-fluid nopadding">
					<div class="col-xs-12 nopadding">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-main">
								<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse navbar-main">
								<ul class="nav navbar-nav" id="main-menu">
								<?php wp_nav_menu(
									array( 
										'theme_location' => 'main_menu',
										'menu'           => 'Main Menu',
										'depth'          => '2',
										'container'      => '', 
										'container_id'   => '',
										'container_class'=> '',
										'menu_id'        => '',
										'menu_class'     => '',
										'items_wrap'     => '%3$s',
										'fallback_cb'	 => '',
										'walker'         => new DD_Walker(),
										));
								?>
								</ul>
							</div>
					</div>
				</div>
			</div>	
		</nav>
		<div class="container"><div class="row"><div class="col-xs-12"><?php add_breadcrumbs(); ?></div></div></div>
		<div class="margin-bottom-lg"></div>