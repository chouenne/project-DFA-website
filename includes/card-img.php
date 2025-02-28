<?php
/**
 * Card Template - card-img.php
 *
 * This template is used to display a card with an image on the left and text on the right.
 * It is designed to work with ACF fields and Bootstrap.
 *
 * @package Designfuture
 */

// Get card data from the parent template
$card = isset($args['card']) ? $args['card'] : array();
$index = isset($args['index']) ? $args['index'] : 0; // Card index (0-based)
$section_type = isset($args['section_type']) ? $args['section_type'] : 'services'; // Section type: 'services' or 'programs'

// Extract card fields
$card_title = isset($card['card_title']) ? $card['card_title'] : '';
$card_description = isset($card['card_description']) ? $card['card_description'] : '';
$card_image = isset($card['card_image']) ? $card['card_image'] : array(); // Note: card_image is an array or ID

// If card_image is an ID, convert it to an array
if (is_numeric($card_image)) {
  $card_image = wp_get_attachment_image_src($card_image, 'full');
  if ($card_image) {
    $card_image = array(
      'url' => $card_image[0],
      'alt' => get_the_title($card_image),
    );
  }
}

// Determine column widths based on section type
$image_col_width = ($section_type === 'services') ? 4 : 6;
$text_col_width = 12 - $image_col_width;

// Determine image and text order based on card index
$is_even = ($index % 2 === 0);
$image_order = $is_even ? 'order-md-1' : 'order-md-2';
$text_order = $is_even ? 'order-md-2' : 'order-md-1';
?>
<div class="col-12">
  <div class="card-img">
    <div class="row g-5">
      <!-- Image Column -->
      <div class="col-md-<?php echo esc_attr($image_col_width); ?> <?php echo esc_attr($image_order); ?>">
        <?php if (!empty($card_image) && isset($card_image['url'])): ?>
          <img src="<?php echo esc_url($card_image['url']); ?>" alt="<?php echo esc_attr($card_image['alt']); ?>"
            class="img-fluid rounded-start w-100 h-100 object-fit-cover" />
        <?php else: ?>
          <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
            <span class="text-muted">No Image</span>
          </div>
        <?php endif; ?>
      </div>
      <!-- Content Column -->
      <div class="col-md-<?php echo esc_attr($text_col_width); ?> <?php echo esc_attr($text_order); ?>">
        <div class="card-body">
          <h2 class="card-title mb-4"><?php echo esc_html($card_title); ?></h2>
          <p class="card-text"><?php echo esc_html($card_description); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>