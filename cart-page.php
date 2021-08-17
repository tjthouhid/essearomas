 <?php /* Template Name: Cart Page */ ?>
<?php get_header(); ?>
    <section class="page_custom cart-page">
        <div class="container">
          <div class="row">
              <?php 
              while (have_posts()):the_post(); ?>
                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <?php the_content(); ?>
              <?php endwhile;?>
          </div>

      </div>
    </section>
<?php get_footer(); ?>