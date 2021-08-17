 <?php /* Template Name: about Page */ ?>
 <?php get_header(); ?>
  <?php global $esse_aromas; ?>

    <?php while (have_posts()):the_post(); ?>
      <?php the_content(); ?>  
    <?php endwhile;?>
  
    <section class="scent">
        <div class="container">
            <!-- <div class="row"> -->
                <div class="section-title">
                    <h2>SCENT SELECTIONS </h2>
                </div>
                <p class="p-text"></p> 
            <!-- </div> -->
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <p class="p-text"><?php echo $esse_aromas['about-text-section']; ?></p> 
                </div>                    
            </div>
        </div>
    </section>

 <?php get_footer(); ?>