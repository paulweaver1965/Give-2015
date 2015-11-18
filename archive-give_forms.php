<?php
/**
 * The template for displaying The Give Archive Page
 *
 * @link https://givewp.com/documentation/developers/themeing-with-give/
 *
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">Ways to Give</h1>
				<?php if (! empty(the_archive_description())) {
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				} else { ?>
					<div class="taxonomy-description">
						<p>There are many ways to give. Choose your way by clicking below.</p>
					</div>
				<?php } ?>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', 'give' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			// Disabling for the sake of it being very
			// unlikely that you'll want pages and pages
			// of donation form links.

			// the_posts_pagination( array(
			// 	'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
			// 	'next_text'          => __( 'Next page', 'twentyfifteen' ),
			// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			// ) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
