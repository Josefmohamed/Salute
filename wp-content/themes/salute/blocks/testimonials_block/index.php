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
$description = get_field('description');
$title = get_field('title');

$automatically_or_manual = get_field('automatically_or_manual');
$testimonials_card = get_field('testimonials_card');
$query_options = get_field('query_options');
$order = get_field('order', $query_options) || "DESC";
$posts_per_page = get_field('number_of_posts', $query_options) || -1;
$args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => $posts_per_page,
    'order' => $order,
    'post_status' => 'publish'
);
// The Query
$the_query = new WP_Query($args);
$have_posts = $the_query->have_posts();


?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
  <div class="container">
      <div class="content column">
          <?php if ($title) { ?>
              <h4 class="abrite-h4 text fw-800 text-center"><?= $title ?></h4>
          <?php } ?>
          <?php if ($description) { ?>
              <div class="paragraph-18 description text-center"><?= $description ?></div>
          <?php } ?>
          <div class="line"></div>
      </div>
      <?php if ($automatically_or_manual === 'manual') { ?>
          <?php
          if ($testimonials_card): ?>
              <div class="swiper testimonials-swiper">
                  <div class="swiper-wrapper cards-wrapper">
                      <?php foreach ($testimonials_card as $faq):
                          get_template_part("partials/testimonial", '', array('post_id' => $faq));
                          ?>
                      <?php endforeach; ?>
                  </div>
              </div>
          <?php endif; ?>
      <?php } else {
          ?>
          <?php if ($have_posts) { ?>
              <div class="swiper testimonials-swiper" >
                  <div class="swiper-wrapper cards-wrapper">
                      <?php while ($the_query->have_posts()) {
                          $the_query->the_post();
                          get_template_part("partials/testimonial", '', array('post_id' => get_the_ID()));
                          ?>
                      <?php } ?>
                  </div>
              </div>
          <?php }
          /* Restore original Post Data */
          wp_reset_postdata(); ?>
      <?php } ?>

  </div>
</section>
