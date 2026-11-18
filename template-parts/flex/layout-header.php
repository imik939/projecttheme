<?php
/**
 * Header layout.
 * ACF fields: branding (text), navigation (repeater of link arrays).
 */
$branding = get_sub_field('branding') ?: get_bloginfo('name');
?>
<header class="module-header">
  <a class="module-header__branding" href="<?php echo esc_url(home_url('/')); ?>">
    <?php echo esc_html($branding); ?>
  </a>

  <?php if (have_rows('navigation')) : ?>
    <nav class="module-header__navigation" aria-label="<?php esc_attr_e('Header navigation', 'textdomaintomodify'); ?>">
      <?php while (have_rows('navigation')) : the_row(); ?>
        <?php
        $link = get_sub_field('link');
        $url = is_array($link) && !empty($link['url']) ? $link['url'] : '';
        $title = is_array($link) && !empty($link['title']) ? $link['title'] : '';
        $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
        $rel = '_blank' === $target ? 'noopener noreferrer' : '';
        ?>
        <?php if ($url && $title) : ?>
          <a href="<?php echo esc_url($url); ?>"
             target="<?php echo esc_attr($target); ?>"
             rel="<?php echo esc_attr($rel); ?>">
            <?php echo esc_html($title); ?>
          </a>
        <?php endif; ?>
      <?php endwhile; ?>
    </nav>
  <?php endif; ?>
</header>
