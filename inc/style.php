<?php

$pri = get_theme_mod( 'nwp_setting_color-pri', '#00395f' );
$pri_light = get_theme_mod( 'nwp_setting_color-pri-light', '#0167ab' );
$pri_dark = get_theme_mod( 'nwp_setting_color-pri-dark', '#001e31' );
$pri_white = get_theme_mod( 'nwp_setting_color-pri-white', '#f8fcfd' );
$font_size = get_theme_mod( 'nwp_setting_text-font-size', '16px' );
$line_height = get_theme_mod( 'nwp_setting_text-line-height', '20px' );

return <<<CSS
:root {
	/* Color */
	--pri: $pri;
	--pri-light: $pri_light;
	--pri-dark: $pri_dark;
	--pri-white: $pri_white;
	--sec: ;
	--sec-light: ;
	--sec-dark: ;
	--black: rgb(56, 56, 56);
	--gray: rgb(153, 153, 153);
	--white: rgb(255, 255, 255);

	/* Text */
	--font-size: $font_size;
	--line-height: $line_height;
	/* component */
	--nav-height: 52px;

	--border-radius: .25rem;
}

CSS;

?>