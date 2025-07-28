<?php
function kursach_help_scripts()
{
    wp_enqueue_style('kursach-help-style', get_stylesheet_uri());
    wp_enqueue_script('kursach-help-script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'kursach_help_scripts');
?>