<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */

?>

<!--START-->

<div class="col-md-12 col-sm-12">
  <!-- ENTRY 1 -->
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header class="entry-header">
      <h1 class="page-title">
        <?php esc_html_e( 'Nothing Found', 'niftygoodies' ); ?>
      </h1>
    </header>
    <!-- .entry-header -->
    <section class="no-results not-found">
      <div class="page-content">
        <?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'niftygoodies' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
		?>
        <p>
          <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'niftygoodies' ); ?>
        </p>
        <?php
			get_search_form();

		else :
			?>
        <p>
          <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'niftygoodies' ); ?>
        </p>
        <?php
			get_search_form();

		endif;
		?>
      </div>
      <!-- .page-content --> 
    </section>
  </article>
  <!-- ENTRY 1 -->
  <?php //the_ID(); ?>
  <?php if ( has_post_thumbnail() ) { ?>
  <figure class="card card-thumbnail">
    <?php niftygoodies_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
  </figure>
  <?php } ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <!-- .entry-summary -->
  
  <footer class="entry-footer">
    <?php niftygoodies_entry_footer(); ?>
  </footer>
  <!-- .entry-footer -->
  </article>
  <!-- #post-<?php //the_ID(); ?> --> 
</div>