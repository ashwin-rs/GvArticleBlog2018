<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */
?>

<div class="col-md-12 col-sm-12"><!-- .COL MD 12 -->
  <div class="entry-content"><!-- .ENTRY-CONTENT -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- ARTICLE -->
      
      <header id="article-header"><!-- ARTICLE-HEADER -->
        <?php if ( is_singular() ) : ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <?php else : ?>
        <?php 
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
	  		?>
        <?php endif; ?>
        
        <!-- META ENTRY -->
        <?php if ( 'post' === get_post_type() ) :?>
        <div class="container">
          <div class="row">
            <ul class="entry-meta">
              <li> <i class="zmdi zmdi-face"></i> <span class="entry-author" itemscope="" itemtype="https://schema.org/Person"> <span itemprop="author">
                <?php niftygoodies_posted_by();?>
                </span> </span> </li>
              <li> <i class="zmdi zmdi-calendar"></i> <span class="entry-date" itemscope="" itemtype="https://schema.org/Date"> <span itemprop="date">
                <time datetime="<?php the_time('Y-m-d') ?>" title="<?php the_time('F j, Y') ?>">
                  <?php niftygoodies_posted_on(); ?>
                </time>
                </span> </span> </li>
              <li>
                <?php niftygoodies_edit_post();?>
              </li>
            </ul>
          </div>
        </div>
        <?php endif; ?>
        <!-- META ENTRY --> 
        
      </header><!-- ARTICLE-HEADER -->
      <?php
	the_content( sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'niftygoodies' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),

	get_the_title()

	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'niftygoodies' ),
		'after'  => '</div>',
	) );
	?>
    </article><!-- ARTICLE -->
     
  <footer class="entry-footer"><!-- .ENTRY-FOOTER -->
    <?php niftygoodies_entry_footer(); ?>
    <?php the_post_navigation();?>
  </footer><!-- .ENTRY-FOOTER -->
  
	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
		comments_template();
		endif;
	?>
    </div><!-- .ENTRY-CONTENT -->
</div><!-- .COL MD 12 -->