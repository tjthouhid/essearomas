<?php 
function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );


    $user = wp_get_current_user();
    $customer = array('customer');
    $wholesale_customer = array('wholesale_customer');
    $administrator = array('administrator');
    if( array_intersect($customer, $user->roles ) ) {   
       
       $tax_query[] = array(
                    'taxonomy' => 'product_type',
                    'field'    => 'slug',
                    'terms'    => array('simple', 'grouped','external','variable'), 
                );
     }elseif( array_intersect($wholesale_customer, $user->roles ) ) {   
          
          $tax_query[] = array(
                       'taxonomy' => 'product_type',
                       'field'    => 'slug',
                       'terms'    => 'whole_sale'
                   );
     }elseif( array_intersect($administrator, $user->roles ) ) {
        
        $tax_query[] = array(
                     'taxonomy' => 'product_type',
                     'field'    => 'slug',
                     'terms'    => array('simple', 'grouped','external','variable','whole_sale'), 
                 );
     } else{
       
      	$tax_query[] = array(
                   'taxonomy' => 'product_type',
                   'field'    => 'slug',
                   'terms'    => array('simple', 'grouped','external','variable'), 
               );
     }

    


    $q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );
?>