<?php
/**
 * Favorite tracks layout.
 * ACF fields: eyebrow, title and tracks (repeater).
 */
$eyebrow = get_sub_field('eyebrow') ?: '04 FAV TRACKS';
$title = get_sub_field('title') ?: 'FAV TRACKS';
$tracks = get_sub_field('tracks') ?: [];
?>
<section class="module-fav-tracks">
  <?php if ($eyebrow) : ?>
    <p class="module-fav-tracks__eyebrow"><?php echo esc_html($eyebrow); ?></p>
  <?php endif; ?>

  <?php if ($title) : ?>
    <h2 class="module-fav-tracks__title"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>

  <?php if ($tracks) : ?>
    <ol class="module-fav-tracks__list">
      <?php foreach ($tracks as $track) : ?>
        <li class="module-fav-tracks__item">
          <span class="module-fav-tracks__number">
            <?php echo esc_html($track['number'] ?? ''); ?>
          </span>
          <span class="module-fav-tracks__name">
            <?php echo esc_html($track['name'] ?? ''); ?>
          </span>
          <?php if (!empty($track['lyrics_link']['url'])) : ?>
            <?php
            $lyrics_link = $track['lyrics_link'];
            $lyrics_target = !empty($lyrics_link['target']) ? $lyrics_link['target'] : '_self';
            ?>
            <a
              class="module-fav-tracks__lyrics"
              href="<?php echo esc_url($lyrics_link['url']); ?>"
              target="<?php echo esc_attr($lyrics_target); ?>"
              rel="<?php echo '_blank' === $lyrics_target ? 'noopener noreferrer' : ''; ?>"
            >
              <?php echo esc_html($lyrics_link['title'] ?: 'LYRICS'); ?>
            </a>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  <?php endif; ?>
</section>
