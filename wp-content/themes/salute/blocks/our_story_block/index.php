<?php
$id = '';
$className = 'our_story_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_story_block/screenshot.png">';
            return;
        }
    }
}
?>
<?php
$title = get_field('title');
$image = get_field('image');
$first_description = get_field('first_description');
$second_description = get_field('second_description');
$name = get_field('name');
$role = get_field('role');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <?php if ($title): ?>
            <h2 class="salute-h2 text-center fw-700"><?= $title ?></h2>
        <?php endif; ?>
        <div class="horizontal-card column">
            <div class="top-content">
                <div class="right-image-card">
                    <?php
                    $picture_class = 'right-image aspect-ratio';
                    echo bis_get_attachment_picture(
                        $image,
                        [
                            375 => [327, 202, 1],
                            1024 => [506, 312, 1],
                            1280 => [550, 340, 1],
                            1440 => [638, 394, 1],
                            1920 => [638, 394, 1],
                            3840 => [638, 394, 1]
                        ],
                        [
                            'retina' => true, 'picture_class' => $picture_class,
                        ],
                    );
                    ?>
                </div>
                <?php if ($first_description): ?>
                    <div class="paragraph-18 description"><?= $first_description ?></div>
                <?php endif; ?>
            </div>
            <?php if ($second_description): ?>
                <div class="paragraph-18 second-description"><?= $second_description ?></div>
            <?php endif; ?>
            <div class="reviewer-info">
                <div class="name paragraph-18 fw-600 poppins"><?= $name ?></div>
                <?php if ($role): ?>
                    <div class="separator"></div>
                    <div class="paragraph-18 fw-300 poppins"> <?= $role ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
