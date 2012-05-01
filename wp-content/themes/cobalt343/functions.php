<?php 
// Saftey first.
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'functions.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly, Hassan!');

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'cbox_includes');
remove_action('wp_head', 'ame_feheader_insert', 1);
remove_action('wp_head', 'dprx_fileicons_add_style');

add_action( 'init', 'register_my_menu' );

function register_my_menu() {
  register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}

// Add awesome brower classes to body tag
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) {
        ereg('MSIE ([0-9]\.[0-9])',$_SERVER['HTTP_USER_AGENT'],$reg);
          if(!isset($reg[1])) {
             $classes[] = 'ie';
          } else {
             $classes[] = 'ie' . floatval($reg[1]);
          }
    }
  else $classes[] = 'unknown';  

  if($is_iphone) $classes[] = 'iphone';
  return $classes;
}

// Remove usless the_generator meta tag - whoops
add_filter( 'the_generator', create_function('$a', "return null;") );

// Remove usless 3.1 admin bar
remove_action('init', 'wp_admin_bar_init');

?>