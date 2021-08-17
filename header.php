<!DOCTYPE html>
<html lang="en">
<head>
    <!--=== meta ===-->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

    <title><?php bloginfo('name'); ?></title>
    <?php global $esse_aromas; ?>
    
    <?php wp_head();?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
           <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body <?php body_class()?>>
  <header class="header" id="header-section">
        <div class="topbar">
            <div class="container">
               <!--  <div class="row"> -->
                    <div class="topbar-containt">
                        <p class="p-text"><?php echo $esse_aromas['header-text']; ?><a class="link-text" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) )?>
"> FRAGRANCES</a></p>
                        <ul class="list-unstyled list-inline social-widget text-right">

                          <?php if($esse_aromas['social-icon']['1']): ?>
                               <li><a href="<?php echo $esse_aromas['social-icon']['1']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['2']): ?>
                               <li><a href="<?php echo $esse_aromas['social-icon']['2']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['3']): ?>
                               <li><a href="<?php echo $esse_aromas['social-icon']['3']; ?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['4']): ?>
                               <li><a href="<?php echo $esse_aromas['social-icon']['4']; ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['5']): ?>
                               <li><a href="<?php echo $esse_aromas['social-icon']['5']; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['6']): ?>
                               <li><a href="<?php echo $esse_aromas['social-icon']['6']; ?>"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($esse_aromas['social-icon']['7']): ?>
                               <li><a href="<?php echo $esse_aromas['social-icon']['7']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div> 
                 <!-- </div>   -->           
            </div>
        </div>
        <div class="container">
            <!-- <div class="row"> -->
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php echo $esse_aromas['logo-upload']['url']; ?>" class="img-responsive" alt="Armoslogo">
                        </a>
                    </div>
                    <?php do_shortcode('[custom-mini-cart]'); ?>
                    <div class="login-sitebar">

                        <div class="login-text">
                          <?php if ( is_user_logged_in() ) { 
                            $current_user = wp_get_current_user();?>

                          <a href="#" class="hover_user_log"><span>hi <?php echo $current_user->user_login ?></span></a>
                          <div class="persone-profile">
                              <ul class="persone-profile list-unstyled">
                                  <li class="persone-profile-item"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">My Account</a></li>
                                  <li class="persone-profile-item"><a href="<?php echo esc_url( home_url( '/my-account/orders/' ) ); ?>">My Orders</a></li>
                                  <li class="persone-profile-item"><a href="<?php echo esc_url( home_url( '/my-account/edit-address/' ) ); ?>">Edit address</a></li>
                                  <li class="persone-profile-item"><a href="<?php echo esc_url( home_url( '/my-account/edit-account/' ) ); ?>">Edit Account</a></li>
                                  <li class="persone-profile-item"><a href="<?php echo wp_logout_url( $redirect ); ?> ">Logout</a></li>
                              </ul>
                          </div>
                           <!--  <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('My Account','woothemes'); ?></a> -->
                           <?php } 
                           else { ?>
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="user_reg" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login/Register','woothemes'); ?><span class="angle-down-icon fa fa-angle-down"> </span></a>
                            <!-- <div class="woo-add"> -->
                              <?php 
                              //if (is_front_page()) {
                                //echo do_shortcode('[woocommerce_my_account]');
                              //} 
                                ?>
                            <!-- </div> -->
                           <?php } ?>
                  
                        </div>
                        <div class="cart" id="mini_cart_content">
                            <a href="<?= WC_Cart::get_cart_url() ?>" class="cart-icon"></a>
                            <span class="cart-num-s"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            <div class="recent-add">

                                <ul class="recent-inner list-unstyled" >
                                  <li class="recent-item"><h4> Recent Add Item</h4></li>
                                  <?php
                                global $woocommerce;
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
                                      ?>
                                </ul>                           
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <nav class="navbar navbar-default armos-nav">
                      <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#armos-nav" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <!-- <a class="navbar-brand" href="#">Brand</a> -->
                        </div>


                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="armos-nav">
                          <a href="javascript:void(0);" class="close-nav">X</a>
                          <?php 
                            $defaults = array(
                              'theme_location'  => 'aromas-menu',
                              'menu'            => '',
                              'container'       => '',
                              'container_class' => '',
                              'container_id'    => '',
                              'menu_class'      => 'menu',
                              'menu_id'         => 'menu',
                              'echo'            => true,
                              'fallback_cb'     => 'wp_page_menu',
                              'before'          => '',
                              'after'           => '',
                              'link_before'     => '',
                              'link_after'      => '',
                              'items_wrap'      => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>',
                              'depth'           => 0,
                              'walker'          => ''
                            );
                            wp_nav_menu( $defaults ); 
                          ?>
                          <!-- <ul class="nav navbar-nav">
                            <li class="active"><a href="#">HOME</a></li>
                            <li><a href="#">FRAGRANCE CARDS</a></li>
                            <li><a href="#">REED DIFFUSERS</a></li>
                            <li><a href="#">SCENTED CANDLES</a></li>
                            <li><a href="#">HOME SPRAYS</a></li>
                            <li><a href="#">GIFT BOXES</a></li>
                            <li><a href="#">ABOUT US</a></li>
                            <li><a href="#">CONTACT</a></li>
                          </ul> -->
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container -->
                    </nav>
                </div> 
           <!--  </div> -->
        </div>              
    </header> 