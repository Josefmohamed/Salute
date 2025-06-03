<?php
$id = '';
$className = 'hiring_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/hiring_block/screenshot.png">';
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
        <div class="title-wrapper ">
            <?php if ($title) { ?>
                <h4 class="salute-h4 uppercase-text title fw-800  text-center"><?= $title ?></h4>
            <?php } ?>
            <div class="line"></div>
        </div>
        <?php if (have_rows('hiring_card')) { ?>
            <div class="join-salute-highlights column">
                <?php while (have_rows('hiring_card')) {
                    the_row();
                    $position_title = get_sub_field('position_title');
                    $locations = get_sub_field('locations');
                    $role_summary = get_sub_field('role_summary');
                    $requirements = get_sub_field('requirements');
                    ?>
                    <div class="join-salute-highlight">
                        <?php if ($position_title) { ?>
                            <div class="join-salute-title fw-800 paragraph-32 capitalize-text">
                                <?= $position_title ?>
                            </div>
                        <?php } ?>
                        <?php if ($locations || $role_summary || $requirements) { ?>
                            <div class="card-content">
                                <?php if ($locations) { ?>
                                    <div class="join-salute-title  paragraph-18">
                                        <span class="paragraph-22 fw-800 capitalize-text">Locations:</span>
                                        <?= $locations ?>
                                    </div>
                                <?php } ?>
                                <?php if ($role_summary) { ?>
                                    <div class="join-salute-title  paragraph-18">
                                        <span class="paragraph-22 fw-800 capitalize-text">Role Summary:</span>
                                        <?= $role_summary ?>
                                    </div>
                                <?php } ?>
                                <?php if ($requirements) { ?>
                                    <div class="join-salute-title  paragraph-18">
                                        <span class="paragraph-22 fw-800 capitalize-text">Requirements:</span>
                                        <?= $requirements ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
