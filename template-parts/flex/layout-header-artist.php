<?php
/**
 * Artist header layout.
 * ACF fields: image (attachment ID), eyebrow and title.
 */
$image_id = get_sub_field('image');
$eyebrow = get_sub_field('eyebrow') ?: '01 THE ARTIST';
$title = get_sub_field('title') ?: 'BEHIND THE ARTIST';

if (is_array($image_id)) {
  $image_id = $image_id['ID'] ?? $image_id['id'] ?? 0;
}
?>
<header class="module-header-artist">
  <?php if ($image_id) : ?>
    <?php echo wp_get_attachment_image($image_id, 'extra-large', false, [
      'class' => 'module-header-artist__image',
      'loading' => 'eager',
      'decoding' => 'async',
    ]); ?>
  <?php endif; ?>
  <div class="module-header-artist__content">
    <p class="module-header-artist__eyebrow"><?php echo esc_html($eyebrow); ?></p>
    <h1 class="module-header-artist__title"><?php echo esc_html($title); ?></h1>
  </div>
</header>
