<?php /* Template Name: Portfolio */ ?>

<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/media/libs/flexslider/flexslider.css">

<?php if (have_posts()): while (have_posts()): the_post(); ?>

  <h1><?php the_title(); ?></h1>
  
  <div class="the_content">
    <?php echo the_content(); ?>
  </div>

  <?php
    query_posts('showposts=-1&category_name=portfolio&orderby=date&order=DESC');
    if (have_posts()) :
  ?>
  <?php while (have_posts()) : the_post(); ?>
  <article id="post_<?php the_ID(); ?>" class="portfolio-item clearfix">
    <header class="meta">
      <div class="columns eight alpha omega">
        <h2><?php the_title(); ?></h2>
        <a href="<?php echo get('info_link'); ?>"><?php echo get('info_link'); ?></a>
      </div>
      <div class="columns five alpha omega">
        Launched: <?php echo get('info_year'); ?><br />
        Studio: <?php echo get('info_studio'); ?>
      </div>
    </header>
    <div class="slideshow">
      <div class="flexslider">
        <ul class="slides nostyle">
          <?php 
            $slides = getFieldOrder('slideshow_image');
            $crop="w=760&h=560&zc=1&q=100";

            foreach($slides as $slide){
              echo "<li>".get_image('slideshow_image',1,$slide,1,NULL,NULL)."</li>";
            }
          ?>
        </ul>
      </div>
    </div>
  </article>
  <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>

<?php endwhile; endif; ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/media/libs/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "fade",
      controlNav: "false",
      controlsContainer: ".slidercontrols",
      slideshowSpeed: "3000"
    });
  });
</script>

<?php get_footer(); ?>