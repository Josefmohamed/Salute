<?php
$post_id = @$args['post_id'] ?: get_the_ID();

$author_image = get_field('author_image', $post_id);

$post_title = get_the_title($post_id);

$comment = get_field('comment', $post_id);
$testimonial_title = get_the_title($post_id);
?>
<div class="swiper-slide card" id="post-id-<?= $post_id ?>">
    <div class="author-info">
        <?php if (!empty($author_image) && is_array($author_image)) { ?>
            <picture class="author-image">
                <img src="<?= $author_image['url'] ?>" alt="<?= $author_image['alt'] ?>">
            </picture>
        <?php } ?>
        <div class="author-content">
            <?php if ($post_title) { ?>
                <h2 class="paragraph-18 fw-800 "><?= $post_title ?></h2>
            <?php } ?>
            <svg class="stars" width="123" height="25" viewBox="0 0 123 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.3457 0.703613L14.9877 8.83479H23.5373L16.6205 13.8601L19.2625 21.9913L12.3457 16.966L5.42888 21.9913L8.07087 13.8601L1.15407 8.83479H9.7037L12.3457 0.703613Z" fill="#FFC062"/>
                <path d="M37.0566 0.702881L39.6986 8.83406H48.2482L41.3314 13.8594L43.9734 21.9906L37.0566 16.9652L30.1398 21.9906L32.7818 13.8594L25.865 8.83406H34.4146L37.0566 0.702881Z" fill="#FFC062"/>
                <path d="M61.7676 0.702881L64.4095 8.83406H72.9592L66.0424 13.8594L68.6844 21.9906L61.7676 16.9652L54.8508 21.9906L57.4927 13.8594L50.5759 8.83406H59.1256L61.7676 0.702881Z" fill="#FFC062"/>
                <path d="M86.4785 0.702881L89.1205 8.83406H97.6701L90.7533 13.8594L93.3953 21.9906L86.4785 16.9652L79.5617 21.9906L82.2037 13.8594L75.2869 8.83406H83.8365L86.4785 0.702881Z" fill="#FFC062"/>
                <path d="M111.197 0.702881L113.839 8.83406H122.389L115.472 13.8594L118.114 21.9906L111.197 16.9652L104.28 21.9906L106.922 13.8594L100.006 8.83406H108.555L111.197 0.702881Z" fill="#FFC062"/>
            </svg>
        </div>
    </div>
    <?php if ($comment) { ?>
        <div class="comment paragraph-18 fw-500"> <?= $comment ?> </div>
    <?php } ?>
</div>
