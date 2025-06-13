<?php
$id = '';
$className = 'why_join_salute_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/why_join_salute_block/screenshot.png">';
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
    <div class="content animation-fade-me-up column">
        <?php if ($title) { ?>
            <h4 class="abrite-h4 uppercase-text title fw-800 text-center"><?= $title ?></h4>
        <?php } ?>
        <div class="line"></div>
    </div>
    <?php if (have_rows('join_salute_highlights')) { ?>
    <div class="join-salute-highlights column">
        <?php while (have_rows('join_salute_highlights')) {
            the_row();
            $icon = get_sub_field('icon');
            $highlight_title = get_sub_field('highlight_title');
            $highlight_description = get_sub_field('highlight_description');
            ?>
        <div class="join-salute-highlight animation-fade-me-up">
            <?php if ($highlight_title) { ?>
                    <div class="join-salute-title fw-800 paragraph-32 capitalize-text">
                        <?php if (!empty($icon) && is_array($icon)) { ?>
                            <picture class="join-salute-title-svg">
                                <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                            </picture>
                        <?php } ?>
                        <?= $highlight_title ?>
                    </div>
                <?php } ?>
            <?php if ($highlight_description) { ?>
                    <div class="highlight-description paragraph-20 midnight-depth">
                        <?= $highlight_description ?>
                    </div>
                <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    </div>
</section>
