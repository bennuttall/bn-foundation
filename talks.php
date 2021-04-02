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
  </div>
</div>
      <?php foreach ($posts as $post): setup_postdata($post); ?>
        <?php $talks = array_reverse(get_field('talks')); ?>
        <div class="row">
          <div class="small-12 columns">
            <h3><?php the_title(); ?> (<?php echo count($talks); ?>)</h3>
            <table class="talks">
              <tr>
                <th>Talk title</th>
                <th>Event</th>
                <th>Location</th>
                <th>Date</th>
                <th>Slides</th>
                <th>Video</th>
              </tr>

            <?php foreach ($talks as $talk): ?>
              <tr>
                <td><?php echo $talk['title']; ?></td>
                <td><?php echo $talk['event']; ?></td>
                <td><?php echo $talk['location']; ?></td>
                <td><?php echo $talk['date']; ?></td>
                <td><?php if ($talk['slides_url']): echo "<a href='{$talk['slides_url']}'>slides</a>"; endif; ?>
                <td><?php if ($talk['video_url']): echo "<a href='{$talk['video_url']}'>video</a>"; endif; ?>
              </tr>
            </div>
          </div>

        <?php endforeach; ?>
        </table>
      <?php endforeach; ?>
  </div>
</div>
