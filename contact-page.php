 <?php /* Template Name: contact Page */ ?>
 <?php get_header(); ?>
 <?php global $esse_aromas; ?>
	<section class="new-collection">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                	 <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('contact-left-widget') ) ?>
                </div>
                <div class="col-md-8">
                	<div class="section-title">
	                    <h2>GET IN TOUCH</h2>
	                </div>
	                <div class="p-text">
	                	<p><?php echo $esse_aromas['contact-get-in-touch-text']; ?></p>
	                </div>
	                <?php echo do_shortcode('[contact-form-7 id="1317" title="Contact form 1"]') ?>
                    
                </div>
            </div>
            <br>
            <div class="row">
                
            	<div class="col-md-4">
            		<div class="icon_box">
            			<span class="icon"><i class="fa fa-map-marker"></i></span>
            		</div>
            		<div class="icon_content">
            			<h4>LOCATION</h4>    
            			<p><?php echo $esse_aromas['contact-text-one']; ?></p>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="icon_box">
            			<span class="icon"><i class="fa fa-phone" ></i></span>
            		</div>
            		<div class="icon_content">
            			<h4>CUSTOMER CARE</h4>    
            			<p><?php echo $esse_aromas['contact-text-two']; ?></p>
            		</div>
            	</div>
            	<div class="col-md-4">
            		<div class="icon_box">
            			<span class="icon"><i class="fa fa-envelope"></i></span>
            		</div>
            		<div class="icon_content">
            			<h4>E-MAIL</h4>    
            			<p><?php echo $esse_aromas['contact-text-three']; ?></p>
            		</div>
            	</div>
            </div>
        </div>
 	</section>
 	<br>
 	
 <?php get_footer(); ?>