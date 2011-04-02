<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head>
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/css/text.css" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie-6.0.css" />
    <script src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG.js"></script>
    <script>
      DD_belatedPNG.fix('img, ul, li');
    </script>
<![endif]-->

<?php wp_head(); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/photographerdream.js"></script>
</head>
<body>
<div id="topbg">
    <div id="contentholder">
        <div id="header">
        	<div id="logo">
            	<a href="<?php echo get_option('home'); ?>/"><img id="logoimg" src="<?php print get_option('pd_logo_path') ? get_option('pd_logo_path') : bloginfo('template_directory') . '/img/logo.png'; ?>" alt="<?php bloginfo('name'); ?>" /></a>
            </div>
            <div id="topmenu">
            	<ul class="mainnav">
                	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
              </ul>
            </div>
         </div> <!-- end header -->
        
        <div id="mainarea">