<?php
/**
 * Created by PhpStorm.
 * User: josh
 * Date: 12/10/13
 * Time: 12:52 AM
 */

namespace yt1300_slidebar;


class slidebar {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array($this, 'sidr' ) );
        add_action( 'wp_footer', array($this, 'make_it_so') );
    }
    /**
     * Enqueue sidr CSS/JS
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function sidr() {
        wp_enqueue_script( 'pagelslide', get_stylesheet_directory_uri().'/js/jquery.sidr.min.js', array('jquery'), null, true );
        wp_enqueue_style( 'sidr', get_stylesheet_directory_uri().'/css/jquery.sidr.dark.css');
    }

    /**
     * The script to output to footer if is_mobile to make this.
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function make_it_so() {
        echo "
            <script>
                jQuery(document).ready(function($) {
                   $('#sidr-toggle').sidr({
                      name:     'secondary',
                      source:   '#seconday',
                      side:     'right',
                   });
                });
            </script>";

    }
}

new slidebar();