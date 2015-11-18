<?php

/*
 *   Functions specific to themeing Give
 *
 */

// Adds class to the summary div to force full-width of the form content

add_filter( 'give_forms_single_summary_classes', 'give_custom_class_names', 999, 1 );

function give_custom_class_names( $classes ) {
    $classes = 'give-full-width';
    return $classes;
}

add_action('wp_footer', 'clickable_give_archive');

function clickable_give_archive() {
   if ( wp_script_is( 'jquery', 'done' ) ) {
  ?>
  <script>
    jQuery(document).ready(function( $ ) {
      $("article.hentry").click(function() {
        window.location = $(this).find("a").attr("href");
        return false;
      });
    });
  </script>
  <?php }
}
