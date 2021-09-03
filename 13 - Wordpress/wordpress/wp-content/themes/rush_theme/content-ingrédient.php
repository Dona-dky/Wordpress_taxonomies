<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rush_Theme
 */

get_header();
?>

	<?php
// Contrôler si ACF est actif
if ( !function_exists('get_field') ) return;

?>

<div class="sup_info" style="border: 2px solid <?php the_field('color'); ?>">
    <p><strong>Prix: </strong><?php the_field('price'); ?> $</p>
    <?php the_terms( $ingrédient->ID, 'ingrédient', 'Type : ' ); ?><br>
</div>