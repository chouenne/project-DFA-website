<section class="blog-content">
  <div class="container">
    <div class="row g-5">
      <!-- Main Content Column (10/12 width) -->
      <div class="col-lg-8">
        <?php
        // Start the loop
        while (have_posts()):
          the_post();
          ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Featured Image -->
            <?php if (has_post_thumbnail()): ?>
              <div class="featured-image mb-4">
                <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
              </div>
            <?php endif; ?>
            <!-- Post Title -->
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <!-- Post Content -->
            <div class="entry-content">
              <?php the_content(); ?>
            </div>

            <!-- Post Footer (Optional: Tags, Categories, etc.) -->
            <footer class="entry-footer">
              <?php
              // Display tags and categories
              the_tags('<div class="post-tags"><span class="tags-label">Tags:</span> ', ', ', '</div>');
              the_category('<div class="post-categories"><span class="categories-label">Categories:</span> ', ', ', '</div>');
              ?>
            </footer>
          </article>
        <?php endwhile; ?>
      </div>

      <!-- Sidebar Column (4/12 width) -->
      <div class="col-lg-4">
        <aside class="sidebar">
          <!-- Author Information -->
          <div class="sidebar-widget mb-5">
            <h4 class="widget-title">Author</h4>
            <div class="author-info">
              <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
              <p class="author-name"><?php the_author(); ?></p>
            </div>
          </div>

          <!-- Post Date -->
          <div class="sidebar-widget mb-5">
            <h4 class="widget-title">Date</h4>
            <p class="post-date"><?php echo get_the_date(); ?></p>
          </div>

          <!-- Categories -->
          <div class="sidebar-widget mb-5">
            <h4 class="widget-title">Categories</h4>
            <ul class="post-categories">
              <?php
              $categories = get_the_category();
              foreach ($categories as $category) {
                echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
              }
              ?>
            </ul>
          </div>

          <!-- Tags -->
          <div class="sidebar-widget mb-5">
            <h4 class="widget-title">Tags</h4>
            <ul class="post-tags">
              <?php
              $tags = get_the_tags();
              if ($tags) {
                foreach ($tags as $tag) {
                  echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
                }
              } else {
                echo '<li>No tags found.</li>';
              }
              ?>
            </ul>
          </div>

          <!-- Recommended Blog Posts -->
          <div class="sidebar-widget">
            <h4 class="widget-title">Recommended Posts</h4>
            <ul class="recommended-posts">
              <?php
              // Query to fetch recommended posts
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5, // Number of recommended posts
                'post__not_in' => array(get_the_ID()), // Exclude the current post
                'orderby' => 'rand', // Random order
              );
              $recommended_posts = new WP_Query($args);

              if ($recommended_posts->have_posts()):
                while ($recommended_posts->have_posts()):
                  $recommended_posts->the_post();
                  ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
                  <?php
                endwhile;
                wp_reset_postdata(); // Reset the query
              else:
                echo '<li>No recommended posts found.</li>';
              endif;
              ?>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>
</section>