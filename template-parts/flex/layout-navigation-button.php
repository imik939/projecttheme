<?php
/**
 * Navigation Button layout.
 * ACF fields: link (link array), style (solid|outline), alignment (start|center|end).
 */
$link      = get_sub_field('link');
$style     = get_sub_field('style') ?: 'solid';
$alignment = get_sub_field('alignment') ?: 'start';

$link_url    = is_array($link) && !empty($link['url']) ? $link['url'] : '';
$link_title  = is_array($link) && !empty($link['title']) ? $link['title'] : '';
$link_target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
$link_rel    = '_blank' === $link_target ? 'noopener noreferrer' : '';

if (!$link_url) {
  return;
}
?>
<div class="navigation-button navigation-button--align-<?php echo esc_attr($alignment); ?>">
  <a class="navigation-button__link navigation-button__link--<?php echo esc_attr($style); ?>"
     href="<?php echo esc_url($link_url); ?>"
     target="<?php echo esc_attr($link_target); ?>"
     rel="<?php echo esc_attr($link_rel); ?>">
    <?php echo esc_html($link_title ?: __('Discover', 'textdomaintomodify')); ?>
  </a>
</div>
