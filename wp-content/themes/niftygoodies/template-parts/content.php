<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */

?>

<div class="col-md-6 col-sm-6"><!-- .COL MD 6 -->
  <div class="entry-content"><!-- .ENTRY-CONTENT -->
    
    <article class="article-entry" id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- ARTICLE-ENTRY -->
      
      <header id="article-header"><!-- .ARTICLE-HEADER -->
        
        <?php if ( is_singular() ) : ?>
        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        <?php else : ?>
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
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
        
      </header><!-- .ARTICLE-HEADER -->
      
      <?php if ( has_post_thumbnail() ) { ?>
        <figure class="card card-thumbnail">
          <?php niftygoodies_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?>
        </figure>
      <?php } ?>
      <div class="excerpt">
      <?php
      if ( has_excerpt( $post->ID ) ) {
      // This post has excerpt

	    the_excerpt(
      sprintf(// WPCS: XSS OK.
      /* translators: %s: post author. */
      __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'niftygoodies' ),
      get_the_title()// WPCS: XSS OK.
      	)
      );
      
      } else {
      // This post has no excerpt
      the_content(
        sprintf(// WPCS: XSS OK.
        /* translators: %s: post author. */
        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'niftygoodies' ),
        get_the_title()// WPCS: XSS OK.
          )
        );
      }
      ?>
      </div>
    </article><!-- ARTICLE-ENTRY --> 
    
  <footer class="entry-footer"><!-- .ENTRY-FOOTER -->
    
    <?php niftygoodies_entry_footer(); ?>
  </footer><!-- .ENTRY-FOOTER-->
  
  </div><!-- .ENTRY-CONTENT -->
</div><!-- .COL MD 6 --> 

