<section class="about-section">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-md-6">
        <?php
        // Get ACF field values
        $subtitle = get_field('about_section_subtitle');
        $title = get_field('about_section_title');
        $paragraph = get_field('about_section_description');
        $button_link_array = get_field('about_section_button'); // ACF Link field (returns array)
        
        // Extract button URL and text from the ACF Link field
        $button_text = $button_link_array['title'] ?? 'Discover More'; // Default fallback
        $button_link = $button_link_array['url'] ?? '#about-more'; // Default fallback
        $button_class = 'btn primary';

        // Pass the data to the title-content template
        get_template_part('/includes/title-content', null, array(
          'subtitle' => $subtitle,
          'title' => $title,
          'paragraph' => $paragraph,
          'button_text' => $button_text,
          'button_link' => $button_link,
          'button_class' => $button_class,
        ));
        ?>
      </div>

      <div class="col-md-6">
        <img
          src="http://localhost:8888/designfuture/wp-content/uploads/2025/01/chouenneh_A_professional_inspiring_image_for_a_hero_section_o_3487c583-b5c9-4d10-b823-402b9347dc8d_2.png"
          alt="About Image" class="img-fluid">
      </div>
    </div>
  </div>
</section>