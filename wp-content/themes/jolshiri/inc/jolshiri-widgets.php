<?php


/**
 * Register Widgets Area.
 */
function jolshiri_widgets_init()
{
	// blog sidebar
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'jolshiri'),
		'id' => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget mb-30 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h5>',
		'after_title' => '</h5></div>',

	));
	register_sidebar(array(
		'name' => esc_html__('Footer 1', 'jolshiri'),
		'id' => 'footer-1',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h5>',
		'after_title' => '</h5></div>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 2', 'jolshiri'),
		'id' => 'footer-2',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h5>',
		'after_title' => '</h5></div>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 3', 'jolshiri'),
		'id' => 'footer-3',
		'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget_title"><h5>',
		'after_title' => '</h5></div>',
	));
}

add_action('widgets_init', 'jolshiri_widgets_init');