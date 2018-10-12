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

<div id="primary" class="content-area container"><!-- .PRIMARY -->
<main id="main" class="row site-main"><!-- .MAIN -->

<section id="article" class="col-md-8 col-sm-8">
  <div class="row">
    <?php if ( have_posts() ) : if ( is_home() && ! is_front_page() ) : ?>
    <header id="article-header">
      <h2 class="page-title screen-reader-text">
        <?php single_post_title(); ?>
      </h2>
      
    </header>
    <?php

	endif;

	while ( have_posts() ) :

		the_post();

	/*

	* Include the Post-Type-specific template for the content.

	* If you want to override this in a child theme, then include a file

	* called content-___.php (where ___ is the Post Type name) and that will be used instead.

	*/

		get_template_part( 'template-parts/content', get_post_type() );

  endwhile;
  
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;

	?>
     
  </div>
  <?php the_posts_navigation();?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
