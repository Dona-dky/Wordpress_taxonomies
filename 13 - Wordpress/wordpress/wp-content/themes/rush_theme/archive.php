<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rush_Theme
 * 
 */
/*
Template Name: Archives
*/
get_header(); ?>

<h1>Tous les ingrédients</h1>

<?php $ingrédients = get_terms(['taxonomy' => 'ingrédient']); ?>
<?php if (is_array($ingrédients)): ?>
<div class="nav nav-pills my-4">
    <?php foreach($ingrédients as $ingrédient): ?>
	
    <div class="nav-item">
        <a href="<?= get_term_link($ingrédient) ?>" class="nav-link <?= is_tax('ingrédient', $ingrédient->term_id) ? 'active' : '' ?>"><?= $ingrédient->name ?></a>
	</div>
    <?php endforeach; ?>
	</div>
<?php endif ?>

<?php if (have_posts()): ?>
    <div class="row">

        <?php while (have_posts()): the_post(); ?>
        <div class="col-sm-4">
            <div class="card">
				<div class="img">
				<?php the_post_thumbnail('card-header', ['class' => 'card-img-top', 'alt' => '']) ?>

				</div>
				<div class="card-body">     
					<h3 class="card-title"> <?php the_title() ?> </h3>
					<?php the_terms( $ingrédient->ID, 'ingrédient', 'Type : ' ); ?><br>
					<a href="<?php the_permalink() ?>" class="card-link">Voir plus</a>
				</div>
            </div>
        </div>
    
 <?php endwhile; else: ?>
    </div>
    <p>Aucun ingrédient :(</p>
 <?php endif; ?>