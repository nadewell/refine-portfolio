<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Refine_Portfolio_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/refine-portfolio-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/refine-portfolio-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'isotope', plugin_dir_url( __FILE__ ) . 'js/isotope.js', array( 'jquery' ), $this->version, false );

	}

	public function  add_portfolio_template( $page_templates ){
		$page_templates['portfolio_col_3'] = __( 'Portfolio Col 3', 'refine-portfolio' );
		return $page_templates;
	}

	public function change_portfolio_archive_template( $page_templates )
	{
		
		if( is_archive() && is_post_type_archive('portfolio') ){
			$fileTemplate = plugin_dir_path( __FILE__ ).'partials/refine-portfolio-archive.php';
			if(file_exists($fileTemplate))
			{
				$page_templates = $fileTemplate;
			}
		}

		return $page_templates;
	}
	public function change_portfolio_single_template($single){
		global $post;
		if( $post->post_type == 'portfolio' ){
			$fileTemplate = plugin_dir_path( __FILE__ ).'partials/refine-portfolio-single.php';
			if(file_exists($fileTemplate))
			{
				$single = $fileTemplate;
			}
		}
		return $single;
	}

	public function add_customizer_style(){
		require plugin_dir_path( __FILE__ ).'/partials/refine-portfolio-style.php';
	}

}
