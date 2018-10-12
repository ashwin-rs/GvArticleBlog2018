
<?php
/**
 * Template part for displaying page content in page-portfolio.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package niftygoodies
 */

?>

<div class="col-md-12 col-sm-12"><!-- COL MD 12 -->
  <div class="entry-content"><!-- .ENTRY-CONTENT -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><!-- .ARTICLE -->
      <header id="article-header"><!-- ARTICLE-HEADER -->
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
        
      </header><!-- ARTICLE-HEADER -->
      
    </article><!-- .ARTICLE -->
    
    
    <footer class="entry-footer"><!-- .ENTRY-FOOTER -->
      <?php niftygoodies_entry_footer(); ?>
    </footer><!-- .ENTRY-FOOTER --> 
    
  </div><!-- .ENTRY-CONTENT -->
   
</div><!-- COL MD 12 --> 