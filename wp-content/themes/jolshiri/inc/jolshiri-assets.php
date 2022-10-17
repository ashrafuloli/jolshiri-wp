<?php

/**
 * Theme Css and Js
 */
function jolshiri_scripts() {
	// all css files
//	wp_enqueue_style( 'jolshiri-fonts', jolshiri_fonts_url(), array(), '1.0.1' );
	wp_enqueue_style( 'animate', JOLSHIRI_THEME_CSS_DIR . 'animate.css', array() );
	wp_enqueue_style( 'fontawesome', JOLSHIRI_THEME_CSS_DIR . 'fontawesome.min.css', array() );
	wp_enqueue_style( 'bootstrap', JOLSHIRI_THEME_CSS_DIR . 'bootstrap.min.css', array() );
	wp_enqueue_style( 'jolshiri-spacing', JOLSHIRI_THEME_CSS_DIR . 'spacing.css', array() );
	wp_enqueue_style( 'slick', JOLSHIRI_THEME_CSS_DIR . 'slick.css', array() );
	wp_enqueue_style( 'aos', JOLSHIRI_THEME_CSS_DIR . 'aos.css', array() );
	wp_enqueue_style( 'meanmenu', JOLSHIRI_THEME_CSS_DIR . 'meanmenu.css', array() );
//	wp_enqueue_style( 'nice-select', JOLSHIRI_THEME_CSS_DIR . 'nice-select.css', array() );
	wp_enqueue_style( 'venobox', JOLSHIRI_THEME_CSS_DIR . 'venobox.min.css', array() );
	wp_enqueue_style( 'jolshiri-main', JOLSHIRI_THEME_CSS_DIR . 'main.css', array() );
	wp_enqueue_style( 'jolshiri-style', get_stylesheet_uri() );

	// all js files
	wp_enqueue_script( 'popper', JOLSHIRI_THEME_JS_DIR . 'popper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap', JOLSHIRI_THEME_JS_DIR . 'bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick', JOLSHIRI_THEME_JS_DIR . 'slick.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'meanmenu', JOLSHIRI_THEME_JS_DIR . 'jquery.meanmenu.min.js', array( 'jquery' ), '', true );
//	wp_enqueue_script( 'nice-select', JOLSHIRI_THEME_JS_DIR . 'jquery.nice-select.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'venobox', JOLSHIRI_THEME_JS_DIR . 'venobox.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'aos', JOLSHIRI_THEME_JS_DIR . 'aos.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jolshiri-main', JOLSHIRI_THEME_JS_DIR . 'script.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'jolshiri_scripts' );


/**
 * Register Google Fonts
 * @return string
 */
function jolshiri_fonts_url() {
	$font_url = '';

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'jolshiri' ) ) {
		$font_url = '//fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Mono:wght@300;400;500;600;700&display=swap';
	}

	return $font_url;
}