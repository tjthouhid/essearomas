<?php

    add_theme_support('title-tag');
    add_theme_support( 'custom-logo', array(
           'header-text' => array( 'site-title', 'site-description' ),
        ) );
    add_theme_support( 'post-thumbnails' );

    //** Theme enqueue scripts
    function aromas_enqueue_scripts()
    {
    	
        wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.min.css');
    	wp_enqueue_style('style_custom', get_template_directory_uri().'/css/style.css');
    	//theme stylesheet
    	wp_enqueue_style('style', get_stylesheet_uri());

    	// jQuery v3.1.1
    	wp_enqueue_script('jquery.min',get_template_directory_uri().'/js/jquery.min.js',array(),null,true);
        wp_enqueue_script('bootstrap.min',get_template_directory_uri().'/js/bootstrap.min.js',array(),null,true);
    	wp_enqueue_script('slicknav.min',get_template_directory_uri().'/js/jquery.slicknav.js',array(),null,true);
    	wp_enqueue_script('custom',get_template_directory_uri().'/js/custom.js',array(),null,true);
        $wnm_custom = array( 'theme_url' => get_template_directory_uri() );
            wp_localize_script( 'custom', 'wnm_custom', $wnm_custom );
    }
    add_action( 'wp_enqueue_scripts', 'aromas_enqueue_scripts');

    //woocommerce theme support
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }
    // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
        'aromas-menu' => esc_html__( 'Aromas Menu', 'aromas' )
    ));

    // Change number or products per row to 6
    add_filter('loop_shop_columns', 'loop_columns');
    if (!function_exists('loop_columns')) {
        function loop_columns() {
                return 6; // 6 products per row
            }
    }

    //remove breadcrumbs
    add_action( 'init', 'nxt_remove_wc_breadcrumbs' );
    function nxt_remove_wc_breadcrumbs() {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }


    //  Edit Cart Name

    add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );
    /**
     * custom_woocommerce_template_loop_add_to_cart
    */
    function custom_woocommerce_product_add_to_cart_text() {
        global $product;
        
        $product_type = $product->product_type;
        
        switch ( $product_type ) {
            case 'external':
                return __( 'Buy product', 'woocommerce' );
            break;
            case 'grouped':
                return __( 'View products', 'woocommerce' );
            break;
            case 'simple':
                return __( 'ADD TO CART', 'woocommerce' );
            break;
            case 'variable':
                return __( 'Select options', 'woocommerce' );
            break;
            default:
                return __( 'Read more', 'woocommerce' );
        }
        
    }

    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    require('lib/ReduxCore/framework.php');
    require('lib/sample/config.php');
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

    /* REGISTER Footer WIDGETS ------------------*/

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Footer middle',
        'id'   => 'footer-middle-widget',
        'description'   => 'middle Footer widget position.',
        'before_widget' => '<ul class="list-unstyled footer-nav" id="%1$s">',
        'after_widget'  => '</ul>',
        'before_title'  => '<h3 class="f-title">',
        'after_title'   => '</h3>'
    ));
}

