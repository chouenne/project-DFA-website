<?php
/*
Template Name: Services
*/
get_header();
?>


<?php
if (have_posts()):
  while (have_posts()):
    the_post();

    get_template_part('includes/section', 'hero');
    get_template_part('includes/section', 'fullservices');
    get_template_part('includes/section', 'cta');

  endwhile;
endif;
?>

<?php get_footer(); ?>