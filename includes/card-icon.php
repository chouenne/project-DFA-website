<?php
if (!function_exists('render_cards')) {
  function render_cards($section_prefix, $card_count, $icon_data, $column_class = 'col-md-4')
  {
    for ($i = 1; $i <= $card_count; $i++): ?>
      <div class="<?php echo esc_attr($column_class); ?> mb-4">
        <div class="card border-0">
          <div class="card-body">
            <div class="icon-container">
              <?php
              // Determine if the icon is Font Awesome or Google Material Icons
              if (is_array($icon_data) && isset($icon_data[$i - 1])) {
                $custom_class = 'icon-class'; // Replace with your desired class name
        
                if (strpos($icon_data[$i - 1], 'fa-') !== false) {
                  // Font Awesome Icon
                  echo '<i class="' . esc_attr($icon_data[$i - 1]) . ' ' . esc_attr($custom_class) . '"></i>';
                } else {
                  // Google Material Icon
                  echo '<span class="material-symbols-outlined">' . esc_html($icon_data[$i - 1]) . '</span>';

                }
              }
              ?>

            </div>
            <div class="iconcard-text">
              <h5 class="card-title mt-3">
                <?php the_field($section_prefix . '_card_title_' . $i); ?>
              </h5>
              <p class="card-text">
                <?php the_field($section_prefix . '_card_description_' . $i); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php endfor;
  }
}