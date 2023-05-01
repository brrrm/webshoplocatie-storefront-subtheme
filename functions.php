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

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action('woocommerce_after_shop_loop_item_title', 'webshoplocatie_woocommerce_after_shop_loop_item_title', 1);
function webshoplocatie_woocommerce_after_shop_loop_item_title(){
	woocommerce_template_loop_product_link_close();
	
	echo '<h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">'; 
	woocommerce_template_loop_product_link_open();
	echo get_the_title() . '</a></h2>';
	
	echo '<ul class="product-cats">' . wc_get_product_category_list( get_the_id(), '</li><li>', '<li>', '</li>' ) . '</ul>';
	wc_get_template( 'single-product/short-description.php' );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );
}


add_action( 'customize_register' , 'webshoplocatie_theme_options' );
function webshoplocatie_theme_options( $wp_customize ) {
	
	$wp_customize->add_section( 
		'webshoplocatie_social_media_options', 
		[
			'title'       => __( 'Social media settings', 'webshoplocatie' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Set your social media links here.', 'webshoplocatie'), 
		] 
	);

	$wp_customize->add_setting( 'social_media_facebook',
		[
			'default' => null
		]
	);

	$wp_customize->add_setting( 'social_media_twitter',
		[
			'default' => null
		]
	);

	$wp_customize->add_setting( 'social_media_pinterest',
		[
			'default' => null
		]
	);

	$wp_customize->add_setting( 'social_media_instagram',
		[
			'default' => null
		]
	);

	$wp_customize->add_setting( 'social_media_tiktok',
		[
			'default' => null
		]
	);

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'webshoplocatie_social_media_facebook_control',
		[
			'label'    	=> __( 'Facebook', 'webshoplocatie' ), 
			'section'  	=> 'webshoplocatie_social_media_options',
			'settings' 	=> 'social_media_facebook',
			'priority' 	=> 10,
			'type'		=> 'url',
			'description'	=> 'Voer hier de link naar de Facebook-pagina van jouw bedrijf in.'
		] 
	));

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'webshoplocatie_social_media_twitter_control',
		[
			'label'    	=> __( 'Twitter', 'webshoplocatie' ), 
			'section'  	=> 'webshoplocatie_social_media_options',
			'settings' 	=> 'social_media_twitter',
			'priority' 	=> 10,
			'type'		=> 'url',
			'description'	=> 'Voer hier de link naar de Twitter-profiel van jouw bedrijf in.'
		] 
	));

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'webshoplocatie_social_media_instagram_control',
		[
			'label'    	=> __( 'Instagram', 'webshoplocatie' ), 
			'section'  	=> 'webshoplocatie_social_media_options',
			'settings' 	=> 'social_media_instagram',
			'priority' 	=> 10,
			'type'		=> 'url',
			'description'	=> 'Voer hier de link naar de Instagram-pagina van jouw bedrijf in.'
		] 
	));

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'webshoplocatie_social_media_pinterest_control',
		[
			'label'    	=> __( 'Pinterest', 'webshoplocatie' ), 
			'section'  	=> 'webshoplocatie_social_media_options',
			'settings' 	=> 'social_media_pinterest',
			'priority' 	=> 10,
			'type'		=> 'url',
			'description'	=> 'Voer hier de link naar de Pinterest-profiel van jouw bedrijf in.'
		] 
	));

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'webshoplocatie_social_media_tiktok_control',
		[
			'label'    	=> __( 'Tiktok', 'webshoplocatie' ), 
			'section'  	=> 'webshoplocatie_social_media_options',
			'settings' 	=> 'social_media_tiktok',
			'priority' 	=> 10,
			'type'		=> 'url',
			'description'	=> 'Voer hier de link naar de Tiktok-pagina van jouw bedrijf in.'
		] 
	));


	// KVK & BTW

	
	$wp_customize->add_section( 
		'webshoplocatie_business_options', 
		[
			'title'       => __( 'Business registration', 'webshoplocatie' ),
			'priority'    => 110,
			'capability'  => 'edit_theme_options',
			'description' => __('Set your chamber of commerce and tax registartion numbers here.', 'webshoplocatie'), 
		] 
	);

	$wp_customize->add_setting( 'chamber_of_commerce',
		[
			'default' => null
		]
	);
	$wp_customize->add_setting( 'tax_number',
		[
			'default' => null
		]
	);

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'webshoplocatie_chamber_of_commerce_control',
		[
			'label'    	=> __( 'Chamber of commerce', 'webshoplocatie' ), 
			'section'  	=> 'webshoplocatie_business_options',
			'settings' 	=> 'chamber_of_commerce',
			'priority' 	=> 10,
			'type'		=> 'text',
			'description'	=> 'Voer hier het KVK-nummer van jouw bedrijf in.'
		] 
	));

	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'webshoplocatie_tax_number_control',
		[
			'label'    	=> __( 'Tax number', 'webshoplocatie' ), 
			'section'  	=> 'webshoplocatie_business_options',
			'settings' 	=> 'tax_number',
			'priority' 	=> 10,
			'type'		=> 'text',
			'description'	=> 'Voer hier het BTW-nummer van jouw bedrijf in.'
		] 
	));
}


