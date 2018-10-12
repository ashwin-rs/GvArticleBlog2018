<div class="col-md-12 col-sm-12"><!-- .COL MD 12 -->
  <div class="entry-content"><!-- .ENTRY-CONTENT -->
    <header class="page-header"><!-- .PAGE-HEADER -->
      <h1 class="page-title">
        <?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'niftygoodies' ); ?>
      </h1>
    </header><!-- .PAGE-HEADER -->
    
    
    <div class="page-content<!-- .PAGE-CONTENT -->
    <p>
      <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'niftygoodies' ); ?>
    </p>

    <?php
		  get_search_form();
		  the_widget( 'WP_Widget_Recent_Posts' );
	  ?>

    <div class="widget widget_categories"><!-- .WIDGET -->
      <h2 class="widget-title">
        <?php esc_html_e( 'Most Used Categories', 'niftygoodies' ); ?>
      </h2>
      <ul>

    <?php
		  wp_list_categories( array(
		  'orderby'    => 'count',
		  'order'      => 'DESC',
		  'show_count' => 1,
		  'title_li'   => '',
		  'number'     => 10,
		  ) );
	  ?>
    
      </ul>
    </div><!-- .WIDGET -->
    
    
    <?php
		  /* translators: %1$s: smiley */
		  $niftygoodies_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'niftygoodies' ), convert_smilies( ':)' ) ) . '</p>';
		  the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$niftygoodies_archive_content" );
		  the_widget( 'WP_Widget_Tag_Cloud' );
	  ?>
  </div<!-- .PAGE-CONTENT -->
  
  <footer class="entry-footer"><!-- .ENTRY-FOOTER -->
    <?php niftygoodies_entry_footer(); ?>
  </footer><!-- .ENTRY-FOOTER --> 
  
</div><!-- .ENTRY-CONTENT -->

</div><!-- .COL MD 12 --> 