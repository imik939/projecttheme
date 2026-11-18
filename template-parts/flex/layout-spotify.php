<?php
/**
 * Spotify navigation layout.
 * ACF fields: label and link.
 */
$label = get_sub_field('label') ?: 'LISTEN ON SPOTIFY';
$link = get_sub_field('link');
$url = is_array($link) && !empty($link['url']) ? $link['url'] : '';
$target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
?>
<?php if ($url) : ?>
  <nav class="module-spotify" aria-label="<?php echo esc_attr($label); ?>">
    <a
      class="module-spotify__link"
      href="<?php echo esc_url($url); ?>"
      target="<?php echo esc_attr($target); ?>"
      rel="<?php echo '_blank' === $target ? 'noopener noreferrer' : ''; ?>"
    >
      <?php echo esc_html($label); ?>
    </a>
  </nav>
<?php endif; ?>
