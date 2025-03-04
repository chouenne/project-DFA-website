<section id="faq">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Column: Image -->
      <div class="col-md-6">
        <img src="http://localhost:8888/designfuture/wp-content/uploads/2025/01/Screenshot-2025-01-31-at-2.34.35 PM.png"
          alt="FAQ Image" class="img-fluid">
      </div>

      <!-- Right Column: Subtitle, Title, and FAQ Items -->
      <div class="col-md-6">
        <?php
        // Get ACF fields for section title, subtitle, and button
        $section_title = get_field('faq_title');
        $section_subtitle = get_field('faq_subtitle');
        ?>
        <?php if ($section_subtitle): ?>
          <h4 class="text-uppercase text-muted"><?php echo esc_html($section_subtitle); ?></h4>
        <?php endif; ?>
        <?php if ($section_title): ?>
          <h2 class="mb-4"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>

        <!-- FAQ Accordion -->
        <div id="faq-accordion">
          <?php
          $homepage_faqs = get_field('faq_lists');
          // Include the FAQ partial file
          get_template_part('includes/faq-items');

          // Call the function to render the first 3 FAQ items
          render_faq_items(3, 'faq-accordion', '', $homepage_faqs);
          ?>
        </div>
        <?php
        $section_button = get_field('faq_btn');
        ?>
        <?php if ($section_button && !empty($section_button['url'])): ?>
          <a href="<?php echo esc_url($section_button['url']); ?>" class="btn primary">
            <?php echo esc_html($section_button['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>