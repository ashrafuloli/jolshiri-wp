<?php
/**
 * Jolshiri customizer
 *
 * @package jolshiri
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Added Panels & Sections
 */
function jolshiri_customizer_panels_sections( $wp_customize ) {

	//Add panel
	$wp_customize->add_panel( 'jolshiri_customizer', array(
		'priority' => 10,
		'title'    => esc_html__( 'Jolshiri Customizer', 'jolshiri' ),
	) );


	/**
	 * Customizer Section
	 */

	$wp_customize->add_section( 'section_header_logo', array(
		'title'       => esc_html__( 'Header Setting', 'jolshiri' ),
		'description' => '',
		'priority'    => 12,
		'capability'  => 'edit_theme_options',
		'panel'       => 'jolshiri_customizer',
	) );

//	$wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'jolshiri' ),
//        'description' => '',
//        'priority'    => 13,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'jolshiri_customizer',
//    ));
//
//    $wp_customize->add_section('header_side_setting', array(
//        'title'       => esc_html__( 'Side Info', 'jolshiri' ),
//        'description' => '',
//        'priority'    => 14,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'jolshiri_customizer',
//    ));

//    $wp_customize->add_section('breadcrumb_setting', array(
//        'title'       => esc_html__( 'Breadcrumb Setting', 'jolshiri' ),
//        'description' => '',
//        'priority'    => 15,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'jolshiri_customizer',
//    ));

//    $wp_customize->add_section('blog_setting', array(
//        'title'       => esc_html__( 'Blog Setting', 'jolshiri' ),
//        'description' => '',
//        'priority'    => 16,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'jolshiri_customizer',
//    ));

	$wp_customize->add_section('footer_social', array(
		'title'       => esc_html__( 'Footer Social', 'jolshiri' ),
		'description' => '',
		'priority'    => 15,
		'capability'  => 'edit_theme_options',
		'panel'       => 'jolshiri_customizer',
	));

	$wp_customize->add_section( 'footer_setting', array(
		'title'       => esc_html__( 'Footer Settings', 'jolshiri' ),
		'description' => '',
		'priority'    => 16,
		'capability'  => 'edit_theme_options',
		'panel'       => 'jolshiri_customizer',
	) );

//    $wp_customize->add_section('color_setting', array(
//        'title'       => esc_html__( 'Color Setting', 'jolshiri' ),
//        'description' => '',
//        'priority'    => 17,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'jolshiri_customizer',
//    ));
//
//    $wp_customize->add_section('404_page', array(
//        'title'       => esc_html__( '404 Page', 'jolshiri' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'jolshiri_customizer',
//    ));
//
//    $wp_customize->add_section('rtl_setting', array(
//        'title'       => esc_html__( 'RTL Setting', 'jolshiri' ),
//        'description' => '',
//        'priority'    => 18,
//        'capability'  => 'edit_theme_options',
//        'panel'       => 'jolshiri_customizer',
//    ));

}

add_action( 'customize_register', 'jolshiri_customizer_panels_sections' );


/*
Footer Social
 */
