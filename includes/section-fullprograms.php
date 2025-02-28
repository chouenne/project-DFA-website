<section class="fullprograms py-5">
  <div class="container">
    <div class="row">
      <?php

      $programs_cards = get_field('programs_page_cards');

      if ($programs_cards):
        $index = 0;
        foreach ($programs_cards as $card): // Directly loop through repeater field items
          $card_title = isset($card['card_title']) ? $card['card_title'] : '';
          $card_description = isset($card['card_description']) ? $card['card_description'] : '';
          $card_image = isset($card['card_image']) ? $card['card_image'] : '';

          // Call card template
          get_template_part('includes/card-img', null, array(
            'card' => array(
              'card_title' => $card_title,
              'card_description' => $card_description,
              'card_image' => $card_image,
            ),
            'index' => $index,
            'layout' => '4-8',
          ));
          $index++; // Increment the index for next card
        endforeach;
      else:
        echo '<p>No cards found.</p>';
      endif;
      ?>
    </div>
  </div>
</section>