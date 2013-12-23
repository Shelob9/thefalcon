<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

if ( ! wp_is_mobile() ) : ?>
<div id="secondary">
	<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( ! empty ( $description ) ) :
	?>
	<h2 class="site-description"><?php echo esc_html( $description ); ?></h2>
	<?php endif; ?>

	<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
<?php else : ?>
    <div id="secondary-mobile" class="sidr">
        <?php echo \yt1300\topbar::social(); ?>
        <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( ! empty ( $description ) ) :
                ?>
                <h2 class="site-description"><?php echo esc_html( $description ); ?></h2>
            <?php endif; ?>

        <?php if ( has_nav_menu( 'secondary' ) ) : ?>
            <h5><?php _e( 'Menu', 'yt1300' ); ?></h5>
            <nav role="navigation" class="navigation site-navigation secondary-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
            </nav>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'sidebar-mobile' ) ) : ?>
            <div id="mobile-sidebar" class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-mobile' ); ?>
            </div><!-- #primary-sidebar -->
        <?php endif; ?>
    </div><!-- #secondary -->
    </div><!-- #modal -->
<?php endif; ?>