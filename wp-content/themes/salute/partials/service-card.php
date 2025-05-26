<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$post_title = get_the_title($post_id);
$comment = get_field('comment', $post_id);
$index = get_row_index();

?>
<div class="accordion-panel" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
  <?php if ($post_title) { ?>
    <div id="panel2-title" class="title ">
      <button class="accordion-trigger salute-h6 fw-700" aria-expanded="false" aria-controls="accordion1-content">
        <?= $post_title ?>

      </button>
    </div>
  <?php } ?>
  <?php if ($comment) { ?>
    <div class="accordion-content" role="region" aria-labelledby="panel2-title" aria-hidden="true" id="panel2-content">
      <div class="body-6 answer regular white-color" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
          <svg width="479" height="32" viewBox="0 0 479 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M198.261 -1.7202e-05C198.748 -1.72446e-05 199.249 -1.34737e-05 199.774 0.00965483C201.843 0.02416 1110.31 0.130482 1136 0.130482L1135.99 9.37931C1105.75 9.37931 201.799 9.27299 199.701 9.25365C194.937 9.21498 192.737 9.35518 189.476 9.90151C178.609 11.729 172.745 15.5146 165.955 19.8997C160.018 23.7337 153.871 27.6981 144.152 30.4878C141.359 31.2855 137.509 31.7255 131.275 31.9479C128.039 32.0639 94.8813 31.9672 64.2305 31.8463C37.9354 31.7448 2.15015 31.6288 0.00390622 31.6191L0.0477287 22.3751C14.5312 22.4476 45.2599 22.5298 64.2256 22.6023C96.7501 22.728 127.99 22.8151 130.934 22.7087C136.22 22.5201 139.597 22.1672 141.563 21.6015C149.954 19.1939 155.258 15.7709 160.879 12.1448C167.897 7.60985 175.154 2.92983 187.919 0.783212C191.666 0.154698 194.426 -1.68668e-05 198.261 -1.7202e-05Z" fill="#8BCCFE"/>
          </svg>
          <p class="spacer"></p>
          <?= $comment ?>
      </div>
    </div>
  <?php } ?>
    <span><?= $index ?></span>
</div>
