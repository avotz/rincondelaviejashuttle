<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rinconshuttle
 */

get_header();
?>

	
       <div class="main">

          <div class="banner">
              <div class="banner-container">
                <div class="banner-info">
                  <div class="banner-logo">
                    
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"> -->
                  </div>
                  <h1 class="animated fadeIn"><a href="<?php echo esc_url(home_url('/product/shuttle')); ?>" class="btn naranja">Book Shuttle</a> </h1>
                  <p>We look forward to sharing our little piece of paradise with you!</p>
                </div>
                
              </div> 
              
          </div>

         
       </div>
<?php
/*get_sidebar();*/
get_footer();
