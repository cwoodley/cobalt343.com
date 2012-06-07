<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title> <?php the_title(); ?> &rsaquo; cobalt343.com</title>

  <meta name="description" content="<?php if (have_posts()): while (have_posts()): the_post(); echo strip_tags(get_the_excerpt()); endwhile; endif; ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <link rel="shortcut icon" href="images/favicon.ico">

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/media/stylesheets/compiled/style.css" />

  <?php wp_head(); ?>

  <?php if (is_page('portfolio') || is_page('50')): ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/media/libs/flexslider/flexslider.css">
  <?php endif ?>
</head>

<body <?php body_class(); ?>>

  <div id="wrap" class="container">
    
    <div id="main" class="sixteen columns clearfix">
      
      <div class="five columns alpha omega">
        <header id="logo">
          Cale Woodley
        </header>
      </div>

      <div class="eleven columns alpha omega">
        <nav id="core-nav">
          <ul>
            <?php
            wp_list_pages('title_li=&exclude=28');
            ?>
          </ul>
        </nav>
      </div>

      <div id="page" class="sixteen columns clearfix alpha omega">
      