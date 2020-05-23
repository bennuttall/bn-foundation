<?php

get_header();

the_post(); ?>

<div class="row">
  <div class="small-12 medium-8 columns">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer();
