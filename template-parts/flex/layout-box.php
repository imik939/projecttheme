<?php
/**
 * Content box layout.
 * ACF fields: label (text), text (wysiwyg).
 */
$label = get_sub_field('label');
$text = get_sub_field('text');
?>
<article class="content-box">
  <?php if ($label) : ?>
    <h2 class="content-box__label"><?php echo esc_html($label); ?></h2>
  <?php endif; ?>

  <?php if ($text) : ?>
    <div class="content-box__text rte">
      <?php echo wp_kses_post($text); ?>
    </div>
  <?php endif; ?>
</article>
