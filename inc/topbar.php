<?php


class topbar {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'script_style') );
        add_action( 'widgets_init', array($this, 'top_widget') );
    }

    function script_style() {

    }

    function top_widget() {

    }


}

new topbar();
