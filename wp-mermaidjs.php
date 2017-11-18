<?php
/*
Plugin Name: MermaidJS for Wordpress
Plugin URI: https://github.com/bruskiza/wp-mermaidjs
Version: 0.0.1
Author: Bruce McIntyre
Description: Combining the convenience of Wordpress with the convenience of MermaidJS
*/

/* Add the javascript and the css */
function wpmjs_load() {
  wp_enqueue_style('mermaid-forest', 'https://mermaidjs.github.io/styles/mermaid.forest.min.css');
  wp_enqueue_script('mermaid', 'https://unpkg.com/mermaid@7.1.0/dist/mermaid.min.js', '', '', true);
  wp_enqueue_script('mermaidwp', plugin_dir_url( __FILE__ ) . "js/wp-mermaid.js", '', '', true);


}

/* mermaid shortcode: this produces the correct-ish code for mermaid */
function wpmjs_diagram( $atts, $content ) {
  $mcontent = preg_replace( '%<p>&nbsp;\s*</p>%', '', $content );
  $mcontent = str_replace("<br />", "", $mcontent);
  $mcontent = str_replace("</p>", "", $mcontent);
  $mcontent = str_replace("<p>", "", $mcontent);
  $mcontent = $atts["type"] . "\t" . $mcontent;
  $mcontent = str_replace("&#8211;", "-", $mcontent);
  $mcontent = str_replace("&#8230;", "...", $mcontent);
  $mcontent = str_replace("&#8212;", "--", $mcontent);
  $mcontent = urldecode($mcontent);
  $content = "";
  error_log("Got content:\n\n\n" . $mcontent . "\n\n\n");
  return "<pre><code class=\"lang-mermaid\">" . $mcontent . "</code></pre>";

}

/* Add the actions and tell wordpress */
add_action('wp_enqueue_scripts', 'wpmjs_load');
add_shortcode('mermaid', 'wpmjs_diagram');
