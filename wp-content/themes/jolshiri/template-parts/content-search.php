<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gocart
 */
?>

<div class="col-xl-4 col-lg-4 col-md-6 col-6">
    <div class="blog-content-wrapper">
        <div class="thumb">
            <a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
            </a>
        </div>
        <div class="blog-content">
            <h4>
				<?php
				printf( '<a href="%2$s">%1$s</a>',
					esc_html( get_the_title() ),
					esc_url( get_the_permalink( get_the_ID() ) )
				);
				?>
            </h4>
            <p><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>
</div>
