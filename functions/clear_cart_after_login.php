<?php
function clear_cart_after_login($user_id) {
    $user = new WP_User( $user_id );
    
    if ( in_array( 'wholesale_customer', $user->roles ) ) {
    	if( function_exists('WC') ){
    	        WC()->cart->empty_cart();
    	    }
        return true;
    }
}
add_action('wp_login', 'clear_cart_after_login');

?>