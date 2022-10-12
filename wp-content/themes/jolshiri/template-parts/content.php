<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jolshiri
 */
if ( is_single() ): ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
        <div class="col-xl-8 col-lg-8 order-2 order-lg-1">
            <div class="blog-artikel-header mt-25">
                <h3 class="blog-artikel-title">
				    <?php the_title(); ?>
                </h3>

			    <?php the_content(); ?>
			    <?php
			    wp_link_pages( array(
				    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'jolshiri' ),
				    'after'       => '</div>',
				    'link_before' => '<span class="page-number">',
				    'link_after'  => '</span>',
			    ) );
			    ?>
            </div>
        </div>
	    <?php
	    if ( has_post_thumbnail() ): ?>
            <div class="col-xl-4 col-lg-4 order-1 order-lg-2 text-center mb-md-40 mb-xs-40">
                <div class="blog-artikel-thumb">
				    <?php the_post_thumbnail( 'jolshiri-post-details', array(
					    'class' => 'img-responsive',
					    'alt'   => get_the_post_thumbnail_caption( get_the_ID() )
				    ) ); ?>
                </div>
            </div>
	    <?php
	    endif; ?>
    </article>
<?php
else: ?>
    <div class="col-xl-6">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-wrap mb-30' ); ?>>
			<?php
			if ( has_post_thumbnail() ): ?>
                <div class="blog-thumb">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'jolshiri-post-thumb', array( 'class' => 'img-responsive' ) ); ?>
                    </a>
                </div>
			<?php
			endif; ?>
            <div class="blog-content">
                <div class="blog-meta">
                     <span>
                        <a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                            <i class="fal fa-user"></i> <?php print get_the_author(); ?>
                        </a>
                    </span>
                    <span>
                        <i class="fal fa-calendar-alt"></i> <?php the_time( get_option( 'date_format' ) ); ?>
                    </span>
                </div>
                <h3 class="blog-title mb-20">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="blog-text">
					<?php the_excerpt(); ?>
                </div>
                <!-- blog btn -->
				<?php
				$jolshiri_blog_btn = get_theme_mod( 'jolshiri_blog_btn', 'Read More' );

				$jolshiri_blog_btn_switch = get_theme_mod( 'jolshiri_blog_btn_switch', true );
				?>

				<?php if ( ! empty( $jolshiri_blog_btn_switch ) ) : ?>
                    <div class="read-more">
                        <a href="<?php the_permalink(); ?>"><?php print esc_html( $jolshiri_blog_btn ); ?></a>
                    </div>
				<?php endif; ?>
            </div>
        </article>
    </div>
<?php
endif; ?>
