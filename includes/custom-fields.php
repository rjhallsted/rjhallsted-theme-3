<?php

function rjh_project_meta_box_setup() {
	add_action('add_meta_boxes', 'rjh_add_project_meta_boxes');

	add_action('save_post', 'rjh_save_project_link_meta', 10, 2);
}
add_action('load-post.php', 'rjh_project_meta_box_setup');
add_action('load-post-new.php', 'rjh_project_meta_box_setup');

function rjh_add_project_meta_boxes() {
	add_meta_box(
		'rjh_project_link',
		esc_html__('Project Link'),
		'rjh_project_link_meta_box',
		'project',
		'normal',
		'default');
}

function rjh_project_link_meta_box( $object, $box ) { ?>

	<?php wp_nonce_field(basename(__FILE__), 'rjh_project_link_nonce'); ?>

	<p>
    	<input class="widefat" type="text" name="rjh-project-link" id="rjh-project-link" value="<?php echo esc_attr( get_post_meta( $object->ID, 'rjh_project_link', true ) ); ?>" size="250" />
	</p>

<?php }

function rjh_save_project_link_meta( $post_id, $post ) {

	if( !isset( $_POST['rjh_project_link_nonce'] ) || !wp_verify_nonce( $_POST['rjh_project_link_nonce'], basename(__FILE__) ) ) 
		return $post_id;

	$post_type = get_post_type_object( $post->post_type );

	if( !current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	$new_meta_value = isset( $_POST['rjh-project-link'] ) ? esc_url_raw( $_POST['rjh-project-link'] ) : '';

	$meta_key = 'rjh_project_link';
	$old_meta_value = get_post_meta($post_id, $meta_key, true);

	if( $new_meta_value && '' == $old_meta_value ) {
		add_post_meta($post_id, $meta_key, $new_meta_value, true);
	} elseif( $new_meta_value && $new_meta_value != $old_meta_value ) {
		update_post_meta( $post_id, $meta_key, $new_meta_value );
	} elseif( '' == $new_meta_value && $old_meta_value ) {
		delete_post_meta( $post_id, $meta_key, $old_meta_value );
	}
}

function rjh_get_project_link( $post_id ) {
	$raw_url = get_post_meta($post_id, 'rjh_project_link', true);
	return esc_url( $raw_url );
}

?>