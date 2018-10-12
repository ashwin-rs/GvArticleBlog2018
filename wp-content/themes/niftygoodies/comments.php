<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */

/* niftygoodies
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
 
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
  <?php
	// YOU CAN START EDITING HERE -- INCLUDING THIS COMMENT!
	if ( have_comments() ) :
		?>
  <h2 class="comments-title">
    <?php
	$niftygoodies_comment_count = get_comments_number();
		if ( '1' === $niftygoodies_comment_count ) {
			printf(
			/* translators: 1: title. */
			esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'niftygoodies' ),
				'<span>' . get_the_title() . '</span>'
			);
			} 
		
		else {
			printf( // WPCS: XSS OK.
			
			/* translators: 1: comment count number, 2: title. */
			esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $niftygoodies_comment_count, 'comments title', 'niftygoodies' ) ),
			number_format_i18n( $niftygoodies_comment_count ),
				'<span>' . get_the_title() . '</span>'
			);
			}
	?>
  </h2>
  <!-- .comments-title -->
  
  <?php the_comments_navigation(); ?>
  <ol class="comment-list">
    <?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
  </ol>
  <!-- .comment-list -->
  
  <?php
		the_comments_navigation();
	
		// IF COMMENTS ARE CLOSED AND THERE ARE COMMENTS, LET'S LEAVE A LITTLE NOTE, SHALL WE?

		if ( ! comments_open() ) :
	?>
  <p class="no-comments">
    <?php esc_html_e( 'Comments are closed.', 'niftygoodies' ); ?>
  </p>
  <?php
		endif;

		endif; 
		// CHECK FOR HAVE_COMMENTS().

		comment_form();
	?>
</div>
<!-- #comments --> 
