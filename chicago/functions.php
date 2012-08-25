<?php

add_theme_support( 'post-thumbnails' );
add_image_size( 'featured-image',600, 350, true );

add_action( 'wp_enqueue_scripts', 'tgm_chicago_enqueue_scripts' );
function tgm_chicago_enqueue_scripts() {

	wp_register_script( 'tgm-chicago', get_template_directory_uri() . '/base.js', array( 'jquery', 'tgm-click-copy' ), '1.0.0', true );
	wp_register_script( 'tgm-click-copy', get_template_directory_uri() . '/clip.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'tgm-chicago' );
	wp_enqueue_script( 'tgm-click-copy' );
	wp_localize_script( 'tgm-chicago', 'tgmch', array( 'url' => get_template_directory_uri() ) );

}

add_action( 'wp', 'tgm_chicago_dequeue_git', 20 );
function tgm_chicago_dequeue_git() {

	if ( wp_style_is( 'embed_github_gist_from_gist', 'queue' ) )
		wp_dequeue_style( 'embed_github_gist_from_gist' );

}