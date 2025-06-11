<?php
$id = '';
$className = 'blogs_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/blogs_block/screenshot.png">';
            return;
        }
    }
}
?>
<?php
$programmatic_or_manual = get_field("manual_or_programmatic");
if ($programmatic_or_manual === 'programmatic') {
    $query_options = get_field("query_options") ?: [];
    $number_of_posts = isset($query_options['number_of_posts']) ? (int)$query_options['number_of_posts'] : -1;
    $order = isset($query_options['order']) && in_array($query_options['order'], ['asc', 'desc']) ? $query_options['order'] : 'DESC';
    $args = [
        "post_type" => "post",
        "posts_per_page" => $number_of_posts,
        "order" => $order,
        "post_status" => "publish",
        "paged" => 1,
        'orderby' => 'date',
    ];
    $the_query = new WP_Query($args);
}
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">


    <div class="container">
        <div class="content-wrapper">

            <svg class="blogs-svg" width="821" height="1003" viewBox="0 0 821 1003" fill="none">
                <path d="M821 9H59C31.3858 9 9 31.3858 9 59V542C9 569.614 31.3858 592 59 592H149H240C267.614 592 290 614.386 290 642V1003"
                      stroke="#8BCCFE" stroke-width="17"/>
            </svg>
        <?php if ($programmatic_or_manual === 'manual') {
            ?>
            <div class="swiper blogs-swiper">
                <div class="swiper-wrapper cards-wrapper">
                    <?php
                    $cards = get_field("blogs_card");
                    if (is_array($cards)) {
                        foreach ($cards as $card) {
                            get_template_part("partials/blog-card", "", ["post_id" => $card->ID]);
                        }
                    }
                    ?>
                </div>
            </div>
        <?php } elseif (isset($the_query) && $the_query->have_posts()) { ?>
            <div class="swiper blogs-swiper">
                <div class="swiper-wrapper cards-wrapper">
                    <?php while ($the_query->have_posts()) {
                        $the_query->the_post();
                        get_template_part("partials/blog-card", "", ["post_id" => get_the_ID()]);
                    } ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        <?php } ?>
        <div class="swiper-pagination"></div>
    </div>
    </div>
</section>
