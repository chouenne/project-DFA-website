<section class="all_faqspb-2">
  <div class="container">
    <div id="faq-accordion">
      <?php
      // Fetch FAQs specific to the all FAQ page
      $all_faqs = get_field('all_faq_lists');

      // Include the FAQ partial file
      get_template_part('includes/faq-items');

      // Call the function to render all FAQ items
      render_faq_items(null, 'faq-accordion', '', $all_faqs);
      ?>
    </div>
  </div>

</section>