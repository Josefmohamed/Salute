<?php
$id = '';
$className = 'testimonials_block';
if (isset($block)) {
  $id = $block['id'];
  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }
  if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
  }
  if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
  }
  if (function_exists('is_admin') && is_admin()) {
    if (wp_is_json_request() || (defined('REST_REQUEST') && REST_REQUEST) || (function_exists('get_current_screen') && get_current_screen()->is_block_editor())) {
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/testimonials_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');


$programmatic_or_manual = get_field("manual_or_programmatic");
if ($programmatic_or_manual === 'programmatic') {
    $query_options = get_field("query_options") ?: [];
    $number_of_posts = isset($query_options['number_of_posts']) ? (int)$query_options['number_of_posts'] : -1;
    $order = isset($query_options['order']) && in_array($query_options['order'], ['asc', 'desc']) ? $query_options['order'] : 'DESC';
    $args = [
        "post_type" => "testimonials",
        "posts_per_page" => $number_of_posts,
        "order" => $order,
        "post_status" => "publish",
        "paged" => 1,
        'orderby' => 'date',
    ];
    $the_query = new WP_Query($args);
}


?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
  <div class="container">
      <div class="content column">
          <?php if ($title) { ?>
              <h4 class="abrite-h4 text fw-800 text-center"><?= $title ?></h4>
          <?php } ?>
          <?php if ($description) { ?>
              <div class="paragraph-20 description text-center"><?= $description ?></div>
          <?php } ?>
          <div class="line"></div>
      </div>
  </div>
    <?php if ($programmatic_or_manual === 'manual') {
        ?>
        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper cards-wrapper">
                <?php
                $cards = get_field("testimonials_card");
                if (is_array($cards)) {
                    foreach ($cards as $card) {
                        get_template_part("partials/testimonial", "", ["post_id" => $card->ID]);
                    }
                }
                ?>
            </div>
        </div>
    <?php } elseif (isset($the_query) && $the_query->have_posts()) { ?>
        <div class="swiper testimonials-swiper">
            <div class="swiper-wrapper cards-wrapper">
            <?php while ($the_query->have_posts()) {
                $the_query->the_post();
                get_template_part("partials/testimonial", "", ["post_id" => get_the_ID()]);
            } ?>
            <?php wp_reset_postdata(); ?>
            </div>
        </div>
    <?php } ?>
</section>
