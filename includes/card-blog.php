<?php
/**
 * Reusable Blog Card Template
 *
 * @packagedesignfuture
 */

// Get the post thumbnail (featured image)
$image_size = isset($args['image_size']) ? $args['image_size'] : 'medium_large';
$title = get_the_title();
$excerpt = get_the_excerpt();
$permalink = get_permalink();
$thumbnail_id = get_post_thumbnail_id();
?>

<div class="blog-card md-4">
  <?php if ($thumbnail_id): ?>
    <div class="blog-card-thumbnail">
      <?php
      echo wp_get_attachment_image(
        $thumbnail_id,
        $image_size,
        false,
        [
          'class' => 'w-100 object-fit-cover img-fluid blog-card-image',
          'alt' => esc_attr($title),
          'loading' => 'lazy',
          'decoding' => 'async'
        ]
      );
      ?>
    </div>
  <?php endif; ?>

  <div class="blog-card-content">
    <h5 class="blog-card-title"><?php echo esc_html($title); ?></h5>
    <p class="blog-card-excerpt"><?php echo esc_html($excerpt); ?></p>
    <a href="<?php echo esc_url($permalink); ?>" class="btn secondary btn-blogcard">
      <?php echo (pll_current_language() == 'zh') ? '阅读更多' : 'Read More'; ?>
    </a>
  </div>
</div>