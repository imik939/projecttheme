<?php
/**
 * Navigation layout.
 * ACF field: items (repeater of link arrays).
 */
?>
<?php if (have_rows('items')) : ?>
  <nav class="module-navigation" aria-label="<?php esc_attr_e('Page navigation', 'textdomaintomodify'); ?>">
    <a class="module-navigation__branding" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
      <img
        class="site-logo"
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/onrepeat.png'); ?>"
        alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
        width="283"
        height="57"
      >
    </a>
    <div class="module-navigation__links">
    <?php while (have_rows('items')) : the_row(); ?>
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
    </div>
  </nav>
<?php endif; ?>
