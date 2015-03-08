<?php
/*
Plugin Name: WordPress No-follow Master
Plugin URI: https://wordpress.org/plugins/nofollow-doctor-wp/
Description: This plug-in detect external links automatically and makes them no-follow , also open them in new tab. Its created by <strong>OMAR FARUK</strong>.Simply enjoy.
Author:Omar F 
Author URI:https://twitter.com/rraju007
Version: 1.1
*/
/*Some Set-up*/

/**
* add nofollow to links
*/
$my_domain = get_bloginfo('wpurl');
function add_nofollow_content($content) {
$content = preg_replace_callback(
'/<a[^>]*href=["|\']([^"|\']*)["|\'][^>]*>([^<]*)<\/a>/i',
function($m) {
if (strpos($m[1], $my_domain) === false)
return '<a href="'.$m[1].'" rel="nofollow" target="_blank">'.$m[2].'</a>';
else
return '<a href="'.$m[1].'" target="_blank">'.$m[2].'</a>';
},
$content);
return $content;
}
add_filter('the_content', 'add_nofollow_content');



