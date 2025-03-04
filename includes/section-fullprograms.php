<?php
/**
 * Section Template - section-fullprograms.php
 *
 * This template is used to display the full programs section with cards.
 *
 * @package YourThemeName
 */

// Get the group field data
$programs_page_cards = get_field('programs_page_cards');

// Check if the group field data is available
if ($programs_page_cards && is_array($programs_page_cards)):
  ?>
  <section class="fullprograms-section">
    <div class="container">

      <div class="row">
        <?php
        // Loop through each item in the group field
        for ($i = 1; $i <= 8; $i++):
          $item_key = 'item_' . $i;
          if (isset($programs_page_cards[$item_key])):
            // Include the card template and pass the item data
            get_template_part('includes/card-img', null, array(
              'card' => $programs_page_cards[$item_key],
              'index' => $i - 1, // 0-based index
              'section_type' => 'programs',
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
  echo '<p>No programs cards found.</p>';
endif;
?>