<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Crypto_News
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

				do_action( 'crypto_news_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to crypto_news_page_after action
				 *
				 * @hooked crypto_news_display_comments - 10
				 */
				do_action( 'crypto_news_page_after' );

			endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'crypto_news_sidebar' );
get_footer();
