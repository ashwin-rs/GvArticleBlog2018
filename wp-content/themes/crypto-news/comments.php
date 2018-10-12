<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Crypto_News
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area" aria-label="<?php esc_attr_e( 'Post Comments', 'crypto-news' ); ?>">

	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$crypto_news_comment_count = get_comments_number();
			if ( '1' === $crypto_news_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'crypto-news' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $crypto_news_comment_count, 'comments title', 'crypto-news' ) ),
					number_format_i18n( $crypto_news_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comment Navigation Above', 'crypto-news' ); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'crypto-news' ); ?></span>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'crypto-news' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'crypto-news' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'callback'   => 'crypto_news_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through. ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comment Navigation Below', 'crypto-news' ); ?>">
			<span class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'crypto-news' ); ?></span>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'crypto-news' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'crypto-news' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation.

	endif;

	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'crypto-news' ); ?></p>
	<?php endif;

	$args = apply_filters( 'crypto_news_comment_form_args', array(
		'title_reply_before' => '<span id="reply-title" class="gamma comment-reply-title">',
		'title_reply_after'  => '</span>',
	) );

	comment_form( $args ); ?>

</section><!-- #comments -->
