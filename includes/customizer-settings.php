<?php

function rjh_customizer_settins( $wp_customize ) {
	rjh_add_customizer_sections( $wp_customize );
}
add_action( 'customize_register', 'rjh_customizer_settins', 20 );


function rjh_add_customizer_sections( $wp_customize ) {
	rjh_customizer_front_page( $wp_customize );
}

function rjh_customizer_front_page( $wp_customize ) {
	$wp_customize->add_section(
		'front_page',
		array(
			'title' => 'Front Page',
			'priority' => 100
		)
	);

	$wp_customize->add_setting( 'front_page_image' );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'front_page_image',
			array(
				'label' => __('Add a picture of yourself.'),
				'section' => 'front_page',
				'settings' => 'front_page_image'
			)
		)
	);

	$wp_customize->add_setting( 'rjh_about' );
	$wp_customize->add_control(
		'rjh_about',
		array(
			'label' => 'Short about section',
			'section' => 'front_page',
			'type' => 'textarea'
		)
	);
}

?>