<?php


class topbar {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'script_style') );
        add_action( 'widgets_init', array($this, 'top_widget') );
    }

    function script_style() {
        wp_enqueue_script( 'yt1300-topbar', get_stylesheet_directory_uri().'/js/yt1300.topbar.min.js', array('jquery'), false, true );
        wp_enqueue_style( 'yt300-topbar', get_stylesheet_directory_uri().'/css/yt1300.topbar.css' );
    }

    function top_widget() {
        register_sidebar( array(
            'name'          => __( 'Topbar', 'yt1300' ),
            'id'            => 'sidebar-tb',
            'description'   => __( 'A small sidebar area in the topbar, great for social profile links.', 'yt1300' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ) );

    }


}

new topbar();
