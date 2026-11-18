<?php
/**
 * Next navigation layout.
 * ACF field: link (link array).
 */
$link = get_sub_field('link');
$url = is_array($link) && !empty($link['url']) ? $link['url'] : '';
$title = is_array($link) && !empty($link['title']) ? $link['title'] : 'NEXT: THE ALBUM';
$target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
$rel = '_blank' === $target ? 'noopener noreferrer' : '';
?>
<?php if ($url) : ?>
  <nav class="content-box__next" aria-label="<?php echo esc_attr($title); ?>">
    <a href="<?php echo esc_url($url); ?>"
       aria-label="<?php echo esc_attr($title); ?>"
       target="<?php echo esc_attr($target); ?>"
       rel="<?php echo esc_attr($rel); ?>">
      <?php echo esc_html($title); ?>
    </a>
  </nav>
<?php endif; ?>
