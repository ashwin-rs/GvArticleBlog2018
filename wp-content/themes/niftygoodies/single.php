<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */
?>
<?php get_header(); ?>

<div id="primary" class="content-area container">

<main id="main" class="row site-main"><!-- .SITE-MAIN -->
<div class="col-md-12 col-sm-12"><!-- .BREADCRUMBS -->
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('
		<p id="breadcrumbs">','</p>
		');
		}	
	?>
</div><!-- .BREADCRUMBS -->
<section id="article" class="col-md-8 col-sm-8">
  <div class="row">
    <?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
	?>
  </div>
</section>
<?php get_sidebar();?>
<?php get_footer();?>
