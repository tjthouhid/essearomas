<?php 
	
	/**
	 * Register the custom product type after init
	 */
	function register_whole_sale_product_type() {

		/**
		 * This should be in its own separate file.
		 */
		class WC_Product_Whole_Sale extends WC_Product {

			public function __construct( $product ) {

				$this->product_type = 'whole_sale';
				$this->supports[]   = 'ajax_add_to_cart';

				parent::__construct( $product );
				add_action('woocommerce_whole_sale_add_to_cart', array($this, 'whole_sale_add_to_cart'),30);

			}

		}

	}
	add_action( 'init', 'register_whole_sale_product_type' );

	function add_whole_sale_product( $types ){

		// Key should be exactly the same as in the class product_type parameter
		$types[ 'whole_sale' ] = __( 'Whole Sale Product' );

		return $types;

	}
	add_filter( 'product_type_selector', 'add_whole_sale_product' );

	/**
	 * Show pricing fields for simple_rental product.
	 */
	function whole_sale_custom_js() {

		if ( 'product' != get_post_type() ) :
			return;
		endif;

		?><script type='text/javascript'>
			jQuery( document ).ready( function() {
				jQuery( '.options_group.pricing' ).addClass( 'show_if_whole_sale' ).show();
				jQuery('.show_if_simple').addClass('show_if_whole_sale');
				jQuery( '.general_options.general_tab ' ).show();
				jQuery( '.general_options.general_tab a' ).trigger('click');
			});
		</script><?php
	}
	add_action( 'admin_footer', 'whole_sale_custom_js' );



	if (! function_exists( 'woocommerce_whole_sale_add_to_cart' ) ) {

	  /**
	  * Output the simple product add to cart area.
	  *
	  * @subpackage Product
	  */

	  function whole_sale_add_to_cart() {
	    wc_get_template( 'single-product/add-to-cart/simple.php' );
	  }

	  add_action('woocommerce_whole_sale_add_to_cart',  'whole_sale_add_to_cart');
	}
	
?>