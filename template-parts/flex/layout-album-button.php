<?php
/**
 * Album Button layout.
 * ACF fields: label (text), link (link array).
 */
$label = get_sub_field('label');
$link  = get_sub_field('link');

$link_url    = is_array($link) && !empty($link['url']) ? $link['url'] : '';
$link_title  = is_array($link) && !empty($link['title']) ? $link['title'] : '';
$link_target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
$link_rel    = '_blank' === $link_target ? 'noopener noreferrer' : '';
$label       = $label ?: $link_title ?: __('The Album', 'textdomaintomodify');

if (!$link_url) {
  return;
}
?>
<div class="album-button">
  <a class="album-button__link"
     href="<?php echo esc_url($link_url); ?>"
     target="<?php echo esc_attr($link_target); ?>"
     rel="<?php echo esc_attr($link_rel); ?>">
    <?php echo esc_html($label); ?>
  </a>
</div>
