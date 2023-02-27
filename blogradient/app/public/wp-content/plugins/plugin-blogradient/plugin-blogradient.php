<?php
    /**
     * 
     * Plugin Name: Blogradient Elementor Addon
     * Description: Custom Elementor Widgets for Blogradient
     * Plugin URI: #
     * Version:     1.0.0
     * Author:      Rusty DeGarmo
     * Author URI:  https://github.com/RustyDeGarmo
     * Text Domain: plugin-blogradient
     * 
     * Elementor tested up to 3.10.2
     * 
     */

    /**
     * 
     * Resources:
     * Elementor - https://developers.elementor.com/docs/addons/
     * 
     */

    if(!defined('ABSPATH')){
        exit; //exit if accessed directly for security
    }

    $plugin_images = plugin_dir_url(__FILE__) . 'assets/images';


    /**
     * 
     * Main Elementor Extension Class
     * 
     * Initiates and runs the plugin
     * 
     * @since 1.0.0
     * 
     */

    final class Blogradient_Elementor_Extension{
        /**
         * Plugin Version
         * 
         * @since 1.0.0 
         * @var string The plugin version.
         * 
         */
        const VERSION = '1.0.0';

        /**
         * Minimum Elementor Version
         * 
         * @since 1.0.0
         * @var string Minimum Elementor version required to run the plugin
         */
        const  MINIMUM_ELEMENTOR_VERSION = '3.5.0';

        /**
         * Minimum PHP Version
         * 
         * @since 1.0.0
         * @var string Minimum PHP version required to run the plugin
         */
        const MINIMUM_PHP_VERSION = '8.0';

        /**
         * Instance
         * 
         * @since 1.0.0
         * @access private
         * @static
         * 
         * @var Elementor_Extension The single instance of the class.
         * 
         * When this starts, initially set the instance to null.
         * 
         */
        private static $_instance = null;

        /**
         * 
         * Make sure only a single instance can be loaded
         * 
         * @since 1.0.0
         * @access public
         * @static
         * 
         * @return Elementor_Extension An instance of the class
         * 
         */

        public static function instance() {
            if(is_null(self::$_instance)){
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Constructor
         * 
         * Perform some compatibility checks to make sure basic requirements are met.
	     * If all compatibility checks pass, initialize the functionality.
         * 
         * @since 1.0.0
         * @access public
         * 
         */
        public function __construct(){
            if($this->is_compatible()){
                add_action('elementor/init', [$this, 'init']);
            }
        }

        /**
         * 
         * Add custom Blogradient category to Elementor
         * 
         */
        public function add_elementor_widget_categories($elements_manager){
            $elements_manager->add_category(
                'blogradient_category', 
                [
                    'title' => esc_html__('Blogradient', 'plugin-blogradient'),
                    'icon'  => 'eicon-nerd',
                ]
            );
        }

         /**
         * Compatibility Checks
         * 
         * Checks if the Elementor and PHP versions meet the plugin requirements
         * 
         * @since 1.0.0
         * @access public
         * 
         */
        public function is_compatible(){
            // Check if Elementor is installed and activated
            if ( ! did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
                return false;
            }

            // Check for required Elementor version
            if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
                return false;
            }

            // Check for required PHP version
            if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
                return false;
            }

            return true;
        }

        
        /**
         * Admin notice
         *
         * Warning when the site doesn't have Elementor installed or activated.
         *
         * @since 1.0.0
         * @access public
         */
        public function admin_notice_missing_main_plugin() {

            if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

            $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor */
                esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-addon' ),
                '<strong>' . esc_html__( 'Elementor Test Addon', 'elementor-test-addon' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'elementor-test-addon' ) . '</strong>'
            );

            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required Elementor version.
         *
         * @since 1.0.0
         * @access public
         */
        public function admin_notice_minimum_elementor_version() {

            if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

            $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-addon' ),
                '<strong>' . esc_html__( 'Elementor Test Addon', 'elementor-test-addon' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'elementor-test-addon' ) . '</strong>',
                self::MINIMUM_ELEMENTOR_VERSION
            );

            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required PHP version.
         *
         * @since 1.0.0
         * @access public
         */
        public function admin_notice_minimum_php_version() {

            if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

            $message = sprintf(
                /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-addon' ),
                '<strong>' . esc_html__( 'Elementor Test Addon', 'elementor-test-addon' ) . '</strong>',
                '<strong>' . esc_html__( 'PHP', 'elementor-test-addon' ) . '</strong>',
                self::MINIMUM_PHP_VERSION
            );

            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

        }

        /**
         * Initialize
         *
         * Load the addons functionality only after Elementor is initialized.
         *
         * Fired by `elementor/init` action hook.
         *
         * @since 1.0.0
         * @access public
         */
        public function init() {

            add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
            add_action( 'elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories'] );

        }

        /**
         * Register Widgets
         *
         * Load widgets files and register new Elementor widgets.
         *
         * Fired by `elementor/widgets/register` action hook.
         *
         * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
         */
        public function register_widgets( $widgets_manager ) {

            require_once( __DIR__ . '/widgets/class-buttons.php' );
            require_once(__DIR__ . '/widgets/class-title.php');
            require_once(__DIR__ . '/widgets/class-color-link.php');
            // require_once(__DIR__ . '/widgets/class-info-text-card.php');
            // require_once(__DIR__ . '/widgets/class-calltoaction.php');
            // require_once(__DIR__ . '/widgets/class-testimonial.php');

            $widgets_manager->register( new \Blogradient_Buttons_Widget() );
            $widgets_manager->register( new \Blogradient_Title_Widget() );
            $widgets_manager->register( new \Blogradient_Link_Widget() );
            // $widgets_manager->register( new \Blogradient_Card_Widget() );
            // $widgets_manager->register( new \Blogradient_CTA_Widget() );
            // $widgets_manager->register( new \Blogradient_Testimonial_Widget() );

        }
    }

    \Blogradient_Elementor_Extension::instance();