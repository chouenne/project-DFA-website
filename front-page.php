<?php get_header();
/*
Template Name: Homepage
*/
?>


<?php
set_query_var('hero_class', 'home-hero');
get_template_part('includes/section', 'hero'); ?>
<?php get_template_part('includes/section', 'services'); ?>
<?php get_template_part('includes/section', 'about'); ?>
<?php get_template_part('includes/section', 'programs'); ?>
<?php get_template_part('includes/section', 'cta'); ?>
<?php get_template_part('includes/section', 'whyus'); ?>
<?php get_template_part('includes/section', 'faq'); ?>
<?php get_template_part('includes/section', 'blog'); ?>
<?php get_template_part('includes/section', 'contact'); ?>

<?php get_footer(); ?>