<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       Refine Portfolio
 * Plugin URI:        https://www.blueprintdevelopers.in
 * Description:       Portfolio with Filtering
 * Version:           1.0.0
 * Author:            Blueprint Developers
 * Author URI:        https://www.blueprintdevelopers.in
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       refine-portfolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'REFINE_PORTFOLIO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_refine_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-refine-portfolio-activator.php';
	Refine_Portfolio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_refine_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-refine-portfolio-deactivator.php';
	Refine_Portfolio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_refine_portfolio' );
register_deactivation_hook( __FILE__, 'deactivate_refine_portfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-refine-portfolio.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_refine_portfolio() {

	$plugin = new Refine_Portfolio();
	$plugin->run();

}
run_refine_portfolio();


/****************
 * customize ACF path
 */
add_filter('acf/settings/path', 'refine_portfolio_acf_path');
function refine_portfolio_acf_path( $path ) {
 
    // update path
    $path = plugin_dir_path( __FILE__ ) . '/acf/';
    
    // return
    return $path;
    
}

/***************************
 * customize ACF dir
 */
add_filter('acf/settings/dir', 'refine_portfolio_acf_settings_dir'); 
function refine_portfolio_acf_settings_dir( $dir ) {
 
    // update path
    $dir = plugin_dir_url( __FILE__ ) . '/acf/';
    
    // return
    return $dir;
    
}

/****************************************
 * Hide ACF field group menu item
 */
add_filter('acf/settings/show_admin', '__return_false');

/**********************
 *  Include ACF
 */
include_once( plugin_dir_path( __FILE__ ) . '/acf/acf.php' );

/*******************
 * Portfolio Custom Fields
 */
if( function_exists('acf_add_local_field_group') ){

acf_add_local_field_group(array(
	'key' => 'group_5c8131ce625b6',
	'title' => 'Portfolio Information',
	'fields' => array(
		array(
			'key' => 'field_5c8131df0b140',
			'label' => 'Client Name',
			'name' => 'client_name',
			'type' => 'text',
			'instructions' => 'Enter Client Name',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5c8131fae8f47',
			'label' => 'Project URL',
			'name' => 'project_url',
			'type' => 'url',
			'instructions' => 'Enter Project URL',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5c813237acd83',
			'label' => 'Project Cost (USD)',
			'name' => 'project_cost',
			'type' => 'text',
			'instructions' => 'Enter Project Cost',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolio',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

}
