<?php
/**
 * FAQ Items Partial
 * Reusable template for rendering FAQ items.
 */

function render_faq_items($limit = null, $parent_id = 'faq-accordion', $custom_class = '', $faq_items = [])
{
  // Check if there are any FAQ items
  if ($faq_items && is_array($faq_items)) {
    // Counter to keep track of rendered items
    $count = 0;

    // Loop through all FAQ items
    foreach ($faq_items as $key => $faq_item) {
      $question = $faq_item['question'] ?? '';
      $answer = $faq_item['answer'] ?? '';

      // Only render if question and answer are not empty
      if ($question && $answer) {
        // Generate a unique ID for each FAQ item
        $faq_id = 'faq-' . sanitize_title($question);
        ?>
        <!-- FAQ Item -->
        <div class="faq-item border-bottom py-3 <?php echo esc_attr($custom_class); ?>">
          <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?php echo esc_html($question); ?></h5>
            <button class="btn toggle-btn" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $faq_id; ?>"
              aria-expanded="false" aria-controls="<?php echo $faq_id; ?>">
              <span class="toggle-icon">
                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <!-- Horizontal line (always visible) -->
                  <path class="icon-line horizontal" d="M0 10h20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                  <!-- Vertical line (hidden when expanded) -->
                  <path class="icon-line vertical" d="M10 0v20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
                </svg>
              </span>
            </button>
          </div>
          <div id="<?php echo $faq_id; ?>" class="collapse" data-bs-parent="#<?php echo esc_attr($parent_id); ?>">
            <p class="mt-3"><?php echo esc_html($answer); ?></p>
          </div>
        </div>
        <?php

        // Increment the counter
        $count++;

        // Stop the loop if the limit is reached
        if ($limit && $count >= $limit) {
          break;
        }
      }
    }
  } else {
    // If no FAQ items are found, display a message
    echo '<p>No FAQ items found.</p>';
  }
}
?>