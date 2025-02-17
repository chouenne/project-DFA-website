<section class="contact-section py-5">
  <div class="container">
    <div class="row">
      <!-- Left Side -->
      <div class="col-md-6">

        <?php
        $section_title = get_field('contact_section_title');
        $section_subtitle = get_field('contact_section_subtitle');
        $section_description = get_field('contact_section_description');
        ?>
        <?php if ($section_subtitle): ?>
          <h4 class="section-subtitle"><?php echo esc_html($section_subtitle); ?></h4>
        <?php endif; ?>
        <?php if ($section_title): ?>
          <h2 class="section-title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        <?php if ($section_title): ?>
          <p class="section-paragraph"><?php echo esc_html($section_description); ?></p>
        <?php endif; ?>


        <!-- Two Columns for Contact Info -->
        <div class="row contact-info">
          <?php
          // Get the contact items from ACF
          $contact_items = get_field('contact_item');

          // Loop through the 2 contact items
          for ($i = 0; $i < 2; $i++):
            $item = $contact_items["content_" . ($i + 1)]; // Access content_1 and content_2
            $info_title = $item['title'] ?? 'Default Title'; // Fallback if title is empty
            $info_social = $item['info'] ?? 'Default Info'; // Fallback if info is empty
            $icon_class = ($i == 0) ? 'fas fa-envelope' : 'fab fa-weixin'; // Set icon class based on index
            ?>
            <!-- Column -->
            <div class="col-md-6">
              <div class="contact-item d-flex g-2">
                <!-- Icon -->
                <i class="<?php echo esc_attr($icon_class); ?> contact-icon"></i>
                <div class="item-title">
                  <!-- Title -->
                  <?php if ($info_title): ?>
                    <h5><?php echo esc_html($info_title); ?></h5>
                  <?php endif; ?>
                  <!-- Info -->
                  <?php if ($info_social): ?>
                    <p class="contact-text">
                      <?php if ($i == 0): ?>
                        <!-- Email link for the first item -->
                        <a href="mailto:<?php echo esc_attr($info_social); ?>">
                          <?php echo esc_html($info_social); ?>
                        </a>
                      <?php else: ?>
                        <!-- Plain text for the second item (WeChat ID) -->
                        <?php echo esc_html($info_social); ?>
                      <?php endif; ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endfor; ?>
        </div>
      </div>

      <!-- Right Side: Contact Form -->
      <div class="contact-form col-md-6">
        <?php echo do_shortcode('[contact-form-7 id="437f285" title="Contact Form"]'); ?>
      </div>
    </div>
  </div>
</section>