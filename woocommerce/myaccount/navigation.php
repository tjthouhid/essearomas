<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
 $current_user = wp_get_current_user();
?>
<div class="" id="my-account-user">
<div class="user-image">
    <a href="https://www.esse-aromas.com/my-account/">
        <img alt="" src="https://secure.gravatar.com/avatar/91fe19c32dcc9f6752cde26703fba3c1?s=75&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/91fe19c32dcc9f6752cde26703fba3c1?s=150&amp;d=mm&amp;r=g 2x" class="avatar avatar-75 photo" height="75" width="75">    </a>
</div>
<div class="user-meta">
    <h4 class="username"><?php echo $current_user->user_login ?></h4>
        <a href="<?php echo wp_logout_url(); ?>" class="my-account-logout btn small btn-ghost">logout</a>
    </div></div>
<nav class="woocommerce-MyAccount-navigation">
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
