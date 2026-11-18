<?php
/**
 * Album details layout.
 * ACF fields: details, quote, spotify_link and feature_image.
 */
$details = get_sub_field('details');
$quote = get_sub_field('quote');
$spotify_link = get_sub_field('spotify_link');
$feature_image = get_sub_field('feature_image');

if (is_array($feature_image)) {
  $feature_image = $feature_image['ID'] ?? $feature_image['id'] ?? 0;
}
?>
<section class="album-details">
  <div class="album-details__content">
    <?php if ($details) : ?>
      <div class="album-details__text rte">
        <?php echo wp_kses_post($details); ?>
        <?php if (is_array($spotify_link) && !empty($spotify_link['url'])) : ?>
          <?php $spotify_target = $spotify_link['target'] ?: '_self'; ?>
          <a class="album-details__spotify"
             href="<?php echo esc_url($spotify_link['url']); ?>"
             target="<?php echo esc_attr($spotify_target); ?>"
             rel="<?php echo '_blank' === $spotify_target ? 'noopener noreferrer' : ''; ?>">
            <?php echo esc_html($spotify_link['title'] ?: 'Listen on Spotify'); ?>
          </a>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($quote) : ?>
      <blockquote class="album-details__quote">
        <?php echo esc_html($quote); ?>
      </blockquote>
    <?php endif; ?>
  </div>

  <?php if ($feature_image) : ?>
    <?php echo wp_get_attachment_image($feature_image, 'extra-large', false, [
      'class' => 'album-details__image',
      'loading' => 'lazy',
      'decoding' => 'async',
    ]); ?>
  <?php endif; ?>
</section>
