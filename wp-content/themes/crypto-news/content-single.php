<?php
/**
 * Template used to display post content on single pages.
 *
 * @package Crypto_News
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'crypto_news_single_post_top' );

	/**
	 * Functions hooked into crypto_news_single_post add_action
	 *
	 * @hooked crypto_news_single_post_header          - 10
	 * @hooked crypto_news_single_post_thumbnail            - 20
	 * @hooked crypto_news_post_content         - 30
	 */
	do_action( 'crypto_news_single_post' );

	/**
	 * Functions hooked in to crypto_news_single_post_bottom action
	 *
	 * @hooked crypto_news_post_nav         - 10
	 * @hooked crypto_news_display_comments - 20
	 */
	do_action( 'crypto_news_single_post_bottom' );
	?>

</div><!-- #post-## -->
