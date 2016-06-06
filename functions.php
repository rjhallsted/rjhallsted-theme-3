<?php

require_once 'includes/customizer-settings.php';
require_once 'includes/custom-fields.php';

function rjh_scripts() {
	wp_enqueue_style('rjh-style', get_stylesheet_uri() );

	wp_enqueue_script('rjh-js', get_template_directory_uri() . '/scripts.js', array('jquery'), '0.1.0', true );
}
add_action('wp_enqueue_scripts', 'rjh_scripts');

function rjh_theme_setup() {
	$labels = array(
		'name' => 'Projects',
		'singular_name' => 'Project',
		'add_new_item' => 'Add New Project',
		'edit_item' => 'Edit Project',
		'new_item' => 'New Project',
		'view_item' => 'View Project',
		'search_items' => 'Search Projects',
		'not_found' => 'No projects found.',
		'not_found_in_trash' => 'No projects found in trash',
		'all_items' => 'All Projects',
		'archives' => 'Project Archives',
		'insert_into_item' => 'Insert into project',
		);

	$args = array(
		'labels' => $labels,
		'description' => 'A short summary of a project, with a link to more information on that project.',
		'public' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-lightbulb'
		);

	register_post_type('project', $args);
}
add_action('after_setup_theme', 'rjh_theme_setup');

?>