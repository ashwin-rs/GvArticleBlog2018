<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */
?>
<?php get_header(); ?>

<div id="primary" class="content-area container">
<main id="main" class="row site-main"><!-- .SITE-MAIN-->
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

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>
  </div>
</section>
<?php get_sidebar();?>
<?php get_footer();?>
