<?php

namespace yt1300;


class mobile_sidebar {

    function __construct() {
        if ( wp_is_mobile() ) {
            add_action( 'wp_enqueue_scripts', array( $this, 'slideout' ) );
            add_action( 'wp_head', array( $this, 'social_hover' ) );
        }
        add_action( 'widgets_init', array($this, 'mobile_widget_area'));
    }
    /**
     * Enqueue sidr CSS/JS
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function slideout() {
        //get the user choice for slideout-sidebar theme
        $theme = $this->theme();
        //add css and js
        wp_enqueue_script( 'slideout-sidebar', get_stylesheet_directory_uri().'/js/yt1300.slideout.min.js', array('jquery'), null, true );
        wp_enqueue_style( 'sidr', get_stylesheet_directory_uri().'/css/jquery.sidr.'.$theme.'.css');
    }

    /**
     * Register a mobile sidebar
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    function mobile_widget_area()  {
        register_sidebar( array(
            'name'          => __( 'Mobile Sidebar', 'yt1300' ),
            'id'            => 'sidebar-mobile',
            'description'   => __( 'Slideout sidebar for mobile devices.', 'yt1300' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s mobile-widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
            ) );
    }

    /**
     *  The mobile header
     *
     * @package yt1300
     * @since 0.2
     * @author Josh Pollock
     */
    static function header() { ?>
        <header id="masthead" class="site-header" role="banner">
            <div class="header-main">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( ! empty ( $description ) ) :
                        ?>
                        <h2 class="topbar-description"><?php echo esc_html( $description ); ?></h2>
                    <?php endif; ?>
            </div>
            <a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
            <a id="menu-toggle"  class="second" title="<?php _e( 'Click To Show Sidebar', 'yt1300' ); ?>" href="#"><span class="genericon genericon-menu"></span></a>
        </header><!-- #masthead -->
    <?php
    }
    /**
    * Get the user's choice of sidr theme. Default
    *
    * @package yt1300
    * @since 1.0.0
    * @author Josh Pollock
    */
    function theme() {
        //get the user choice for slideout-sidebar theme
        //if !isset use dark
        $theme = get_theme_mod( "sidr_theme", "dark" );
        return $theme;
    }

    /**
     * Output inline style for social links hover color dependent on theme.
     *
     * @package yt1300
     * @since 1.0.0
     * @author Josh Pollock
     */
    function social_hover() {
        //set the color based on the them
        if ( $this->theme() === "dark" ) {
            $hover = "white";
        }
        else {
            $hover = "black";
        }
        $out = '<style>#secondary-mobile #top-social .genericon:hover {color: ';
        $out .= $hover;
        $out .= ';}</style>';
        echo $out;
    }
}

new mobile_sidebar();