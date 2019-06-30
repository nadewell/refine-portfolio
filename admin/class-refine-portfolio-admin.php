<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Refine_Portfolio_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/refine-portfolio-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/refine-portfolio-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function register_portfolio(){

		/*********************************
		 * Portfolio Post Type
		 */
		$labels = array(
			'name'               => _x( 'Portfolio', 'post type general name', 'refine-portfolio' ),
			'singular_name'      => _x( 'Portfolio', 'post type singular name', 'refine-portfolio' ),
			'menu_name'          => _x( 'Portfolio', 'admin menu', 'refine-portfolio' ),
			'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'refine-portfolio' ),
			'add_new'            => _x( 'Add New', 'portfolio', 'refine-portfolio' ),
			'add_new_item'       => __( 'Add New Portfolio', 'refine-portfolio' ),
			'new_item'           => __( 'New Portfolio', 'refine-portfolio' ),
			'edit_item'          => __( 'Edit Portfolio', 'refine-portfolio' ),
			'view_item'          => __( 'View Portfolio', 'refine-portfolio' ),
			'all_items'          => __( 'All Portfolios', 'refine-portfolio' ),
			'search_items'       => __( 'Search Portfolios', 'refine-portfolio' ),
			'parent_item_colon'  => __( 'Parent Portfolios:', 'refine-portfolio' ),
			'not_found'          => __( 'No Portfolio found.', 'refine-portfolio' ),
			'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'refine-portfolio' )
		);
	
		$args = array(
			'labels'             => $labels,
					'description'        => __( 'Description.', 'refine-portfolio' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'portfolio' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
		);
	
		register_post_type( 'portfolio', $args );

		/*************************
		 * Portfolio Taxonomy
		 */
		$labels = array(
			'name'              => _x( 'Categories', 'Portfolio Categories', 'refine-portfolio' ),
			'singular_name'     => _x( 'Category', 'Portfolio Category', 'refine-portfolio' ),
			'search_items'      => __( 'Search Categories', 'refine-portfolio' ),
			'all_items'         => __( 'All Categories', 'refine-portfolio' ),
			'parent_item'       => __( 'Parent Category', 'refine-portfolio' ),
			'parent_item_colon' => __( 'Parent Category:', 'refine-portfolio' ),
			'edit_item'         => __( 'Edit Category', 'refine-portfolio' ),
			'update_item'       => __( 'Update Category', 'refine-portfolio' ),
			'add_new_item'      => __( 'Add New Category', 'refine-portfolio' ),
			'new_item_name'     => __( 'New Category Name', 'refine-portfolio' ),
			'menu_name'         => __( 'Category', 'refine-portfolio' ),
		);
	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'portfolio-category' ),
		);
	
		register_taxonomy( 'portfolio-category', array( 'portfolio' ), $args );
	}

}	
