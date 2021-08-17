<?php require_once('../../../../wp-load.php');?>
<?php global $woocommerce;?>
<a href="<?= WC_Cart::get_cart_url() ?>" class="cart-icon"></a>
    <span class="cart-num-s"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
<div class="recent-add">
	<ul class="recent-inner list-unstyled" id="mini_cart_content">
	 <li class="recent-item"><h4> Recent Add Item</h4></li>
<?php
	if ($_POST['mini']) {

		
		$items = $woocommerce->cart->get_cart();
		  if ($items) {
		    foreach($items as $item => $values) { 
		      $_product =  wc_get_product( $values['data']->get_id()); 
		      ?> 

		    <li class="recent-item">
		        
		        <div class="recent-product-img">
		            <?php echo $_product->get_image();?>
		        </div>
		        <div class="recent-product-name">
		            <p class="p-text"><a href="<?php the_permalink();?>"><?php echo $_product->get_title();?></a></p>
		            <div class="price">
		                <span class="product-numb"><?= $values['quantity']?> ×</span>
		                <span class="product-price">$<?php $price = get_post_meta($values['product_id'] , '_price', true);
		    echo $price; ?></span>                             
		            </div>
		        </div> 
		        
		    </li>
		    <?php 
		       } 
		    ?>
		    <li class="recent-item">
		      <div class="cart-total">
		            <span class="cart-text">cart total</span ><span class="ct-price">$<?php echo WC()->cart->get_cart_contents_total(); ?></span> 
		        </div>
		        <div class="btn-button">
		            <a href="<?php echo wc_get_cart_url();?>" class="r-btn">VIEW CART</a>
		            <a href="<?php echo wc_get_checkout_url();?>" class="r-btn">Checkout</a>
		        </div>
		    </li>
		    <?php
		      }else{
		        echo '<p class="empty-text">No products in the cart.</p>';
		      }
	}
?>
</ul></div>