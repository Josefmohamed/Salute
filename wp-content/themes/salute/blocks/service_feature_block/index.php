<?php
$id = '';
$className = 'service_feature_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/service_feature_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');
$image = get_field('image');

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
  <div class="container">
          <div class="cards-wrapper">
              <div class="left-content column">
                  <?php if ($title) { ?>
                      <h4 class="abrite-h4 text uppercase-text fw-800"><?= $title ?></h4>
                  <?php } ?>
                  <?php if ($description) { ?>
                      <div class="paragraph-24 description urbanist white-color"><?= $description ?></div>
                  <?php } ?>
              </div>
              <div class="right-image-card">
                  <?php
                  $picture_class = 'left-image aspect-ratio';
                  echo bis_get_attachment_picture(
                      $image,
                      [
                          375 => [327, 416, 1],
                          1024 => [475, 604, 1],
                          1280 => [520, 662, 1],
                          1440 => [570, 725, 1],
                          1728 => [713, 906, 1],
                          1920 => [808, 1027, 1],
                          3840 => [1758, 2235, 1]
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
