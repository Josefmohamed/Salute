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
          <div class="left-content animation-fade-me-up column">
              <div class="title-with-shape">
                  <?php if ($title) { ?>
                      <h4 class="salute-h4 text fw-800 uppercase-text animation-fade-me-up"><?= $title ?></h4>
                  <?php } ?>
                  <svg class="top-svg" width="882" height="299" viewBox="0 0 882 299" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M882 9.00004L203.999 9.00007C176.385 9.00007 153.999 31.3858 153.999 59.0001L153.999 150L153.999 240C153.999 267.614 131.613 290 103.999 290L0 290" stroke="#8BCCFE" stroke-width="17"/>
                  </svg>
              </div>
                  <?php if ($description) { ?>
                      <div class="paragraph-24 fw-500 description animation-fade-me-up"><?= $description ?></div>
                  <?php } ?>
              </div>
          <div class="right-content animation-fade-me-up">

              <?php if ($main_title) { ?>
              <div class="paragraph-32 main-title "><?= $main_title ?></div>
              <?php } ?>
              <div class="tel-and-mail ">
                  <?php if ($email) : ?>
                      <a href="mailto:<?= $email ?>"
                         class="email paragraph-20 twilight-steel ">
                          <svg class="same-svg" width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M1.59803 0H23.402C23.8518 0 24.26 0.189124 24.5514 0.492447L12.5 8.70151L0.448579 0.492447C0.740005 0.189124 1.14764 0 1.59803 0ZM24.9982 1.5287L15.5654 7.95408L24.9705 15.7027C24.9898 15.6036 25 15.5009 25 15.3964V1.60363C25 1.57825 24.9994 1.55347 24.9982 1.5287ZM24.3858 16.6574L14.611 8.60363L12.8191 9.82417C12.7932 9.8423 12.7661 9.85861 12.7378 9.8719L12.7168 9.88157C12.6505 9.90997 12.5807 9.92447 12.5114 9.92628H12.4868C12.4175 9.92508 12.3477 9.90997 12.2814 9.88157L12.2604 9.8719C12.2321 9.85861 12.205 9.8423 12.1791 9.82417L10.3872 8.60363L0.61356 16.6574C0.885116 16.8719 1.22712 17 1.59803 17H23.402C23.7723 17 24.1143 16.8719 24.3864 16.6574H24.3858ZM0.0295039 15.7027L9.43461 7.95408L0.00180636 1.5287C0.000602119 1.55347 0 1.57885 0 1.60363V15.3964C0 15.5009 0.010236 15.6036 0.0295039 15.7027Z" fill="#182A3B"/>
                          </svg>
                          <?= $email ?>
                      </a>
                  <?php endif; ?>
                  <?php if ($phone_number) : ?>
                      <a href="tel:<?= $phone_number ?>" class="phone-number paragraph-20 twilight-steel">
                          <svg class="same-svg" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74702 6.17406C8.38509 5.53099 8.38253 4.48043 7.74088 3.84044L4.37196 0.478327C3.73031 -0.16166 2.6834 -0.159094 2.04533 0.483973C-2.64834 5.21588 1.69585 11.7707 5.48385 15.5511C9.27184 19.3315 15.8291 23.6554 20.5232 18.9235C21.1613 18.2799 21.1588 17.2299 20.5171 16.5899L17.1482 13.2278C16.5065 12.5878 15.4596 12.5904 14.8216 13.2339C13.2399 14.8285 13.5224 15.2807 11.5299 14.1285C9.60853 13.0174 7.98854 11.4007 6.87102 9.47921C5.71206 7.48688 6.16439 7.76813 7.74651 6.17355L7.74702 6.17406Z" fill="#182A3B"/>
                          </svg>
                           <?= $phone_number ?></a>
                  <?php endif; ?>
              </div>
          </div>
      </div>
        <div class="bottom-content column animation-fade-me-up">
            <?php if ($info) { ?>
            <div class="info paragraph-32 midnight-depth fw-800 animation-fade-me-up"><?= $info ?></div>
            <?php } ?>
            <?php if ($text) { ?>
                <div class="text paragraph-28 fw-400 animation-fade-me-up"><?= $text ?></div>
            <?php } ?>
        </div>
  </div>
    <svg class="bottom-svg" width="1170" height="506" viewBox="0 0 1170 506" fill="none" >
        <path d="M1227 9H59C31.3858 9 9 31.3858 9 59V542C9 569.614 31.3858 592 59 592H149H240C267.614 592 290 614.386 290 642V1003" stroke="#8BCCFE" stroke-width="17"/>
    </svg>
</section>

