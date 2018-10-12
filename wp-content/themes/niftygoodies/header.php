<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package niftygoodies
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="50">

<header id="masthead" class="site-header" role="banner"><!-- .HEADER --> 
	
<nav class="navbar  navbar-expand-md" id="main-navbar"><!-- .NAV --> 
<div class="container">
	<div class="col-md-4 site-branding"><!--COL MD 4-->
    <span class="navbar-brand">

	<?php if (function_exists('the_custom_logo')) : ?>	                            
		<?php echo '<div class="site-logo">'; ?>
			<?php the_custom_logo(); ?>
		<?php echo '</div>'; ?>    
	<?php endif; ?>
							
		<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
		
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	</span>
</div><!--COL MD 4-->

<div class="col-md-8 toggler-collapse"><!---COL MD 8 -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"><?php esc_html_e('MENU','niftygoodies');?></span>
    </button>
 		
<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

	<?php
		wp_nav_menu( array(
		'menu'              => 'primary',
		'theme_location'    => 'primary',
		'depth'             => 4,
		'container'         => 'div',
		'container_id'      => 'bs-example-navbar-collapse-1',
		'menu_class'        => 'navbar-nav',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker())
		);
	?>

</div>
</div><!---COL MD 8 -->
</div>
</nav><!-- .NAV -->

</header><!--. HEADEAR -->


<div id="page" class="container"><!-- .CONTAINER -->

<div id="content" class="row site-content">
	<div class="flex-box">
  	<?php if ( has_header_image() ) : ?>
  		<img src="<?php echo( get_header_image() );// WPCS: XSS OK. ?>" alt="<?php echo( get_bloginfo( 'title' ) );// WPCS: XSS OK. ?>" />
  	<?php else : ?>
  		<img src="<?php echo esc_url( get_template_directory_uri() )?>/img/niftygoodies.jpg" alt="" class="img-fluid">
  	<?php endif; ?>
</div>
