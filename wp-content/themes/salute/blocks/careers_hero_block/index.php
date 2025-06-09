<?php
$id = '';
$className = 'careers_hero_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/careers_hero_block/screenshot.png">';
            return;
        }
    }
}
?>
<?php
$title = get_field('title');
$subtitle = get_field('subtitle');
$description = get_field('description');
$image = get_field('image');

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">

    <div class="container">
        <div class="content-wrapper">
            <div class="text-wrapper ">
                <?php if ($title) { ?>
                    <h3 class="salute-h3 fw-800 title "><?= $title ?></h3>
                <?php } ?>
                <?php if ($subtitle) { ?>
                    <h5 class="salute-h5 fw-800 subtitle "><?= $subtitle ?></h5>
                <?php } ?>
                <?php if ($description): ?>
                    <div class="paragraph-28 description white-color"><?= $description ?></div>
                <?php endif; ?>
            </div>
            <div class="hero-image">
                <?php
                $picture_class = 'cover-image aspect-ratio';
                echo bis_get_attachment_picture(
                    $image,
                    [
                        320 => [587, 882, 1],

                        992 => [262, 472, 1],
                        1024 => [271, 489, 1],
                        1280 => [346, 622, 1],
                        1440 => [392, 706, 1],
                        1728 => [476, 856, 1],
                        1992 => [552, 828, 1]
                    ],
                    [
                        'retina' => true, 'picture_class' => $picture_class,
                    ]
                );
                ?>
            </div>

        </div>
    </div>
</section>

