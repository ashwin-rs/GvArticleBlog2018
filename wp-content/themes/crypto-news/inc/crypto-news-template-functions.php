<?php
/**
 * Crypto News Template Functions
 *
 * @package Crypto_News
 */

if ( ! function_exists( 'crypto_news_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function crypto_news_site_branding() {
		?>
		<div class="site-branding">
			<?php crypto_news_site_title_or_logo(); ?>
		</div>
		<?php
	}
}

if ( ! function_exists('crypto_news_header_banner') ) {
	function crypto_news_header_banner() {
		
		$default = sprintf('<img src="%s" alt="%s"/>', get_template_directory_uri() . '/assets/images/header-banner.jpeg', __('Crypto News Header Bannaer', 'crypto-news'));

		$banner = apply_filters('crypto_news_header_banner', $default );
		?>
			<div class="header-banner">
				<?php echo $banner; ?>
			</div>
		<?php
	}
}

if ( ! function_exists( 'crypto_news_get_sidebar' ) ) {
	/**
	 * Display crypto news sidebar
	 *
	 * @uses get_sidebar()
	 * @since 1.0.0
	 */
	function crypto_news_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'crypto_news_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function crypto_news_footer_widgets() {
		$rows    = intval( apply_filters( 'crypto_news_footer_widget_rows', 1 ) );
		$regions = intval( apply_filters( 'crypto_news_footer_widget_columns', 4 ) );

		for ( $row = 1; $row <= $rows; $row++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region-- ) {
				if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) : ?>
				<div class=<?php echo '"footer-widgets row-' . strval( $row ) . ' col-' . strval( $columns ) . ' fix"'; ?>><?php

					for ( $column = 1; $column <= $columns; $column++ ) :
						$footer_n = $column + $regions * ( $row - 1 );

						if ( is_active_sidebar( 'footer-' . strval( $footer_n ) ) ) : ?>

							<div class="block footer-widget-<?php echo strval( $column ); ?>">
								<?php dynamic_sidebar( 'footer-' . strval( $footer_n ) ); ?>
							</div><?php

						endif;
					endfor; ?>

				</div><!-- .footer-widgets.row-<?php echo strval( $row ); ?> --><?php

				unset( $columns );
			endif;
		endfor;
	}
}

if ( ! function_exists( 'crypto_news_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function crypto_news_credit() {
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'crypto_news_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
			<?php if ( apply_filters( 'crypto_news_credit_link', true ) ) { ?>
			<?php echo '<a href="https://coinxconverter.com/" target="_blank" title="' . esc_attr__( 'Free Cryptocurrency News', 'crypto-news' ) . '" rel="author">' . esc_html__( 'Designed by Coinx Team', 'crypto-news' ) . '</a>' ?>
			<?php } ?>
		</div><!-- .site-info -->
		<?php
	}
}


if ( ! function_exists( 'crypto_news_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function crypto_news_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_front_page() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			// Copied from jetpack_the_site_logo() function.
			$logo    = site_logo()->logo;
			$logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo
			$logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
			$size    = site_logo()->theme_size();
			$html    = sprintf( '<a href="%1$s" class="site-logo-link" rel="home" itemprop="url">%2$s</a>',
				esc_url( home_url( '/' ) ),
				wp_get_attachment_image(
					$logo_id,
					$size,
					false,
					array(
						'class'     => 'site-logo attachment-' . $size,
						'data-size' => $size,
						'itemprop'  => 'logo'
					)
				)
			);

			$html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
		} else {
			$tag = is_front_page() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo $html;
	}
}

if ( ! function_exists( 'crypto_news_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function crypto_news_primary_navigation() {
		?>
		<div class="crypto-news-primary-navigation">
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'crypto-news' ); ?>">
		<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false"><span><?php echo esc_html( apply_filters( 'crypto_news_menu_toggle_text', __( 'Menu', 'crypto-news' ) ) ); ?></span></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'primary',
					'container_class'	=> 'primary-navigation',
					)
			);
			?>
		</nav><!-- #site-navigation -->
		</div>
		<?php
	}
}

