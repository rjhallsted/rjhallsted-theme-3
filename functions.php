<?php

require_once 'includes/customizer-settings.php';

function rjh_scripts() {
	wp_enqueue_style('rjh-style', get_stylesheet_uri() );
}
add_action('wp_enqueue_scripts', 'rjh_scripts');

?>