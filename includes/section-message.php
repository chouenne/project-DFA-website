<section class="message">
  <div class="container">
    <div class="row">
      <?php
      // Get ACF fields for section title, subtitle, and button
      $section_title = get_field('section_title');
      $president_name = get_field('president_name');
      $president_credit = get_field('president_credit');
      $president_photo = get_field('president_photo');
      $message_content = get_field('message_content');
      ?>
      <div class="col-md-6">
        <?php if ($section_title): ?>
          <h2 class="mb-4"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>

        <img class="mb-4" src="<?php echo esc_url($president_photo['url']); ?>"
          alt="<?php echo esc_attr($president_photo['alt']); ?>">

        <?php if ($president_name): ?>
          <h5 class="mb-4"><?php echo esc_html($president_name); ?></h5>
        <?php endif; ?>

        <?php if ($president_credit): ?>
          <h6 class="mb-4"><?php echo esc_html($president_credit); ?></h6>
        <?php endif; ?>



      </div>
      <div class="col-md-6 message-content">
        <i class="fa-solid fa-quote-left" style="top:-9rem;left:-7rem;"></i>
        <?php if ($message_content): ?>
          <?php echo wp_kses_post($message_content); ?>
        <?php endif; ?>
        <i class="fa-solid fa-quote-right" style="bottom:-9rem;right:0;"></i>

      </div>
    </div>
  </div>
</section>