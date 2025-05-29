<?php
$id = '';
$className = 'services_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/services_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');
$cta_link = get_field('cta_link');
$block_type = get_field('block_type');
$service_image = get_field('service_image');
$image_title = get_field('image_title');
$programmatic_or_manual = get_field("manual_or_programmatic");
if ($programmatic_or_manual === 'programmatic') {
    $query_options = get_field("query_options") ?: [];
    $number_of_posts = isset($query_options['number_of_posts']) ? (int)$query_options['number_of_posts'] : -1;
    $order = isset($query_options['order']) && in_array($query_options['order'], ['asc', 'desc']) ? $query_options['order'] : 'DESC';
    $args = [
        "post_type" => "service",
        "posts_per_page" => $number_of_posts,
        "order" => $order,
        "post_status" => "publish",
        "paged" => 1,
        'orderby' => 'date',
    ];
    $the_query = new WP_Query($args);
}

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?> <?= $block_type ?>">
    <div class="service-image-card">
        <?php
        $picture_class = 'service-image aspect-ratio';
        echo bis_get_attachment_picture(
            $service_image,
            [
                375 => [327, 131, 1],
                1024 => [936, 374, 1],
                1280 => [1192, 476, 1],
                1440 => [1352, 540, 1],
                1728 => [1640, 655, 1],
                1920 => [1832, 732, 1],
                3840 => [3752, 1498, 1]
            ],
            [
                'retina' => true,
                'picture_class' => $picture_class,
            ],
        );
        ?>

        <?php if ($image_title): ?>
            <h4 class="image-title fw-800 salute-h4"><?= esc_html($image_title) ?></h4>
        <?php endif; ?>
    </div>
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
        <?php if ($programmatic_or_manual === 'manual') { ?>
            <div class="wrapper">
                <div class="accordion">
                    <?php
                    $cards = get_field("service_card");
                    if (is_array($cards)) {
                        $index = 1;
                        foreach ($cards as $card) {
                            get_template_part("partials/service-card", "", [
                                "post_id" => $card->ID,
                                "index" => $index
                            ]);
                            $index++;
                        }
                    }
                    ?>
                </div>
            </div>
        <?php } elseif (isset($the_query) && $the_query->have_posts()) { ?>
            <div class="wrapper">
                <div class="accordion">
                    <?php
                    $index = 1;
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        get_template_part("partials/service-card", "", [
                            "post_id" => get_the_ID(),
                            "index" => $index
                        ]);
                        $index++;
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
