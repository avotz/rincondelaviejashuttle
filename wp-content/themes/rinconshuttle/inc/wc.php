<?php

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
   // add_theme_support( 'wc-product-gallery-lightbox' );
}

add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');
function jk_related_products_args($args)
{
    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 2 columns
    return $args;
}
//Display 24 products on archive pages
add_filter('loop_shop_per_page', create_function('$cols', 'return 10;'), 20);

// add this code directly, no action needed
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);


remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

//remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
//add_action('woocommerce_before_single_product_summary', 'woocommerce_output_product_data_tabs', 30);

add_filter('woocommerce_product_description_heading', 'remove_product_description_heading');
function remove_product_description_heading()
{
    return '';
}

add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs)
{

    //unset( $tabs['description'] );  
    unset($tabs['reviews']);          // Remove the reviews tab
    //unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;

}

add_filter('woocommerce_product_tabs', 'woo_rename_tabs', 98);
function woo_rename_tabs($tabs)
{

    $tabs['description']['title'] = function_exists('pll__') ? pll__('Description') : __('Description');		// Rename the description tab
   
    return $tabs;

}

//modificar tab description con la informacion short-description
add_filter('woocommerce_product_tabs', 'woo_custom_description_tab', 98);
function woo_custom_description_tab($tabs)
{
   
    $tabs['description']['callback'] = 'woo_custom_description_tab_content';  // Custom description callback

    return $tabs;
}

function woo_custom_description_tab_content()
{
   
        woocommerce_get_template('single-product/tabs/description.php');
    
        do_action('woocommerce_single_product_summary');

    
}

/*add_filter('woocommerce_product_tabs', 'woo_book_tab');
function woo_book_tab($tabs)
{
  
  // Adds the new tab
   
        $nameTab = function_exists('pll__') ? pll__('Book Now') : 'Book Now';
    
    $tabs['book'] = array(
        'title' => $nameTab,
        'priority' => 70,
        'callback' => 'woo_book_tab_content'
    );

    return $tabs;

}
function woo_book_tab_content()
{

  //echo '<h2>New Product Tab</h2>';
  //echo '<p>Here\'s your new product tab.</p>';
    //woocommerce_get_template('single-product/price.php');
    do_action('woocommerce_single_product_summary');

}*/

// Hook in
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields($fields)
{
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_company']);

    $fields['order']['order_comments']['placeholder'] = 'e.g. child seats, Pick up';
    $fields['order']['order_comments']['label'] = function_exists('pll__') ? pll__('Important Notes') : 'Important Notes';

    $fields['billing']['billing_first_name']['label'] = function_exists('pll__') ? pll__('First name') : 'First name';
    $fields['billing']['billing_last_name']['label'] = function_exists('pll__') ? pll__('Last name') : 'Last name';
    $fields['billing']['billing_phone']['label'] = function_exists('pll__') ? pll__('Phone') : 'Phone';
    $fields['billing']['billing_email']['label'] = function_exists('pll__') ? pll__('Email') : 'Email';


    return $fields;
}

add_filter('woocommerce_order_button_text', 'custom_order_button_text', 1);
function custom_order_button_text($order_button_text)
{
    
    $order_button_text = function_exists('pll__') ? pll__('Place order') : 'Place order';

    return $order_button_text;
}

add_filter('wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2);
function wc_add_to_cart_message_filter($message, $product_id = null)
{
    $titles[] = get_the_title($product_id);

    $titles = array_filter($titles);
    if (get_locale() == "es_CR") {
        $added_text = sprintf(_n('%s ha sido agregado al carrito.', '%s ha sido agregado al carrito.', sizeof($titles), 'woocommerce'), wc_format_list_of_items($titles));
    }else{
        $added_text = sprintf(_n('%s has been added to your cart.', '%s have been added to your cart.', sizeof($titles), 'woocommerce'), wc_format_list_of_items($titles));
        
    }

    $message = sprintf(
        '%s <a href="%s" class="button">%s</a>&nbsp;<a href="%s" class="button">%s</a>',
        esc_html($added_text),
        esc_url(wc_get_page_permalink('checkout')),
        function_exists('pll__') ? pll__('Checkout') : esc_html__('Checkout', 'woocommerce'),
        esc_url(wc_get_page_permalink('cart')),
        function_exists('pll__') ? pll__('View Cart') : esc_html__('View Cart', 'woocommerce')
    );

    return $message;
}

add_filter('the_title', 'woo_title_order_received', 10, 2);
function woo_title_order_received($title, $id)
{
    if (function_exists('is_order_received_page') &&
        is_order_received_page() && get_the_ID() === $id) {
        if (get_locale() == "es_CR") {
            $title = "Orden Recibida";
        }
    }
    return $title;
}

function rincon_redirect_checkout_add_cart($url)
{
    $url = get_permalink(get_option('woocommerce_checkout_page_id'));
    return $url;
}

add_filter('woocommerce_add_to_cart_redirect', 'rincon_redirect_checkout_add_cart');


