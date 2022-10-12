<?php

define( 'JOLSHIRI_THEME_DIR', get_template_directory() );
define( 'JOLSHIRI_THEME_URI', get_template_directory_uri() );
define( 'JOLSHIRI_THEME_CSS_DIR', JOLSHIRI_THEME_URI . '/assets/css/' );
define( 'JOLSHIRI_THEME_JS_DIR', JOLSHIRI_THEME_URI . '/assets/js/' );
define( 'JOLSHIRI_THEME_INC', JOLSHIRI_THEME_DIR . '/inc/' );

// Implement the Theme Assets.
require JOLSHIRI_THEME_INC . 'jolshiri-assets.php';

// Implement the Theme Widgets.
require JOLSHIRI_THEME_INC . 'jolshiri-widgets.php';

// Implement the Theme Setup.
require JOLSHIRI_THEME_INC . 'jolshiri-setup.php';

// Theme require Plugins
require JOLSHIRI_THEME_INC . 'class-tgm-plugin-activation.php';
require JOLSHIRI_THEME_INC . 'add-plugin.php';

// initialize kirki customizer class.
include_once JOLSHIRI_THEME_INC . 'kirki-customizer.php';
include_once JOLSHIRI_THEME_INC . 'jolshiri-kirki.php';

// initialize navwalker
include_once JOLSHIRI_THEME_INC . 'class-navwalker.php';

// initialize breadcrumb
include_once JOLSHIRI_THEME_INC . 'class-breadcrumb.php';

// Custom template helper function for this theme
require JOLSHIRI_THEME_INC . 'template-helper.php';


/**
 * wp body open
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function jolshiri_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'jolshiri_content_width', 640 );
}

add_action( 'after_setup_theme', 'jolshiri_content_width', 0 );

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 *
 * pagination
 */
if (!function_exists('jolshiri_pagination')) {

	function _jolshiri_pagi_callback($pagination)
	{
		return $pagination;
	}

	//page navegation
	function jolshiri_pagination($prev, $next, $pages, $args)
	{
		global $wp_query, $wp_rewrite;
		$menu = '';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;

			if (!$pages)
				$pages = 1;
		}

		$pagination = array(
			'base' => add_query_arg('paged', '%#%'),
			'format' => '',
			'total' => $pages,
			'current' => $current,
			'prev_text' => $prev,
			'next_text' => $next,
			'type' => 'array'
		);

		//rewrite permalinks
		if ($wp_rewrite->using_permalinks())
			$pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');

		if (!empty($wp_query->query_vars['s']))
			$pagination['add_args'] = array('s' => get_query_var('s'));

		$pagi = '';
		if (paginate_links($pagination) != '') {
			$paginations = paginate_links($pagination);
			$pagi .= '<ul>';
			foreach ($paginations as $key => $pg) {
				$pagi .= '<li>' . $pg . '</li>';
			}
			$pagi .= '</ul>';
		}

		print _jolshiri_pagi_callback($pagi);
	}
}


function wp_example_excerpt_length( $length ) {
	return 3;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');



/*
 ==================
 Ajax Search
======================
*/
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
	?>
	<script type="text/javascript">
        function fetch(){

            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
                success: function(data) {
                    jQuery('#datafetch').html( data );
                }
            });

        }
	</script>

	<?php
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

	$the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => array('page','post') ) );
	if( $the_query->have_posts() ) :
		echo '<ul>';
		while( $the_query->have_posts() ): $the_query->the_post(); ?>

			<li><a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a></li>

		<?php endwhile;
		echo '</ul>';
		wp_reset_postdata();
	endif;

	die();
}