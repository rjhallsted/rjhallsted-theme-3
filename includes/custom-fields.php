<?php

require_once get_template_directory()  . '/includes/class-rjh-simple-custom-field.php';

function rjh_project_link_meta() {
	global $project_link_meta;
	$project_link_meta = new RJHSimpleCustomField( 'Project Link', 'project', 'normal', 'default', 'rjh_sanitize_project_link');
	$project_link_meta->init();
}
add_action( 'init', 'rjh_project_link_meta' );

function rjh_sanitize_project_link( $value ) {
	return esc_url_raw( $value );
}

function rjh_get_project_link( $post_id ) {
	global $project_link_meta;
	$raw_url = $project_link_meta->get_meta( $post_id );
	return esc_url( $raw_url );
}

function rjh_writing_link_url_meta() {
	global $writing_link_url_meta;
	$writing_link_url_meta = new RJHSimpleCustomField( 'Link URL', 'writing-link', 'normal', 'default', 'rjh_sanitize_writing_link_url');
	$writing_link_url_meta->init();
}
add_action( 'init', 'rjh_writing_link_url_meta' );

function rjh_sanitize_writing_link_url( $value ) {
	return esc_url_raw( $value );
}

function rjh_get_writing_link_url( $post_id ) {
	global $writing_link_url_meta;
	$raw_url = $writing_link_url_meta->get_meta( $post_id );
	return esc_url( $raw_url );
}
?>