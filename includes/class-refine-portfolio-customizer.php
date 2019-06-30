<?php

/**
 * Implements Customizer functionality.
 *
 * Add custom sections and settings to the Customizer.
 *
 * @package   refine-portfolio
 * @copyright Copyright (c) 2019.
 * @license   GPL2+
 */
class Refine_Portfolio_Customizer{

    /**
     * Refine_Portfolio_Customizer constructor.
     *
     * @access public
     * @since  1.0
     * @return void
     */
    public function __construct() {
        add_action( 'customize_register', array( $this, 'register_customizer_settings' ) );
    }

    /**
     * Add all sections and panels to the Customizer
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @access public
     * @since  1.0
     * @return void
     */
    public function register_customizer_settings( $wp_customize ) {

        /*
        * Add Sections
        */ 
        // New section for "Refine Portfolio".
        $wp_customize->add_section('refine_portfolio', array(
            'title'          => __('Refine Portfolio', 'refine-portfolio'),
            'priority'       => 101,
        ));
        $this->refine_portfolio_section($wp_customize);

    }
    
    /**
     * Section: Refine Portfolio Layout
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @access private
     * @since  1.0
     * @return void
     */
    private function refine_portfolio_section( $wp_customize ) {

        /************
         * Filter Text Color
         */
        $wp_customize->add_setting('filter_text_color',array(
            'default'           => '#33333',
            'sanitize_callback' => array( $this, 'sanitize_hex_color' )
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'filter_text_color', array(
            'label'         => 'Filter Text Color',
            'section'       => 'refine_portfolio',
            'settings'      => 'filter_text_color',
            'priority'    => 10
        ) ) );
        /**************
         * Fitler background Color
         */
        $wp_customize->add_setting('filter_text_background',array(
            'default'           => '#33333',
            'sanitize_callback' => array( $this, 'sanitize_hex_color' )
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'filter_text_background', array(
            'label'         => 'Filter Text Background',
            'section'       => 'refine_portfolio',
            'settings'      => 'filter_text_background',
            'priority'    => 10
        ) ) );

        /************************
         * Overlay Color
         */
        $wp_customize->add_setting('image_overlay_color',array(
            'default'           => '#000000',
            'sanitize_callback' => array( $this, 'sanitize_hex_color' )
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'image_overlay_color', array(
            'label'         => 'Image Overlay Color',
            'section'       => 'refine_portfolio',
            'settings'      => 'image_overlay_color',
            'priority'    => 10
        ) ) );

        /********************
         * Overlay Text Color
         */
    }
    /**
     * Sanitize Checkbox
     * 
     * Accepts only "true" or "false" as possible values.
     *
     * @param $input
     *
     * @access public
     * @since  1.0
     * @return bool
     */
    public function sanitize_checkbox( $input ) {
        return ( $input === true ) ? true : false;
    }
    /**
     * Sanitize Color
     * 
     * Accepts only "true" or "false" as possible values.
     *
     * @param $input
     *
     * @access public
     * @since  1.0
     * @return bool
     */
    public function sanitize_hex_color( $input ) {
        return ( $input != ''  ) ? $input : '#333';
    }
}