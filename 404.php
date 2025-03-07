<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); // Include the header
?>

<div class="container mt-5">
  <!-- Search Bar at the Top -->
  <div class="row mb-5">
    <div class="col-12">
      <h2>Search the Site</h2>
      <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="input-group">
          <input type="search" class="form-control" placeholder="Search pages and blogs..."
            value="<?php echo get_search_query(); ?>" name="s" aria-label="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- 404 Content Section -->
  <div class="row align-items-center">
    <!-- Image on the Left -->
    <div class="col-md-6">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/images/404-image.jpg'); ?>" alt="404 Image"
        class="img-fluid">
    </div>

    <!-- 404 Text Content -->
    <div class="col-md-6">
      <h1 class="display-1">404</h1>
      <h2 class="display-4">Page Not Found</h2>
      <p class="lead">Oops! The page you're looking for doesn't exist. It might have been moved or deleted.</p>
      <p>Don't worry, though. You can use the search bar above to find what you're looking for, or check out our latest
        blog posts below.</p>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go to Homepage</a>
    </div>
  </div>

  <!-- Latest Blog Posts Section -->
  <div class="row mt-5">
    <div class="col-12">
      <h2>Latest Blog Posts</h2>
      <div class="row">
        <?php
        // Query to fetch the latest 6 blog posts
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 6,
          'post_status' => 'publish',
        );
        $latest_posts = new WP_Query($args);

        if ($latest_posts->have_posts()):
          while ($latest_posts->have_posts()):
            $latest_posts->the_post();
            ?>
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <?php if (has_post_thumbnail()): ?>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                  </a>
                <?php endif; ?>
                <div class="card-body">
                  <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                </div>
                <div class="card-footer">
                  <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Read More</a>
                </div>
              </div>
            </div>
            <?php
          endwhile;
          wp_reset_postdata(); // Reset the query
        else:
          echo '<p>No blog posts found.</p>';
        endif;
        ?>
      </div>
    </div>
  </div>
</div>

<?php
get_footer(); // Include the footer
?>