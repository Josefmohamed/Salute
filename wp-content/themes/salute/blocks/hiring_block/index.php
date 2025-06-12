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
                <h4 class="salute-h4 uppercase-text title fw-800 animation-fade-me-up text-center"><?= $title ?></h4>
            <?php } ?>
            <div class="line animation-fade-me-up"></div>
        </div>
        <?php if (have_rows('hiring_card')) { ?>
            <div class="cards-wrapper">
                <?php while (have_rows('hiring_card')) {
                    the_row();
                    $position_title = get_sub_field('position_title');
                    $locations = get_sub_field('locations');
                    $role_summary = get_sub_field('role_summary');
                    $requirements = get_sub_field('requirements');
                    ?>
                    <div class="card animation-fade-me-up">
                        <?php if ($position_title) { ?>
                            <div class="card-title animation-fade-me-up fw-800 paragraph-32 capitalize-text">
                                <?= $position_title ?>
                            </div>
                        <?php } ?>
                        <?php if ($locations || $role_summary || $requirements) { ?>
                            <div class="card-content">
                                <svg class="card-line-svg" width="395" height="59" viewBox="0 0 395 59" fill="none">
                                    <path d="M248.761 7.75652e-05C249.655 7.7487e-05 250.576 8.12212e-05 251.541 0.0179072C255.341 0.0446479 301.207 0.240735 394.207 0.240726L394.206 17.2927C389.701 17.2927 255.26 17.0966 251.407 17.061C242.655 16.9897 238.614 17.2482 232.624 18.2554C212.661 21.6248 201.888 28.6042 189.416 36.689C178.509 43.7576 167.218 51.0669 149.365 56.2101C144.233 57.6808 137.162 58.492 125.71 58.902C119.764 59.116 58.856 58.9377 2.5513 58.7149C28.0514 58.7149 -9.79297 58.7149 2.5513 58.7149L2.5513 41.235C29.157 41.3687 2.54239 41.6718 2.54239 41.6718C62.289 41.9035 119.675 42.064 125.084 41.8679C134.793 41.5203 140.997 40.8695 144.609 39.8266C160.022 35.3876 169.766 29.0767 180.092 22.3914C192.983 14.0303 206.313 5.40181 229.763 1.44411C236.647 0.285319 241.716 7.8181e-05 248.761 7.75652e-05Z"
                                          fill="#8BCCFE"/>
                                </svg>

                                <?php if ($locations) { ?>
                                    <div class="card-info  paragraph-18">
                                        <span class="paragraph-22 fw-800 capitalize-text">Locations:</span>
                                        <?= $locations ?>
                                    </div>
                                <?php } ?>
                                <?php if ($role_summary) { ?>
                                    <div class="card-info  paragraph-18">
                                        <span class="paragraph-22 fw-800 capitalize-text">Role Summary:</span>
                                        <?= $role_summary ?>
                                    </div>
                                <?php } ?>
                                <?php if ($requirements) { ?>
                                    <div class="card-info  paragraph-18">
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
