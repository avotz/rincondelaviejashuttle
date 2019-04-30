<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rinconshuttle
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header">
          <div class="header-container ">
              
              <!-- <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png"></a> -->
              <div class="header-right flex-container-sb">
               <!--  <div class="header-contact">
                  <a href="#" class="btn success"><i class="fa fa-envelope-o"></i><span class="text">Contact Us</span></a>
                </div> -->
                <div class="header-btn-menu">
                   <button id="btn-menu" class="nav-btn-menu">
                       <i class="fa fa-bars"></i>
                   </button>
                </div>
              </div>
              
          </div>
          
      </header>
	  <div class="nav-container">
          <?php
			wp_nav_menu(array(
				'theme_location' => 'header',
				'menu_id' => 'nav-menu',
				'container' => 'nav',
				'container_class' => 'nav-menu',
				'container_id' => '',
				'menu_class' => 'nav-menu-ul',
			));
			?>
        
    </div>
    <?php
        /*wp_nav_menu(array(
            'theme_location' => 'left',
            'menu_id' => 'menu-left',
            'container' => 'nav',
            'container_class' => 'menu-left',
            'container_id' => '',
            'menu_class' => 'menu-left-ul',
        ));*/
        ?>
     <nav class="menu-left">
      <ul class="menu-left-ul">
          <li><a href="<?php echo esc_url(home_url('/product/shuttle')); ?>" class="featured"><i class="fa fa-car"></i> <span>Shuttle</span> </a></li>
          <li><a href="<?php echo esc_url(home_url('/attractions')); ?>"><i class="fa fa-binoculars"></i> <span>Attractions</span> </a></li>
          <li><a href="<?php echo esc_url(home_url('/maps')); ?>"><i class="fa fa-map"></i> <span>Maps</span> </a></li>
          <li><a href="<?php echo esc_url(home_url('/national-park-facts')); ?>"><i class="fa fa-edit"></i> <span>Park Facts</span> </a></li>
          <li><a href="<?php echo esc_url(home_url('/news')); ?>"><i class="fa fa-list"></i> <span>News</span> </a></li>
          
      </ul>
    </nav>
