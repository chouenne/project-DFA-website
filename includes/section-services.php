<section id="services" class="service-section pb-2">
  <div class="container">
    <div class="service-box">
      <div class="row card-grid">
        <?php

        // Include the card functions file
        require_once get_template_directory() . '/includes/card-icon.php';

        $section_prefix = 'service';

        // Define Font Awesome icons for services
        $service_icons = [
          'fas fa-calendar-days',
          'fas fa-clipboard',
          'fas fa-pen-to-square',
          'fas fa-envelope-open-text',
          'fas fa-hand-holding-heart',
          'fas fa-briefcase'
        ];

        // Render cards for the service section
        render_cards($section_prefix, count($service_icons), $service_icons, 'col-md-4');
        ?>
      </div>
      <div class="row">
        <?php
        $section_button = get_field('service_section_btn');
        ?>
        <?php if ($section_button && !empty($section_button['url'])): ?>
          <a href="<?php echo esc_url($section_button['url']); ?>" class="btn secondary text-end">
            <?php echo esc_html($section_button['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>