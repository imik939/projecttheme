<?php
/**
 * Song introduction layout.
 * ACF fields: eyebrow, title and text.
 */
$eyebrow = get_sub_field('eyebrow') ?: 'THE SONG';
$title = get_sub_field('title') ?: 'SONG INTRODUCTION';
$text = get_sub_field('text');
?>
<article class="module-song-introduction">
  <?php if ($eyebrow) : ?>
    <p class="module-song-introduction__eyebrow">
      <?php echo esc_html($eyebrow); ?>
    </p>
  <?php endif; ?>

  <?php if ($title) : ?>
    <h2 class="module-song-introduction__title">
      <?php echo esc_html($title); ?>
    </h2>
  <?php endif; ?>

  <?php if ($text) : ?>
    <div class="module-song-introduction__text rte">
      <?php echo wp_kses_post($text); ?>
    </div>
  <?php endif; ?>

  <p class="module-song-introduction__lyrics">LYRICS</p>
</article>
