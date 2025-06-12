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

    <svg class="section-svg animation-fade-me-up" width="59" height="395" viewBox="0 0 59 395" fill="none" >
        <path d="M58.9982 248.76C58.9982 249.654 58.9982 250.575 58.9804 251.541C58.9536 255.34 58.7576 301.206 58.7576 394.207L41.7056 394.206C41.7056 389.7 41.9017 255.26 41.9373 251.407C42.0086 242.654 41.7501 238.613 40.7429 232.623C37.3735 212.66 30.3941 201.887 22.3093 189.416C15.2407 178.509 7.93145 167.218 2.78822 149.364C1.31746 144.233 0.506305 137.161 0.0962727 125.709C-0.117657 119.764 0.0606149 58.8555 0.283456 2.55081C0.283456 28.0509 0.283456 -9.79346 0.283456 2.55081L17.7633 2.55081C17.6296 29.1565 17.3265 2.5419 17.3265 2.5419C17.0948 62.2885 16.9343 119.675 17.1304 125.083C17.478 134.792 18.1288 140.997 19.1717 144.608C23.6107 160.021 29.9216 169.766 36.6069 180.091C44.968 192.983 53.5965 206.313 57.5542 229.762C58.713 236.646 58.9982 241.715 58.9982 248.76Z"
              fill="#8BCCFE"/>
    </svg>

    <div class="container">
        <div class="content-wrapper animation-fade-me-up">
            <div class="text-wrapper ">
                <?php if ($title) { ?>
                    <h3 class="salute-h3 fw-800 title animation-fade-me-up"><?= $title ?></h3>
                <?php } ?>
                <?php if ($subtitle) { ?>
                    <h5 class="salute-h5 fw-800 subtitle animation-fade-me-up"><?= $subtitle ?></h5>
                <?php } ?>
                <?php if ($description): ?>
                    <div class="paragraph-28 description white-color animation-fade-me-up"><?= $description ?></div>
                <?php endif; ?>
            </div>
            <div class="hero-image animation-fade-me-up">
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

