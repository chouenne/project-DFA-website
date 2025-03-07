<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); // Include the header
?>
<section>
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <h2>Search the Site</h2>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
          <div class="input-group d-flex gap-3"> <!-- Use gap-3 for spacing -->
            <input type="search" class="form-control border-0 border-bottom rounded-0"
              placeholder="Search pages and blogs..." value="<?php echo get_search_query(); ?>" name="s"
              aria-label="Search">
            <div class="input-group-append">
              <button type="submit" class="btn primary">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- 404 Content Section -->
    <div class="row align-items-center">
      <!-- Image on the Left -->
      <div class="col-md-6">
        <img src="http://localhost:8888/designfuture/wp-content/uploads/2025/03/Mood-board-8.png" alt="404 Image"
          class="img-fluid">
      </div>

      <!-- 404 Text Content -->
      <div class="col-md-6">
        <h1 class="display-1">404</h1>
        <h2 class="display-4 mb-3">Page Not Found</h2>
        <p class="lead">Oops! The page you're looking for doesn't exist. It might have been moved or deleted.</p>
        <p>Don't worry, though. You can use the search bar above to find what you're looking for, or check out our
          latest
          blog posts below.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn primary">Go to Homepage</a>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <!-- Latest Blog Posts Section -->
    <div class="row mt-5">
      <?php
      // Query the latest 3 blog posts
      $args = array(
        'post_type' => 'post', // Default post type
        'posts_per_page' => 6, // Show 3 posts
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

<?php
get_footer(); // Include the footer
?>