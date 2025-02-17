<section class="blog-section">
  <div class="container">
    <div class="row blog-title">
      <?php
      // Get ACF field values
      $subtitle = get_field('blog_section_subtitle');
      $title = get_field('blog_section_title');
      $paragraph = get_field('blog_section_description');
      $button_link_array = get_field('blog_section_btn'); // ACF Link field (returns array)
      
      // Extract button URL and text from the ACF Link field
      $button_text = $button_link_array['title'];
      $button_link = $button_link_array['url'];
      $button_class = 'btn primary';

      // Pass the data to the title-content template
      get_template_part('/includes/title-content', null, array(
        'subtitle' => $subtitle,
        'title' => $title,
        'paragraph' => $paragraph,
        'button_text' => $button_text,
        'button_link' => $button_link,
        'button_class' => $button_class,
      ));
      ?>
    </div>

    <div class="row py-5">
      <?php
      // Query the latest 3 blog posts
      $args = array(
        'post_type' => 'post', // Default post type
        'posts_per_page' => 3, // Show 3 posts
        'orderby' => 'date', // Order by date
        'order' => 'DESC', // Show latest posts first
      );
      $blog_query = new WP_Query($args);

      if ($blog_query->have_posts()):
        while ($blog_query->have_posts()):
          $blog_query->the_post();
          ?>
          <div class="col-md-4 mb-4">
            <?php get_template_part('/includes/card-blog'); ?>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<p>No blog posts found.</p>';
      endif;
      ?>
    </div>
  </div>

</section>