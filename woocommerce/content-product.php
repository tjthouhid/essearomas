<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<li <?php post_class("single-item col-sm-2"); ?>  >

	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
?>
	<div class="item-img">
<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	?>
	<a href="<?php echo the_permalink(); ?>">
		<?php echo woocommerce_template_loop_product_thumbnail(); ?>
	</a>
		<div class="item-overlay">
		    <?php
                                    if ( !$product->is_in_stock() ) {
                                          echo '<a href="'.get_permalink().'" class="button product_type_simple add_to_cart_button ">' . __( 'View', 'woocommerce' ) . '</a>';
                                      }else{
                                  ?>
                                    <?php echo woocommerce_template_loop_add_to_cart();} ?>
	    </div>
	</div>



	<div class="product-bottom">
		<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
	
<?php
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	?>
	<h3 class="product-name"><a href="<?php echo the_permalink(); ?>"><?php echo the_title();?></a></h3>
<?php
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );?>
                                
                            </div>


	<?php
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
