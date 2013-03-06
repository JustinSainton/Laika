<?php
/*
Plugin Name: Jaika
Description: An example plugin to show how to use the Sputnik API
Version: 1.4
Author: Justin Sainton
Author URI: http://zao.is/
Sputnik ID: jaika
Requires WPEC Version: 3.8.11
Compatible to WPEC Version: 3.8.11
*/

class Jaika {
	public static function verify() {
		remove_action('all_admin_notices', array('Jaika', 'report_error'));
		Sputnik::check(__FILE__, array('Jaika', 'bootstrap'));
	}

	public static function report_error() {
		echo '<div class="error"><p>Please install &amp; activate Renku to enable Laika.</p></div>';
	}

	public static function bootstrap() {
		add_filter('update_footer', array(__CLASS__, 'footer'), 20);
	}

	public static function footer($text) {
		$text = 'Dedicated to Jaika (1954&ndash;1957) &bull; ' . $text;
		return $text;
	}
}

add_action('sputnik_loaded', array('Jaika', 'verify'));
add_action('all_admin_notices', array('Jaika', 'report_error'));