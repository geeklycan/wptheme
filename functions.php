<?php
$content_width = 800; /* pixels */

function wptheme_setup() {

  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
  ) );

  add_theme_support( 'post-formats', array(
    'aside', 'image', 'video', 'quote', 'link',
  ) );

  add_theme_support("post-thumbnails");

  add_image_size("portfoliothumbs",400, 999999);
  add_image_size("portfoliolarge",800,999999);
}


add_action( 'after_setup_theme', 'wptheme_setup' );

/// style & script load
function wptheme_scripts() {
  wp_enqueue_style( 'wptheme-style-xlarge', get_template_directory_uri()."/css/skel.css" );
  wp_enqueue_style( 'wptheme-style-default', get_template_directory_uri()."/css/style-default.css" );
  wp_enqueue_style( 'wptheme-style-default', get_template_directory_uri()."/css/style-xlarge.css" );
  wp_enqueue_style( 'wptheme-style', get_stylesheet_uri() );

  // for ie 8
  if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT'])){
    wp_enqueue_script('wptheme-ie8-style', get_template_directory_uri()."/css/ie/html5shiv.js");
    wp_enqueue_style('wptheme-style', get_stylesheet_uri()."css/ie/v8.css");
  }

  wp_enqueue_script("jquery");
  wp_enqueue_script("wptheme-poptrox-js",get_template_directory_uri()."/js/jquery.poptrox.min.js",array("jquery"),"1.0", true);
  wp_enqueue_script("wptheme-skel-js",get_template_directory_uri()."/js/skel.min.js",array("jquery"),"1.0", true);
  wp_enqueue_script("wptheme-init-js",get_template_directory_uri()."/js/init",array("jquery", "wptheme-skel-js"),"1.0", true);
}

add_action( 'wp_enqueue_scripts', 'wptheme_scripts' );



/// for title
function wptheme_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  return $title;
}
add_filter( 'wp_title', 'wptheme_title', 10, 2 );

///
