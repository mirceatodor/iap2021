<?php

function add_theme_scripts() {
    wp_enqueue_style( 'style', untrailingslashit( get_template_directory_uri() ) . '/dist/css/style.css' );
    wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700&display=swap', false ); 
    wp_enqueue_script( 'slick', untrailingslashit( get_template_directory_uri() ) . '/src/js/slick.js', ['jquery'], true );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


function add_slick() {
    wp_enqueue_script( 'slick', untrailingslashit( get_template_directory_uri() ) . '/src/js/slick.js', ['jquery'], true );
}
add_action( 'wp_enqueue_scripts', 'add_slick' );