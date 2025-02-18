<section class="mission">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <?php
        $mission_title_content = get_field('mission_title_content');

        if ($mission_title_content) {
          // Extract subfields from the group field
          $subtitle = $mission_title_content['subtitle'];
          $title = $mission_title_content['title'];
          $description = $mission_title_content['description'];

          // Pass the data to the title-content template
          get_template_part('/includes/title-content', null, array(
            'subtitle' => $subtitle,
            'title' => $title,
            'paragraph' => $description,
          ));
        }
        ?>

        <?php
        include(get_template_directory() . '/includes/card-icon.php');
        // Define the section prefix
        $section_prefix = 'mission';

        // Define Material Icons for the Why Us section
        $material_icons = [
          'inbox_text',               // Icon 1
          'rate_review',        // Icon 2
          'diversity_1',        // Icon 3
          'person_raised_hand', // Icon 4
        ];

        // Render the cards
        render_cards($section_prefix, count($material_icons), $material_icons, 'col-md-12');
        ?>
      </div>
      <div class="col-md-6">
        <img src="http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-31-at-2.34.35 PM.png"
          alt="FAQ Image" class="img-fluid">
      </div>
    </div>

  </div>
</section>