<?php
/**
 * Crypto News Callback Function
 *
 * @package Crypto_News
 */

/**
 * Display list style post
 * @since 1.0.0
 */
if ( ! function_exists ('crypto_news_post_style_list_callback') ) {

	function crypto_news_post_style_list_callback() {
		global $wp_query;
		


		$class_last = '';

		if ( $wp_query->current_post == ($wp_query->post_count -1) ) {
			$class_last = ' last-post';
		}

			// the thumbnail
			$size = apply_filters( 'crypto_news_list_thumbnail_size', 'medium' );
			
		?>
		<div class="cn-post-list <?php echo $class_last ?>">
			<aside class="post-thumbnail">
				<?php crypto_news_post_thumbnail( $size ); ?>
			</aside>
			<div class="header-content">
				<?php
					crypto_news_post_header();
					crypto_news_post_content();
				?>
			</div>
		</div>

		<?php
	}
	
}