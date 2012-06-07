<?php /* Template Name: Portfolio */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

  <h1><?php the_title(); ?></h1>
  
  <div class="the_content">
    <?php echo the_content(); ?>
  </div>

  <?php
    query_posts('showposts=-1&category_name=portfolio&orderby=date&order=ASC');
    if (have_posts()) :
  ?>
  <?php while (have_posts()) : the_post(); ?>
  <article id="post_<?php the_ID(); ?>" class="portfolio-item clearfix">

    <div class="columns five alpha omega">
      <header class="meta">
        <h2><?php the_title(); ?></h2>
        <a href="http://<?php echo get('info_link'); ?>"><?php echo get('info_link'); ?></a>
      </header>
      <ul>
        <li><strong>Launched:</strong> <?php echo get('info_year'); ?></li>
        <li><strong>Studio:</strong> <?php echo get('info_studio'); ?></li>
        <li class="notes"><strong>Notes:</strong> <?php echo get('info_notes'); ?></li>
      </ul>
    </div>    
    <div class="columns eleven alpha omega">
      <div class="flexslider post_<?php the_ID(); ?>">
        <ul class="slides nostyle">
          <?php 
            $slides = getFieldOrder('slideshow_image');
            $crop="w=640&h=470&zc=1&q=100";
            
            foreach($slides as $slide){ ?>
            <li><?php echo get_image('slideshow_image',1,$slide,1,NULL,NULL) ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </article>
  <?php endwhile; ?>
<?php endif; wp_reset_query(); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>