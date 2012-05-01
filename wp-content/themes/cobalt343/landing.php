<?php /* Template Name: Landing */ ?>

<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/media/libs/flexslider/flexslider.css">

<?php if (have_posts()): while (have_posts()): the_post(); ?>
  
  <div id="banner" class="">
    <div class="flexslider">
      <ul id="" class="slides nostyle">
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

  <div class="the_content">
    <?php echo the_content(); ?>
  </div>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/media/libs/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "fade",
      controlNav: "false",
      controlsContainer: "#slidercontrols",
      slideshowSpeed: "3000" // speed between transitions
    });
  });
</script>
<?php endwhile; endif; ?>


<?php get_footer(); ?>