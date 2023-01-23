<?php
/**
 * Betheme Child Theme
 *
 * @package Betheme Child Theme
 * @author Muffin group
 * @link https://muffingroup.com
 */

/**
 * Child Theme constants
 * You can change below constants
 */

// white label

define('WHITE_LABEL', false);

/**
 * Enqueue Styles
 */

function mfnch_enqueue_styles()
{
	// enqueue the parent stylesheet
	// however we do not need this if it is empty
	// wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');

	// enqueue the parent RTL stylesheet

	if (is_rtl()) {
		wp_enqueue_style('mfn-rtl', get_template_directory_uri() . '/rtl.css');
	}

	// enqueue the child stylesheet

	wp_dequeue_style('style');
	wp_enqueue_style('style', get_stylesheet_directory_uri() .'/style.css');
}
add_action('wp_enqueue_scripts', 'mfnch_enqueue_styles', 101);

/**
 * Load Textdomain
 */

function mfnch_textdomain()
{
	load_child_theme_textdomain('betheme', get_stylesheet_directory() . '/languages');
	load_child_theme_textdomain('mfn-opts', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mfnch_textdomain');

// hide update notifications
function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes


add_action( 'init', 'createPostTypePacotes' );
function createPostTypePacotes() {
	register_post_type( 'pacotes',
		array(
			'labels' => array(
				'name' => __( 'Pacotes' ),
				'singular_name' => __( 'Pacote' ),
				'menu_name' => __( 'Pacotes' ),
				'all_items' => __( 'Pacotes' ),
				'add_new_item' => __( 'Adicionar novo pacote' ),
				'not_found' => __("Nenhum pacote encontrado"),
				'not_found_in_trash' => __("Nenhum pacote encontrado na lixeira"),
			),
		'public' => true,
		'show_in_rest' => true,
		'menu_position' => 2,
		'has_archive'   => true,
		'menu_icon' => 'dashicons-calendar',
		'supports' => array('title'),
		)
	);
}

