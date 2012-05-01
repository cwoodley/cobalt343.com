<?php /* Template Name: Landing */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

  <h1><?php the_title(); ?></h1>
  
  <div id="banner" class="thirteen columns alpha omega flexslider">
    <ul id="" class="slides nostyle">
        <?php 
            $slides = get_order_field('slideshow_image');
 
            foreach($slides as $slide){
               echo get_image('slideshow_image',1,$slide)."<br />";
            }
        ?>
    </ul>
  </div>
  <ul id="slidercontrols" class="flex-direction-nav">
    <li><a class="prev" href="#">Previous</a></li>
    <li><a class="next" href="#">Next</a></li>
  </ul>

  <div class="the_content">
    <?php echo the_content(); ?>
  </div>
  
<?php endwhile; endif; get_footer(); ?>