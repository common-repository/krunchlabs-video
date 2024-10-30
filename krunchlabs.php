<?php
/**
 * Plugin Name: KrunchLabs Video for WP
 * Plugin URI: http://krunchlabs.com
 * Description: Embed videos from your <a href="https://krunchlabs.com/clients/">KrunchLabs</a> account into WordPress. In your KrunhLabs dashboard choose WordPress embed, which will give you a shortcode for adding video to your post.
 * Version: 0.1
 * Author: KrunchLabs
 * Author URI: http://krunchlabs.com
 */

//Add help link to plugin
function krunchlabs_help_link($links) { 
  $settings_link = '<a href="mailto:support@krunchlabs.com">Contact Support</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'krunchlabs_help_link' );

//Add custom shortcode
function insertVideo($atts)
{
	extract(shortcode_atts(array(  
        "video" => ''  
    ), $atts)); 

	return '<div id="KrunchLabs.com_'.$video.'" class="krunch-center-'.$video.'"><script type="text/javascript" src="//krunchlabs.com/clients/play/js/'.$video.'.js"></script></div>';
}

add_shortcode('krunch', 'insertVideo');