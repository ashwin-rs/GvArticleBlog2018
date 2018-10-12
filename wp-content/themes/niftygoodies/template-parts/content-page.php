<?php
/**
 * Template part for displaying page content in page-portfolio.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */

?>

<div class="col-md-12 col-sm-12"><!-- .COL MD 12 -->
  <div class="entry-content"><!-- .ENTRY-CONTENT -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- .ARTICLE -->
      <header class="entry-header"><!-- .HEADER -->
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      </header><!-- .HEADER -->
      <?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'niftygoodies' ),
			'after'  => '</div>',
		) );
		?>
      
      <?php if ( get_edit_post_link() ) : ?>
      <footer class="entry-footer"><!-- .ENTRY-FOOTER -->
        <?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'niftygoodies' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
      </footer><!-- .ENTRY-FOOTER -->
      
      <?php endif; ?>
    </article><!-- .ARTICLE -->
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
  </div><!-- .ENTRY-CONTENT -->
</div><!-- .COL MD 12 -->