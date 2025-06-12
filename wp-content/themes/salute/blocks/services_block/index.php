<?php
$id = '';
$className = 'services_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/services_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');
$cta_link = get_field('cta_link');
$block_type = get_field('block_type');
$service_image = get_field('service_image');
$image_title = get_field('image_title');
$programmatic_or_manual = get_field("manual_or_programmatic");
if ($programmatic_or_manual === 'programmatic') {
    $query_options = get_field("query_options") ?: [];
    $number_of_posts = isset($query_options['number_of_posts']) ? (int)$query_options['number_of_posts'] : -1;
    $order = isset($query_options['order']) && in_array($query_options['order'], ['asc', 'desc']) ? $query_options['order'] : 'DESC';
    $args = [
        "post_type" => "service",
        "posts_per_page" => $number_of_posts,
        "order" => $order,
        "post_status" => "publish",
        "paged" => 1,
        'orderby' => 'date',
    ];
    $the_query = new WP_Query($args);
}

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?> <?= $block_type ?>">
    <?php if ($service_image) { ?>
    <div class="service-image-card animation-fade-me-up">
        <svg class="service-svg" width="1640" height="655" viewBox="0 0 1640 655" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1310.73 281.202C1314.9 293.163 1317.81 305.72 1319.29 318.706C1308.2 322.437 1296.69 324.588 1285.13 325.043C1283.58 325.105 1282.02 325.135 1280.48 325.14H1280.05C1246.44 325.14 1214.87 312.263 1191.11 288.858C1167.23 265.312 1154 233.83 1153.86 200.206C1153.82 187.943 1155.52 175.942 1158.94 164.367C1172 165.357 1184.65 167.779 1196.76 171.488C1193.6 180.642 1192.02 190.221 1192.06 200.053C1192.25 248.126 1231.85 287.11 1280.36 286.948C1281.45 286.944 1282.54 286.922 1283.63 286.882C1292.81 286.519 1301.98 284.583 1310.74 281.202H1310.73Z" fill="#92C8ED"/>
            <path d="M1204.45 154.004C1192.15 150.08 1179.31 147.351 1166.07 145.958L1369.65 -293L1418 -301L1204.45 154.004Z" fill="#92C8ED"/>
            <path d="M1731 65.0292L1346.46 305.834C1343.51 307.682 1340.5 309.408 1337.43 311.002C1335.52 297.67 1332.26 284.785 1327.77 272.478L1710.73 32.667L1730.99 65.0336L1731 65.0292Z" fill="#92C8ED"/>
            <path d="M961.976 401.44L199.5 869.146L160.16 848L941.851 368.977C945.503 366.673 949.257 364.562 953.089 362.657C954.727 376.055 957.74 389.028 961.98 401.44H961.976Z" fill="#92C8ED"/>
            <path d="M1082.24 522.099C1094.39 526.294 1107.09 529.312 1120.2 531.025L953.482 891.152L918.82 875.105L1082.24 522.099Z" fill="#92C8ED"/>
            <path d="M1133.36 474.56C1133.4 487.665 1131.47 500.471 1127.58 512.774C1114.58 511.456 1102.01 508.701 1090 504.693C1093.46 495.119 1095.2 485.059 1095.16 474.718C1094.97 426.742 1055.86 387.823 1007.91 387.823H1007.63C1006.55 387.828 1005.46 387.854 1004.39 387.898C995.866 388.235 987.347 389.947 979.161 392.956C975.241 380.912 972.596 368.298 971.383 355.264C981.64 352.032 992.235 350.157 1002.88 349.737C1004.41 349.675 1005.97 349.64 1007.5 349.631C1041.13 349.535 1072.66 362.425 1096.37 385.966C1120.09 409.512 1133.22 440.976 1133.36 474.569L1133.36 474.56Z" fill="#92C8ED"/>
            <path d="M1045.33 47.8298C1019.96 10.8863 893.119 -164.841 782 -304L822 -311C933.895 -170.869 1051.21 -11.0739 1076.8 26.1805C1077.32 26.9338 1090.15 45.6355 1102.18 70.5959C1116.16 99.6207 1123.28 124.953 1123.41 146.125C1110.01 147.645 1097.03 150.536 1084.6 154.653C1084.66 154.272 1084.7 153.913 1084.75 153.575C1089.57 120.92 1057.09 64.8846 1045.33 47.8298Z" fill="#92C8ED"/>
            <path d="M1202.05 486.408C1201.24 493.468 1200.26 499.832 1199.3 505.263C1186.35 509.441 1172.75 512.152 1158.67 513.199C1159.85 508.246 1162.4 496.898 1164.1 482.055C1164.91 475.113 1166.24 463.493 1165.74 451.081C1165.15 436.492 1162.28 423.033 1156.14 406.092C1146.01 378.131 1132.99 356.626 1120.4 335.827C1110.41 319.328 1100.98 303.749 1093.64 286.134L1093.61 286.072C1093.16 284.986 1082.64 259.277 1080.09 232.53C1079.85 230.064 1079.69 227.502 1079.62 226.192C1078.88 213.434 1079.36 200.868 1081.21 184.155L1081.52 181.317C1081.75 179.32 1081.95 177.463 1082.15 175.711C1094.7 170.827 1107.96 167.345 1121.74 165.479C1121.2 170.03 1120.48 176.525 1119.48 185.517L1119.17 188.364C1117.15 206.549 1117.32 216.565 1117.75 223.963V224.098C1117.85 225.837 1117.98 227.585 1118.1 228.89C1120.07 249.484 1128.54 270.572 1128.9 271.488C1135.16 286.449 1143.86 300.828 1153.07 316.052C1165.99 337.39 1180.62 361.576 1192.05 393.079C1197.06 406.928 1202.94 425.858 1203.9 449.552C1204.52 464.916 1202.91 478.901 1202.05 486.417L1202.05 486.408Z" fill="#92C8ED"/>
            <path d="M1444.29 903.249L1417.58 930.544C1288.72 804.42 1214.04 701.096 1187.11 646.458C1174.12 620.101 1155.16 570.285 1156.1 532.369C1169.42 531.66 1182.39 529.597 1194.87 526.321C1190.95 549.389 1204.97 596.275 1221.37 629.574C1245.73 679.009 1318.73 780.353 1444.29 903.249Z" fill="#92C8ED"/>
            <path d="M-69 -203.513L961.664 277.059C957.56 289.269 954.647 302.019 953.053 315.18L-91 -176L-69 -203.513Z" fill="#92C8ED"/>
            <path d="M1077.03 301.971C1068.49 308.295 1058.35 314.107 1046.5 318.426C1033.22 323.274 1018.57 325.867 1004.17 325.924H1003.66C992.667 325.924 981.879 324.513 971.434 321.724C972.686 308.768 975.353 296.224 979.273 284.259C987.258 286.606 995.544 287.771 1004.02 287.732C1011.02 287.706 1021.81 286.782 1033.41 282.551C1046.24 277.869 1056.23 270.559 1063.69 263.262C1067.84 279.888 1072.85 292.322 1073.66 294.28L1073.72 294.442C1074.79 297.004 1075.89 299.514 1077.03 301.975L1077.03 301.971Z" fill="#92C8ED"/>
            <path d="M1279.57 349.903C1293.31 349.855 1306.71 351.992 1319.56 356.284C1318.27 369.327 1315.54 381.95 1311.53 393.986C1301.41 390.031 1290.71 388.055 1279.72 388.095C1269.87 388.13 1259.67 389.939 1250.23 393.311C1239.13 397.284 1229.03 403.341 1220.17 411.343C1217.79 401.523 1214.94 392.991 1212.31 385.73C1210.7 381.293 1209.04 377.001 1207.32 372.844C1216.6 366.371 1226.66 361.181 1237.37 357.353C1250.84 352.535 1265.44 349.96 1279.57 349.907V349.903Z" fill="#92C8ED"/>
            <path d="M1696.21 531.069L1680.07 565.682L1328.88 401.944C1333.08 389.786 1336.09 377.075 1337.79 363.954L1696.21 531.069Z" fill="#92C8ED"/>
        </svg>

        <?php
        $picture_class = 'service-image aspect-ratio';
        echo bis_get_attachment_picture(
            $service_image,
            [
                375 => [327, 131, 1],
                1024 => [936, 374, 1],
                1280 => [1192, 476, 1],
                1440 => [1352, 540, 1],
                1728 => [1640, 655, 1],
                1920 => [1832, 732, 1],
                3840 => [3752, 1498, 1]
            ],
            [
                'retina' => true,
                'picture_class' => $picture_class,
            ],
        );
        ?>
        <?php if ($image_title): ?>
            <h4 class="image-title uppercase-text fw-800 salute-h4 animation-fade-me-up"><?= esc_html($image_title) ?></h4>
        <?php endif; ?>
    </div>
    <?php } ?>
    <div class="container">
      <div class="content column">
          <?php if ($title) { ?>
              <h4 class="abrite-h4 text fw-800 text-center animation-fade-me-up"><?= $title ?></h4>
          <?php } ?>
          <?php if ($description) { ?>
              <div class="paragraph-20 description text-center animation-fade-me-up"><?= $description ?></div>
          <?php } ?>
          <div class="line animation-fade-me-up"></div>
      </div>
        <?php if ($programmatic_or_manual === 'manual') { ?>
            <div class="wrapper">
                <div class="accordion">
                    <?php
                    $cards = get_field("service_card");
                    if (is_array($cards)) {
                        $index = 1;
                        foreach ($cards as $card) {
                            get_template_part("partials/service-card", "", [
                                "post_id" => $card->ID,
                                "index" => $index
                            ]);
                            $index++;
                        }
                    }
                    ?>
                </div>
            </div>
        <?php } elseif (isset($the_query) && $the_query->have_posts()) { ?>
            <div class="wrapper">
                <div class="accordion">
                    <?php
                    $index = 1;
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        get_template_part("partials/service-card", "", [
                            "post_id" => get_the_ID(),
                            "index" => $index
                        ]);
                        $index++;
                    }
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
