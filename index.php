<?php
    get_header();
?>
  <!-- Main -->
  <div id="main">

    <section id="one">
      <?php
      $posts = get_posts(array('numberposts' => 1, 'orderby' => 'post_date', 'order' => 'ASC'));

      foreach ($posts AS $post):
        setup_postdata($post);
      ?>
      <header class="major">
        <h2><?php the_title();?></h2>
      </header>
        <p><?php the_excerpt(); ?> </p>
        <ul class="actions">
          <li><a href="<?php the_permalink(); ?>" class="button">Learn More</a></li>
        </ul>

      <?php endforeach;
      wp_reset_postdata();
      wp_reset_query();
       ?>

      </section>

      <!-- recent portfolio  -->
      <section id="two">
        <h2>Recent Work</h2>
        <div class="row">
          <?php
          $recents = get_posts(array('numberposts' => 6, 'orderby' => 'post_date', 'order' => 'DESC', 'exclude' => ''));
          foreach ($recents AS $post):
            setup_postdata($post);

            if ( has_post_thumbnail() ) {
              $smallimg = get_the_post_thumbnail($post->ID, 'portfoliothumbs' );
              $bigimg   = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            }
            else {
              $smallimg = '<img src="'.get_bloginfo( 'stylesheet_directory' ) . '/images/thumbs/01.jpg">';
              $bigimg = get_bloginfo('stylesheet_directory' ).'/images/fulls/01.jpg';
            }
          ?>
          <article class="6u 12u$(xsmall) work-item">
            <a href="<?php echo $bigimg; ?>" class="image fit thumb"><?php echo $smallimg; ?></a>
            <h3><?php the_title();?></h3>
            <p><?php the_excerpt(); ?></p>
          </article>

        <?php
          endforeach;
          wp_reset_postdata();
         ?>
        </div>

      </section>

  </div>



<?php get_footer(); ?>