/* REGISTER Footer WIDGETS ------------------*/

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'contact left',
        'id'   => 'contact-left-widget',
        'description'   => 'left contact widget position.',
        'before_widget' => '<ul class="widget_text list-unstyled footer-nav" id="custom_html-2"><div class="textwidget contact_us">',
        'after_widget'  => '</div></ul>',
        'before_title'  => '<h3 class="f-title">',
        'after_title'   => '</h3>'
    ));
}

    // function add_user_additional_details_frontend_reg( $user_id )
    // {
    //     $registered_user = get_user_by('ID',$user_id);
    //     if($registered_user) {
    //         $user_role = $registered_user->roles;
    //         if((in_array('customer', (array) $user_role))){
    //             /* The field below "front_end_cust_form" is just a hidden field I added to check and make sure that this is coming from the Front end Reg form where I added the additional fields */
    //             if($_POST['front_end_cust_form'] == 'front_end_cust_form')
    //             {
    //                 $first_name = $_POST['billing_first_name'];
    //                 $last_name = $_POST['billing_last_name'];

    //                 update_user_meta($user_id, 'billing_first_name', $first_name);
    //                 update_user_meta($user_id, 'billing_last_name', $last_name);

    //                 $update_data = array(
    //                     'ID' => $user_id,
    //                     'first_name' => $first_name,
    //                     'last_name' => $last_name
    //                 );
    //                 $user_id = wp_update_user($update_data);
    //                 $registered_user->add_role('custom_role');
    //             }

    //         }
    //     }
    // }

    // add_action( 'user_register', 'add_user_additional_details_frontend_reg', 10, 1 );
    

    /**
     * To save WooCommerce registration form custom fields.
     */
    function check_customer_type($customer_id) {
        //First name field
        
        if (isset($_POST['cust_type'])) {
            $cust_type=$_POST['cust_type'];
            if($cust_type=="whole-sale"){
                $company_name=$_POST['company_name'];
                
                $userdata = array();
                $userdata['ID'] = $customer_id;
                $userdata['role'] = 'wholesale_customer';
                wp_update_user($userdata);
                update_user_meta($customer_id, 'wh_company_name', $company_name);
            }
            
            
        }
        
    }

    add_action('woocommerce_created_customer', 'check_customer_type');



    // Hooks near the bottom of profile page (if current user) 
    add_action('show_user_profile', 'custom_wh_user_profile_fields');

    // Hooks near the bottom of the profile page (if not current user) 
    add_action('edit_user_profile', 'custom_wh_user_profile_fields');
    add_action( "user_new_form", "custom_wh_user_profile_fields" );

    function save_custom_user_profile_fields($user_id){
        # again do this only if you can
        if(!current_user_can('manage_options'))
            return false;

        # save my custom field
        update_usermeta($user_id, 'wh_company_name', $_POST['wh_company_name']);
    }
    add_action('user_register', 'save_custom_user_profile_fields');
    add_action('profile_update', 'save_custom_user_profile_fields');

    // @param WP_User $user
    function custom_wh_user_profile_fields( $user ) {
    ?>
        <table class="form-table">
            <tr>
                <th>
                    <label for="code"><?php _e( 'Company Name' ); ?></label>
                </th>
                <td>
                    <input type="text" name="wh_company_name" id="wh_company_name" value="<?php echo esc_attr( get_the_author_meta( 'wh_company_name', $user->ID ) ); ?>" class="regular-text" />
                </td>
            </tr>
        </table>
    <?php
    }

    //add columns to User panel list page
    function add_wh_com_columns($column) {
        $column['wh_company_name'] = 'Company Name';

        return $column;
    }
    add_filter( 'manage_users_columns', 'add_wh_com_columns' );

    //add the data
    function add_wh_com_column_data( $val, $column_name, $user_id ) {
        $user = get_userdata($user_id);

        switch ($column_name) {
            case 'wh_company_name' :
                return $user->wh_company_name;
                break;
            default:
        }
        return;
    }
    add_filter( 'manage_users_custom_column', 'add_wh_com_column_data', 10, 3 );

    /**
     * Integrates WooCommerce with New User Approve
     *
     * Automatically approves new customers who register at checkout or on the My Account page,
     * but holds all other user registrations for approval (i.e., wholesale customers)
     */
    function sww_approve_customer_user( $customer_id ) {
        
        $roles = get_userdata( $customer_id )->roles;

        if ( 'pending' == pw_new_user_approve()->get_user_status( $customer_id ) && in_array( 'customer', $roles ) ) {
            
            pw_new_user_approve()->update_user_status( $customer_id, 'approve' );
        }
    }
    add_action( 'woocommerce_created_customer', 'sww_approve_customer_user' );



    add_filter( 'woocommerce_registration_redirect', 'user_verification_woocommerce_registration_redirect', 10, 1 );
    function user_verification_woocommerce_registration_redirect(){
      if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        $user_id = $current_user->ID;
        $approved_status = get_user_meta($user_id, 'user_activation_status', true);
        //if the user hasn't been approved destroy the cookie to kill the session and log them out
        if ( $approved_status == 1 ){
          return get_permalink(wc_get_page_id('myaccount'));
        }
        else{
          wp_logout();
          return get_permalink(woocommerce_get_page_id('myaccount')) . "?approved=false";
        }
      }
    }
    function registration_message(){
      $not_approved_message = '';
      if( isset($_REQUEST['approved']) ){
        $approved = sanitize_text_field($_REQUEST['approved']);
        if ($approved == 'false')  echo '<p class="registration successful">Registration successful! You will be notified upon approval of your account.</p>';
        else echo $not_approved_message;
      }
      else echo $not_approved_message;
    }
    add_action('woocommerce_before_customer_login_form', 'registration_message', 2);


    add_action( 'wp_footer', 'cart_update_qty_script' );
    function cart_update_qty_script() {
        if (is_cart()) :
        ?>
        <script>
            jQuery(document).on("click", "div.woocommerce #cart_update_checkout", function(e) {
                //console.log('clicked');
                jQuery("[name='update_cart']").prop("disabled", false); 
                jQuery("[name='update_cart']").trigger("click"); 
            });
        </script>
        <?php
        endif;
    }

    add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

    function new_loop_shop_per_page( $cols ) {
      // $cols contains the current number of products per page based on the value stored on Options -> Reading
      // Return the number of products you wanna show per page.
      $cols = 12;
      return $cols;
    }
    
    
