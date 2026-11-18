<?php
get_header();
?>

  <main id="main" class="site-main home-page">
    <?php if (function_exists('have_rows') && have_rows('page_modules')) : ?>
      <?php get_template_part('templates/render', 'page-modules'); ?>
    <?php else : ?>
      <section class="home-hero" aria-labelledby="home-title">
        <div class="home-hero-copy">
          <p class="eyebrow">A PLACE FOR THE SONGS YOU KEEP</p>
          <h1 id="home-title">Play it<br><em>again.</em></h1>
          <p class="home-hero-intro">Discover the tracks that stay with you, from first listen to full-volume repeat.</p>
          <a class="text-link" href="#latest">Explore the latest <span aria-hidden="true">↘</span></a>
        </div>
        <div class="home-hero-mark" aria-hidden="true">
          <span class="mark-ring"></span>
          <span class="mark-word">ON<br>REPEAT.</span>
          <span class="mark-caption">VOL. 01 / 2024</span>
        </div>
      </section>
    <?php endif; ?>

    <section id="latest" class="latest-section" aria-labelledby="latest-title">
      <div class="section-heading">
        <p class="eyebrow">CURATED FOR YOU</p>
        <h2 id="latest-title">The latest<br><em>rotation</em></h2>
        <span class="section-number">01—04</span>
      </div>

      <div class="release-grid">
        <?php
        $latest_posts = new WP_Query(
          array(
            'posts_per_page'      => 4,
            'ignore_sticky_posts' => true,
          )
        );

        if ( $latest_posts->have_posts() ) :
          $release_number = 1;
          while ( $latest_posts->have_posts() ) :
            $latest_posts->the_post();
            ?>
            <article class="release-card">
              <a class="release-cover" href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy' ) ); ?>
                <?php else : ?>
                  <span class="cover-placeholder" aria-hidden="true"><span><?php echo esc_html( str_pad( (string) $release_number, 2, '0', STR_PAD_LEFT ) ); ?></span></span>
                <?php endif; ?>
                <span class="play-button" aria-hidden="true">▶</span>
              </a>
              <div class="release-meta">
                <span><?php echo esc_html( str_pad( (string) $release_number, 2, '0', STR_PAD_LEFT ) ); ?></span>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <span><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
              </div>
            </article>
            <?php
            $release_number++;
          endwhile;
          wp_reset_postdata();
        else :
          $fallback_releases = array(
            array( 'title' => 'Midnight Frequency', 'artist' => 'ON REPEAT. SELECTS', 'tone' => 'violet' ),
            array( 'title' => 'Soft Focus', 'artist' => 'THE WEEKEND EDIT', 'tone' => 'lime' ),
            array( 'title' => 'After Hours', 'artist' => 'NO SKIP SUNDAYS', 'tone' => 'blue' ),
            array( 'title' => 'Still Moving', 'artist' => 'ON REPEAT. SELECTS', 'tone' => 'orange' ),
          );
          foreach ( $fallback_releases as $index => $release ) :
            ?>
            <article class="release-card">
              <a class="release-cover cover-<?php echo esc_attr( $release['tone'] ); ?>" href="#latest" aria-label="<?php echo esc_attr( $release['title'] ); ?>">
                <span class="cover-placeholder" aria-hidden="true"><span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span></span>
                <span class="play-button" aria-hidden="true">▶</span>
              </a>
              <div class="release-meta">
                <span><?php echo esc_html( str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
                <h3><a href="#latest"><?php echo esc_html( $release['title'] ); ?></a></h3>
                <span><?php echo esc_html( $release['artist'] ); ?></span>
              </div>
            </article>
            <?php
          endforeach;
        endif;
        ?>
      </div>
    </section>
  </main>

<?php
get_footer();
