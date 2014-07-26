<?php
/*
Plugin Name: WooCommerce Toolbar
Plugin URI: http://www.moskatus.com.br/
Description: WooCommerce Toolbar
Author: Moskatus
Author URI: http://www.moskatus.com.br
Version: 1.0.0

*/

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
	if ( ! class_exists( 'WC_Toolbar' ) ) {
		
		/**
		 * Localisation
		 **/
		load_plugin_textdomain( 'wc_toolbar', false, dirname( plugin_basename( __FILE__ ) ) . '/' );

		class WC_Toolbar {
			public function __construct() {
				add_action('woo_main_before', array(&$this,'toolbar'));
                                
                                
                                // Load public-facing style sheet and JavaScript.
                                add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
                                add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
 
				// indicates we are running the admin
				if ( is_admin() ) {
					// ...
				}
				
				// indicates we are being served over ssl
				if ( is_ssl() ) {
					// ...
				}
    
				// take care of anything else that needs to be done immediately upon plugin instantiation, here in the constructor
			}
                            public function toolbar() {
                        if (is_front_page() or is_product() or is_product_category()) {
                        include 'toolbar.php';
                        } // END IF
                        } // END wooninja_add_homepage_welcome()                        
                                                    
                        
			/**
			 * Take care of anything that needs woocommerce to be loaded.  
			 * For instance, if you need access to the $woocommerce global
			 */
			public function woocommerce_loaded() {
                                        
                        }
			
			/**
			 * Take care of anything that needs all plugins to be loaded
			 */
			public function plugins_loaded() {
			    
			}
			
			
                        public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles4', plugins_url( 'assets/css/toolbar.css', __FILE__ ), array() );

                }

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
                wp_enqueue_script( $this->plugin_slug . '-plugin-script4', plugins_url( 'assets/js/toolbar.js', __FILE__ ), array( 'jquery' ) );
                        
        
        }       

		}

		// finally instantiate our plugin class and add it to the set of globals
		$GLOBALS['wc_toolbar'] = new WC_Toolbar();
	}
}
