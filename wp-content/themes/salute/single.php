<?php get_header(); ?>
<?php
$post_id = get_the_ID();
$hide_sidebar = get_field('hide_sidebar', $post_id);
?>
    <div style="height: 140vh;padding-top: 25vh">
        <div class="container">
            <h4 style="color: black" class="main-title utp-h4">Coming Soon</h4>
        </div>
    </div>
<?php get_footer(); ?>