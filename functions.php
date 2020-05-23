<?php

// Custom functions

function bn_title() {
    bloginfo('title');
    echo " - ";
    if (is_front_page()) {
      bloginfo('description');
    }
    elseif (is_home()) {
      echo "Blog";
    }
    elseif (is_tag()) {
      single_tag_title();
      echo " posts";
    }
    else {
      the_title();
    }
}

function timestamped_stylesheet($stylesheet='style.css') {
  $stylesheet_url = get_bloginfo('template_url') . '/' . $stylesheet;
  $stylesheet_path = get_stylesheet_directory() . '/' . $stylesheet;
  echo $stylesheet_url . "?" . filemtime($stylesheet_path);
}

function show_tag_list ($id, $separator, $before) {
  $tags = wp_get_post_tags($id);

  if (!empty($tags)) {
    $tags_html = array();
    foreach ($tags as $tag) {
      $tags_html[] = "<a href='/tag/{$tag->slug}/'>{$tag->name}</a>";
    }

    echo $before . join($separator, $tags_html);
  }
}

function monthname($month_num) {
  $months = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December',
  ];

  $month = intval($month_num);

  return $months[$month];
}
