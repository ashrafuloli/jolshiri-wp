<?php

/**
 * favicon logo
 */
function jolshiri_favicon() {
	$jolshiri_favicon     = get_template_directory_uri() . '/assets/img/logo/favicon.png';
	$jolshiri_favicon_url = get_theme_mod( 'favicon_url', $jolshiri_favicon );
	?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $jolshiri_favicon_url ); ?>">
	<?php
}

add_action( 'wp_head', 'jolshiri_favicon' );

/**
 * header logo
 */
function jolshiri_header_logo() {
	?>
	<?php
	$jolshiri_logo_on    = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : null;
	$jolshiri_logo       = get_template_directory_uri() . '/assets/img/logo/logo.png';
	$jolshiri_logo_white = get_template_directory_uri() . '/assets/img/logo/logo.png';

	$jolshiri_customizer_logo = get_theme_mod( 'logo', $jolshiri_logo );
	$jolshiri_secondary_logo  = get_theme_mod( 'secondary_logo', $jolshiri_logo_white );

	$jolshiri_page_logo = function_exists( 'get_field' ) ? get_field( 'jolshiri_page_logo' ) : '';
	$jolshiri_site_logo = ! empty( $jolshiri_page_logo['url'] ) ? $jolshiri_page_logo['url'] : $jolshiri_customizer_logo;
	?>

	<?php
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {

		if ( ! empty( $jolshiri_logo_on ) ) { ?>
            <a class="standard-logo-white" href="<?php print esc_url( home_url( '/' ) ); ?>">
                <img src="<?php print esc_url( $jolshiri_secondary_logo ); ?>"
                     alt="<?php print esc_attr( 'logo', 'jolshiri' ); ?>"/>
            </a>
			<?php
		} else { ?>
            <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) ); ?>">
                <img src="<?php print esc_url( $jolshiri_site_logo ); ?>"
                     alt="<?php print esc_attr( 'logo', 'jolshiri' ); ?>"/>
            </a>
			<?php
		}
	}
	?>
	<?php
}

/**
 * pagination
 */
if ( ! function_exists( 'jolshiri_pagination' ) ) {

	function _jolshiri_pagi_callback( $pagination ) {
		return $pagination;
	}

	//page navigation
	function jolshiri_pagination( $prev, $next, $pages, $args ) {
		global $wp_query, $wp_rewrite;
		$menu = '';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if ( ! $pages ) {
				$pages = 1;
			}
		}

		$pagination = array(
			'base'      => add_query_arg( 'paged', '%#%' ),
			'format'    => '',
			'total'     => $pages,
			'current'   => $current,
			'prev_text' => $prev,
			'next_text' => $next,
			'type'      => 'array'
		);

		//rewrite permalinks
		if ( $wp_rewrite->using_permalinks() ) {
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		}

		if ( ! empty( $wp_query->query_vars['s'] ) ) {
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		}

		$pagi = '';
		if ( paginate_links( $pagination ) != '' ) {
			$paginations = paginate_links( $pagination );
			$pagi        .= '<ul>';
			foreach ( $paginations as $key => $pg ) {
				$pagi .= '<li>' . $pg . '</li>';
			}
			$pagi .= '</ul>';
		}

		print _jolshiri_pagi_callback( $pagi );
	}
}


function jolshiri_check_header() {
	jolshiri_header_style();
}

add_action( 'jolshiri_header_style', 'jolshiri_check_header', 10 );

/**
 * header style
 */

function jolshiri_header_style() {
	$jolshiri_header_button      = get_theme_mod( 'jolshiri_header_button', true );
	$jolshiri_header_button_text = get_theme_mod( 'jolshiri_header_button_text', 'Get Started' );
	$jolshiri_header_button_link = get_theme_mod( 'jolshiri_header_button_link', '#' );
	?>
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="logo">
		                <?php jolshiri_header_logo(); ?>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-md-8 col-6 d-flex align-items-center justify-content-end">
	                <?php jolshiri_header_menu(); ?>
	                <?php if ( ! empty( $jolshiri_header_button ) ): ?>
                        <div class="header-btn d-md-inline-block d-none">
                            <a href="<?php echo esc_url( $jolshiri_header_button_link ); ?>">
				                <?php echo $jolshiri_header_button_text; ?>
                            </a>
                        </div>
	                <?php endif; ?>
                    <div class="menu-bar d-inline-block d-xl-none">
                        <a href="#">
                            <i class="fa-regular fa-bars"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div class="mobile-menu-wrapper">
        <div class="menu-overlay"></div>
        <div class="agenia-mobile-menu">
            <div class="menu-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="mobile-menu"></div>
        </div>
    </div>
	<?php
}


