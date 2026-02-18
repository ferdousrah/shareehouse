<?php
/**
 * Template part for displaying Flash Sale button in header
 *
 * @package Ecomus
 */
?>

<div class="header-flash-sale">
	<a href="<?php echo esc_url( home_url( '/flash-sale/' ) ); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
			<path d="M12 2L14.09 8.26L20 9.27L15.55 13.97L16.91 20L12 16.9L7.09 20L8.45 13.97L4 9.27L9.91 8.26L12 2Z" fill="url(#gold-grad)" stroke="url(#gold-grad)" stroke-width="0.5"/>
			<defs>
				<linearGradient id="gold-grad" x1="4" y1="2" x2="20" y2="20">
					<stop offset="0%" stop-color="#F7971E"/>
					<stop offset="100%" stop-color="#DAA520"/>
				</linearGradient>
			</defs>
		</svg>
		FLASH SALE
	</a>
</div>
