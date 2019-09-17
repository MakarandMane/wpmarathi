<?php
/*
Plugin Name: WPMarathi - Type in Matathi in WordPress
Plugin URI: https://plugins.gallery
Description: Type in Marathi inside WordPress. Hello -> हॅलो. WPMarathi helps you save time by letting you type inside Classic Editor and Gutenberg in Marathi.
Author: Tyche Ventures
Author URI: https://tycheventures.com
Version: 1.4.0
Requires at least: 5.0
*/

include(plugin_dir_path(__FILE__).'constant.php');
include(plugin_dir_path(__FILE__).'class/wpmarathi-transliterator.php');
include(plugin_dir_path(__FILE__).'class/wpmarathi-deactivation-feedback.php');

add_action( 'admin_enqueue_scripts', function($hook){
    new WPGenius_Transliterator($hook);
    new WPMarathi_Deactivation_Feedback($hook);
});

/*
    Enqueue Required FrontEnd Scripts.
*/
add_action( 'wp_enqueue_scripts', function($hook){
    wp_enqueue_style('wpmarthi-frontend',
        plugin_dir_url(__FILE__).'/assets/css/wpmarathi-frontend.css',
        null,
        WPMARATHI_VERSION
    );
});