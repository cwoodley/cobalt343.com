<?php
/*
Plugin Name: Simple Cbox
Version: 1.0
Author: dcoi9
Description: Automatically generates rel tags based on post id. This in turn creates automatic grouping as well. Disable, or enable this automatic effect. Add your own Variables, add extra code to the HEAD tag...
Plugin URI: http://www.cpeaq.com
*/

add_filter('the_content', 'addcboxrel', 12);
add_filter('get_comment_text', 'addcboxrel');
function addcboxrel ($content)
{   global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1href=$2$3.$4$5 rel="cbox_'.$post->ID.'"$6>$7</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}

function cbox_includes() {

include 'cbox_head.php';

}
add_filter('the_content', 'addcboxnone', 12);
add_filter('get_comment_text', 'addcboxnone');
function addcboxnone ($content)
{   global $post;
	$pattern = "/<a(.*?)rel=('|\")(.*?)('|\")(.*?)rel=('|\")(.*?)('|\")(.*?)>(.*?)<\/a>/i";
    $replacement = '<a$1$5$9>$10</a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}

add_action('wp_head', 'cbox_includes');




function scbox_admin() {  
     include('scbox_admin.php');  
 }
 
 function cbox_menu() {  
   add_options_page("Simple Cbox", "Simple Cbox", 1, "Simple-Cbox", "scbox_admin");  
 }  
   
 add_action('admin_menu', 'cbox_menu');  
 
?>