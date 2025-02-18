<section class="philosophy">
  <div class="container">
    <div class="row text-center mb-5">
      <?php
      $philosophy_title_content = get_field('philosophy_title_content');

      if ($philosophy_title_content) {
        // Extract subfields from the group field
        $subtitle = $philosophy_title_content['subtitle'];
        $title = $philosophy_title_content['title'];

        // Pass the data to the title-content template
        get_template_part('/includes/title-content', null, array(
          'subtitle' => $subtitle,
          'title' => $title,
        ));
      }
      ?>
    </div>

    <div class="row card-grid">
      <?php

      // Include the card functions file
      require_once get_template_directory() . '/includes/card-icon.php';

      $section_prefix = 'philosophy';

      // Define Font Awesome icons for services
      $service_icons = [
        'fas fa-calendar-days',
        'fas fa-clipboard',
        'fas fa-pen-to-square',
        'fas fa-envelope-open-text',
      ];

      // Render cards for the service section
      render_cards($section_prefix, count($service_icons), $service_icons, 'col-md-3');
      ?>
    </div>

  </div>
</section>