<?php
include(get_template_directory() . '/includes/card-icon.php');

if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <section id="whyus" class="whyus-section">
      <div class="container">
        <!-- Title Row -->
        <div class="row align-items-center mb-4">
          <!-- Left Column -->
          <div class="col-md-6">
            <?php
            // Get ACF fields for section title, subtitle, and button
            $section_title = get_field('whyus_title');
            $section_subtitle = get_field('whyus_subtitle');

            ?>
            <?php if ($section_subtitle): ?>
              <h4 class="programs-subtitle"><?php echo esc_html($section_subtitle); ?></h4>
            <?php endif; ?>
            <?php if ($section_title): ?>
              <h2 class="programs-title"><?php echo esc_html($section_title); ?></h2>
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

        <div class="row">
          <?php
          // Define the section prefix
          $section_prefix = 'whyus';

          // Define Material Icons for the Why Us section
          $material_icons = [
            'inbox_text',               // Icon 1
            'rate_review',        // Icon 2
            'diversity_1',        // Icon 3
            'person_raised_hand', // Icon 4
            'volunteer_activism',               // Icon 5
            'workspace_premium'   // Icon 6
          ];

          // Render the cards
          render_cards($section_prefix, count($material_icons), $material_icons, 'col-md-6');
          ?>
        </div>


      </div>
    </section>

  <?php endwhile; else: endif; ?>