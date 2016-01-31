<!-- Document Begins Here -->
<!DOCTYPE html>
<html lang="en">
<!-- Header Begins Here -->
	<head>
	<title><?php SEO_title(); ?></title>
	<!-- Begin Favicon Information -->
	<link rel="shortcut icon" type="image/png" href="" />
	<!-- Begin Meta Information -->
	 <meta property="og:title" content="<?php SEO_title(); ?>" />
	 <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
	 <meta property="og:type" content="article" />
	 <meta property="og:url" content="<?php echo this_url(); ?>" />
	 <meta property="og:image" content="" />
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	 <meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>" /> 
	 <meta name="keywords" content="<?php echo strip_tags(get_the_excerpt()); ?>" /> 
	 <meta name="robots" content="no index, no follow" /> 
	 <meta http-equiv="Cache-Control" content="no-cache" /> 
	 <meta http-equiv="Pragma" content="no-cache" /> 
	 <meta http-equiv="Expires" content="-1" /> 
	 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" /> 

	<!-- Begin Style Sheets -->
	
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bs.sharp.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bs.fh.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/tabbed-menu.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/flexslider/flexslider.css" type="text/css">
	<!-- Icons -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/icons/fp/fpi.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/icons/im/imi.css" type="text/css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/icons/fa/font-awesome.min.css" type="text/css">
	<!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
	<?php wp_head(); ?>
	</head>
	<!-- Header Ends Here -->
	<!-- Body Begins Here -->
	<body <?php body_class(''); ?> >
	 <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top nomargin" role="navigation">
        <div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<a href="<?php echo home_url(); ?>">
						<img class="center-block img-responsive" src="<?php bloginfo('template_directory');?>/images/puget-sound-association-phi-beta-kappa-honor-society-logo.svg" alt="Puget Sound Association of The Phi Beta Kappa Honor Society - Logo." />
					</a>
				</div>
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div id="" class="navbar-collapse collapse navbar-main">
						<ul class="nav navbar-nav" id="main-menu">
							<?php wp_nav_menu(
									array( 
												'theme_location' => 'header-menu',
												'menu'           => 'Header Menu',
												'depth'          => '2',
												'container'      => '', 
												'container_id'   => '',
												'container_class'=> '',
												'menu_id'        => '',
												'menu_class'     => '',
												'items_wrap'     => '%3$s',
												'fallback_cb'	 => '',
												'walker'		 => new BS_Walker(),
											));
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>