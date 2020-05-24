<?php

get_header();

the_post(); ?>

<div class="row">
  <div class="small-12 medium-8 columns entry-content">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</div>

<div class="row">
  <div class="small-12 medium-8 columns">
    <div class="callout primary">
      <?php show_tag_list(get_the_ID(), ', ', 'Tags: '); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="small-12 medium-8 columns prevnext">
    <div class="callout primary">
      <nav class="prev"><?php previous_post_link(); ?></nav>
      <nav class="next"><?php next_post_link(); ?></nav>
    </div>
  </div>
</div>

<?php get_footer();
