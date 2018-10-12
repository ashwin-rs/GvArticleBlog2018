<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package niftygoodies
 */
 
function niftygoodies_edit_post() {
	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( ' Edit <span class="screen-reader-text">%s</span>', 'niftygoodies' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<i class="zmdi zmdi-edit"></i><span class="edit-link">',
		'</span>'
	);
}

if ( ! function_exists( 'niftygoodies_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function niftygoodies_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( '' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('M j, Y') ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		
		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'; // WPCS: XSS OK.
		
	}
endif;

if ( ! function_exists( 'niftygoodies_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function niftygoodies_posted_by() {
		$byline = sprintf(// WPCS: XSS OK.
			/* translators: %s: post author. */
			__( ' %s', 'niftygoodies' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}

endif;

if ( ! function_exists( 'niftygoodies_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function niftygoodies_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'niftygoodies' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . '<i class="zmdi zmdi-folder"></i>' . esc_html__( ' %1$s', 'niftygoodies' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'niftygoodies' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . '<i class="zmdi zmdi-tag"></i>' . esc_html__( ' %1$s', 'niftygoodies' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"><i class="zmdi zmdi-comments"></i>';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( ' Leave a Comment<span class="screen-reader-text"> on %s</span>', 'niftygoodies' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'niftygoodies_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function niftygoodies_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

<div class="post-thumbnail">
  <?php the_post_thumbnail(); ?>
</div>
<!-- .post-thumbnail -->

<?php else : ?>

<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">

<?php
	the_post_thumbnail();
?>
</a>

<?php
		endif; // End is_singular().
	}
endif;