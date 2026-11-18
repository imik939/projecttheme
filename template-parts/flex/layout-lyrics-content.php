<?php
/**
 * Lyrics content layout.
 * ACF field: lyrics (wysiwyg).
 */
$lyrics = get_sub_field('lyrics');
?>
<?php if ($lyrics) : ?>
  <article class="module-lyrics-content">
    <div class="module-lyrics-content__text rte">
      <?php echo wp_kses_post($lyrics); ?>
    </div>
  </article>
<?php endif; ?>
