<?php
    get_header();
?>
  <!-- Main -->
  <div id="main">

    <section id="one">
      <?php
      while (have_posts()){
          the_post();
      ?>
      <header class="major">
        <h2><?php the_title();?></h2>
        </header>
        <p><?php the_content(); ?> </p>

        <?php } ?>
      </section>
  </div>

<?php get_footer(); ?>
