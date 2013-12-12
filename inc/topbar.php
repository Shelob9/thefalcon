<?php


class topbar {

    function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'script_style') );
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

    static function header_main() { ?>
        <header id="masthead" class="site-header" role="banner">
            <div id="big-top">
                <div class="header-main">
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                </div>
                <div id="top-social">
                   <?php echo self::social(); ?>
                </div>
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
            </nav>

        </header><!-- #masthead -->
    <?php
    }

    function social() {
        //get all theme mods at once in $mods
        $mods = get_theme_mods('yt1300');
        //build output
        $out = '<div class="social">';
        if ( $mods['twitter'] != '' ) {
            $out .= '<span class="genericon genericon-twitter"><a href="';
            $out .= esc_url( $mods['twitter']);
            $out .='"></a></span>';
        }
        if ( $mods['googleplus'] !='' ) {
            $out .= '<span class="genericon genericon-googleplus"><a href="';
            $out .= esc_url( $mods['googleplus']);
            $out .='"></a></span>';
        }
        if ( $mods['linkedin'] !='' ) {
            $out .= '<span class="genericon genericon-linkedin"><a href="';
            $out .= esc_url( $mods['linkedin']);
            $out .='"></a></span>';
        }
        if ( $mods['facebook'] !='' ) {
            $out .= '<span class="genericon genericon-facebook"><a href="';
            $out .= esc_url( $mods['facebook']);
            $out .='"></a></span>';
        }
        $out .= '</div';
        //return social
        return $out;
    }

}

new topbar();

    function yt1300_header() {
        if ( !wp_is_mobile() ) {
            return topbar::header_main();
        }
    }
