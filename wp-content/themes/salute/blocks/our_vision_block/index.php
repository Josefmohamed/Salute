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
      <div class="content-wrapper">
          <div class="left-image-card">
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
              <svg class="section-svg" width="59" height="1220" viewBox="0 0 59 1220" fill="none" >
                  <path d="M58.9982 364.192C58.9982 365.086 58.9982 366.007 58.9804 366.973C58.9536 370.772 58.7576 1218.88 58.7576 1219.99L41.7056 1219.96C41.7056 1215.46 41.9017 370.692 41.9373 366.839C42.0086 358.086 41.7501 354.045 40.7429 348.056C37.3735 328.092 30.394 317.32 22.3093 304.848C15.2407 293.941 7.93141 282.65 2.78819 264.797C1.31742 259.665 0.506274 252.593 0.0962417 241.141C-0.117688 235.196 0.0605838 174.287 0.283425 117.982C0.470611 69.6791 0.684538 3.94275 0.702365 0.00012204L17.7454 0.0805656C17.6117 26.6863 17.4602 83.1339 17.3265 117.974C17.0947 177.72 16.9343 235.107 17.1304 240.515C17.478 250.224 18.1287 256.429 19.1716 260.04C23.6107 275.453 29.9216 285.198 36.6069 295.524C44.968 308.415 53.5965 321.745 57.5542 345.195C58.713 352.079 58.9982 357.148 58.9982 364.192Z"
                        fill="#8BCCFE"/>
              </svg>

              <?php if ($title) { ?>
                      <h4 class="salute-h4 text fw-800"><?= $title ?></h4>
                  <?php } ?>
                  <?php if ($description) { ?>
                      <div class="paragraph-24 fw-500 description urbanist"><?= $description ?></div>
                  <?php } ?>
              </div>
      </div>
  </div>
</section>
