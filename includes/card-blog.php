<?php
/**
 * Reusable Blog Card Template
 *
 * @packagedesignfuture
 */

// Get the post thumbnail (featured image)
$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); // Use 'medium' size
$title = get_the_title();
$excerpt = get_the_excerpt();
$permalink = get_permalink();
?>

<div class="blog-card md-4">
  <?php if ($thumbnail_url): ?>
    <div class="blog-card-thumbnail">
      <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>"
        class="w-100 object-fit-cover img-fluid">
    </div>
  <?php endif; ?>

  <div class="blog-card-content">
    <h5 class="blog-card-title"><?php echo esc_html($title); ?></h5>
    <p class="blog-card-excerpt"><?php echo esc_html($excerpt); ?></p>
    <a href="<?php the_permalink(); ?>" class="btn secondary btn-blogcard">
      <?php echo (pll_current_language() == 'zh') ? '阅读更多' : 'Read More'; ?>
    </a>
  </div>
</div>