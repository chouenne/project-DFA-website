<?php
/**
 * Reusable Title Content Block
 *
 * @package designfuture
 */

// Define default values for the variables
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : 'Your Subtitle';
$title = isset($args['title']) ? $args['title'] : 'Your Main Title';
$paragraph = isset($args['paragraph']) ? $args['paragraph'] : '';
$button_text = isset($args['button_text']) ? $args['button_text'] : '';
$button_link = isset($args['button_link']) ? $args['button_link'] : '';
$button_class = isset($args['button_class']) ? $args['button_class'] : 'btn primary';
$additional_classes = isset($args['additional_classes']) ? $args['additional_classes'] : '';
?>

<div class="title-content-block <?php echo esc_attr($additional_classes); ?>">
  <?php if ($subtitle): ?>
    <h4 class="title-subtitle"><?php echo esc_html($subtitle); ?></h4>
  <?php endif; ?>

  <?php if ($title): ?>
    <h2 class="title-heading"><?php echo esc_html($title); ?></h2>
  <?php endif; ?>

  <?php if (!empty($paragraph) && !empty($paragraph)): ?>
    <p class="title-paragraph"><?php echo esc_html($paragraph); ?></p>
  <?php endif; ?>

  <?php if (!empty($button_text) && !empty($button_link)): ?>
    <a href="<?php echo esc_url($button_link); ?>"
      class="<?php echo esc_attr($button_class); ?>"><?php echo esc_html($button_text); ?></a>
  <?php endif; ?>
</div>