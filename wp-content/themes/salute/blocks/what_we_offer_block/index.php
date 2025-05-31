<?php
$id = '';
$className = 'what_we_offer_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/what_we_offer_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
    <div class="content column">
        <?php if ($title) { ?>
            <h4 class="abrite-h4 uppercase-text title fw-800  text-center"><?= $title ?></h4>
        <?php } ?>
        <div class="line"></div>
    </div>
    <?php if (have_rows('what_offer_highlights')) { ?>
    <div class="offer-highlights">
        <?php while (have_rows('what_offer_highlights')) {
            the_row();
            $offer_title = get_sub_field('offer_title');
            ?>
            <?php if ($offer_title) { ?>
                    <div class="offer-highlight paragraph-32 capitalize-text column text-center column">
                        <svg class="offer-highlight-svg" width="52" height="52" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M52 20.4286V31.5714H46.217C37.8716 31.5714 31.1013 38.3418 31.1013 46.6872V52H20.9222V46.6872C20.9222 38.3418 14.1519 31.5714 5.80651 31.5714H0V20.4286H5.783C14.1284 20.4286 20.8987 13.6582 20.8987 5.31284V0H31.0778V5.31284C31.0778 13.6582 37.8481 20.4286 46.1935 20.4286H51.9765H52Z" fill="#8BCCFE"/>
                        </svg>
                        <?= $offer_title ?>
                    </div>
                <?php } ?>
        <?php } ?>
    </div>
    <?php } ?>
    </div>
</section>