if ( ! function_exists( 'crypto_news_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function crypto_news_post_header() {
		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			crypto_news_posted_on();
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			if ( 'post' == get_post_type() ) {
				crypto_news_posted_on();
			}

			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}
if ( ! function_exists( 'crypto_news_single_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function crypto_news_single_post_header() {
		?>
		<header class="entry-header">
		<?php

			do_action('crypto_news_single_post_before_title');

			the_title( '<h1 class="entry-title">', '</h1>' );

			do_action('crypto_news_single_post_after_title');
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists('crypto_news_single_post_meta_before') ) {

	function crypto_news_single_post_meta_before() {

		$show_before_title = apply_filters('crypto_news_single_post_before_title_show', false);
		$meta_show = apply_filters('crypto_news_single_post_before_title_meta_show', array('author', 'date' ) );

		if ( $show_before_title ) {
			?>
			<div class="post-meta pm-before">
			<?php
				echo crypto_news_single_post_meta_on( $meta_show );
			?>
			</div>
			<?php	
		}

		

	}
}

if ( ! function_exists('crypto_news_single_post_meta_after') ) {

	function crypto_news_single_post_meta_after() {

		$show_after_title = apply_filters('crypto_news_single_post_before_title_show', true);
		$meta_show = apply_filters('crypto_news_single_post_before_title_meta_show', array('author', 'date' ) );
		if ( $show_after_title ) {
			?>
			<div class="post-meta pm-after">
			<?php
			 echo crypto_news_single_post_meta_on( $meta_show );
			?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists('crypto_news_single_post_meta_on') ) {

	function crypto_news_single_post_meta_on( $args = array() ) {


		$seperate = apply_filters( 'crypto_news_meta_serperate', '<span class="sep"> - </span>');

		$show = array();

		foreach ($args as $k ) {
			
			switch ( $k ) {
				case 'date':
					$show[] = crypto_news_meta_date();
					break;
				
				case 'author':
					$show[] = crypto_news_meta_author();
					break;
				case 'category':
					$show[] = crypto_news_meta_date();
					break;
				case 'tag':
					$show[] = crypto_news_meta_date();
					break;
				case 'comment':
					$show[] = crypto_news_meta_date();
					break;
			}
		}

		$meta = implode($seperate, $show );

		return apply_filters( 'crypto_news_single_post_meta_on' , $meta );
	}
}

function crypto_news_meta_date() {

	$show_last_update = apply_filters('crypto_news_meta_date_show_last_update', true);

	$date_prefix = apply_filters('crypto_news_meta_date_show_prefix', sprintf('<span class="meta-prefix">%s</span>', __('Last updated:', 'crypto-news') ) );

	$attr_date = esc_attr ( $show_last_update == true ? get_the_modified_date( 'c' ) : get_the_date( 'c' ) );
	$html_date = esc_html( $show_last_update == true ? get_the_modified_date() : get_the_date() );

	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	return sprintf($time_string, $attr_date, $date_prefix. ' <span class="date">' . $html_date . '</span>');
}

function crypto_news_meta_author() {

	$label =  __( 'Written by', 'crypto-news' );

	$author =  sprintf( '<a href="%1$s" class="url fn" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );
	
	return sprintf( '<span class="vcard author">%s</span>', $label . ' ' . $author);
	
	
}


if ( ! function_exists( 'crypto_news_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function crypto_news_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			_x( 'Posted on %s', 'post date', 'crypto-news' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo wp_kses( apply_filters( 'crypto_news_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on ), array(
			'span' => array(
				'class'  => array(),
			),
			'a'    => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
			),
			'time' => array(
				'datetime' => array(),
				'class'    => array(),
			),
		) );
	}
}
if ( ! function_exists( 'crypto_news_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function crypto_news_post_meta() {
		?>
		<aside class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search.

			?>
			<div class="vcard author">
				<?php
					echo get_avatar( get_the_author_meta( 'ID' ), 128 );
					echo '<div class="label">' . esc_attr__( 'Written by', 'crypto-news' ) . '</div>';
					echo sprintf( '<a href="%1$s" class="url fn" rel="author">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );
				?>
			</div>
			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'crypto-news' ) );

			if ( $categories_list ) : ?>
				<div class="cat-links">
					<?php
					echo '<div class="label">' . esc_html__( 'Posted in', 'crypto-news' ) . '</div>';
					echo wp_kses_post( $categories_list );
					?>
				</div>
			<?php endif; // End if categories. ?>

			<?php
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'crypto-news' ) );

			if ( $tags_list ) : ?>
				<div class="tags-links">
					<?php
					echo '<div class="label">' . esc_attr( __( 'Tagged', 'crypto-news' ) ) . '</div>';
					echo wp_kses_post( $tags_list );
					?>
				</div>
			<?php endif; // End if $tags_list. ?>

		<?php endif; // End if 'post' == get_post_type(). ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<div class="comments-link">
					<?php echo '<div class="label">' . esc_attr__( 'Comments', 'crypto-news' ) . '</div>'; ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'crypto-news' ), __( '1 Comment', 'crypto-news' ), __( '% Comments', 'crypto-news' ) ); ?></span>
				</div>
			<?php endif; ?>
		</aside>
		<?php
	}
}

