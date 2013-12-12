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
        wp_enqueue_script( 'pagelslide', get_stylesheet_directory_uri().'/js/jquery.pageslide.min.js', array('jquery'), null, true );
        wp_enqueue_style( 'pageslide', get_stylesheet_directory_uri().'/css/jquery.pageslide.css');
    }

    /**
     * The script to output to footer if is_mobile to make this.
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function make_it_so() {
        echo '
            <script>
                jQuery(document).ready(function($) {
                    $(".second").pageslide({ direction: "left", modal: true });
                });
            </script>';

    }
}

new slidebar();