<?php
$hero_class = get_query_var('hero_class', '');
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_description = get_field('hero_description');
$hero_button = get_field('hero_btn');
$hero_image = get_field('hero_image');
$alignment_class = is_page('home') ? 'text-left' : 'text-center';
$inner_class = is_page('home') ? 'text-inner-left' : 'text-inner-center';


if ($hero_button):
  $hero_button_label = $hero_button['title'];
  $hero_button_url = $hero_button['url'];
  $hero_button_target = $hero_button['target'] ? $hero_button['target'] : '_self';
endif;
?>

<section class="hero-section d-flex align-items-center<?php echo esc_attr($hero_class); ?>" style="
    background-color: rgba(239, 229, 221,0.8); background-image: url('<?php echo esc_url($hero_image); ?>'); 
    background-blend-mode: overlay;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height:100vh;
  ">
  <div class="container">
    <div class="row">
      <div class="text-content <?php echo esc_attr($alignment_class); ?>">
        <div class="text-inner <?php echo esc_attr($inner_class); ?>">
          <h3 class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></h3>
          <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
          <?php if ($hero_description): ?>
            <p class="hero-description"><?php echo esc_html($hero_description); ?></p>
          <?php endif; ?>
          <?php if ($hero_button): ?>
            <a href="<?php echo esc_url($hero_button_url); ?>" target="<?php echo esc_attr($hero_button_target); ?>"
              class="btn primary mt-3">
              <?php echo esc_html($hero_button_label); ?>
            </a>
          <?php endif; ?>
        </div>

      </div>
      <!-- end of text-content -->
    </div>
  </div>
</section>