/**
 * jolshiri_header_menu description
 */
function jolshiri_header_menu() {
	$jolshiri_menu = wp_nav_menu( array(
		'theme_location'  => 'main-menu',
		'menu_class'      => '',
		'container'       => 'div',
		'container_class' => 'main-menu d-none d-xl-block',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 2,
		'echo'            => false
	) );

//	$jolshiri_menu = str_replace("menu-item-has-children", "menu-item-has-children", $jolshiri_menu);

	echo wp_kses_post( $jolshiri_menu );
}

/**
 * jolshiri_mobile_menu description
 */
function jolshiri_mobile_menu() {
	$jolshiri_menu = wp_nav_menu( array(
		'theme_location'  => 'main-menu',
		'menu_id'         => 'mobile-menu-active',
		'container'       => 'nav',
		'container_class' => 'side-mobile-menu',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 2,
		'echo'            => false
	) );

//	$jolshiri_menu = str_replace("menu-item-has-children", "menu-item-has-children", $jolshiri_menu);

	echo wp_kses_post( $jolshiri_menu );
}


/**
 * jolshiri_breadcrumb_callback
 * @return string
 */
function jolshiri_breadcrumb_callback() {
	$args       = array(
		'show_browse'   => false,
		'post_taxonomy' => array( 'product' => 'product_cat' )
	);
	$breadcrumb = new Breadcrumb_Class( $args );

	return $breadcrumb->trail();
}


/**
 * jolshiri_breadcrumb_func
 */
function jolshiri_breadcrumb_func() {

	$breadcrumb_class = '';
	$breadcrumb_show  = 1;

	if ( is_front_page() && is_home() ) {
		$title            = get_theme_mod( 'breadcrumb_blog_title', esc_html__( 'Blog', 'jolshiri' ) );
		$breadcrumb_class = 'home_front_page';

	} elseif ( is_front_page() ) {
		$title = get_theme_mod( 'breadcrumb_blog_title', esc_html__( 'Blog', 'jolshiri' ) );
//		$breadcrumb_show = 0;
	} elseif ( is_home() ) {
		if ( get_option( 'page_for_posts' ) ) {
			$title = get_the_title( get_option( 'page_for_posts' ) );
		}
	} elseif ( is_single() && 'post' == get_post_type() ) {
		$title = get_the_title();
	} elseif ( is_single() && 'product' == get_post_type() ) {
		$title = get_theme_mod( 'breadcrumb_product_details', esc_html__( 'Shop', 'jolshiri' ) );
	} elseif ( is_single() && 'jolshiri-department' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_department_details_rtl', esc_html__( 'Department', 'jolshiri' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_department_details', esc_html__( 'Department', 'jolshiri' ) );
		}

	} elseif ( is_single() && 'jolshiri-doctor' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_doctor_details_rtl', esc_html__( 'Doctor', 'jolshiri' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_doctor_details', esc_html__( 'Doctor', 'jolshiri' ) );
		}

	} elseif ( is_single() && 'jolshiri-case_study' == get_post_type() ) {
		if ( rtl_enable() ) {
			$title = get_theme_mod( 'breadcrumb_case_study_details_rtl', esc_html__( 'Gallery', 'jolshiri' ) );
		} else {
			$title = get_theme_mod( 'breadcrumb_case_study_details', esc_html__( 'Gallery', 'jolshiri' ) );
		}

	} elseif ( is_search() ) {
		$title = esc_html__( 'Search Results for : ', 'jolshiri' ) . get_search_query();
	} elseif ( is_404() ) {
		$title = esc_html__( 'Page not Found', 'jolshiri' );
	} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		$title = get_theme_mod( 'breadcrumb_shop', esc_html__( 'Shop', 'jolshiri' ) );
	} elseif ( is_archive() ) {
		$title = get_the_archive_title();
	} else {
		$title = get_the_title();
	}

