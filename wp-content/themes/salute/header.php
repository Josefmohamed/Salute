<!doctype html>
<html <?php language_attributes(); ?> class="can-scroll">
<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <!-- Third party code ACF-->
  <?php
  
  $code_in_head_tag = get_field('code_in_head_tag', 'options');
  $code_before_body_tag_after_head_tag = get_field('code_before_body_tag_after_head_tag', 'options');
  $code_after_body_tag = get_field('code_after_body_tag', 'options');
  ?>
  <?php wp_head(); ?>
  <?= $code_in_head_tag ?>
  <?php
  $custom_body_class = isset($args['body_class']) ? $args['body_class'] : '';
  ?>
</head>
<?= $code_before_body_tag_after_head_tag ?>
<body <?php body_class($custom_body_class); ?>>
<?= $code_after_body_tag ?>
<!-- header ACF -->
<?php

$banner_text = get_field('banner_text', 'options');
$header_logo = get_field('header_logo', 'options');
$login = get_field('login', 'options');
$contact_us = get_field('cta_button', 'options');

?>
<?php if ($banner_text): ?>
  <div class="banner-wrapper">
    <div class="paragraph-14 white-color fw-400"> <?= $banner_text ?></div>
  </div>
<?php endif; ?>
<header class="salute-header">
  <div class="container">
    <!--     logo-->
    
    
    <?php if ($header_logo) { ?>
      <a href="<?= site_url() ?>" target="_self" role="img" class="header-logo" aria-labelledby=" header_logo">
        <?= \Theme\Helpers::display_attachment($header_logo, array("width" => 165, "height" => 45)) ?>
      </a>
    <?php } ?>
    
    <!-- burger menu and cross-->
    <button aria-label="Open Menu Links" class="burger-menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <!--     links  -->
    <nav class="navbar">
      <div class="navbar-wrapper">
        <?php if (have_rows('menu_links', 'options')) { ?>
          <ul class="primary-menu">
            <?php while (have_rows('menu_links', 'options')) {
              the_row();
              $menu_link = get_sub_field('link');
              $is_has_sub_menu = get_sub_field('is_has_sub_menu');
              ?>
              <?php if (!empty($menu_link) && is_array($menu_link)) { ?>
                <li class="menu-item  <?= ($is_has_sub_menu) ? 'menu-item-has-children' : '' ?>">
                  <a class="header-link paragraph-16 fw-500 capitalize-text color-transition" href="<?= $menu_link['url'] ?>" target="<?= $menu_link['target'] ?>">
                    <?= $menu_link['title'] ?></a>
                  <?php if ($is_has_sub_menu && have_rows('submenu', 'options')) { ?>
                    <div class="arrow">
                      <svg
                          xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                          viewBox="0 0 448 512">
                        <path fill="#d1d1d1"
                              d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z"
                              class=""></path>
                      </svg>
                    </div>
                    <ul class="sub-menu">
                      <?php while (have_rows('submenu', 'options')) {
                        the_row();
                        $submenu_link = get_sub_field('submenu_link');
                        ?>
                        <?php if ($submenu_link) { ?>
                          <li class="menu-item-in-sub-menu">
                            <a class="header-sublink paragraph-16 fw-500 capitalize-text color-transition" href="<?= $submenu_link['url'] ?>" target="<?= $submenu_link['target'] ?>">
                              <?= $submenu_link['title'] ?>
                            </a>
                          </li>
                        <?php } ?>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                </li>
              <?php } ?>
            <?php } ?>
          </ul>
        <?php } ?>
        <div class="cta-wrappers">
          <?php if (!empty($login) && is_array($login)) { ?>
            <a class="cta-button login-cta content-us mobile-cta" href="<?= $login['url'] ?>" target="<?= $login['target'] ?>">
              <?= $login['title'] ?>
            </a>
          <?php } ?>
          <?php if (!empty($contact_us) && is_array($contact_us)) { ?>
            <a class="cta-button content-us" href="<?= $contact_us['url'] ?>" target="<?= $contact_us['target'] ?>">
              <?= $contact_us['title'] ?>
            </a>
          <?php } ?>
        </div>
      </div>
    </nav>
  </div>
</header>
