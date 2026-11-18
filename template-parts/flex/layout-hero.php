<?php
$image_id = get_sub_field('image');

if (is_array($image_id)) {
  $image_id = $image_id['ID'] ?? $image_id['id'] ?? 0;
}
?>
<div class="hero-module">
  <?php if ($image_id) : ?>
      <?php echo wp_get_attachment_image($image_id, 'extra-large', false, array(
        'class' => 'hero-module__image',
        'loading' => 'eager',
        'decoding' => 'async',
      )); ?>
  <?php endif; ?>
</div>
