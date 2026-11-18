<?php
$label = get_sub_field('label') ?: __('Behind the music.', 'textdomaintomodify');
$artist_image = get_sub_field('artist_image');
?>
<div class="button-divider">
  <hr class="button-divider__rule" aria-hidden="true">
  <p class="button-divider__label"><?php echo esc_html($label); ?></p>
  <?php if (have_rows('buttons')) : ?>
    <div class="button-divider__buttons">
      <?php $button_index = 0; ?>
      <?php while (have_rows('buttons')) : the_row(); ?>
        <?php
        $link = get_sub_field('link');
        $url = is_array($link) && !empty($link['url']) ? $link['url'] : '';
        $target = is_array($link) && !empty($link['target']) ? $link['target'] : '_self';
        $titles = [
          __('The Artist', 'textdomaintomodify'),
          __('The Album', 'textdomaintomodify'),
          __('Tracks & Lyrics', 'textdomaintomodify'),
        ];
        $title = $titles[$button_index] ?? '';
        ?>
        <?php if ($url && $title) : ?>
          <a class="button-divider__button"
             href="<?php echo esc_url($url); ?>"
             target="<?php echo esc_attr($target); ?>"
             rel="<?php echo '_blank' === $target ? 'noopener noreferrer' : ''; ?>">
            <?php echo esc_html($title); ?>
          </a>
        <?php endif; ?>
        <?php $button_index++; ?>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>
