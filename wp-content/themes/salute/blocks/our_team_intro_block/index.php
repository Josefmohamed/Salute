<?php
$id = '';
$className = 'our_team_intro_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_team_intro_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');
$image = get_field('image');
$sub_title = get_field('sub_title');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
  <div class="container">
      <div class="column top-content">
          <?php if ($title): ?>
              <h2 class="salute-h2 text-center fw-700"><?= $title ?></h2>
          <?php endif; ?>
          <?php if ($description): ?>
              <div class="paragraph-18 description text-center roboto"><?= $description ?></div>
          <?php endif; ?>
      </div>
      <div class="cards-wrapper">
          <div class="left-content">
              <?php if ($sub_title) { ?>
                  <h4 class="salute-h4 fw-600 sub-title"><?= $sub_title ?></h4>
              <?php } ?>
              <?php if (have_rows('tutors_highlights')) { ?>
                  <div class="list-wrapper column">
                      <?php while (have_rows('tutors_highlights')) {
                          the_row();
                          $text = get_sub_field('text');
                          $icon = get_sub_field('icon');
                          ?>
                          <div class="lists">
                              <?php if (!empty($icon) && is_array($icon)) { ?>
                                  <picture class="icon-wrapper">
                                      <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                  </picture>
                              <?php } ?>
                              <?php if ($text) { ?>
                                  <div class="text paragraph-18 roboto"><?= $text ?></div>
                              <?php } ?>
                          </div>
                      <?php } ?>
                  </div>
              <?php } ?>
          </div>
          <div class="right-image-card">
              <?php
              $picture_class = 'right-image aspect-ratio';
              echo bis_get_attachment_picture(
                  $image,
                  [
                      375 => [327, 287, 1],
                      1024 => [350, 308, 1],
                      1280 => [389, 342, 1],
                      1440 => [468, 411, 1],
                      1920 => [468, 411, 1],
                      3840 => [468, 411, 1]
                  ],
                  [
                      'retina' => true, 'picture_class' => $picture_class,
                  ],
              );
              ?>
          </div>
      </div>
  </div>
</section>
