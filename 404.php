<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); // Include the header

// Get current language
$language = function_exists('pll_current_language') ? pll_current_language() : 'en';

// Define translations
$translations = [
  'en' => [
    'search_title' => 'Search the Site',
    'search_placeholder' => 'Search pages and blogs...',
    'search_button' => 'Search',
    '404_title' => 'Page Not Found',
    '404_message' => "Oops! The page you're looking for doesn't exist. It might have been moved or deleted.",
    '404_suggestion' => "Don't worry, though. You can use the search bar above to find what you're looking for, or check out our latest blog posts below.",
    'homepage_button' => 'Go to Homepage',
    'no_posts' => 'No blog posts found.',
  ],
  'zh' => [
    'search_title' => '搜索网站',
    'search_placeholder' => '搜索页面和博客...',
    'search_button' => '搜索',
    '404_title' => '页面未找到',
    '404_message' => "哎呀！您查找的页面不存在。可能已被移动或删除。",
    '404_suggestion' => "别担心，您可以使用上方的搜索栏查找内容，或查看下面的最新博客文章。",
    'homepage_button' => '返回首页',
    'no_posts' => '未找到博客文章。',
  ],
];

// Use the correct language
$t = $translations[$language];
?>

<section>
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <h2><?php echo $t['search_title']; ?></h2>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
          <div class="input-group d-flex gap-3">
            <input type="search" class="form-control border-0 border-bottom rounded-0"
              placeholder="<?php echo $t['search_placeholder']; ?>" value="<?php echo get_search_query(); ?>" name="s">
            <div class="input-group-append">
              <button type="submit" class="btn primary"><?php echo $t['search_button']; ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- 404 Content Section -->
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="http://localhost:8888/designfuture/wp-content/uploads/2025/03/Mood-board-8.png" alt="404 Image"
          class="img-fluid">
      </div>

      <div class="col-md-6">
        <h1 class="display-1">404</h1>
        <h2 class="display-4 mb-3"><?php echo $t['404_title']; ?></h2>
        <p class="lead"><?php echo $t['404_message']; ?></p>
        <p><?php echo $t['404_suggestion']; ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn primary"><?php echo $t['homepage_button']; ?></a>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row mt-5">
      <?php
      // Query latest 3 blog posts
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
            <?php get_template_part('/includes/card-blog'); ?>
          </div>
          <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<p>' . $t['no_posts'] . '</p>';
      endif;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>