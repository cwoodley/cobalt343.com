    </div>
    <!-- /page -->

  </div>
  <!-- /main -->

</div>
<!-- /wrap -->

<div id="footer" class="">
  <p>Built with SASS, HTML5 and jQuery. Powered by Wordpress. | <a href="<?php bloginfo('url'); ?>/wp-admin/">Login</a></p>
</div>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/media/javascripts/presentation.js"></script>

<?php if (is_page('portfolio')): ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/media/libs/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "fade",
      slideshow: false,
      controlsContainer: ".slidercontrols",
      slideshowSpeed: "1000"
    });
  });
</script>
<?php endif ?>

<?php if (is_page('50')): ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/media/libs/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "fade",
      controlNav: "false",
      controlsContainer: "#slidercontrols",
      slideshowSpeed: "4000" // speed between transitions
    });
  });
</script>
<?php endif ?>
</body>
</html>