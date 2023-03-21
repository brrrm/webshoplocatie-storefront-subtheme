<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<aside class="webshoplocatie-banner">
		<a class="webshoplocatie-logo" href="https://www.webshoplocatie.nl/"  target="_blank" title="Shop verder op webshoplocatie.nl"><img src="<?php echo get_stylesheet_directory_uri(). '/img/webshoplocatie-logo-zwart.png'; ?>" /></a>
		<p>Dit is de afrekenwebsite voor <?php echo get_bloginfo('name'); ?> , <button class="wl-whatsthis">Wat is dit?</button></p>
		<a class="wl-cart-btn" href="<?php wc_get_cart_url(); ?>">Afrekenen</a>
		<div class="wl-explanation">
			<h3>Dit is de afrekenwebsite voor <?php echo get_bloginfo('name'); ?></h3>
			<p>Op deze website kan je producten afrekenen. Om af te rekenen, ga je naar de <a href="/checkout">kassa</a>.</p>
			<p>Als je verder wilt shoppen ga dan naar <a href="https://www.webshoplocatie.nl/shops">webshoplocatie.nl/shops</a></p>
			<p>Wil je meer informatie over Webshoplocatie.nl? Kijk dan eens op <a href="https://www.webshoplocatie.nl">onze website</a>.</p>
			<button class="wl-close">Close</button>
		</div>
	</aside>
	<header id="main-header">
		<div id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
		
			</div><!-- #masthead -->
		
		<div id="content-header" class="content-header" role="banner" >

			<?php
			/**
			 * Functions hooked into storefront_header action
			 *
			 * @hooked storefront_header_container                 - 0
			 * @hooked storefront_skip_links                       - 5
			 * @hooked storefront_social_icons                     - 10
			 * @hooked storefront_site_branding                    - 20
			 * @hooked storefront_secondary_navigation             - 30
			 * @hooked storefront_product_search                   - 40
			 * @hooked storefront_header_container_close           - 41
			 * @hooked storefront_primary_navigation_wrapper       - 42
			 * @hooked storefront_primary_navigation               - 50
			 * @hooked storefront_header_cart                      - 60
			 * @hooked storefront_primary_navigation_wrapper_close - 68
			 */
			do_action( 'storefront_header' );
			?>

			<div class="shop-headerblok">
				<h2><?php echo get_bloginfo('name'); ?></h2>
				<div class="reviews">
					<p class="sales-total">29.097 reviews  | </p>
					<div class="stars">  </div>
				</div>
				<p class="user-selling-points">
					Vlotte verzending Staat bekend om tijdige verzending met tracking.<br>
					Niet goed, geld terug<br>
					Gratis retour<br>
				</p>
			</div>
			</div>
	</header>
	
	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">
		
		<?php
		do_action( 'storefront_content_top' );