/*
 * special purpose theming functions
 */
function webshoplocatie_social_media_links(){
	$theme_mods = get_option('theme_mods_webshoplocatie');
	$output = '';
	
	if (isset($output)){
		echo "<h3><strong>Volg ons op sociale media </strong></h3>";
	}
	if(isset($theme_mods['social_media_facebook'])
	|| isset($theme_mods['social_media_twitter'])
	|| isset($theme_mods['social_media_instagram'])
	|| isset($theme_mods['social_media_pinterest'])
	|| isset($theme_mods['social_media_tiktok'])){
		$output = '<ul class="social-media">';
	} 

	if(!isset($theme_mods[''])){
		echo "";
	}
	if(isset($theme_mods['social_media_facebook'])){
		$output .= '<li><a href="' . $theme_mods['social_media_facebook'] . '" class="icon facebook" target="_blank" rel="nofollow"> Facebook</a></li>';
	}
	if(isset($theme_mods['social_media_twitter'])){
		$output .= '<li><a href="' . $theme_mods['social_media_twitter'] . '" class="icon twitter" target="_blank" rel="nofollow"> Twitter</a></li>';
	}
	if(isset($theme_mods['social_media_instagram'])){
		$output .= '<li><a href="' . $theme_mods['social_media_instagram'] . '" class="icon instagram" target="_blank" rel="nofollow"> Instagram</a></li>';
	}
	if(isset($theme_mods['social_media_pinterest'])){
		$output .= '<li><a href="' . $theme_mods['social_media_pinterest'] . '" class="icon pinterest" target="_blank" rel="nofollow"> Pinterest</a></li>';
	}
	if(isset($theme_mods['social_media_tiktok'])){
		$output .= '<li><a href="' . $theme_mods['social_media_tiktok'] . '" class="icon tiktok" target="_blank" rel="nofollow"> TikTok</a></li>';
	}

	if(isset($theme_mods['social_media_facebook'])
	|| isset($theme_mods['social_media_twitter'])
	|| isset($theme_mods['social_media_instagram'])
	|| isset($theme_mods['social_media_pinterest'])
	|| isset($theme_mods['social_media_tiktok'])){
		$output .= '</ul>';
	}

	
	echo $output;
}
function social_media_links(){

}
function webshoplocatie_business_info(){
	$theme_mods = get_option('theme_mods_webshoplocatie');
	$output = '';
	if(isset($theme_mods['chamber_of_commerce']) || isset($theme_mods['tax_number'])){
		$output .= '<dl>';
	}

	if(isset($theme_mods['chamber_of_commerce'])){
		$output .= '<dt>KVK:</dt><dd>' . $theme_mods['chamber_of_commerce'] . '</dd>';
	}
	if(isset($theme_mods['tax_number'])){
		$output .= '<dt>BTW:</dt><dd>' . $theme_mods['tax_number'] . '</dd>';
	}

	if(isset($theme_mods['chamber_of_commerce']) || isset($theme_mods['tax_number'])){
		$output .= '</dl>';
	}

	echo $output;
}
