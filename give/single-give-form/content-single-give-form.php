<?php
/**
 * The template for displaying product content in the single-give-form.php template
 *
 * Override this template by copying it to yourtheme/give/content-single-give-form.php
 *
 * @package       Give/Templates
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<?php
/**
 *  give_before_single_product hook
 *
 *  Available hook for Add-ons to add content before the form.
 */
do_action( 'give_before_single_form' );

if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}
?>

<?php
/*
 * Getting the featured image to apply to Title
 */

if ( has_post_thumbnail() ) {

	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'donate-header' );
	$headerbkgrnd = "url('" . $image[0] . "');";
} else {
	$headerbkgrnd = '#777;';
}

?>

<h1 itemprop="name" class="give-form-title entry-title" style="background: <?php echo $headerbkgrnd; ?>"><?php the_title(); ?></h1>

<div id="give-form-<?php the_ID(); ?>-content" <?php post_class(); ?>>
	<div class="<?php echo apply_filters( 'give_forms_single_summary_classes', 'summary entry-summary' ); ?>">

		<?php
		/**
		 *  give_get_donation_form()
		 *  Get's the form goal, content and actual form element
		 *
		 *  The give_single_form_summary hook outputs all of that
		 *  plus the form title as the first element
		 */

			give_get_donation_form( $args = array() );
		?>

	</div>
	<!-- .summary -->

	<?php
	/**
	 * give_after_single_form_summary hook
	 */
	do_action( 'give_after_single_form_summary' );
	?>

</div><!-- #give-form-<?php the_ID(); ?> -->

<?php do_action( 'give_after_single_form' ); ?>
