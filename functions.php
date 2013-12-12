<?php
/**
 * Child theme function
 *
 * @package yt1300
 * @since 0.1
 * @author Josh Pollock http://JoshPress.net
 * @license GPLv2+
 */
    
/**
 * Add controls/ settings for background colors ans social links
 *
 * @package yt1300
 * @since 0.1
 * @author Josh Pollock
 */
 function yt1300_customizer() {
     global $wp_customize;
     //add sections
     $wp_customize->add_section( 'yt1300_gradient_bg', array(
         'title'          => __('Gradient Background Colors', 'yt1300'),
         'priority'       => 35,
     ) );
     //star
     $wp_customize->add_section( 'yt1300_social', array(
         'title'          => __('Social Links For Header', 'yt1300'),
         'priority'       => 45,
     ) );
     $wp_customize->add_setting( 'gradient_start', array(
         'default'        => '#000',
     ) );
     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gradient_start', array(
         'label'   => __('Gradient Start Color', 'yt1300'),
         'section' => 'yt1300_gradient_bg',
         'settings'   => 'gradient_start',
     ) ) );
    //end color
     $wp_customize->add_setting( 'gradient_end', array(
         'default'        => '#F5F5F5',
     ) );

     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gradient_end', array(
         'label'   => __('Gradient End Color', 'yt1300'),
         'section' => 'yt1300_gradient_bg',
         'settings'   => 'gradient_end',
     ) ) );
     //Create Text fields for social with a loop
     $socials = array(
         array(
             'label'     => 'Facebook Profile or Page',
             'name'      => 'facebook',
         ),
         array(
             'label'     => 'Twitter Profile',
             'name'      => 'twitter',
         ),
         array(
             'label'     => 'Google Plus Profile',
             'name'      => 'googleplus',
         ),
         array(
             'label'     => 'LinkedIn Profile',
             'name'      => 'linkedin',
         ),
     );
     foreach ( $socials as $social ) {
         $wp_customize->add_setting( $social['name'], array(
         ) );
         $wp_customize->add_control( $social['name'], array(
             'label'   => __($social['label'], 'yt1300'),
             'section' => 'yt1300_social',
             'settings'   => $social['name'],
         ) );

     }
 }
add_action( 'customize_register', 'yt1300_customizer' );

/**
 * Add gradient background with colors set in bg_colors() as inline style in heades
 *
 * @package yt1300
 * @since 0.1
 * @author Josh Pollock
 */

function yt1300_falcon_style() {
    //get colors
    $start = get_theme_mod( 'gradient_start', '#000' );
    $end = get_theme_mod( 'gradient_end', '#F5F5F5');
    //set up custom style
    $custom_css = "
            .site:before, body{
                    background-image: -webkit-gradient(linear,left bottom,right bottom,color-stop(0,{$start}),color-stop(1,{$end}));
                    background-image: -o-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: -moz-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: -webkit-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: -ms-linear-gradient(right,{$start} 0%,{$end} 100%);
                    background-image: linear-gradient(to right,{$start} 0%,{$end} 100%);
            }";
    //print for header
    echo '<style>'.$custom_css.'</style>';
}
add_action( 'wp_head', 'yt1300_falcon_style' );

/**
 * Include functions for fancier topbar
 *
 * @package yt1300
 * @since 0.1
 * @author Josh Pollock
 */
include( 'inc/topbar.php' );

/**
 * Add Slidein sidebar functionality
 *
 * @package yt1300
 * @since 0.2
 * @author Josh Pollock
 */
 include_once('inc/mobile_sidebar.php');

?>