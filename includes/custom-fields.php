<?php

require_once get_template_directory()  . '/includes/class-rjh-simple-custom-field.php';

$project_link = new RJHSimpleCustomField( 'Project Link', 'project', 'normal', 'default', 'rjh_sanitize_project_link');
$project_link->init();

function rjh_sanitize_project_link( $value ) {
	return esc_url_raw( $value );
}

function rjh_get_project_link( $post_id ) {
	$raw_url = $project_link->get_meta( $post_id );
	return esc_url( $raw_url );
}

?>