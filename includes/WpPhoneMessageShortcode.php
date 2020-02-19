<?php
if ( !class_exists( 'WpPhoneMessageShortcode' ) ) {

    class WpPhoneMessageShortcode {

        public function __construct(){
            add_action( 'init', array( $this, 'registerShortcode' ));
            add_action( 'wp_enqueue_scripts', array( $this, 'shortcodeStyle' ) );
        }

        public function registerShortcode(){
            add_shortcode('wp-phone-message', array( $this, 'renderShortcode' ));
        }

        public function renderShortcode($atts){
            include_once( PLUGINWMEPATH . 'views/shortcode-form.php' );
        }

        public function shortcodeStyle(){
            wp_enqueue_style('wp-phone-message-shortcode', PLUGINWMEURL . 'css/shortcode.css', array(), null, 'all' );
            wp_enqueue_script('wp-phone-message-shortcode', PLUGINWMEURL . 'js/shortcode.js' );
        }
    }
}