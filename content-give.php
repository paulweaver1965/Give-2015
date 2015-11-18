<?php
/**
 * The template for displaying Donation Form content
 * for the Give Archive Page
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
			<p class="description">
				<?php
					$yoastdesc = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
					$excerptlength = 50;
					$excerpt = get_the_excerpt();
					$content = get_the_content();
					$screenreader = '<p class="readmore"><a href="' . get_permalink() . '"><span class="screen-reader-text">' . get_the_title( ) . '</span>Read More &hellip;</a><p>';

					if(!empty($yoastdesc)) {
						$trimyoast = wp_trim_words($yoastdesc, $excerptlength, $screenreader);
						echo $trimyoast;
					} elseif(has_excerpt() == true) {
						$trimexcerpt = wp_trim_words( $excerpt , $excerptlength, $screenreader  );
						echo strip_shortcodes($trimexcerpt);
					} else {
						$trimmed_content = wp_trim_words( $content, $excerptlength, $screenreader );
						echo strip_shortcodes($trimmed_content);
					}
				?>
			</p>
		</div>

		<?php if( has_post_thumbnail() ) { ?>
			<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="featured-image-link"><?php echo the_post_thumbnail('large'); ?></a>
		<?php } ?>
		
</article><!-- #post-## -->