function _footer_social_fields( $fields ) {
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_fb_url',
		'label'    => esc_html__( 'Facebook Url', 'jolshiri' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '#', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_instagram_url',
		'label'    => esc_html__( 'Instagram Url', 'jolshiri' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '#', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_linkedin_url',
		'label'    => esc_html__( 'Linkedin Url', 'jolshiri' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '#', 'jolshiri' ),
		'priority' => 10,
	);



	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_twitter_url',
		'label'    => esc_html__( 'Twitter Url', 'jolshiri' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_youtube_url',
		'label'    => esc_html__( 'Youtube Url', 'jolshiri' ),
		'section'  => 'footer_social',
		'default'  => esc_html__( '', 'jolshiri' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_footer_social_fields' );

/*
Header Settings
 */
function _header_header_fields( $fields ) {

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'logo',
		'label'       => esc_html__( 'Header Logo', 'jolshiri' ),
		'description' => esc_html__( 'Upload Your Logo.', 'jolshiri' ),
		'section'     => 'section_header_logo',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png'
	);

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'secondary_logo',
		'label'       => esc_html__( 'Header Second Logo', 'jolshiri' ),
		'description' => esc_html__( 'Header Black Logo', 'jolshiri' ),
		'section'     => 'section_header_logo',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png'
	);

	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'favicon_url',
		'label'       => esc_html__( 'Favicon', 'jolshiri' ),
		'description' => esc_html__( 'Favicon Icon', 'jolshiri' ),
		'section'     => 'section_header_logo',
		'default'     => get_template_directory_uri() . '/assets/img/logo/favicon.png'
	);


	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'jolshiri_header_button',
		'label'    => esc_html__( 'Header Button On/Off', 'jolshiri' ),
		'section'  => 'section_header_logo',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'jolshiri' ),
			'off' => esc_html__( 'Disable', 'jolshiri' ),
		],
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_header_button_text',
		'label'    => esc_html__( 'Button Text', 'jolshiri' ),
		'section'  => 'section_header_logo',
		'default'  => 'Get Started',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_header_button_link',
		'label'    => esc_html__( 'Button Link', 'jolshiri' ),
		'section'  => 'section_header_logo',
		'default'  => '#',
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_header_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {
	// side info settings
	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'jolshiri_hamburger_hide',
		'label'    => esc_html__( 'Show Hamburger On/Off', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'jolshiri' ),
			'off' => esc_html__( 'Disable', 'jolshiri' ),
		],
	);
	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'jolshiri_extra_info_logo',
		'label'       => esc_html__( 'Logo Side', 'jolshiri' ),
		'description' => esc_html__( 'Logo Side', 'jolshiri' ),
		'section'     => 'header_side_setting',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.png'
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_extra_about_title',
		'label'    => esc_html__( 'About Us Title', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'About Us Title', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'settings' => 'jolshiri_extra_about_text',
		'label'    => esc_html__( 'About Us Desc..', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'About Us Desc...', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_extra_button',
		'label'    => esc_html__( 'Button Text', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'Contact Us', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_extra_button_url',
		'label'    => esc_html__( 'Button URL', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( '#', 'jolshiri' ),
		'priority' => 10,
	);
	// contact
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_contact_title',
		'label'    => esc_html__( 'Contact Title', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'Contact Title', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_extra_address',
		'label'    => esc_html__( 'Office Address', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( '123/A, Miranda City Likaoli Prikano, Dope United States', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_extra_phone',
		'label'    => esc_html__( 'Phone Number', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( '+0989 7876 9865 9', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_extra_email',
		'label'    => esc_html__( 'Email ID', 'jolshiri' ),
		'section'  => 'header_side_setting',
		'default'  => esc_html__( 'info@basictheme.net', 'jolshiri' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_side_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {
	// Breadcrumb Setting
	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'breadcrumb_bg_img',
		'label'       => esc_html__( 'Breadcrumb Background Image', 'jolshiri' ),
		'description' => esc_html__( 'Breadcrumb Background Image', 'jolshiri' ),
		'section'     => 'breadcrumb_setting',
		'default'     => get_template_directory_uri() . '/assets/img/bg/page-title-bg.jpg'
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'jolshiri_blog_btn_switch',
		'label'    => esc_html__( 'Blog BTN On/Off', 'jolshiri' ),
		'section'  => 'blog_setting',
		'default'  => '1',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'jolshiri' ),
			'off' => esc_html__( 'Disable', 'jolshiri' ),
		],
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_blog_btn',
		'label'    => esc_html__( 'Blog Button text', 'jolshiri' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Read More', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_blog_btn_rtl',
		'label'    => esc_html__( 'Blog Button text rtl', 'jolshiri' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Read More', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'breadcrumb_blog_title',
		'label'    => esc_html__( 'Blog Title', 'jolshiri' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Blog', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'breadcrumb_blog_title_details',
		'label'    => esc_html__( 'Blog Details Title', 'jolshiri' ),
		'section'  => 'blog_setting',
		'default'  => esc_html__( 'Blog Details', 'jolshiri' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
	$fields[] = array(
		'type'        => 'image',
		'settings'    => 'jolshiri_footer_logo',
		'label'       => esc_html__( 'Footer Logo', 'jolshiri' ),
		'description' => esc_html__( 'Upload Your Logo.', 'jolshiri' ),
		'section'     => 'footer_setting',
		'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png'
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_subscription_text',
		'label'    => esc_html__( 'Subscription Text', 'jolshiri' ),
		'section'  => 'footer_setting',
		'default'  => esc_html__( 'Receive free resources and webinar invitation on jolshiri management.', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_subscription_shortcode',
		'label'    => esc_html__( 'Subscription Form Shortcode', 'jolshiri' ),
		'section'  => 'footer_setting',
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_privacy_policy_text',
		'label'    => esc_html__( 'Privacy Policy label', 'jolshiri' ),
		'section'  => 'footer_setting',
		'default'  => esc_html__( 'Privacy Policy', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_privacy_policy_url',
		'label'    => esc_html__( 'Privacy Policy Url', 'jolshiri' ),
		'section'  => 'footer_setting',
		'default'  => esc_html__( '#', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_cookies_text',
		'label'    => esc_html__( 'Cookies label', 'jolshiri' ),
		'section'  => 'footer_setting',
		'default'  => esc_html__( 'Cookies', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_cookies_url',
		'label'    => esc_html__( 'Cookies Url', 'jolshiri' ),
		'section'  => 'footer_setting',
		'default'  => esc_html__( '#', 'jolshiri' ),
		'priority' => 10,
	);

	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_copyright',
		'label'    => esc_html__( 'Copy Right', 'jolshiri' ),
		'section'  => 'footer_setting',
		'default'  => esc_html__( '© Copyright 2022, All Rights Reserved', 'jolshiri' ),
		'priority' => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function jolshiri_color_fields( $fields ) {
	// Color Settings
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'jolshiri_color_option',
		'label'       => __( 'Theme Color', 'jolshiri' ),
		'description' => esc_html__( 'This is a Theme color control.', 'jolshiri' ),
		'section'     => 'color_setting',
		'default'     => '#ff5e14',
		'priority'    => 10,
	);
	$fields[] = array(
		'type'        => 'color',
		'settings'    => 'jolshiri_header_bg_color',
		'label'       => __( 'THeader BG Color', 'jolshiri' ),
		'description' => esc_html__( 'This is a Header bg color control.', 'jolshiri' ),
		'section'     => 'color_setting',
		'default'     => '#00235A',
		'priority'    => 10,
	);

	return $fields;
}

add_filter( 'kirki/fields', 'jolshiri_color_fields' );

// 404 
function jolshiri_404_fields( $fields ) {
	// 404 settings
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_error_404_text',
		'label'    => esc_html__( '400 Text', 'jolshiri' ),
		'section'  => '404_page',
		'default'  => esc_html__( '404', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_error_title',
		'label'    => esc_html__( 'Not Found Title', 'jolshiri' ),
		'section'  => '404_page',
		'default'  => esc_html__( 'Page not found', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'settings' => 'jolshiri_error_desc',
		'label'    => esc_html__( '404 Description Text', 'jolshiri' ),
		'section'  => '404_page',
		'default'  => esc_html__( 'Oops! The page you are looking for does not exist. It might have been moved or deleted', 'jolshiri' ),
		'priority' => 10,
	);
	$fields[] = array(
		'type'     => 'text',
		'settings' => 'jolshiri_error_link_text',
		'label'    => esc_html__( '404 Link Text', 'jolshiri' ),
		'section'  => '404_page',
		'default'  => esc_html__( 'Back To Home', 'jolshiri' ),
		'priority' => 10,
	);

	return $fields;

}

add_filter( 'kirki/fields', 'jolshiri_404_fields' );

/**
 * Added Fields
 */
function jolshiri_rtl_fields( $fields ) {
	// rtl settings
	$fields[] = array(
		'type'     => 'switch',
		'settings' => 'rtl_switch',
		'label'    => esc_html__( 'RTL On/Off', 'jolshiri' ),
		'section'  => 'rtl_setting',
		'default'  => '0',
		'priority' => 10,
		'choices'  => [
			'on'  => esc_html__( 'Enable', 'jolshiri' ),
			'off' => esc_html__( 'Disable', 'jolshiri' ),
		],
	);

	return $fields;
}

add_filter( 'kirki/fields', 'jolshiri_rtl_fields' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function jolshiri_theme_option( $name ) {
	$value = '';
	if ( class_exists( 'jolshiri' ) ) {
		$value = Kirki::get_option( jolshiri_get_theme(), $name );
	}

	return apply_filters( 'jolshiri_theme_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function jolshiri_get_theme() {
	return 'jolshiri';
}