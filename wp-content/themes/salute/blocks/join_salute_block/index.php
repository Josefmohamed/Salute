<?php
$id = '';
$className = 'join_salute_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/join_salute_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');
$main_title = get_field('main_title');
$phone_number = get_field('phone_number');
$email = get_field('email');
$info = get_field('info');
$text = get_field('text');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
      <div class="content-wrapper">
          <div class="left-content column">
                  <?php if ($title) { ?>
                      <h4 class="salute-h4 text fw-800 uppercase-text"><?= $title ?></h4>
                  <?php } ?>
                  <?php if ($description) { ?>
                      <div class="paragraph-24 fw-500 description"><?= $description ?></div>
                  <?php } ?>
              </div>
          <div class="right-content">
              <?php if ($main_title) { ?>
              <div class="paragraph-32 main-title"><?= $main_title ?></div>
              <?php } ?>
              <div class="tel-and-mail">
                  <?php if ($email) : ?>
                      <a href="mailto:<?= $email ?>"
                         class="email paragraph-20 twilight-steel">
                          <svg class="same-svg" width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M1.47018 0H21.5298C21.9436 0 22.3192 0.177999 22.5873 0.46348L11.5 8.18966L0.412693 0.46348C0.680804 0.177999 1.05583 0 1.47018 0ZM22.9983 1.43878L14.3202 7.48619L22.9729 14.779C22.9906 14.6858 23 14.5891 23 14.4907V1.50929C23 1.48541 22.9994 1.46209 22.9983 1.43878ZM22.435 15.6776L13.4421 8.09753L11.7936 9.24628C11.7698 9.26334 11.7448 9.27869 11.7188 9.2912L11.6994 9.3003C11.6385 9.32703 11.5742 9.34068 11.5105 9.34239H11.4878C11.4241 9.34125 11.3598 9.32703 11.2989 9.3003L11.2795 9.2912C11.2535 9.27869 11.2286 9.26334 11.2047 9.24628L9.55619 8.09753L0.564475 15.6776C0.814306 15.8794 1.12895 16 1.47018 16H21.5298C21.8705 16 22.1851 15.8794 22.4355 15.6776H22.435ZM0.0271435 14.779L8.67984 7.48619L0.00166185 1.43878C0.00055395 1.46209 0 1.48598 0 1.50929V14.4907C0 14.5891 0.00941715 14.6858 0.0271435 14.779Z" fill="#182A3B"/>
                          </svg>
                          <?= $email ?>
                      </a>
                  <?php endif; ?>
                  <?php if ($phone_number) : ?>
                      <a href="tel:<?= $phone_number ?>" class="phone-number paragraph-20 twilight-steel">
                          <svg class="same-svg" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0_17_1489)">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74702 6.17406C8.38509 5.53099 8.38253 4.48043 7.74088 3.84044L4.37196 0.478327C3.73031 -0.16166 2.6834 -0.159094 2.04533 0.483973C-2.64834 5.21588 1.69585 11.7707 5.48385 15.5511C9.27184 19.3315 15.8291 23.6554 20.5232 18.9235C21.1613 18.2799 21.1588 17.2299 20.5171 16.5899L17.1482 13.2278C16.5065 12.5878 15.4596 12.5904 14.8216 13.2339C13.2399 14.8285 13.5224 15.2807 11.5299 14.1285C9.60853 13.0174 7.98854 11.4007 6.87102 9.47921C5.71206 7.48688 6.16439 7.76813 7.74651 6.17355L7.74702 6.17406Z" fill="#182A3B"/>
                              </g>
                              <defs>
                                  <clipPath id="clip0_17_1489">
                                      <rect width="21" height="21" fill="white"/>
                                  </clipPath>
                              </defs>
                          </svg>
                           <?= $phone_number ?></a>
                  <?php endif; ?>
              </div>
          </div>
      </div>
        <div class="bottom-content column">
            <?php if ($info) { ?>
            <div class="info paragraph-32 midnight-depth fw-800"><?= $info ?></div>
            <?php } ?>
            <?php if ($text) { ?>
                <div class="text paragraph-28 fw-400"><?= $text ?></div>
            <?php } ?>
        </div>
  </div>
    <svg class="bottom-svg" width="1170" height="506" viewBox="0 0 1170 506" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1227 9H59C31.3858 9 9 31.3858 9 59V542C9 569.614 31.3858 592 59 592H149H240C267.614 592 290 614.386 290 642V1003" stroke="#8BCCFE" stroke-width="17"/>
    </svg>
</section>
