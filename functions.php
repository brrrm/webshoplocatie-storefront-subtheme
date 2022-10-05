<?php


add_action('init', 'webshoplocatie_header_scripts'); // Add Custom Scripts to wp_head
function webshoplocatie_header_scripts(){
	$v = '0.1';
    wp_register_script('watisdit', get_stylesheet_directory_uri() . '/js/watisdit.js', array('jquery'), $v);
    wp_enqueue_script('watisdit');
}

add_action( 'storefront_footer', 'remove_storefront_credit' );
function remove_storefront_credit(){
	remove_action( 'storefront_footer', 'storefront_credit', 20 );	
}

add_action( 'storefront_header', 'remove_storefront_product_search' );
function remove_storefront_product_search(){
	remove_action('storefront_header', 'storefront_product_search', 40);
}

add_filter( 'woocommerce_rest_api_get_rest_namespaces', 'woo_system_api' );
function woo_system_api( $controllers ) {
	require_once __DIR__ . '/classes/woo_system_api.php';
	$controllers['wc/v3']['system'] = 'WC_REST_system_api_controller';

	return $controllers;
}