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
 * Template Name: Page Hotels 
 * @package rinconshuttle
 */

get_header();
?>

	<div class="main">
		 <div class="banner">
              <div class="banner-container">
                
                
              </div> 
              
          </div>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
        ?>
         <div class="tours-items">
            	
            
	            <?php
                    
	                 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	                
	                	$args = array(
		                  'post_type' => 'hotel-and-more',
		                  //'order' => 'ASC',
		                  'orderby' => array('menu_order' => 'ASC', 'title' => 'ASC'),
		                  'posts_per_page' => 12,
		                   'paged' => $paged
		                   
		                  
		                );
	                

	                $items = new WP_Query( $args );
	                 // Pagination fix
	                  $temp_query = $wp_query;
	                  $wp_query   = NULL;
	                  $wp_query   = $items;
	                  
	                if( $items->have_posts() ) {
	                  while( $items->have_posts() ) {
	                     $items->the_post();
	                   
	                    ?>

	                      
	                         <article class="tours-item" >
	                            <div class="entry-content grid-item">
	                                <figure class="entry-thumbnail">
	                                <a href="<?php the_permalink(); ?>">
	                                     <?php if ( has_post_thumbnail() ) :

	                                          $id = get_post_thumbnail_id($post->ID);
	                                          $thumb_url = wp_get_attachment_image_src($id,'large', true);
	                                          ?>
	                                          
	                                       
	                                        
	                                      <?php endif; ?>
	                                      <img src="<?php echo $thumb_url[0] ?>"  alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
	                                  </a>
	                                </figure>
	                                <div class="entry-excerpt">
	                                    <div class="entry-header">
	                                    <div class="tour-title">
	                                    
	                        
	                                    <h4>
	                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	                                    </h4>
	                                    </div>
	                                    </div>
	                                    
                                    </div>
                                    <a href="<?php the_permalink(); ?>" style="position:absolute;top:0;left:0;right:0;bottom:0;"></a>
	                            </div>
	                        </article>
	                    
	                     
	                      
	                    <?php
	                   
	                     
	                  }
	                }
	                
	              ?>
	              </div>
	              <?php  the_posts_pagination( array( 'mid_size' => 2 ) ); 
	                    wp_reset_postdata(); ?>

	
	</div><!-- #main -->

<?php
/*get_sidebar();*/
get_footer();
