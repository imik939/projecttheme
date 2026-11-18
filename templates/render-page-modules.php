<?php
/**
 * Rendert die ACF Flexible-Content-Felder aus `page_modules`
 * Erwartet pro Layout ein Partial unter: /template-parts/flex/layout-*.php
 */

if (!function_exists('have_rows') || !have_rows('page_modules')) {
  return;
}

while (have_rows('page_modules')) : the_row();

  // Section-Optionen 
  $opts = [
    'name'       => get_row_layout(),
    'container'  => get_sub_field('container') ?: 'container-lg',
    'padding_y'  => get_sub_field('padding_y') ?: 'py-5',
    'bg'         => get_sub_field('background') ?: 'none',
    'id'         => get_sub_field('id-anchor') ?: '',
    'show_on'    => get_sub_field('show-on') ?: 'everywhere',
  ];

  if ('hero' === get_row_layout()) {
    $opts['container'] = 'none';
  }

  // Öffne Section-Hülle nur, wenn Helper existieren – sonst simple Wrapper
  if (function_exists('section_open')) {
    section_open($opts);
  } else {
    $name = $opts['name'];
    $id   = $opts['id'] ? ' id="'.esc_attr($opts['id']).'"' : '';
    $cont = $opts['container'];
    $py   = $opts['padding_y'];
    echo '<section'.$id.' class="'.$name.' '.$py.'">';
    if ($cont !== 'none') echo '<div class="'.$cont.'">';
  }

  switch (get_row_layout()) {
    case 'hero':
      get_template_part('template-parts/flex/layout', 'hero'); break;

    case 'story_box':
      get_template_part('template-parts/flex/layout', 'story-box'); break;

    case 'navigation_button':
      get_template_part('template-parts/flex/layout', 'navigation-button'); break;

    case 'album_button':
      get_template_part('template-parts/flex/layout', 'album-button'); break;

    case 'divider':
      get_template_part('template-parts/flex/layout', 'divider'); break;

    case 'header':
      get_template_part('template-parts/flex/layout', 'header'); break;

    case 'header_artist':
      get_template_part('template-parts/flex/layout', 'header-artist'); break;

    case 'header_album':
      get_template_part('template-parts/flex/layout', 'header-album'); break;

    case 'album_image':
      get_template_part('template-parts/flex/layout', 'album-image'); break;

    case 'tracks':
      get_template_part('template-parts/flex/layout', 'tracks'); break;

    case 'fav_tracks':
      get_template_part('template-parts/flex/layout', 'fav-tracks'); break;

    case 'spotify':
      get_template_part('template-parts/flex/layout', 'spotify'); break;

    case 'song_introduction':
      get_template_part('template-parts/flex/layout', 'song-introduction'); break;

    case 'lyrics_content':
      get_template_part('template-parts/flex/layout', 'lyrics-content'); break;

    case 'album_details':
      get_template_part('template-parts/flex/layout', 'album-details'); break;

    case 'box':
      get_template_part('template-parts/flex/layout', 'box'); break;

    case 'next':
      get_template_part('template-parts/flex/layout', 'next'); break;

    case 'navigation':
      get_template_part('template-parts/flex/layout', 'navigation'); break;

    case 'button_divider':
      get_template_part('template-parts/flex/layout', 'button-divider'); break;

    case 'intro':
      get_template_part('template-parts/flex/layout', 'intro'); break;

    case 'text_1col':
      get_template_part('template-parts/flex/layout', 'text-1col'); break;

    case 'text_2col':
      get_template_part('template-parts/flex/layout', 'text-2col'); break;

    case 'text_3col':
      get_template_part('template-parts/flex/layout', 'text-3col'); break;

    case 'text_4col':
      get_template_part('template-parts/flex/layout', 'text-4col'); break;

    case 'text_left_image_right':
      get_template_part('template-parts/flex/layout', 'text-left-image-right'); break;

    case 'image_left_text_right':
      get_template_part('template-parts/flex/layout', 'image-left-text-right'); break;

    case 'image_slider':
      get_template_part('template-parts/flex/layout', 'image-slider'); break;

    case 'bildboxen':
      get_template_part('template-parts/flex/layout', 'bildboxen'); break;

    case 'galerie':
      get_template_part('template-parts/flex/layout', 'galerie'); break;

    case 'tabs':
      get_template_part('template-parts/flex/layout', 'tabs'); break;

    case 'akkordeon':
      get_template_part('template-parts/flex/layout', 'akkordeon'); break;

    case 'breaker':
      get_template_part('template-parts/flex/layout', 'breaker'); break;

    case 'code_editor':
      get_template_part('template-parts/flex/layout', 'code-editor'); break;

    case 'google_map':
      get_template_part('template-parts/flex/layout', 'google-map'); break;

    case 'project_highlight':
      get_template_part('template-parts/flex/layout', 'project-highlight'); break;
      }

  if (function_exists('section_close')) {
    section_close($opts);
  } else {
    if ($opts['container'] !== 'none') echo '</div>';
    echo '</section>';
  }

endwhile;