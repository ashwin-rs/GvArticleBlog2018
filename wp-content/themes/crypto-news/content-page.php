<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Crypto_News
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to crypto_news_page add_action
	 *
	 * @hooked crypto_news_page_header          - 10
	 * @hooked crypto_news_page_content         - 20
	 */
	do_action( 'crypto_news_page' );
	?>
</div><!-- #post-## -->
