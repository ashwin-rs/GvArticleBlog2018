<?php 
/* Template Name: Portfolio */ 
?>
<?php get_header(); ?>

<div id="primary" class="content-area container">
<main id="main" class="row site-main"><!--.SITE-MAIN -->

<section id="article" class="col-md-12 col-sm-12">
  <div class="row">
    <?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'portfolio' );

		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// comments_template();
		// endif;

	endwhile; // End of the loop.
	?>
  </div>
</section>
<?php get_footer();?>
