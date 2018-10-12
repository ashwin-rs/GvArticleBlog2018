<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package niftygoodies
 */
?>

<?php get_header(); ?>

<div id="primary" class="content-area container">
<main id="main" class="row site-main"><!--MAIN-->

<section id="article" class="col-md-8 col-sm-8">
  <div class="row">
    <?php if ( have_posts() ) : if ( is_home() && ! is_front_page() ) : ?>
    <header id="article-header">
      <h2 class="page-title screen-reader-text">
        <?php single_post_title(); ?>
      </h2>
      
      <!-- META ENTRY -->
      
      <div class="container">
        <div class="row">
          <ul class="entryMeta__info">
            <li> <i class="zmdi zmdi-face"></i> <span class="entry-author" itemscope="" itemtype="https://schema.org/Person"> <span itemprop="author">Author</span></span> </li>
            <li> <i class="zmdi zmdi-folder"></i> <a href="/">Category</a> </li>
            <li> <i class="zmdi zmdi-calendar"></i>
              <time datetime="2017-04-18T10:44:18+00:00" title="Date">March 25, 2018</time>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- META ENTRY --> 
      
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

		get_template_part( 'template-parts/content', 'search' );

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
