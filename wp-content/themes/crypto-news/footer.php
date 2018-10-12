<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Crypto_News
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'crypto_news_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to crypto_news_footer action
			 *
			 * @hooked crypto_news_footer_widgets - 10
			 * @hooked crypto_news_credit         - 20
			 */
			//do_action( 'crypto_news_footer' ); 
			//
			

			?>
<p>Copyright © 2018, Reviewtech.
	
</p>
		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
