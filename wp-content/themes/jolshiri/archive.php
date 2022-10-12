<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package gocart
 */

get_header();
?>

	<div class="blog-section-2 pt-100">
		<div class="container">
			<div class="row blog-row">
				<?php
				if ( have_posts() ):
					?>
                    <header class="page-header mb-50">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
                    </header><!-- .page-header -->
					<?php
					while ( have_posts() ): the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile; ?>
					<div class="basic-pagination basic-pagination-2 mb-40">
						<?php jolshiri_pagination( '<i class="far fa-angle-double-left"></i>', '<i class="far fa-angle-double-right"></i>', '', array( 'class' => '' ) ); ?>
					</div>
				<?php
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
		</div>
	</div>
<?php
get_footer();



