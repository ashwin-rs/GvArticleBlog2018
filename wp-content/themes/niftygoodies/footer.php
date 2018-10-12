<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package niftygoodies
 */

?>

</main><!-- .MAIN -->

</div><!-- .PRIMARY -->

<footer id="colophon" class="footer site-footer"><!-- .FOOTER --> 

  <div class="footer-secondary-links">
    <ul class="site-info">
      <li> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'niftygoodies' ) ); ?>">
        <?php
		  	/* translators: %s: CMS name, i.e. WordPress. */
			  printf( esc_html__( 'Proudly powered by %s', 'niftygoodies' ), 'WordPress' );
		    ?>
        </a> </li>
      <li><span class="sep"> &mdash; </span></li>
      <li>
        <?php
			  /* translators: 1: Theme name, 2: Theme author. */
			  printf( esc_html__('%1$s BY %2$s.', 'niftygoodies' ), 'NIFTYGOODIES THEME', '<a href="'.esc_url( __( 'https://www.niftygoodies.com', 'niftygoodies' ) ).'" rel="niftygoodies" title="NIFTYGOODIES.COM">NIFTYGOODIES.COM</a>' );
		    ?>
      </li>
    </ul>

  </div>
</footer><!-- .FOOTER -->

</div><!-- .CONTENT -->

</div><!-- .CONTAINER -->

<?php wp_footer(); ?>

</body><!-- .BODY -->
</html>