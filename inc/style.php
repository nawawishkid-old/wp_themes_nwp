<?php

$pri = get_theme_mod( 'nwp_cssvar_pri', '#0096ff' );
$pri_light = get_theme_mod( 'nwp_cssvar_pri-light', '#00aaff' );
$pri_dark = get_theme_mod( 'nwp_cssvar_pri-dark', '#0078c8' );
$font_size = get_theme_mod( 'nwp_cssvar_font-size', '16px' );
$line_height = get_theme_mod( 'nwp_cssvar_line-height', '20px' );

return <<<CSS
:root {
	/* color */
	--pri: $pri;
	--pri-light: $pri_light;
	--pri-dark: $pri_dark;
	--sec: ;
	--sec-light: ;
	--sec-dark: ;
	--black: rgb(56, 56, 56);
	--gray: rgb(153, 153, 153);
	--white: rgb(255, 255, 255);
	/* font */
	--font-size: $font_size;
	--line-height: $line_height;
	/* component */
	--nav-height: 52px;

	--border-radius: .25rem;
}

CSS;

?>