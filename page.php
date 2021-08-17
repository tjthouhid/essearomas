<?php get_header(); ?>
    <section class="page_custom">
        <div class="container">
        <div class="col-md-12">
          <div class="row">
              <?php 
              while (have_posts()):the_post(); ?>
                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <?php the_content(); ?>
              <?php endwhile;?>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>