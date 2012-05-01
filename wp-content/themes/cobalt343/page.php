<?php /* Template Name: Page */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

	<h1><?php the_title(); ?></h1>
	
	<div class="the_content">
		<?php echo the_content(); ?>
	</div>
	
<?php endwhile; endif; get_footer(); ?>