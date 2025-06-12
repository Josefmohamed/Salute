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
        <svg class="about-us-top-svg animation-fade-me-up" width="1728" height="56" viewBox="0 0 1728 56" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M141.48 0.000143684C142.333 0.000143609 143.211 0.000147347 144.132 0.0170693C147.757 0.0424519 1740 0.228516 1785.03 0.228516L1785 16.4139C1732 16.4139 147.681 16.2279 144.004 16.194C135.654 16.1263 131.798 16.3717 126.083 17.3278C107.036 20.5259 96.7579 27.1507 84.8589 34.8246C74.4525 41.5339 63.6794 48.4718 46.6455 53.3536C41.7494 54.7496 35.0023 55.5196 24.0757 55.9088C18.4033 56.1118 -39.7101 55.9426 -93.4307 55.7311C-139.517 55.5534 -202.237 55.3504 -205.998 55.3335L-205.921 39.1565C-180.537 39.2834 -126.68 39.4272 -93.4392 39.5541C-36.4347 39.7741 18.318 39.9264 23.4785 39.7403C32.7418 39.4103 38.6616 38.7927 42.1077 37.8028C56.813 33.5893 66.1105 27.5991 75.9624 21.2535C88.2623 13.3174 100.98 5.12736 123.354 1.37079C129.922 0.270893 134.758 0.000144271 141.48 0.000143684Z" fill="#8BCCFE"/>
        </svg>
        <svg class="about-us-bottom-svg animation-fade-me-up" width="415" height="520" viewBox="0 0 415 520" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M821 9H59C31.3858 9 9 31.3858 9 59V59C9 86.6142 31.3858 109 59 109H149H240C267.614 109 290 131.386 290 159V520" stroke="#8BCCFE" stroke-width="17"/>
        </svg>
        <div class="left-content column">
                  <?php if ($title) { ?>
                      <h4 class="abrite-h4 text uppercase-text fw-800 animation-fade-me-up"><?= $title ?></h4>
                  <?php } ?>
                  <?php if ($description) { ?>
                      <div class="paragraph-32 description animation-fade-me-up"><?= $description ?></div>
                  <?php } ?>
              </div>
        <div class="right-image-card animation-fade-me-up">
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
                          <div class="about-us-highlight paragraph-28 animation-fade-me-up">
                          <?php if ($highlight_content) { ?>
                              <svg class="about-us-highlight-svg animation-fade-me-up" width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M52 20.4286V31.5714H46.217C37.8716 31.5714 31.1013 38.3418 31.1013 46.6872V52H20.9222V46.6872C20.9222 38.3418 14.1519 31.5714 5.80651 31.5714H0V20.4286H5.783C14.1284 20.4286 20.8987 13.6582 20.8987 5.31284V0H31.0778V5.31284C31.0778 13.6582 37.8481 20.4286 46.1935 20.4286H51.9765H52Z" fill="#8BCCFE"/>
                              </svg>
                              <?= $highlight_content ?></div>
                          <?php } ?>
                      <?php } ?>
                  </div>
              </div>
      <?php } ?>
</section>
