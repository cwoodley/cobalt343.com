<?php /* Template Name: Landing */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
  
  <div id="banner" class="">
    <div class="flexslider">
      <ul id="" class="slides nostyle">
        <?php 
          $slides = getFieldOrder('slideshow_image');
          $crop="w=940&h=560&zc=1&q=100";

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

<?php endwhile; endif; ?>


<?php get_footer(); ?>