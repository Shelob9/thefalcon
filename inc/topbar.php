<?php

    //namespace yt1300;

class yt1300_topbar {

    function __construct() {
        if ( !wp_is_mobile() ) {
            add_action( 'wp_enqueue_scripts', array( $this, 'script_style') );
            add_action( 'wp_head', array( $this, 'small_fix') );
            add_filter( 'twentyfourteen_custom_header_args', array( $this, 'custom_header_cb' ) );
        }
    }

    /**
     * Scripts and styles for the non-mobile topbar.
     *
     * @package yt1300
     * @since 0.1
     * @author Josh Pollock
     */
    function script_style() {
        wp_enqueue_script( 'yt1300-topbar', get_stylesheet_directory_uri().'/js/yt1300.topbar.min.js', array('jquery'), false, true );
        wp_enqueue_style( 'yt300-topbar', get_stylesheet_directory_uri().'/css/yt1300.topbar.css' );
    }

    /**
     * The non-mobile topbar
     *
     * @package yt1300
     * @since 0.1
     * @author Josh Pollock
     */
    static function header() { ?>
        <header id="masthead" class="site-header" role="banner">
            <div id="big-top">
                <div class="header-main">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                        if ( get_header_image() ) {
                            self::logo();
                        }
                    ?>
                </div>
                   <?php echo self::social(); ?>
            </div>

            <nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">

                <a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'topbar-menu', ) ); ?>
                <div class="search-toggle">
                    <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
                </div>
                <div id="search-container" class="search-box-wrapper hide">
                    <div class="search-box">
                        <?php get_search_form(); ?>
                    </div>
                </div>
                <h1 class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></h1>
            </nav>

        </header><!-- #masthead -->
    <?php
    }

    /*
    * Social Icons for topbar
    * @package yt1300
    * @since 0.1
    * @author Josh Pollock
    */
    static function social() {
        //get all theme mods at once in $mods
        $mods = get_theme_mods();
        //check that mods are set, if not, abandon ship.
        if ( $mods != false ) {
            //create array to loop through when we create our output
            $profiles = array('twitter', 'googleplus', 'linkedin', 'facebook');
            //build output
            //start by wrapping in #top-social
            $out = '<div id="top-social">';
            //
            $overP = apply_filters( '_sf2_social_profiles', $profiles );
            if ( is_array( $overP ) ) {
                $profiles = $overP;
            }
            //loop for each social network
            foreach ( $profiles as $profile) {
                if ($mods[$profile] != '') {
                    $out .= '<a href="';
                    $out .= esc_url($mods[$profile]);
                    $out .= '"><span class="genericon genericon-' . $profile . '"></span></a>';
                }
            }
            //close the wrap
            $out .= '</div>';
            //return social
            return $out;
        }
    }

    /**
     * Some topbar fixes in case screen is condensed not on mobile
     *
     */
    function small_fix() {
        echo '
        <style>
                @media screen and (min-width: 768px) {
                    .topbar-menu, .search-toggle {
                    display: inline-block; }
                    nav#primary-navigation {
                    background: transparent; }
                }
                @media screen and (max-width: 768px) {
                    .topbar-menu {
                    display: block;
                    background-color: black; }
                    .primary-navigation.toggled-on {
                    display: block;
                    padding: 48px 0 0 0px; }
                    .nav-toggled {
                    padding-top: 48px !important;
                    padding-left: 0px !important; }
                    .search-toggle {
                    display:none;}
                    #top-social{
                    width: inherit;
                    margin-left: 10px;}
                }

        </style>
    ';
    }

    /**
     * Puts logo in topbar
     *
     * @package yt1300
     * @since 1.1.0
     * @author Josh Pollock
     */
    function logo() {
         ?>
            <div id="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" alt="Site Logo">
                </a>
            </div>
        <?php
    }

    /**
     * Custom header args filter callback
     *
     * @package yt1300
     * @since 1.1.0
     * @author Josh Pollock
     */
    function custom_header_cb() {
        $args = array(
            'default-text-color'     => 'fff',
            'width'                  => 300,
            'height'                 => 40,
            'flex-height'            => false,
            'wp-head-callback'       => array( $this, 'header_style' ),
            'admin-head-callback'    => array( $this, 'admin_header_style' ),
            'admin-preview-callback' => array( $this, 'admin_header_image' ),
        );
        return $args;
    }

    /**
     * Header style cb
     *
     * @todo Do we need this?
     *
     * @package yt1300
     * @since 1.1.0
     * @author Josh Pollock
     */
    function header_style() {

    }

    /**
     * Admin header style cb
     *
     * @package yt1300
     * @since 1.1.0
     * @author Josh Pollock
     */
    function admin_header_style() {
        ?>
        <style type="text/css" id="twentyfourteen-admin-header-css">
            .appearance_page_custom-header #headimg {
                background-color: #000;
                border: none;
                max-width: 1260px;
                height: 88px;
            }
            #headimg h1 {
                font-family: Lato, sans-serif;
                font-size: 18px;
            }
            #headimg h1 a {
                color: #fff;
                text-decoration: none;
            }
            #logo, #title {
                display: inline-block;
            }
            #logo img {
                margin: 40px 8px 0;
                height: 40px;
            }
            #title {
                margin: 0 0 0 30px;
            }
            .warn {
                background-color:red;
                color: white;
                padding: 6px;
            }
        </style>
    <?php

    }

    /**
     * Admin header preview
     *
     * @package yt1300
     * @since 1.1.0
     * @author Josh Pollock
     */
    function admin_header_image() { ?>
        <div id="headimg">
            <div id="title">
                <h1 class="displaying-header-text"><a id="name"<?php echo sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            </div>
            <?php if ( get_header_image() ) : ?>
                <div id="logo">
                    <img src="<?php header_image(); ?>" alt="">
                </div>
            <?php endif; ?>
        </div>
       <div class="warn">
           <Strong>Note:</Strong> The header image is used as logo and the height of 40px is enforced via an !important CSS declaration. Use a header image of a diffrent height at your own risk.
       </div>
    <?php
    }

}

new yt1300_topbar();

