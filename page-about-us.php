<?php
/*
Template Name: About-us
*/
get_header();
?>

<?php
if (have_posts()):
  while (have_posts()):
    the_post();

    // Set the query variable for hero class before including the hero section template
    set_query_var('hero_class', 'about-hero');

    // Import the hero section template
    get_template_part('includes/section', 'hero');

  endwhile;
endif;
?>

<?php get_footer(); ?>