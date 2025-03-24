<section class="blog-section">
  <div class="container">
    <div class="row blog-title">
      <?php
      // [Your existing ACF code remains the same]
      ?>
    </div>

    <div class="row py-5">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC',
      );
      $blog_query = new WP_Query($args);

      if ($blog_query->have_posts()):
        while ($blog_query->have_posts()):
          $blog_query->the_post();
          ?>
          <div class="col-md-4 mb-4">
            <?php
            // Pass the desired image size to the template
            get_template_part('/includes/card-blog', null, array(
              'image_size' => 'medium_large' // or 'large' depending on your needs
            ));
            ?>
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