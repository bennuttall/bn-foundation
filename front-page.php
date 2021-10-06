<?php get_header(); ?>
<?php the_post(); ?>

<div class="row">
  <div class="small-12 medium-8 columns">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</div>

<div class="row">
  <div class="small-12 medium-8 columns">
    <h2>Latest blog posts</h2>
  </div>

  <?php $args = [
    'posts_per_page' => 4,
  ];

  $latest = new WP_Query($args);

  while ($latest->have_posts()): $latest->the_post(); ?>

    <div class="small-12 medium-8 columns">
      <time datetime="<?php echo get_the_date(DateTime::ISO8601); ?>" title="<?php echo get_the_date(DateTime::ISO8601); ?>"><?php echo get_the_date(); ?></time>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
    </div>

  <?php endwhile; wp_reset_postdata(); ?>
  <div class="small-12 medium-8 columns">
    <a href="/blog/">See more</a>
  </div>
</div>

<div class="row">
  <div class="small-12 medium-8 columns">
    <h2>More of my content elsewhere</h2>
  </div>

  <div class="small-12 medium-8 columns">
    <ul>
      <li><a href="https://tooling.bennuttall.com/">My tooling blog</a></li>
      <li><a href="https://bbcnewslabs.co.uk/team/labs/bennuttall/">My projects at BBC News Labs</a></li>
      <li><a href="https://www.raspberrypi.com/news/author/bennuttall/">My blog posts for Raspberry Pi Trading</a></li>
      <li><a href="https://www.raspberrypi.org/blog/author/bennuttall/">My blog posts for Raspberry Pi Foundation</a></li>
      <li><a href="https://opensource.com/user_articles/26767/26767">My articles for opensource.com</a></li>
    </ul>
  </div>
</div>

<?php get_footer();
