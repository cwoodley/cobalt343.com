<?php
/*
Plugin Name: EmailCrypt
Plugin URI: http://goredmonster.com/projects/wp-emailcrypt/
Description: Encrypt Email address links in the content
Author: Paul Redmond
Version: 0.2.1
Author URI: http://www.goredmonster.com/
*/

require('lib/enkoder.php');

class WpEmailCrypt {
    
    /**
     * Enkoder object
     */
    var $enkoder = null;
    
    function __construct() {
        
        add_action('the_content', array($this, 'the_content'), 1);
		add_shortcode('emailcrypt', array($this, 'emailcrypt'));
        $this->enkoder = new Enkoder();
    }
    
    function the_content($content) {
        //preg_match('/<ahref="[^"]+">[^<]+<\/a>/i', $content, $matches);
        preg_match_all('/<a[^>]*>[^>]*<\/a>/i', $content, $matches);
        foreach($matches[0] as $match) {
            
            preg_match('/mailto:([A-Z0-9._%-]+@[A-Z0-9-]+\.+[A-Z]{2,4})/i',$match, $email_match);
			if($email_match[1]) {
				//preg_match('/>([^>]*)</i', $match, $link_text_match);
				//$link_text = !empty($link_text_match[1]) ? $link_text_match[1] : $email_match[1];
            	$content = str_replace($match, $this->enkoder->enkode($match), $content);
			}
        }
        return $content;
    }
	
	/**
	 * Shortcode Functionality
	 * Examples:
	 *   [emailcrypt email="you@aol.com" title="My Title" subject="My Subject"]My Text[/emailcrypt]
	 *   [emailcrypt email="you@aol.com" ... /] - Alternate syntax outputs email address as link text
	 */
	function emailcrypt($attributes, $content = null) {
		extract( shortcode_atts( array(
			'email' => null,
			'title' => null,
			'subject' => null,
		), $attributes ) );
		
		if ($content == null) {
			$content = $email;
		}
		
		if(!$title_text) {
			$title_text = null;
		}
		
		if(!$subject) {
			$subject == null;
		}
		
		return $this->enkoder->enkode_mail($email, $content, $title_text, $subject);
	}
}

$EmailCrypt = new WpEmailCrypt();