<?php $args = [
  'posts_per_page' => -1,
  'orderby' => 'date',
];

$posts = new WP_Query($args);

$archive = [];

while ($posts->have_posts()) {
  $posts->the_post();

  $date = get_the_date('Y-m-d');
  $year = substr($date, 0, 4);
  $month = substr($date, 5, 2);

  $archive[$year][$month][] = [
      'title' => get_the_title(),
      'link' => get_permalink(get_the_ID())
  ];

} ?>

<ul class="archive">

<?php foreach ($archive as $year => $months) {
  echo "<li><h2><a href='/{$year}/'>{$year}</a></h2><ul>";
  foreach ($months as $month => $posts) {
    echo "<li><h3><a href='/{$year}/{$month}/'>" . monthname($month) . "</h3><ul>";
    foreach ($posts as $post) {
      echo "<li><a href='{$post['link']}'>{$post['title']}</a></li>";
    }
    echo "</ul></li>";
  }
  echo "</ul></li>";
} ?>

</ul>
