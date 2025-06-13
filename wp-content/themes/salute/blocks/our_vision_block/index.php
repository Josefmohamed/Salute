<?php
$id = '';
$className = 'our_vision_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_vision_block/screenshot.png">';
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
      <svg  class="section-svg"width="59" height="667" viewBox="0 0 59 667" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M58.9982 364.197C58.9982 365.091 58.9982 366.012 58.9804 366.978C58.9536 370.777 58.7576 664.918 58.7576 666.027L41.7056 666C41.7056 661.494 41.9017 370.697 41.9373 366.844C42.0086 358.091 41.7501 354.051 40.7429 348.061C37.3735 328.097 30.394 317.325 22.3093 304.853C15.2407 293.946 7.93144 282.655 2.78821 264.802C1.31745 259.67 0.506298 252.599 0.0962659 241.147C-0.117664 235.201 0.060608 174.294 0.283449 117.989C0.470635 69.6858 0.684562 3.94862 0.702389 0.00604245L17.7454 0.086486C17.6117 26.6922 17.4602 83.1407 17.3265 117.98C17.0948 177.727 16.9343 235.112 17.1304 240.521C17.478 250.23 18.1287 256.434 19.1717 260.046C23.6107 275.458 29.9216 285.203 36.6069 295.529C44.968 308.42 53.5965 321.75 57.5542 345.2C58.713 352.084 58.9982 357.153 58.9982 364.197Z" fill="#8BCCFE"/>
      </svg>
      <div class="content-wrapper animation-fade-me-up" id="our_vision_block_22">
          <div class="left-image-card animation-fade-me-up">
                  <?php
                  $picture_class = 'left-image aspect-ratio';
                  echo bis_get_attachment_picture(
                      $image,
                      [
                          320 => [272, 346, 1],
                          375 => [327, 416, 1],
                          600 => [504, 641, 1],
                          768 => [544, 692, 1],
                          992 => [768, 977, 1],
                          1024 => [413, 525, 1],
                          1280 => [458, 582, 1],
                          1440 => [486, 618, 1],
                          1728 => [626, 796, 1],
                          1920 => [626, 796, 1]
                      ],
                      [
                          'retina' => true, 'picture_class' => $picture_class,
                      ],
                  );
                  ?>
              </div>
          <div class="right-content column">


              <?php if ($title) { ?>
                      <h4 class="salute-h4 text fw-800 animation-fade-me-up"><?= $title ?></h4>
                  <?php } ?>
              <?php if ($description) { ?>
                      <div class="paragraph-24 fw-500 description urbanist animation-fade-me-up"><?= $description ?></div>
                  <?php } ?>
              </div>
      </div>
  </div>
</section>
