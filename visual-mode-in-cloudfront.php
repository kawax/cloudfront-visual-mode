<?php
/**
 * Plugin Name:     Enable Visual Mode in CloudFront
 * Plugin URI:      https://github.com/kawax
 * Description:     Enable Visual Mode in CloudFront
 * Author:          kawax
 * Author URI:      https://github.com/kawax
 * Version:         1.0.0
 *
 */

add_filter('user_can_richedit', function () {
	global $wp_rich_edit;

	if (get_user_option('rich_editing') == 'true' || !is_user_logged_in()) {
		if ($_SERVER['CloudFront-Is-Desktop-Viewer'] === 'true') {
			$wp_rich_edit = true;
		}

		return true;
	}

	$wp_rich_edit = false;

	return false;
}, 100);
