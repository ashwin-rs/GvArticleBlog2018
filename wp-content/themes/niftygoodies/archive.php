<?php
/**
 * The template for displaying archive pages
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
  <header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header>
  <div class="row">
    
    <?php if ( have_posts() ) : if ( is_home() && ! is_front_page() ) : ?>
    
    <header id="article-header">
      <h2 class="page-title screen-reader-text">
        <?php single_post_title(); ?>
      </h2>
      
        <!-- META ENTRY -->
        <?php if ( 'post' === get_post_type() ) :?>
        <div class="container">
          <div class="row">
            <ul class="entry-meta">
              <li> <i class="zmdi zmdi-face"></i> <span class="entry-author" itemscope="" itemtype="https://schema.org/Person"> <span itemprop="author">
                <?php niftygoodies_posted_by();?>
                </span> </span> </li>
              <li> <i class="zmdi zmdi-calendar"></i> <span class="entry-date" itemscope="" itemtype="https://schema.org/Date"> <span itemprop="date">
                <time datetime="<?php the_time('Y-m-d') ?>" title="<?php the_time('F j, Y') ?>">
                  <?php niftygoodies_posted_on(); ?>
                </time>
                </span> </span> </li>
              <li>
                <?php niftygoodies_edit_post();?>
              </li>
            </ul>
          </div>
        </div>
        <?php endif; ?>
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

		get_template_part( 'template-parts/content', 'archive' );

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
