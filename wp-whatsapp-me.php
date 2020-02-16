<?php
/**
 * Plugin Name:       WP Whatsapp Me
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Send a whatsapp message from your Wordpress website
 * Version:           1.0.0
 * Requires at least: 4.5.13
 * Requires PHP:      5.6
 * Author:            Marcello Perri
 * Author URI:        http://webmarcello.co.uk
 */

define('PLUGINWMEBASENAME', plugin_basename(__FILE__) );

foreach ( glob( plugin_dir_path( __FILE__ ) .'classes/*.php') as $filename)
{
    include_once $filename;
}

function wp_whatsapp_me_loader(){
    if( is_admin() ){
        $wpWhatsappMeAdmin = new WpWhatsappMeAdmin;
    }
    $wpWhatsappMeShortcode = new WpWhatsappMeShortcode;
}
add_action('plugins_loaded', 'wp_whatsapp_me_loader');

 /* create widjet */

 /* setting plugin in wordpress website */