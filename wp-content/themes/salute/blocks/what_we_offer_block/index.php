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
            $icon = get_sub_field('icon');
            $offer_title = get_sub_field('offer_title');
            ?>
            <?php if ($offer_title) { ?>
                <div class="offer-highlight paragraph-32 capitalize-text column text-center column">
                    <?php if (!empty($icon) && is_array($icon)) { ?>
                        <picture class="offer-highlight-icon">
                            <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                        </picture>
                    <?php } ?>
                    <?= $offer_title ?>
                    </div>
                <?php } ?>
        <?php } ?>
    </div>
    <?php } ?>
    </div>
</section>
