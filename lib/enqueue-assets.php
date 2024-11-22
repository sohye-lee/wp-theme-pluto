<?php 

function pluto_assets() {
    wp_enqueue_style( 'pluto-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'pluto-scripts', get_template_directory_uri() . '/dist/assets/js/bundle.js', array(),  true );
}
add_action( 'wp_enqueue_scripts', 'pluto_assets' );

function pluto_admin_assets() {
    wp_enqueue_style( 'pluto-admin-stylesheet', get_template_directory_uri() . '/dist/assets/css/admin.css', array(), '1.0.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'pluto_admin_assets' );

?>