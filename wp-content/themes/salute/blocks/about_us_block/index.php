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
      <div class="content-wrapper">
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
                          1280 => [509, 564, 1],
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
      <?php if (have_rows('about_us_highlights')) { ?>
              <div class="container">
                  <div class="about-us-highlights column">
                      <?php while (have_rows('about_us_highlights')) {
                          the_row();
                          $highlight_content = get_sub_field('highlight_content');
                          ?>
                          <div class="about-us-highlight paragraph-28">
                          <?php if ($highlight_content) { ?>
                              <svg class="about-us-highlight-svg" width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M52 20.4286V31.5714H46.217C37.8716 31.5714 31.1013 38.3418 31.1013 46.6872V52H20.9222V46.6872C20.9222 38.3418 14.1519 31.5714 5.80651 31.5714H0V20.4286H5.783C14.1284 20.4286 20.8987 13.6582 20.8987 5.31284V0H31.0778V5.31284C31.0778 13.6582 37.8481 20.4286 46.1935 20.4286H51.9765H52Z" fill="#8BCCFE"/>
                              </svg>
                              <?= $highlight_content ?></div>
                          <?php } ?>
                      <?php } ?>
                  </div>
              </div>
      <?php } ?>
</section>
