<?php

require_once 'includes/customizer-settings.php';

function rjh_scripts() {
	wp_enqueue_style('rjh-style', get_stylesheet_uri() );
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