include 'functions/custom_product_type.php';
include 'functions/custom_archive_query.php';
include 'functions/clear_cart_after_login.php';

    // Tj testing
function product_custom_add_meta_boxes( $post ){
  add_meta_box( 'tjs_prefix_meta_box', "Developer Secret", 'product_custom_meta_box_fun', null, 'side','low');
}

//add_action( 'add_meta_boxes_product', 'product_custom_add_meta_boxes' );
function product_custom_meta_box_fun(){
    echo "Ok";
    ?>
    <style type="text/css">
        #tjs_prefix_meta_box{
            display: none;
        }
    </style>
    <script type="text/javascript">
        jQuery(function($){
            var cur_val=$("[for='_sale_price']").text();
            var cur_val_arr=cur_val.split("(");
            $("[for='_sale_price']").text("Whole Sale Price ("+cur_val_arr[1]);
        });
    </script>
    <?php
}

//Short code for social share
function custom_social_share($atts){
    $atts = shortcode_atts( array(
            'text-align' => 'center'
        ), $atts, 'custom_share' );
    global $wp;
    global $post;
    ob_start();
    $current_url = home_url(add_query_arg(array(),$wp->request));

?>
<div class="social-icon-share" style="text-align: <?php echo $atts['text-align'];?>">
    <ul>
        <li><a href="javascript:void(0);" onClick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($current_url);?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void(0);" onClick="window.open('http://twitter.com/share?text=<?php echo urlencode($post->post_title);?>&url=<?php echo urlencode($current_url);?>', 'Twitter', 'toolbar=0,status=0,width=548,height=325');"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void(0);" onClick="window.open('https://plus.google.com/share?url=<?php echo urlencode($current_url);?>', 'Google +', 'toolbar=0,status=0,width=548,height=325');"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void(0);" onClick="window.open('http://pinterest.com/pin/create/button/?url=<?php echo urlencode($current_url);?>', 'Pinterest', 'toolbar=0,status=0,width=548,height=325');"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
        <li><a href="javascript:void(0);" onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($current_url);?>', 'Linkedin', 'toolbar=0,status=0,width=548,height=325');"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
    </ul>
</div>
<?php 
$content = ob_get_clean();
return $content;
}
add_shortcode( 'custom-social-share', 'custom_social_share' );
add_role('wholesale_customer', 'Wholesale Customer', array(
        'read' => true, 
        'edit_posts' => false,
        'delete_posts' => false, 
    ));




    // change stock text
    add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);

    function wcs_custom_get_availability( $availability, $variation ) {

       // Change In Stock Text
        if (  $variation->is_in_stock() ) {
            $availability['availability'] = __('Available!', 'woocommerce');
        }else{
            echo '-------------------------';
            echo __('Sold Out', 'woocommerce');
            $availability['availability'] = __('Sold Out', 'woocommerce');
        }
        return $availability;
        

    }

?>