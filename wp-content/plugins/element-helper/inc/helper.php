<?php

namespace ElementHelper;

class Helper {

	/**
	 * Get widgets list
	 */
	public static function get_widgets() {

		return [
			'hero' => [
				'title' => __( 'Hero', 'elementhelper' )
			],

			'featured-list' => [
				'title' => __( 'Featured list', 'elementhelper' )
			],

			'pricing-list' => [
				'title' => __( 'Pricing list', 'elementhelper' )
			],

			'subscription' => [
				'title' => __( 'Subscription', 'elementhelper' )
			],

			'team' => [
				'title' => __( 'Team', 'elementhelper' )
			],

			'faq' => [
				'title' => __( 'Faq', 'elementhelper' )
			],

			'cf7' => [
				'title' => __( 'Contact Form 7', 'elementhelper' )
			],

			'policy' => [
				'title' => __( 'Privacy Policy', 'elementhelper' )
			],

			'video-info' => [
				'title' => __( 'Video Info', 'elementhelper' )
			],

			'service' => [
				'title' => __( 'Service', 'elementhelper' )
			],

			'testimonial' => [
				'title' => __( 'Testimonial', 'elementhelper' )
			],

			'cta' => [
				'title' => __( 'Cta', 'elementhelper' )
			],

			'brands' => [
				'title' => __( 'Brands', 'elementhelper' )
			],

			'about' => [
				'title' => __( 'About', 'elementhelper' )
			],

		];
	}

	/**
	 *  Get WooCommerce widgets list
	 **/
	public static function get_woo_widgets() {

		return [
			'woo-product' => [
				'title' => __( 'Woo Product', 'elementhelper' ),
				'icon'  => 'fa fa-card'
			]
		];
	}
}


