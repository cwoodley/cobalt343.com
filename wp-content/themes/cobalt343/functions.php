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

wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
wp_enqueue_script( 'jquery' );
#DEREGISTER DEFAULT JQUERY INCLUDES
    wp_deregister_script('jquery-ui-core');
    wp_deregister_script('jquery-ui-tabs');
    wp_deregister_script('jquery-ui-sortable');
    wp_deregister_script('jquery-ui-draggable');
    wp_deregister_script('jquery-ui-droppable');
    wp_deregister_script('jquery-ui-selectable');
    wp_deregister_script('jquery-ui-resizable');
    wp_deregister_script('jquery-ui-dialog');

    #LOAD THE GOOGLE API JQUERY INCLUDES
    wp_register_script('jquery_ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js', false, '1.8.18', false);

    #REGISTER CUSTOM JQUERY INCLUDES
    wp_enqueue_script('jquery_ui');

    add_action('get_header', 'my_filter_head');

function my_filter_head() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}

add_filter( 'show_admin_bar', '__return_false' );

?>