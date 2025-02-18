<?php

function load_css()
{
  wp_enqueue_style(
    'bootstrap-css',
    get_template_directory_uri() . '/assets/css/bootstrap.min.css',
    array(),
    null
  );
  wp_enqueue_style(
    'theme-style',
    get_template_directory_uri() . '/assets/css/main.css',
    array(),
    '1.0',
    'all'
  );
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
  wp_enqueue_script(
    'bootstrap-js',
    get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
    array('jquery'),
    '4.5.2', // Add version number
    true
  );

  // Enqueue Custom JavaScript
  wp_enqueue_script(
    'custom-js',
    get_template_directory_uri() . '/assets/js/custom.js', // Path to your custom JS
    array('jquery'), // Optional dependencies
    '1.0.0', // Version number
    true // Load in the footer
  );
}

add_action('wp_enqueue_scripts', 'load_js');


//Theme Options

// for menu

function theme_setup()
{
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'textdomain'),
  ));
}
add_action('after_setup_theme', 'theme_setup');


function my_theme_setup()
{
  add_theme_support('post-thumbnails'); // Enable featured images for the theme
}
add_action('after_setup_theme', 'my_theme_setup');


// font awesome
function enqueue_font_awesome()
{
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'enqueue_font_awesome');

//implement hero section to home page and about us page
function custom_acf_add_hero_fields()
{
  if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
      'key' => 'group_hero_section',
      'title' => 'Hero Section',
      'fields' => array(
        array(
          'key' => 'field_hero_title',
          'label' => 'Hero Title',
          'name' => 'hero_title',
          'type' => 'text',
        ),
        array(
          'key' => 'field_hero_subtitle',
          'label' => 'Hero Subtitle',
          'name' => 'hero_subtitle',
          'type' => 'text',
        ),
        array(
          'key' => 'field_hero_btn',
          'label' => 'Hero Button',
          'name' => 'hero_btn',
          'type' => 'link',
        ),
        array(
          'key' => 'field_hero_description',
          'label' => 'Hero Description',
          'name' => 'hero_description',
          'type' => 'textarea',
        ),
        array(
          'key' => 'field_hero_image',
          'label' => 'Hero Background Image',
          'name' => 'hero_image',
          'type' => 'image',
          'return_format' => 'url',
        ),
        array(
          'key' => 'field_hero_alignment',
          'label' => 'Hero Text Alignment',
          'name' => 'hero_alignment',
          'type' => 'radio',
          'choices' => array(
            'left' => 'Left',
            'center' => 'Center',
            'right' => 'Right',
          ),
          'default_value' => 'left',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'front-page.php', // Apply to homepage
          ),
        ),
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-about-us.php',
          ),
        ),
      ),
    ));
    // CTA Section Field Group
    acf_add_local_field_group(array(
      'key' => 'group_cta_section',
      'title' => 'CTA Section',
      'fields' => array(
        array(
          'key' => 'field_cta_title',
          'label' => 'CTA Title',
          'name' => 'cta_title',
          'type' => 'text',
        ),
        array(
          'key' => 'field_cta_subtitle',
          'label' => 'CTA Subtitle',
          'name' => 'cta_subtitle',
          'type' => 'text',
        ),
        array(
          'key' => 'field_cta_btn',
          'label' => 'CTA Button',
          'name' => 'cta_btn',
          'type' => 'link',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'front-page.php', // Apply to homepage
          ),
        ),
        array(
          array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => 'page-about-us.php', // Apply to about us page
          ),
        ),
      ),
    ));
  }
}
add_action('acf/init', 'custom_acf_add_hero_fields');



