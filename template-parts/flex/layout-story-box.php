<?php
/**
 * Story Box layout.
 * ACF fields: image (attachment ID), eyebrow (text), title (text),
 * text (wysiwyg), link (link array).
 */
$image_id = get_sub_field('image');
$eyebrow  = get_sub_field('eyebrow');
$title    = get_sub_field('title');
$text     = get_sub_field('text');
$link     = get_sub_field('link');

$link_url    = is_array($link) && !empty($link['url']) ? $link['url'] : '';
$link_title  = is_array($link) && !empty($link['title']) ? $link['title'] : '';
$link_target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
$link_rel    = '_blank' === $link_target ? 'noopener noreferrer' : '';
?>
<article class="story-box">
  <?php if ($image_id) : ?>
    <div class="story-box__media">
      <?php echo wp_get_attachment_image($image_id, 'large', false, array(
        'class' => 'story-box__image',
        'loading' => 'lazy',
        'decoding' => 'async',
      )); ?>
    </div>
  <?php endif; ?>

  <div class="story-box__content">
    <?php if ($eyebrow) : ?>
      <p class="story-box__eyebrow"><?php echo esc_html($eyebrow); ?></p>
    <?php endif; ?>

    <?php if ($title) : ?>
      <h2 class="story-box__title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($text) : ?>
      <div class="story-box__text rte">
        <?php echo wp_kses_post($text); ?>
      </div>
    <?php endif; ?>

    <?php if ($link_url) : ?>
      <a class="story-box__link text-link"
         href="<?php echo esc_url($link_url); ?>"
         target="<?php echo esc_attr($link_target); ?>"
         rel="<?php echo esc_attr($link_rel); ?>">
        <?php echo esc_html($link_title ?: __('Read story', 'textdomaintomodify')); ?>
        <span aria-hidden="true">↘</span>
      </a>
    <?php endif; ?>
  </div>
</article>
