<?php $args = [
  'child_of' => get_the_ID(),
  'sort_column' => 'post_date',
  'sort_order' => 'desc',
];
$posts = get_pages($args);

?>

<div class="row">
  <div class="small-12 medium-8 columns">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <h2>Past</h2>
    <ul class="talks">
      <?php foreach ($posts as $post): setup_postdata($post); ?>
        <h3><?php the_title(); ?></h3>
        <?php $talks = array_reverse(get_field('talks'));

        foreach ($talks as $talk): ?>
          <li>
            <h4><?php echo $talk['title']; ?></h4>
            <?php echo $talk['event']; ?><br />
            <?php echo $talk['location']; ?><br />
            <?php echo $talk['date']; ?><br />

            <?php $slides = $talk['slides_url'] ? "<a href='{$talk['slides_url']}'>slides</a>" : null;
            $video = $talk['video_url'] ? "<a href='{$talk['video_url']}'>video</a>" : null;

            if ($slides && $video):
              echo "{$slides} | {$video}";
            elseif ($slides):
              echo $slides;
            elseif ($video):
              echo $video;
            endif; ?>
          </li>

        <?php endforeach;
      endforeach; ?>
    </ul>
  </div>
</div>
