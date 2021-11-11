<?php
/**
 *
 * @package: pbrocks_fse
 */

if ( ! function_exists( 'pbrocks_fse_support' ) ) :
	function pbrocks_fse_support() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );
		add_theme_support( 'custom-units' );
	}
	add_action( 'after_setup_theme', 'pbrocks_fse_support' );
endif;

add_action( 'wp_enqueue_scripts', 'pbrocks_fse_scripts' );
/**
 * Enqueue scripts and styles.
 */
function pbrocks_fse_scripts() {
	wp_enqueue_style( 'pbrocks-fse', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style(
		'pbrocks-fse-fonts-style',
		pbrocks_fse_fonts_url(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_script(
		'pbrocks-fse-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array( 'jquery' ),
		wp_get_theme()->get( 'Version' ),
		false
	);
	wp_enqueue_script(
		'pbrocks-fse-alignment',
		get_template_directory_uri() . '/assets/js/alignment.js',
		array( 'jquery' ),
		wp_get_theme()->get( 'Version' ),
		false
	);
}

add_action( 'enqueue_block_editor_assets', 'pbrocks_fse_editor_scripts' );
/**
 * Enqueue editor scripts and styles.
 * Required for Site Editor
 */
function pbrocks_fse_editor_scripts() {
	wp_enqueue_style(
		'pbrocks-fse-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
	wp_enqueue_style(
		'pbrocks-fse-fonts-style',
		pbrocks_fse_fonts_url(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}

/**
 * Get Google fonts and save locally with WPTT Webfont Loader.
 */
function pbrocks_fse_fonts_url() {
	$font_families = array(
		'Quicksand:wght@300;400;500;600;700',
		'Work+Sans:wght@300;400;500;600;700',
		'Roboto:wght@100;300;400;500;700;900',
		'Roboto+Slab:wght@100;200;300;400;500;600;700;800;900',
		'Merriweather:wght@300;400;700;900',
	);

	$fonts_url = add_query_arg(
		array(
			'family'  => implode( '&family=', $font_families ),
			'display' => 'swap',
		),
		'https://fonts.googleapis.com/css2'
	);

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	return wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

add_filter( 'get_the_archive_title_prefix', 'pbrocks_fse_remove_archive_title_prefix' );
/**
 * Remove archive title prefix.
 */
function pbrocks_fse_remove_archive_title_prefix( $prefix ) {
	$prefix = '';
	return $prefix;
}

/**
 * Block patterns.
 */
// if ( function_exists( 'register_block_pattern' ) ) {
// require get_template_directory() . '/inc/block-patterns.php';
// }

/**
 * Block styles.
 */
// if ( function_exists( 'register_block_style' ) ) {
// require get_template_directory() . '/inc/block-styles.php';
// }

add_action( 'admin_menu', 'pbrocks_fse_add_custom_css_menu_item' );
/**
 * Add an Appearance sub-menu link to Additional CSS.
 */
function pbrocks_fse_add_custom_css_menu_item() {
	add_submenu_page(
		'themes.php',
		esc_html__( 'Customizer', 'pbrocks-fse' ),
		esc_html__( 'Customizer', 'pbrocks-fse' ),
		'edit_theme_options',
		admin_url( 'customize.php' )
	);
	add_submenu_page(
		'themes.php',
		esc_html__( 'Frontend CSS', 'pbrocks-fse' ),
		esc_html__( 'Frontend CSS', 'pbrocks-fse' ),
		'edit_theme_options',
		admin_url( 'customize.php?autofocus[section]=custom_css' )
	);
}
