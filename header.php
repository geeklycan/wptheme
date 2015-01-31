<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>

</head>

<body id="top">

  <!-- Header -->
  <header id="header">
    <a href="<?php bloginfo("home"); ?>" class="image avatar">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatar.jpg" alt="" />
    </a>
    <h1><?php echo bloginfo(description); ?></h1>
    </header>
