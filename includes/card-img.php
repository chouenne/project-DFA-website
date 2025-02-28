<?php
if (!empty($args['card'])):
  $card = $args['card']; // Assign $card from $args
  $index = isset($args['index']) ? $args['index'] : 0;
  $layout = isset($args['layout']) ? $args['layout'] : '4-8';

  $card_title = isset($card['card_title']) ? $card['card_title'] : '';
  $card_description = isset($card['card_description']) ? $card['card_description'] : '';
  $card_image = isset($card['card_image']) ? $card['card_image'] : []; // This will be an ID (e.g., 26)

  // Get the image URL and alt text using the attachment ID
  if (!empty($card_image)) {
    $image_data = wp_get_attachment_image_src($card_image, 'full'); // Get full size image
    if ($image_data && is_array($image_data)) {
      $image_url = $image_data[0]; // URL of the image
      $image_alt = get_post_meta($card_image, '_wp_attachment_image_alt', true); // Alt text for the image
    } else {
      $image_url = '';
      $image_alt = 'Card Image'; // Fallback alt text
    }
  } else {
    $image_url = '';
    $image_alt = 'Card Image'; // Fallback alt text
  }

  ?>
  <div class="card-img mb-4 <?php echo ($index % 2 === 0) ? 'card-even' : 'card-odd'; ?>">
    <div class="row g-0">
      <!-- Left Column: Image -->
      <div class="<?php echo ($layout === '4-8') ? 'col-md-4' : 'col-md-6'; ?>">
        <?php if ($image_url): ?>
          <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
            class="img-fluid rounded-start" style="width: 100%; height: auto; aspect-ratio: 1 / 1; object-fit: cover;">
        <?php else: ?>
          <div class="bg-light d-flex align-items-center justify-content-center" style="width: 100%; aspect-ratio: 1 / 1;">
            <span class="text-muted">No Image</span>
          </div>
        <?php endif; ?>
      </div>

      <!-- Right Column: Title and Description -->
      <div class="<?php echo ($layout === '4-8') ? 'col-md-8' : 'col-md-6'; ?>">
        <div class="card-body">
          <?php if (!empty($card_title)): ?>
            <h2 class="card-title"><?php echo esc_html($card_title); ?></h2>
          <?php endif; ?>

          <?php if (!empty($card_description)): ?>
            <p class="card-text"><?php echo esc_html($card_description); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php
endif;
?>