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
    <h2>More of my content from elsewhere</h2>
  </div>

  <div class="small-12 medium-8 columns">
    <?php $other_posts = get_field('elsewhere_posts'); ?>

    <ul>
    <?php foreach ($other_posts as $post): ?>
      <li><strong><a href="<?php echo $post['url']; ?>"><?php echo $post['title']; ?></a></strong> [<?php echo $post['site']; ?></a>]</li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>

<?php get_footer();
