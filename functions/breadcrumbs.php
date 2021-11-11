// Add Breadcrumb

<div class="breadcrumb"><?php get_breadcrumb(); ?></div>

<?php  

function get_breadcrumb() {
  echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
  if (is_category() || is_single()){
    echo "&nbsp;  &gt; &nbsp;  ";
    the_category (' • ');
  if (is_single()) {
    echo " &nbsp;  &gt; &nbsp;  ";
    the_title();
  }
  } elseif (is_page()) {
    echo "&nbsp;  &gt; &nbsp;  ";
    echo the_title();
  } elseif (is_search()) {
    echo "  &gt;  ";
    echo '"<em>';
    echo the_search_query();
    echo '</em>"';
  }
}

