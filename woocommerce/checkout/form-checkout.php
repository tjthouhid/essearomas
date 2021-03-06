<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="row" id="customer_details">
			<div class="col-md-8">
				<!-- Collapse Start-->
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingOne">
				      <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#billing_panel" aria-expanded="true" aria-controls="billing_panel">
				          Billing Address
				        </a>
				      </h4>
				    </div>
				    <div id="billing_panel" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				      <div class="panel-body">
				        <?php do_action( 'woocommerce_checkout_billing' ); ?>
				        <a href="javascript:void(0);" class="btn btn-next-shipping">Next</a>
				      </div>
				    </div>
				  </div>
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="headingTwo">
				      <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#shipping_panel" aria-expanded="false" aria-controls="shipping_panel">
				         	Shiiping Address
				        </a>
				      </h4>
				    </div>
				    <div id="shipping_panel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body">
				        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- Collapse End-->
				
				
			</div>

			<div class="col-md-4">
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
					<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	

	

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