//	$is_breadcrumb  = function_exists( 'get_field' ) ? get_field( 'is_it_invisible_breadcrumb' ) : '';
	$is_breadcrumb = get_post_meta( get_the_ID(), '_breadcrumb_option', true );

	if ( $is_breadcrumb != 'yes' ) {
		$bg_img_from_page = function_exists( 'get_field' ) ? get_field( 'breadcrumb_background_image' ) : '';
		$hide_bg_img      = function_exists( 'get_field' ) ? get_field( 'hide_breadcrumb_background_image' ) : '';
		$back_title       = function_exists( 'get_field' ) ? get_field( 'breadcrumb_back_title' ) : '';

		// get_theme_mod
		$bg_img = get_theme_mod( 'breadcrumb_bg_img' );


		if ( $hide_bg_img ) {
			$bg_img = '';
		} else {
			$bg_img = ! empty( $bg_img_from_page ) ? $bg_img_from_page['url'] : $bg_img;
		}
		if ( ! empty( $bg_img ) ) {
			$breadcrumb_class .= ' page-title-overlay';
		}
		?>

        <div class="page-title-area breadcrumb-bg breadcrumb-spacings <?php print esc_attr( $breadcrumb_class ); ?>"
             data-background="<?php print esc_attr( $bg_img ); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="page-title-content">
                            <h3 class="title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
								<?php echo wp_kses_post( $title ); ?>
                            </h3>
                            <div class="breadcrumb-menu">
								<?php // jolshiri_breadcrumb_callback(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-4.png" alt="shape">
            </div>
        </div>
		<?php
	}
}

//add_action( 'jolshiri_before_main_content', 'jolshiri_breadcrumb_func' );


/**
 * jolshiri_check_footer
 */
function jolshiri_check_footer() {
//	$footer_option = get_post_meta( get_the_ID(), '_footer_option', true );
	jolshiri_footer_style();
//	if ( $footer_option == 'footer_2' ) {
//		jolshiri_footer_style_2();
//	} else {
//		jolshiri_footer_style();
//	}

}

add_action( 'jolshiri_footer_style', 'jolshiri_check_footer', 10 );

/**
 * footer  style 1
 */
function jolshiri_footer_style() {
	$jolshiri_privacy_policy_text    = get_theme_mod( 'jolshiri_privacy_policy_text', 'Privacy Policy' );
	$jolshiri_privacy_policy_url     = get_theme_mod( 'jolshiri_privacy_policy_url', '#' );
	$jolshiri_cookies_text           = get_theme_mod( 'jolshiri_cookies_text', 'Cookies' );
	$jolshiri_cookies_url            = get_theme_mod( 'jolshiri_cookies_url', '#' );
	$jolshiri_subscription_text      = get_theme_mod( 'jolshiri_subscription_text', 'Receive free resources and webinar invitation on jolshiri management.' );
	$jolshiri_subscription_shortcode = get_theme_mod( 'jolshiri_subscription_shortcode', '' );
	?>
    <div class="footer-area pt-65 pb-65">
        <div class="footer-middle pb-55">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-6 footer-col-1">
						<?php
						if ( is_active_sidebar( 'footer-1' ) ) {
							dynamic_sidebar( 'footer-1' );
						}
						?>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 footer-col-2">
						<?php
						if ( is_active_sidebar( 'footer-2' ) ) {
							dynamic_sidebar( 'footer-2' );
						}
						?>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 footer-col-3">
						<?php
						if ( is_active_sidebar( 'footer-3' ) ) {
							dynamic_sidebar( 'footer-3' );
						}
						?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-lg-12 d-md-flex align-items-center justify-content-xl-start justify-content-lg-between">
						<?php footer_social(); ?>
                        <div class="footer-menu">
	                        <?php jolshiri_footer_menu(); ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 mt-lg-20 mt-md-20 mt-xs-20 text-xl-start text-center">
                        <div class="footer-text">
                            <p><?php jolshiri_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-shape-1">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-9.png" alt="shape">
        </div>
        <div class="footer-shape-2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-10.png" alt="shape">
        </div>
        <div class="footer-shape-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-11.png" alt="shape">
        </div>
    </div>
	<?php
}

