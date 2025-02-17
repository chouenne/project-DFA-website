<section class="programs-section">
  <div class="container">
    <!-- Title Row -->
    <div class="row align-items-center mb-4">
      <!-- Left Column -->
      <div class="col-md-6">
        <?php
        // Get ACF fields for section title, subtitle, and button
        $section_title = get_field('program_section_title');
        $section_subtitle = get_field('program_section_subtitle');
        $section_button = get_field('program_section_button');
        ?>
        <?php if ($section_subtitle): ?>
          <h4 class="programs-subtitle"><?php echo esc_html($section_subtitle); ?></h4>
        <?php endif; ?>
        <?php if ($section_title): ?>
          <h2 class="programs-title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        <?php if ($section_button && !empty($section_button['url'])): ?>
          <a href="<?php echo esc_url($section_button['url']); ?>" class="btn secondary">
            <?php echo esc_html($section_button['title']); ?>
          </a>
        <?php endif; ?>
      </div>
      <!-- Right Column -->
      <div class="col-md-6">
        <?php
        // Get ACF field for section description
        $section_description = get_field('program_section_description');
        ?>
        <?php if ($section_description): ?>
          <p class="programs-description"><?php echo esc_html($section_description); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Cards Row -->
  <div class="container-fluid px-0">
    <div class="row g-0">
      <?php
      // Static image URLs
      $program_images = [
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-2.28.53 PM.png',
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-2.30.11 PM.png',
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-2.56.54 PM.png',
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-2.58.03 PM.png',
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-2.58.55 PM.png',
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-2.59.49 PM.png',
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-3.07.16 PM.png',
        'http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-30-at-3.10.11 PM.png',
      ];

      // Get ACF field for cards
      $program_cards = get_field('program_section_cards');

      // Loop through the 8 cards
      for ($i = 0; $i < 8; $i++):
        $card = $program_cards["card_" . ($i + 1)]; // Access card_1 to card_8
        $card_title = $card['card_title'] ?? 'Default Title';
        $card_subtitle = $card['card_subtitle'] ?? 'Default Subtitle';
        $card_button = $card['card_btn'] ?? [];
        $card_image = $program_images[$i] ?? ''; // Use static image URL
        ?>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="program-card" style="background-image: url('<?php echo esc_url($card_image); ?>');">
            <div class="program-overlay">
              <div class="programcard-text">
                <?php if ($card_title): ?>
                  <h5 class="program-title"><?php echo esc_html($card_title); ?></h5>
                <?php endif; ?>
                <?php if ($card_subtitle): ?>
                  <h6 class="program-subtitle"><?php echo esc_html($card_subtitle); ?></h6>
                <?php endif; ?>
                <?php if ($card_button && !empty($card_button['url'])): ?>
                  <a href="<?php echo esc_url($card_button['url']); ?>" class="btn forth program-cardbtn">
                    <?php echo esc_html($card_button['title']); ?>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>