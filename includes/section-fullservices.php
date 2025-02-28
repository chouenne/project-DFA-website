<?php
/**
 * Section Template - section-fullservices.php
 *
 * This template is used to display the full services section with cards.
 *
 * @package YourThemeName
 */

// Get the group field data
$services_page_cards = get_field('services_page_cards');

// Check if the group field data is available
if ($services_page_cards && is_array($services_page_cards)):
  ?>
  <section class="fullservices-section">
    <div class="container">
      <div class="row">
        <?php
        // Loop through each item in the group field
        for ($i = 1; $i <= 6; $i++):
          $item_key = 'item_' . $i;
          if (isset($services_page_cards[$item_key])):
            // Include the card template and pass the item data
            get_template_part('includes/card-img', null, array(
              'card' => $services_page_cards[$item_key],
              'index' => $i - 1, // 0-based index
              'section_type' => 'services',
            ));
          endif;
        endfor;
        ?>
      </div>
    </div>
  </section>
  <?php
else:
  // Fallback if no group field data is found
  echo '<p>No services cards found.</p>';
endif;
?>