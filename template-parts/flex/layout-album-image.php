<?php
/**
 * Album image layout.
 * ACF field: image (attachment ID).
 */
$image_id = get_sub_field('image');

if (is_array($image_id)) {
  $image_id = $image_id['ID'] ?? $image_id['id'] ?? 0;
}
?>
<?php if ($image_id) : ?>
  <figure class="module-album-image">
    <?php echo wp_get_attachment_image($image_id, 'extra-large', false, [
      'class' => 'module-album-image__image',
      'loading' => 'lazy',
      'decoding' => 'async',
    ]); ?>
  </figure>
<?php endif; ?>
