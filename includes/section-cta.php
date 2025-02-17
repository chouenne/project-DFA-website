<!-- CTA Banner Section -->
<section class="cta-banner py-5">
  <div class="container text-center">
    <?php
    // Get ACF fields for section title, subtitle, and button
    $section_title = get_field('cta_title');
    $section_subtitle = get_field('cta_subtitle');
    $section_button = get_field('cta_btn');
    ?>
    <?php if ($section_subtitle): ?>
      <h4 class="cta-subtitle"><?php echo esc_html($section_subtitle); ?></h4>
    <?php endif; ?>
    <?php if ($section_title): ?>
      <h2 class="cta-title"><?php echo esc_html($section_title); ?></h2>
    <?php endif; ?>
    <?php if ($section_button && !empty($section_button['url'])): ?>
      <a href="<?php echo esc_url($section_button['url']); ?>" class="btn primary">
        <?php echo esc_html($section_button['title']); ?>
      </a>
    <?php endif; ?>
  </div>
</section>