<?php
/**
 * @package WordPress
 * @subpackage Salone_Milano
 * @since Salone Milano 1.0
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since Salone Milano 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function salone_customize_register( $wp_customize ) {
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'salone' );


	// Add the featured content section in case it's not already there.
	$wp_customize->add_section( 'featured_content', array(
		'title'           => __( 'Featured Content', 'salone' ),
		'description'     => sprintf( __( 'Use a <a href="%1$s">tag</a> to feature your posts. If no posts match the tag, <a href="%2$s">sticky posts</a> will be displayed instead.', 'salone' ),
			esc_url( add_query_arg( 'tag', _x( 'featured', 'featured content default tag slug', 'salone' ), admin_url( 'edit.php' ) ) ),
			admin_url( 'edit.php?show_sticky=1' )
		),
		'priority'        => 130,
		'active_callback' => 'is_front_page',
	) );

	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'featured_content_layout', array(
		'default'           => 'grid',
		'sanitize_callback' => 'salone_sanitize_layout',
	) );

	$wp_customize->add_control( 'featured_content_layout', array(
		'label'   => __( 'Layout', 'salone' ),
		'section' => 'featured_content',
		'type'    => 'select',
		'choices' => array(
			'grid'   => __( 'Grid',   'salone' ),
			'slider' => __( 'Slider', 'salone' ),
		),
	) );
}
add_action( 'customize_register', 'salone_customize_register' );

/**
 * Sanitize the Featured Content layout value.
 *
 * @since Salone Milano 1.0
 *
 * @param string $layout Layout type.
 * @return string Filtered layout type (grid|slider).
 */
function salone_sanitize_layout( $layout ) {
	if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
		$layout = 'slider';
	}

	return $layout;
}

/**
 * Bind JS handlers to make Customizer preview reload changes asynchronously.
 *
 * @since Salone Milano 1.0
 */
function salone_customize_preview_js() {
	wp_enqueue_script( 'salone_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'salone_customize_preview_js' );

