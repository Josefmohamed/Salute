<?php wp_footer(); ?>
<?php
$code_before_end_of_body_tag = get_field('code_before_end_of_body_tag', 'options');
$top_text = get_field('business_tagline', 'options');
$footer_logo = get_field('footer_logo', 'options');
$text = get_field('text', 'options');
$business_abn = get_field('business_abn', 'options');

$enquires = get_field('enquires', 'options');
$title = (is_array($enquires) && isset($enquires['title'])) ? $enquires['title'] : '';
$box_address = (is_array($enquires) && isset($enquires['box_address'])) ? $enquires['box_address'] : '';
$email = (is_array($enquires) && isset($enquires['email'])) ? $enquires['email'] : '';
$hours = (is_array($enquires) && isset($enquires['hours'])) ? $enquires['hours'] : '';

?>
<footer>
  <div class="container">
  
  </div>
</footer>
<?= $code_before_end_of_body_tag ?>
</body>
</html>
