<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Crypto_News
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'crypto_news_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php 
	/**
	 * Functions hooked in to crypto_news_before_header
	 *
	 */
	do_action( 'crypto_news_before_header' ); 
	?>

	<header id="masthead" class="site-header" role="banner" style="<?php crypto_news_header_styles(); ?>">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked into crypto_news_header action
			 *
			 * @hooked crypto_news_site_branding                    - 10
			 * @hooked crypto_news_header_banner          			- 20
			 * @hooked crypto_news_primary_navigation               - 30
			 */
			do_action( 'crypto_news_header' ); ?>

		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to crypto_news_before_content
	 *
	 */
	do_action( 'crypto_news_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * Functions hooked in to crypto_news_content_top
		 *
		 */
		do_action( 'crypto_news_content_top' );
