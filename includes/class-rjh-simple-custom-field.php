<?php

class RJHSimpleCustomField {
	private $name;
	private $key;
	private $post_type;
	private $position;
	private $priority;

	function __construct($field_name, $post_type, $position, $priority, $sanitization_callback ) {
		$this->name = $field_name;
		$this->key = 'rjh_' . sanitize_key( $field_name );
		$this->post_type = $post_type;
		$this->position = $position;
		$this->priority = $priority;
		$this->sanitization_callback;
	}

	function init() {
		add_action('load-post.php', array( $this, 'setup' ));
		add_action('load-post-new.php', array( $this, 'setup' ) );
	}

	function setup() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_meta'), 10, 2);
	}

	function add_meta_box() {
		add_meta_box(
			$this->key,
			esc_html__($this->name),
			array( $this, 'display_meta_box'),
			$this->post_type,
			$this->position,
			$this->priority
			);
	}

	function display_meta_box( $object, $box ) { ?>
		<?php wp_nonce_field( basename(__FILE__), $this->key . '_nonce' ); ?>

		<p>
    		<input class="widefat" type="text" name="<?php echo $this->key; ?>" id="<?php echo $this->key; ?>" value="<?php echo esc_attr( get_post_meta( $object->ID, $this->key, true ) ); ?>" size="250" />
		</p>
	<?php }

	function save_meta( $post_id, $post ) {
		if( !isset( $_POST[$this->key . '_nonce'] ) ||
			!wp_verify_nonce( $_POST[$this->key . '_nonce'], basename(__FILE__) ) ) {
			return $post_id;
		}

		$post_type = get_post_type_object( $post->post_type );

		if( !current_user_can( $post_type->cap->edit_post, $post_id) )
			return $post_id;

		$new_value = isset( $_POST[$this->key] ) ? $_POST[$this->key] : '';

		if( $this->sanitization_callback ) {
			$new_value = call_user_func($this->sanitization_callback, $new_value);
		}

		$old_value = get_post_meta( $post_id, $this->key, true );

		if( $new_value && '' == $old_value ) {
			add_post_meta( $post_id, $this->key, $new_value);
		} elseif( $new_value && $new_value != $old_value ) {
			update_post_meta( $post_id, $this->key, $new_value );
		} elseif( '' == $new_value && $old_value ) {
			delete_post_meta( $post_id, $this->key, $old_value );
		}
	}
}

?>