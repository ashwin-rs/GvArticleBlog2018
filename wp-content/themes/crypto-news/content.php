<?php
/**
 * Template used to display post content.
 *
 * @package Crypto_News
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to crypto_news_loop_post action.
	 *
	 * @hooked crypto_news_loop_posts          - 10
	 */
	do_action( 'crypto_news_loop_post' );
	?>

</article><!-- #post-## -->
