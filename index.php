<?php
   /*
   *Template Name: home
   */
?>

<?php get_header(); ?>
   <section class="product-gallery">
        <div class="container">

                <!-- <div class="row"> -->
                    <div class="col-md-6 fix">
                        <div class="single-product">
                            <div class="img "> 
                              <?php
                                $simage = wp_get_attachment_image_src( get_post_thumbnail_id(351), 'single-post-thumbnail' );
                               ?>
                                <img class="large img-responsive" src="<?php echo $simage[0];?>"/>
                            </div>                       
                            <div class="overlay">
                                <a href="<?php echo get_page_link(351); ?>" class="btn-rounded">READ MORE</a>
                            </div>
                        </div>
                    </div>
            <?php 
              $orderby = 'id';
              $order = 'asc';
              $hide_empty = false ;
              $cat_args = array(
                  'orderby'    => $orderby,
                  'order'      => $order,
                  'hide_empty' => $hide_empty,
                  'number'     => '5'
              );
                 
              $product_categories = get_terms( 'product_cat', $cat_args );
              $c = 0;
              foreach ($product_categories as $category) {
                $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                $c++; 
            ?>
                    <?php if($c>0 && $c<5){ ?>
                    <div class="col-md-3 col-sm-6 fix">
                        <div class="single-product">
                            <div class="img"> 
                              <img class="large img-responsive" src='<?= $image;?>'/>
                            </div>                       
                            <div class="overlay">
                                <a href="<?php echo get_term_link( $category )?>" class="btn-rounded">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    <?php } if ($c == 5) {?>
                      <div class="col-md-6 col-sm-12 fix">
                        <div class="single-product">
                            <div class="img "> 
                             <img class="large img-responsive" src='<?= $image;?>'/>
                            </div>                       
                            <div class="overlay">
                                 <a href="<?php echo get_term_link( $category )?>" class="btn-rounded">READ MORE</a>
                            </div>
                        </div>
                     </div>
                    <?php } ?>
              <?php
                         
                  }
                   wp_reset_query(); 
               ?>  
                    
           <!--  </div> -->
      
               
            </div>
    </section>

    <section class="new-collection">
        <div class="container">
            <!-- <div class="row"> -->
                <div class="section-title">
                    <h2>NEW COLLECTION </h2>
                </div> 
            <!-- </div> -->
            <div class="row">
                <div class="new-collection-product">
                    <ul class="list-unstyled new-product">
              <?php
              $user = wp_get_current_user();
              $customer = array('customer');
              $wholesale_customer = array('wholesale_customer');
              $administrator = array('administrator');
              if( array_intersect($customer, $user->roles ) ) {   
                 $args = array(
                    'post_type' => 'product',
                    'order' => 'desc', 
                    'orderby'  => 'date',
                    'posts_per_page' => 6,
                    'tax_query' => array(
                        array(
                           'taxonomy' => 'product_type',
                           'field'    => 'slug',
                           'terms'    => array('simple', 'grouped','external','variable'), 
                        )
                     ),
                  );
               }elseif( array_intersect($wholesale_customer, $user->roles ) ) {   
                    $args = array(
                          'post_type' => 'product',
                          'order' => 'desc', 
                          'orderby'  => 'date',
                          'posts_per_page' => 6,
                          'tax_query' => array(
                             array(
                                 'taxonomy' => 'product_type',
                                 'field'    => 'slug',
                                 'terms'    => 'whole_sale', 
                             )
                           ),
                        );
               }elseif( array_intersect($administrator, $user->roles ) ) {
                  $args = array(
                    'post_type' => 'product',
                    'order' => 'desc', 
                    'orderby'  => 'date',
                    'posts_per_page' => 6,
                    'tax_query' => array(
                      array(
                             'taxonomy' => 'product_type',
                             'field'    => 'slug',
                             'terms'    => array('simple', 'grouped','external','variable','whole_sale'), 
                         )
                     ),
                  );
               } else{
                 
                 $args = array(
                    'post_type' => 'product',
                    'order' => 'desc', 
                    'orderby'  => 'date',
                    'posts_per_page' => 6,
                    'tax_query' => array(
                      array(
                             'taxonomy' => 'product_type',
                             'field'    => 'slug',
                             'terms'    => array('simple', 'grouped','external','variable'), 
                         )
                     ),
                  );
               } 
                    
                    $new_collection = new WP_Query( $args );  
                            
                      if ($new_collection->have_posts()) :   
                
                        while ($new_collection->have_posts()) :
                            $new_collection->the_post(); 

                            $new = get_product( $new_collection->post->ID );
                            
                        ?>
                        <li class="single-item col-sm-2">
                            <div class="item-img">
                                <?php
                                    echo $n_img = get_the_post_thumbnail($new->post->ID);
                                     //echo '<img  src='.$n_img.'';
                                ?>
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
                                <h3 class="product-name">
                                    <a href="<?php the_permalink(); ?>"><?= $new->name;?></a>
                                </h3>
                                <div class="price"><?php echo wc_price($new->price);?></div>
                            </div>
                        </li>
                        <?php         
                    endwhile;  
                  endif;  
                   wp_reset_query(); 
                   // Remember to reset  ?>      
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="newsletter">
        <div class="container">
            <div class="newsletter-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2 class="title">STAY UPDATED WITH US</h2>
                            <p class="p-text">SUBSCRIBE OUR NEWSLETTER TO STAY UPDATED WITH OUR SPECIAL SALES</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="newsletter-form">
                            <?php echo do_shortcode('[mc4wp_form id="1322"]'); ?>
                        </div>                       
                </div>                
            </div>
        </div>        
    </section>
    <?php get_footer();?>