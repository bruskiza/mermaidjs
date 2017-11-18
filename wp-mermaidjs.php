<?php
/*
Plugin Name: MermaidJS for Wordpress
Plugin URI: https://github.com/bruskiza/wp-mermaidjs
Version: 0.0.1
Author: Bruce McIntyre
Description: Combining the convenience of Wordpress with the convenience of MermaidJS
*/


add_action('wp_enqueue_scripts', 'wpmjs_load');

function wpmjs_load() {
  wp_enqueue_script('mermaid', 'https://unpkg.com/mermaid@7.1.0/dist/mermaid.min.js', '', '', true);
  wp_enqueue_script('mermaidwp', plugin_dir_url( __FILE__ ) . "js/wp-mermaid.js", '', '', true);

}

function wpmjs_run() {

}
