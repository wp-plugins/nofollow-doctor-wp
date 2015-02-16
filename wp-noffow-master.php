<?php
/*
Plugin Name: WordPress No-follow Master
Plugin URI: https://wordpress.org/plugins/nofollow-doctor-wp/
Description: This plug-in detect external links automatically and makes them no-follow , also open them in new tab. Its created by <strong>OMAR FARUK</strong>.Simply enjoy.
Author:Omar F 
Author URI:https://twitter.com/rraju007
Version: 1.0
*/
/*Some Set-up*/
define('EXTERNAL_LINKS_DETECTOR', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
/* Adding Latest jQuery from Wordpress */
function jlatest_wp_nofollow_master() {
	wp_enqueue_script('jquery');
}
add_action('init', 'jlatest_wp_nofollow_master');
/* Adding plugin javascript active file */
wp_enqueue_script('active-js', EXTERNAL_LINKS_DETECTOR.'js.js', array('jquery'), '1.0', true);

function noFollowReplace($buffer){ // $buffer contains entire page
	$currentSite = site_url();
	$find = '/( href=")(?!(' . str_replace('/', '\/', $currentSite) . ')|\#|\/)/i';
	$replace = ' rel="nofollow" href="$2';
	$buffer = preg_replace($find, $replace, $buffer);
	return $buffer;
}

function noFollowAll(){
	ob_start();
	ob_start('noFollowReplace');
}
add_action('template_redirect', 'wp_nofollow_master');



