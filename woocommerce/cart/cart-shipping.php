<?php
/**
 * Shipping Methods Display
 *
 * In 2.1 we show methods per package. This allows for multiple methods per order if so desired.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- </table>
<table> -->
<tr class="shipping">
	<th colspan="2"><?php echo wp_kses_post( $package_name ); ?></th>
</tr>

	
		<?php if ( 1 < count( $available_methods ) ) : ?>
			
				<?php foreach ( $available_methods as $method ) : 
				if ( $method->cost > 0 ) {
				?>
					<tr data-title="<?php echo esc_attr( $package_name ); ?>" id="shipping_method">
					<th>
						<div class="row">
							<div class="col-md-2">
								<?php
									printf( '<input type="radio" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d_%2$s" value="%3$s" class="shipping_method" %4$s />
										',
										$index, sanitize_title( $method->id ), esc_attr( $method->id ), checked( $method->id, $chosen_method, false ) ); 
									$label = $method->get_label();
									//, wc_cart_totals_shipping_method_label( $method )
								?>
							</div>
							<div class="col-md-10">
								<label for="shipping_method_%1$d_%2$s"><?php echo $label;?></label>
							</div>
						</div>
						
						
					</th>
						
					<td style="width: 20%;">
						<?php 
						$label="";
						if ( $method->cost > 0 ) {
							if ( WC()->cart->display_prices_including_tax() ) {
								$label .= '' . wc_price( $method->cost + $method->get_shipping_tax() );
								if ( $method->get_shipping_tax() > 0 && ! wc_prices_include_tax() ) {
									$label .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
								}
							} else {
								$label .= '' . wc_price( $method->cost );
								if ( $method->get_shipping_tax() > 0 && wc_prices_include_tax() ) {
									$label .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
								}
							}
						}
						echo $label;
						do_action( 'woocommerce_after_shipping_rate', $method, $index );
						?>
						
					</td>
					</tr>
				<?php } endforeach; ?>
		
		<?php elseif ( 1 === count( $available_methods ) ) :  ?>
			<?php
				$method = current( $available_methods );
				printf( '%3$s <input type="hidden" name="shipping_method[%1$d]" data-index="%1$d" id="shipping_method_%1$d" value="%2$s" class="shipping_method" />', $index, esc_attr( $method->id ), wc_cart_totals_shipping_method_label( $method ) );
				do_action( 'woocommerce_after_shipping_rate', $method, $index );
			?>
		<?php elseif ( WC()->customer->has_calculated_shipping() ) : ?>
			<?php echo apply_filters( is_cart() ? 'woocommerce_cart_no_shipping_available_html' : 'woocommerce_no_shipping_available_html', wpautop( __( 'There are no shipping methods available. Please ensure that your address has been entered correctly, or contact us if you need any help.', 'woocommerce' ) ) ); ?>
		<?php elseif ( ! is_cart() ) : ?>
			<?php echo wpautop( __( 'Enter your full address to see shipping costs.', 'woocommerce' ) ); ?>
		<?php endif; ?>

		<?php if ( $show_package_details ) : ?>
			<?php echo '<p class="woocommerce-shipping-contents"><small>' . esc_html( $package_details ) . '</small></p>'; ?>
		<?php endif; ?>

		<?php if ( ! empty( $show_shipping_calculator ) ) : ?>
			<?php woocommerce_shipping_calculator(); ?>
		<?php endif; ?>
	

