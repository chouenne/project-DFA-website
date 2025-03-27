<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Design Future Academy</title>
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Bellefair&display=swap"
    rel="stylesheet">
  <!-- google icons -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=compost,diversity_1,diversity_3,emoji_objects,groups_2,home,inbox_text,people_alt,person_raised_hand,rate_review,volunteer_activism,workspace_premium" />


  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <div class="logo">
          <a href="<?php echo home_url('/'); ?>">
            <img src="http://localhost:8888/designfuture/wp-content/uploads/2025/02/logo_dfa.png" class="img-fluid"
              alt="Logo">
          </a>
        </div>

        <!-- Menu Toggle for Mobile -->
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container' => false,
              'items_wrap' => '%3$s', // Removes outer <ul> tag added by wp_nav_menu
              'add_li_class' => 'nav-item',
              'link_class' => 'nav-link',
            ));
            ?>
            <!-- Contact Us Button 
            <li class="nav-contact">
              <a href="/contact" class="btn primary">Contact Us</a>
            </li>-->
          </ul>
        </div>
      </div>
    </nav>
  </header>