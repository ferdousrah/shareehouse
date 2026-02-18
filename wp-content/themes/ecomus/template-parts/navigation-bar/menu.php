<?php
/**
 * Template file for displaying hamburger menu in mobile navigation bar
 *
 * @package Ecomus
 */
\Ecomus\Theme::set_prop( 'panels', 'hamburger' );
?>
<a href="#" class="ecomus-mobile-navigation-bar__icon em-button em-button-icon em-button-light em-flex em-flex-column em-flex-align-center em-flex-center em-font-semibold" data-toggle="off-canvas" data-target="mobile-menu-panel">
	<?php echo \Ecomus\Icon::get_svg( 'hamburger', 'ui' ); ?>
	<span><?php echo esc_html__( 'Menu', 'ecomus' ); ?></span>
</a>