if ( ! function_exists('crypto_news_loop_posts') ) {

	function crypto_news_loop_posts() {


		$post_style = apply_filters( 'crypto_news_post_style', 'list' );

		$fun_name = 'crypto_news_post_style_' . $post_style . '_callback';
		$fun_name = function_exists( $fun_name ) ? $fun_name : 'crypto_news_post_style_list_callback';

		// Call user function callback
		call_user_func( $fun_name ); 
	}
}

if ( ! function_exists( 'crypto_news_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function crypto_news_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to crypto_news_post_content_before action.
		 *
		 * @hooked crypto_news_post_thumbnail - 10
		 */
		do_action( 'crypto_news_post_content_before' );

		$full_content = apply_filters('crypto_news_show_full_content', false);

		if ( $full_content || is_singular() ) {

			the_content(
				sprintf(
					__( 'Continue reading %s', 'crypto-news' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);
		} else {
			the_excerpt();
		}

		do_action( 'crypto_news_post_content_after' );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'crypto-news' ),
			'after'  => '</div>',
		) );
		?>
		</div><!-- .entry-content -->
		<?php
	}
}
if ( ! function_exists( 'crypto_news_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function crypto_news_paging_nav() {
		global $wp_query;

		$args = array(
			'type' 	    => 'list',
			'next_text' => _x( 'Next', 'Next post', 'crypto-news' ),
			'prev_text' => _x( 'Previous', 'Previous post', 'crypto-news' ),
			);

		the_posts_pagination( $args );
	}
}
if ( ! function_exists( 'crypto_news_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function crypto_news_post_header() {
		?>
		<header class="entry-header">
		<?php
		if ( is_single() ) {
			crypto_news_posted_on();
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			if ( 'post' == get_post_type() ) {
				crypto_news_posted_on();
			}

			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
		?>
		</header><!-- .entry-header -->
		<?php
	}
}
if ( ! function_exists( 'crypto_news_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function crypto_news_post_nav() {
		$args = array(
			'next_text' => '%title',
			'prev_text' => '%title',
			);
		the_post_navigation( $args );
	}
}
if ( ! function_exists( 'crypto_news_display_comments' ) ) {
	/**
	 * Crypto News display comments
	 *
	 * @since  1.0.0
	 */
	function crypto_news_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif;
	}
}
if ( ! function_exists( 'crypto_news_single_post_thumbnail' ) ) {
	/**
	 * The single post thumbnail
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function crypto_news_single_post_thumbnail() {

		$size = apply_filters('crypto_news_single_post_thumbnail_size', 'full');
		$show = apply_filters('crypto_news_single_post_thumbnail_show', true);

		if ( $show ) {
			?>
			<div class="post-thumbnail">
			<?php
			crypto_news_post_thumbnail( $size );
			?>
			</div>
			<?php
		}

	}
}
if ( ! function_exists( 'crypto_news_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.0.0
	 */
	function crypto_news_post_thumbnail( $size = 'medium') {

		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		}
		
	}
}

if ( ! function_exists( 'crypto_news_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function crypto_news_page_header() {
		?>
		<header class="entry-header">
			<?php
			crypto_news_post_thumbnail( 'full' );
			the_title( '<h1 class="entry-title">', '</h1>' );
			?>
		</header><!-- .entry-header -->
		<?php
	}
}
if ( ! function_exists( 'crypto_news_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function crypto_news_page_content() {
		?>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'crypto-news' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'crypto_news_comment' ) ) {
	/**
	 * Crypto News comment template
	 *
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int   $depth the comment depth.
	 * @since 1.0.1
	 */
	function crypto_news_comment( $comment, $args, $depth ) {
		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-body">
		<div class="comment-meta commentmetadata">
			<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 128 ); ?>
			<?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'crypto-news' ), get_comment_author_link() ); ?>
			</div>
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'crypto-news' ); ?></em>
				<br />
			<?php endif; ?>

			<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
				<?php echo '<time datetime="' . get_comment_date( 'c' ) . '">' . get_comment_date() . '</time>'; ?>
			</a>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-content">
		<?php endif; ?>
		<div class="comment-text">
		<?php comment_text(); ?>
		</div>
		<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		<?php edit_comment_link( __( 'Edit', 'crypto-news' ), '  ', '' ); ?>
		</div>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
	<?php
	}
}