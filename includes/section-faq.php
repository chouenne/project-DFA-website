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
          // Loop through the first 3 FAQ items
          for ($i = 1; $i <= 3; $i++):
            $faq_item = get_field("faq_lists")["item_$i"]; // Get the FAQ item
            $question = $faq_item['question'] ?? '';
            $answer = $faq_item['answer'] ?? '';

            // Only render if question and answer are not empty
            if ($question && $answer):
              ?>
              <!-- FAQ Item -->
              <div class="faq-item border-bottom py-3">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="mb-0"><?php echo esc_html($question); ?></h5>
                  <button class="btn toggle-btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faq<?php echo $i; ?>" aria-expanded="false" aria-controls="faq<?php echo $i; ?>">
                    <span class="toggle-icon">
                      <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <!-- Horizontal line (always visible) -->
                        <path class="icon-line horizontal" d="M0 10h20" stroke="#ffffff" stroke-width="2"
                          stroke-linecap="round" />
                        <!-- Vertical line (hidden when expanded) -->
                        <path class="icon-line vertical" d="M10 0v20" stroke="#ffffff" stroke-width="2"
                          stroke-linecap="round" />
                      </svg>
                    </span>
                  </button>
                </div>
                <div id="faq<?php echo $i; ?>" class="collapse" data-bs-parent="#faq-accordion">
                  <p class="mt-3"><?php echo esc_html($answer); ?></p>
                </div>
              </div>
            <?php endif; ?>
          <?php endfor; ?>
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