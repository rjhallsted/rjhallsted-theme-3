<?php

require_once 'includes/customizer-settings.php';
require_once 'includes/custom-fields.php';

function rjh_scripts() {
	wp_enqueue_style('rjh-style', get_stylesheet_uri() );

	wp_enqueue_script('rjh-js', get_template_directory_uri() . '/scripts.js', array('jquery'), '0.1.0', true );
}
add_action('wp_enqueue_scripts', 'rjh_scripts');

function rjh_theme_setup() {
	rjh_register_project_post_type();
	rjh_register_writing_link_post_type();

	register_nav_menus( array( 'top-menu' => 'Top Menu' ) );
}
add_action('after_setup_theme', 'rjh_theme_setup');


function rjh_register_project_post_type() {
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

function rjh_register_writing_link_post_type() {
	$labels = array(
		'name' => 'Writing Links',
		'singular_name' => 'Writing Link',
		'add_new_item' => 'Add New Writing Link',
		'edit_item' => 'Edit Writing Link',
		'new_item' => 'New Writing Link',
		'view_item' => 'View Writing Link',
		'search_items' => 'Search Writing Links',
		'not_found' => 'No writing links found.',
		'not_found_in_trash' => 'No writing links found in trash',
		'all_items' => 'All Writing Links',
		'archives' => 'Writing Link Archives'
		);

	$args = array(
		'labels' => $labels,
		'description' => 'A link to an external piece of writing',
		'public' => true,
		'menu_position' => 21,
		'menu_icon' => 'dashicons-admin-links',
		'supports' => array('title')
		);

	register_post_type('writing-link', $args);
}

function rjh_register_client_post_type() {
	$labels = array(
		'name' => 'Clients',
		'singular_name' => 'Client',
		'add_new_item' => 'Add New Client',
		'edit_item' => 'Edit Client',
		'new_item' => 'New Client',
		'view_item' => 'View Client',
		'search_items' => 'Search Clients',
		'not_found' => 'No clients found.',
		'not_found_in_trash' => 'No clients found in trash',
		'all_items' => 'All Clients',
		'archives' => 'Client Archives'
		);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_position' => 22,
		'menu_icon' => 'dashicons-businessman',
		'supports' => array('title')
		);

	register_post_type('client', $args);
}


?>