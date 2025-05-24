<?php
$id = '';
$className = 'get_in_touch_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/get_in_touch_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$description = get_field('description');
$cta_link = get_field('cta_link');
$main_title = get_field('main_title');
$block_title = get_field('block_title');
$title_form = get_field('title_form');
$enquires = get_field('enquires', 'options');
$title = (is_array($enquires) && isset($enquires['title'])) ? $enquires['title'] : '';
$box_address = (is_array($enquires) && isset($enquires['box_address'])) ? $enquires['box_address'] : '';
$email = (is_array($enquires) && isset($enquires['email'])) ? $enquires['email'] : '';
$hours = (is_array($enquires) && isset($enquires['hours'])) ? $enquires['hours'] : '';
$phone = (is_array($enquires) && isset($enquires['phone'])) ? $enquires['phone'] : '';
$form = get_field('form');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
  <div class="container">
    <?php if ($main_title) { ?>
      <h2 class="salute-h1 fw-400 title animation-fade-me-up"><?= $main_title ?></h2>
    <?php } ?>
    <?php if ($block_title) { ?>
      <div class="main-title">
        <?= $block_title ?>
      </div>
    <?php } ?>
    <div class="content-wrapper">
      <div class="left-content animation-fade-me-up">
        <?php if ($title_form) { ?>
          <h3 class="orange-color title-form"><?= $title_form ?></h3>
        <?php } ?>
        <?php echo do_shortcode('[gravityform id="' . $form . '" ajax="true" title="false" description="false"]'); ?>
      </div>
      <div class="right-content animation-fade-me-up">
        <div class="enquires column">
          <?php if ($title): ?>
            <div class="salute-h3 enquire-title col-title orange-color capitalize-text"><?= $title ?></div>
          <?php endif; ?>
          <?php if ($box_address): ?>
            <div class="body-base box-address dark-color "><?= $box_address ?></div>
          <?php endif; ?>
          <?php if ($email): ?>
            <a href="mailto:<?= $email ?>" class="body-base cta-link dark-color"><?= $email ?></a>
          <?php endif; ?>
          <?php if ($phone): ?>
            <a href="tel:<?= $phone ?>" class="body-base dark-color cta-link phone"><?= $phone ?></a>
          <?php endif; ?>
        </div>
        <?php if (have_rows('branch_locations', 'options')) { ?>
          <?php while (have_rows('branch_locations', 'options')) {
            the_row();
            $branch_name = get_sub_field('branch_name');
            $branch_phone = get_sub_field('branch_phone');
            $branch_address = get_sub_field('branch_address');
            $branch_hours = get_sub_field('branch_hours');
            ?>
            <div class="branch-locations column">
              <?php if ($branch_name): ?>
                <div class="col-title branch-title orange-color salute-h5"><?= $branch_name ?></div>
              <?php endif; ?>
              <?php if ($branch_address) { ?>
                <div class="body-small branch-address dark-color"><?= $branch_address ?></div>
              <?php } ?>
              <?php if ($branch_phone): ?>
                <a href="tel:<?= $branch_phone ?>" class="body-small branch-phone  cta-link orange-color"><?= $branch_phone ?></a>
              <?php endif; ?>
              <?php if ($branch_hours): ?>
                <div class="col-title dark-color body-small"><?= $branch_hours ?></div>
              <?php endif; ?>
            </div>
          <?php } ?>
        <?php } ?>
        <div class="bottom-content column">
          <?php if ($description) { ?>
            <div class="body-small description">
              <?= $description ?>
            </div>
          <?php } ?>
          <?php if (!empty($cta_link) && is_array($cta_link)) { ?>
            <a class="cta-link medium orange-color" href="<?= $cta_link['url'] ?>" target="<?= $cta_link['target'] ?>" download="<?= $cta_link['url'] ?>"><?= $cta_link['title'] ?>
              <svg width="12" height="13" viewBox="0 0 12 13" fill="none" aria-hidden="true">
                <path d="M5.12113 0.984375V10.5008L0.557613 5.9373L0 6.49944L5.51507 12.0145L11.0301 6.49944L10.4725 5.9373L5.909 10.5008V0.984375H5.12113Z" fill="#FF5001"/>
              </svg>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
