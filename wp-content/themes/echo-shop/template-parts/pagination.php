<?php 

/**
 * The template for displaying Pagination
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pick_up
 */
$pagination_links = paginate_links([
  'prev_text' => __('« prev', 'echo-shop'),
    'next_text' => __('next »', 'echo-shop'),
    'type' => 'array',
]);
if (is_array($pagination_links)) {
    echo '<div class="row"><div class="col-md-12"><nav aria-label="Page navigation" class="pagination_section"><ul class="pagination justify-content-start">';
    foreach ($pagination_links as $link) {
        $link = str_replace('class="', 'class="page-link ', $link);
        echo '<li class="page-item">' . $link . '</li>';
    }
    echo '</ul></nav></div></div><!-- end row -->';
}
?>