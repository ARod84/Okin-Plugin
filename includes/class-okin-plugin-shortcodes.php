<?php
/**
* The create shortcode class.
*
* @link       https://okinsport.com
* @since      1.0.0
*
* @package    Upvote_Plugin
* @subpackage Upvote_Plugin/includes
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Okin_Plugin_Shortcodes {
	// Dashboard shortcode functions
	public static function okin_coupon_page_func() {
		get_okin_template( 'archive-okin_landing.php' );
	}
}

// Create upvote-plugin shortcode
add_shortcode( 'okin_get_atletas', array( 'Okin_Plugin_Shortcodes', 'okin_coupon_page_func' ) );
