<?php
$id = '';
$className = 'about_us_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/about_us_block/screenshot.png">';
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
      <svg class="about-us-svg" width="1728" height="56" viewBox="0 0 1728 56" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M141.48 0.000143684C142.333 0.000143609 143.211 0.000147347 144.132 0.0170693C147.757 0.0424519 1740 0.228516 1785.03 0.228516L1785 16.4139C1732 16.4139 147.681 16.2279 144.004 16.194C135.654 16.1263 131.798 16.3717 126.083 17.3278C107.036 20.5259 96.7579 27.1507 84.8589 34.8246C74.4525 41.5339 63.6794 48.4718 46.6455 53.3536C41.7494 54.7496 35.0023 55.5196 24.0757 55.9088C18.4033 56.1118 -39.7101 55.9426 -93.4307 55.7311C-139.517 55.5534 -202.237 55.3504 -205.998 55.3335L-205.921 39.1565C-180.537 39.2834 -126.68 39.4272 -93.4392 39.5541C-36.4347 39.7741 18.318 39.9264 23.4785 39.7403C32.7418 39.4103 38.6616 38.7927 42.1077 37.8028C56.813 33.5893 66.1105 27.5991 75.9624 21.2535C88.2623 13.3174 100.98 5.12736 123.354 1.37079C129.922 0.270893 134.758 0.000144271 141.48 0.000143684Z" fill="#8BCCFE"/>
      </svg>
      <div class="cards-wrapper">
              <div class="left-content column">
                  <?php if ($title) { ?>
                      <h4 class="abrite-h4 text uppercase-text fw-800"><?= $title ?></h4>
                  <?php } ?>
                  <?php if ($description) { ?>
                      <div class="paragraph-32 description"><?= $description ?></div>
                  <?php } ?>
              </div>
              <div class="right-image-card">
                  <?php
                  $picture_class = 'left-image aspect-ratio';
                  echo bis_get_attachment_picture(
                      $image,
                      [
                          375 => [327, 362, 1],
                          1024 => [402, 445, 1],
                          1280 => [441, 488, 1],
                          1440 => [439, 486, 1],
                          1728 => [560, 620, 1],
                          1920 => [640, 709, 1],
                          3840 => [1444, 1599, 1]
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
