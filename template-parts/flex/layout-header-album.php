<?php
/**
 * Album header layout.
 * ACF fields: brand, navigation, eyebrow, title, image and text.
 */
$eyebrow = get_sub_field('eyebrow') ?: '02 THE ALBUM';
$title = get_sub_field('title') ?: 'INSIDE THE ALBUM';
$image_id = get_sub_field('image');
$text = get_sub_field('text');

if (is_array($image_id)) {
  $image_id = $image_id['ID'] ?? $image_id['id'] ?? 0;
}
?>
<article class="module-header-album">
  <div class="module-header-album__content">
    <div class="module-header-album__heading">
      <p class="module-header-album__eyebrow"><?php echo esc_html($eyebrow); ?></p>
      <h1 class="module-header-album__title"><?php echo esc_html($title); ?></h1>
    </div>

    <div class="module-header-album__body">
      <?php if ($image_id) : ?>
        <?php echo wp_get_attachment_image($image_id, 'large', false, [
          'class' => 'module-header-album__image',
          'loading' => 'eager',
          'decoding' => 'async',
        ]); ?>
      <?php endif; ?>

      <?php if ($text) : ?>
        <div class="module-header-album__text rte">
          <?php echo wp_kses_post($text); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</article>
