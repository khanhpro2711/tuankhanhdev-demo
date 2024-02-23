<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Coffee
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <div class="cols-4 widget-column-1">  
                   <div class="logo footerlogo">
            			<?php skt_coffee_the_custom_logo(); ?>
                        <a href="<?php echo esc_url( home_url('/') ); ?>">
                        <h1><?php bloginfo('name'); ?></h1>
                        <p><?php bloginfo('description'); ?></p></a>
                   </div><!-- logo -->
                   <?php if ( '' !== get_theme_mod( 'contact_add' ) ){ ?>
                   <p><?php echo wp_kses_post(get_theme_mod('contact_add',__('100 King St, Melbourne PIC 4000,<br /> Australia','skt-coffee'))); ?></p>
                   <?php } ?>
               <div class="phone-no">
               <?php if ( '' !== get_theme_mod( 'contact_no' ) ){  ?>  
             		 <?php echo wp_kses_post(get_theme_mod('contact_no',__('<strong>Phone:</strong> +123 456 7890','skt-coffee'))); ?> <br  />
               <?php } ?>
               
             <?php if ( '' !== get_theme_mod( 'contact_mail' ) ){  ?>  
          		 <strong><?php esc_html_e('Email: ', 'skt-coffee');?></strong> <a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','contact@company.com')); ?>"><?php echo sanitize_email(get_theme_mod('contact_mail','contact@company.com')); ?></a>
            <?php } ?>
           </div>
           <div class="clear"></div>                
                  <div class="social-icons">
					<?php if ( get_theme_mod('fb_link') !== "") { ?>
                    <a title="facebook" class="fb" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','http://www.facebook.com')); ?>"></a> 
                    <?php } ?>
                    
                    <?php if ( get_theme_mod('twitt_link') !== "") { ?>
                    <a title="twitter" class="tw" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','http://www.twitter.com')); ?>"></a>
                    <?php } ?> 
                    
                    <?php if ( get_theme_mod('gplus_link') !== "") { ?>
                    <a title="google-plus" class="gp" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','http://www.plus.google.com')); ?>"></a>
                    <?php } ?>
                    
                    <?php if ( get_theme_mod('linked_link') !== "") { ?> 
                    <a title="linkedin" class="in" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','http://www.linkedin.com')); ?>"></a>
                    <?php } ?>
                  </div>  
            </div><!--end .widget-column-1-->                  
			         
             
             <div class="cols-4 widget-column-2"> 
               <?php if ( '' !== get_theme_mod( 'menu_title' ) ){  ?>
               <h5><?php echo esc_html(get_theme_mod('menu_title',__('Main Menu','skt-coffee'))); ?></h5>
               <?php } ?>
                <div class="menu">
                  <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                </div>                        	
                       	
              </div><!--end .widget-column-2-->     
                      
               <div class="cols-4 widget-column-3">
                <?php if ( '' !== get_theme_mod( 'about_title' ) ){  ?>
                   <h5><?php echo esc_html(get_theme_mod('about_title',__('Our Philosophy','skt-coffee'))); ?></h5> 
                   <?php } ?> 
                   <?php if ( '' !== get_theme_mod( 'about_description' ) ){  ?>          	
				<p><?php echo wp_kses_post(get_theme_mod('about_description',__('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue.','skt-coffee'))); ?></p> 
                <?php } ?>
                
                <?php if ( get_theme_mod('footermore_link') != "") { ?> 
                    <a class="ReadMore" href="<?php echo esc_url(get_theme_mod('footermore_link','#')); ?>"><?php _e('Read More','skt-coffee'); ?></a>
                    <?php } else { ?>
                   <a class="ReadMore" href="<?php echo esc_url('#'); ?>"><?php _e('Read More','skt-coffee'); ?></a>
                   <?php } ?>
                    
                </div><!--end .widget-column-3-->
                
                <div class="cols-4 widget-column-4">
                 <?php if ( '' !== get_theme_mod( 'latest_title' ) ){  ?>
                <h5><?php echo esc_html(get_theme_mod('latest_title',__('Latest Post','skt-coffee'))); ?></h5> 
                <?php } ?> 
                 <?php $args = array( 'posts_per_page' => 1, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
                    query_posts( $args ); ?>
                  <?php while ( have_posts() ) :  the_post(); ?>
                  	<div class="recent-post">
                    
                    <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) { $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );   $thumbnailSrc = $src[0]; ?>
                        <img src="<?php echo $thumbnailSrc; ?>" alt="" width="60" height="auto" ><?php } 
                    else { ?>
                        <img src="<?php echo esc_url( get_template_directory_uri()); ?>/images/img_404.png" width="60"  />
                    <?php } ?></a>
					<?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>"><span> <?php _e('Read more','skt-coffee'); ?></span></a>
                    
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                   
                </div><!--end .widget-column-4-->
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
                <div class="copyright-txt"><?php esc_html_e('&copy; 2023','skt-coffee');?> <?php bloginfo('name'); ?>. <?php esc_attr_e('All Rights Reserved', 'skt-coffee');?></div>
                <div class="design-by"><?php bloginfo('name'); ?> <?php esc_html_e('Theme By ','skt-coffee');?><a href="<?php echo esc_url('https://www.sktthemes.org/');?>" rel="nofollow" target="_blank"><?php esc_html_e('SKT Themes','skt-coffee'); ?></a></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>