<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title> <?php the_title(); ?> &raquo; <?php bloginfo('name'); ?></title>

  <meta name="description" content="<?php if (have_posts()): while (have_posts()): the_post(); echo strip_tags(get_the_excerpt()); endwhile; endif; ?>" />
  
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/media/stylesheets/compiled/style.css" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="wrap" class="container">
    
    <div id="main" class="sixteen columns clearfix">
      
      <header id="logo">
        Cale Woodley
      </header>

      <div class="columns three alpha">
        <nav id="core-nav">
          <ul>
            <li><a href="#">nav item</a></li>
            <li><a href="#">nav item</a></li>
            <li><a href="#">nav item</a></li>
          </ul>
        </nav>
      </div>

      <div id="page" class="columns thirteen omega">
        
      