/**
 * copyright text
 */
function jolshiri_copyright_text() {
	print get_theme_mod( 'jolshiri_copyright', esc_html__( '© Copyright 2022, All Rights Reserved', 'jolshiri' ) );
}

/**
 * jolshiri_footer_menu_1
 */
function jolshiri_footer_menu() {
	$jolshiri_menu = wp_nav_menu( array(
		'theme_location'  => 'footer-menu',
		'menu_class'      => '',
		'container'       => '',
		'container_class' => 'footer-menu',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 1,
		'echo'            => false
	) );
	echo wp_kses_post( $jolshiri_menu );
}

/**
 * jolshiri_footer_menu_1
 */
function jolshiri_footer_menu_2() {
	$jolshiri_menu = wp_nav_menu( array(
		'theme_location'  => 'footer-menu-2',
		'menu_class'      => '',
		'container'       => 'div',
		'container_class' => 'footer-menu-2',
		'fallback_cb'     => 'Navwalker_Class::fallback',
		'walker'          => new Navwalker_Class,
		'depth'           => 1,
		'echo'            => false
	) );
	echo wp_kses_post( $jolshiri_menu );
}

/**
 * footer_social
 */
function footer_social() {
	$jolshiri_fb_url       = get_theme_mod( 'jolshiri_fb_url', '#' );
	$jolshiri_instagram_url  = get_theme_mod( 'jolshiri_instagram_url', '#' );
	$jolshiri_linkedin_url = get_theme_mod( 'jolshiri_linkedin_url', '#' );
	$jolshiri_twitter_url  = get_theme_mod( 'jolshiri_twitter_url', '' );
	$jolshiri_youtube_url  = get_theme_mod( 'jolshiri_youtube_url', '' );
	?>
    <div class="footer-social text-center text-lg-start">
		<?php if ( ! empty( $jolshiri_fb_url ) ): ?>
            <a href="<?php echo esc_url( $jolshiri_fb_url ); ?>" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
		<?php endif; ?>
		<?php if ( ! empty( $jolshiri_instagram_url ) ): ?>
            <a href="<?php echo esc_url( $jolshiri_instagram_url ); ?>" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
		<?php endif; ?>
		<?php if ( ! empty( $jolshiri_linkedin_url ) ): ?>
            <a href="<?php echo esc_url( $jolshiri_linkedin_url ); ?>" target="_blank">
                <i class="fa-brands fa-linkedin"></i>
            </a>
		<?php endif; ?>
		<?php if ( ! empty( $jolshiri_twitter_url ) ): ?>
            <a href="<?php echo esc_url( $jolshiri_twitter_url ); ?>" target="_blank">
                <i class="fa-brands fa-twitter"></i>
            </a>
		<?php endif; ?>
		<?php if ( ! empty( $jolshiri_youtube_url ) ): ?>
            <a href="<?php echo esc_url( $jolshiri_youtube_url ); ?>" target="_blank">
                <i class="fa-brands fa-youtube"></i>
            </a>
		<?php endif; ?>
    </div>
	<?php
}

/**
 * footer logo
 */
function jolshiri_footer_logo() {
	$jolshiri_logo        = get_template_directory_uri() . '/assets/img/logo/logo.png';
	$jolshiri_footer_logo = get_theme_mod( 'jolshiri_footer_logo', $jolshiri_logo );
	?>
    <a href="<?php print esc_url( home_url( '/' ) ); ?>">
        <img src="<?php print esc_url( $jolshiri_footer_logo ); ?>"
             alt="<?php print esc_attr( 'logo', 'jolshiri' ); ?>"/>
    </a>
	<?php
}

/**
 * jolshiri_get_tag
 */
function jolshiri_get_tag() {
	$html = '';
	if ( has_tag() ) {
		$html .= '<div class="blog-post-tag"><span>' . esc_html__( 'Post Tags', 'gocart' ) . '</span>';
		$html .= get_the_tag_list( '', ' ', '' );
		$html .= '</div>';
	}

	return $html;
}