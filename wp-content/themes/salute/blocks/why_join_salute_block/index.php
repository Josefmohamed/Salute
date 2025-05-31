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
    <div class="content column">
        <?php if ($title) { ?>
            <h4 class="abrite-h4 uppercase-text title fw-800  text-center"><?= $title ?></h4>
        <?php } ?>
        <div class="line"></div>
    </div>
    <?php if (have_rows('join_salute_highlights')) { ?>
    <div class="join-salute-highlights column">
        <?php while (have_rows('join_salute_highlights')) {
            the_row();
            $highlight_title = get_sub_field('highlight_title');
            $highlight_description = get_sub_field('highlight_description');
                ?>
        <div class="join-salute-highlight">
            <?php if ($highlight_title) { ?>
                    <h6 class="join-salute-title fw-800 paragraph-32 capitalize-text">
                        <svg class="join-salute-title-svg" width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="0.706543" width="40" height="40" rx="8" fill="#011632"/>
                            <path d="M29.5974 29.4584H26.984V17.3221C26.984 15.183 25.3227 13.4426 23.2809 13.4426H10V10.7065H23.2828C26.7649 10.7065 29.5974 13.674 29.5974 17.3221V29.4584Z" fill="#E9F7FE"/>
                            <path d="M11.8042 29.4586H10V26.7206H11.8042C17.3876 26.7206 21.9296 21.9622 21.9296 16.1128H24.5431C24.5431 19.6773 23.2178 23.0278 20.8122 25.55C18.4066 28.0702 15.2066 29.4586 11.8042 29.4586Z" fill="#E9F7FE"/>
                        </svg>
                        <?= $highlight_title ?>
                    </h6>
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
