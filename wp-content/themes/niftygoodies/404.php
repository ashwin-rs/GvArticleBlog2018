<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package niftygoodies
 */
?>
<?php get_header(); ?>

<div id="primary" class="content-area container">
<main id="main" class="row site-main">
<!--MAIN-->
<section id="article" class="col-md-8 col-sm-8">
  <div class="row">
    <?php get_template_part( 'template-parts/content', '404' );?>
  </div>
</section>
<?php get_sidebar();?>
<?php get_footer();?>
