<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Coffee
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="header <?php if ( !is_front_page() && ! is_home() ) { ?>innerheader<?php } ?> <?php if( get_theme_mod( 'hide_slides' ) || get_theme_mod( 'hide_pagefourboxes' ) != '') { ?>rel<?php } ?>">
        <div class="container">
            <div class="logo">
            			<?php skt_coffee_the_custom_logo(); ?>
                        <a href="<?php echo esc_url( home_url('/') ); ?>"><h1><?php bloginfo('name'); ?></h1>
                        <p><?php bloginfo('description'); ?></p></a>
            </div><!-- logo -->
            <div class="header_right"> 
            
             <?php if ( ! dynamic_sidebar( 'header-info' ) ) : ?>
                 <div class="headerinfo">
                   <?php if( get_theme_mod('header_phone', '+123 456 7890') ) { ?>
                    <span class="phoneno"><?php echo esc_html(get_theme_mod('header_phone', '+123 456 7890')); ?></span>
                  <?php } ?>
                  
                  <?php if( get_theme_mod('header_address', '1600 Amphitheatre Parkway Mountain View, CA 94043') ) { ?>
                    <span class="address"><?php echo esc_html(get_theme_mod('header_address', '1600 Amphitheatre Parkway Mountain View, CA 94043')); ?></span>
                  <?php } ?>                 
                 </div>                 
            <?php endif; // end sidebar widget area ?>          
                        
             <div class="toggle">
                <a class="toggleMenu" href="#"><?php esc_html_e('Menu','skt-coffee'); ?></a>
             </div><!-- toggle --> 
             <div class="sitenav">
                    <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
             </div><!-- site-nav -->
            <div class="clear"></div>
          </div><!-- header_right -->
          <div class="clear"></div>
        </div><!-- container -->
  </div><!--.header -->

<?php if (is_front_page() && !is_home()) { ?>
<?php if( get_theme_mod( 'hide_slides' ) == '') { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
?>
<?php if(!empty($id_arr)){ ?>
<section id="home_slider">
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
	<?php 
	$i=1;
	foreach($img_arr as $url){ ?>
    <img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" />
    <?php $i++; }  ?>
</div>   
<?php 
$i=1;
foreach($id_arr as $id){ 
$title = get_the_title( $id ); 
$skt_coffee_post = get_post($id); 
$content = apply_filters('the_content', substr(strip_tags($skt_coffee_post->post_content), 0, 150)); 
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
<div class="slide_info">
<h2><?php echo $title; ?></h2>
<?php echo $content; ?>
<div class="clear"></div>
<div class="slide_more"><a href="<?php the_permalink(); ?>"><?php _e('Read More', 'skt-coffee');?></a></div>
</div>
</div>      
<?php $i++; } ?>       
 </div>
<div class="clear"></div>        
</section>
<?php } else { ?>
<div class="infomessage"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slide-info.jpg" /></div>
<div class="clear"></div>  
<!-- Slider Section -->
<?php } }?>
<?php } ?>
      
      
<?php if (is_front_page() && !is_home()) { ?> 
<?php if( get_theme_mod( 'hide_pagefourboxes' ) == '') { ?>         
<div id="pagearea">
	<div class="container">
         <?php if( get_theme_mod('speciality',false) ) { ?>
        		<?php $queryvar = new wp_query('page_id='.get_theme_mod('speciality',true));				
						while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
                        <div class="leftwrap"> 
							<?php if ( has_post_thumbnail() ) { ?>
                             <div class="leftthumbbx">
                             <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                             </div>
                            <?php } ?>
                            <h2><?php the_title(); ?></h2>                           
                            <?php echo the_excerpt(); ?>
                            <a class="ReadMore" href="<?php the_permalink(); ?>"><?php _e('Details','skt-coffee'); ?></a>
                         </div>
						<?php endwhile;
						wp_reset_query(); ?>
               <?php } else { ?>
               <div class="infomessage"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/speciality-info.jpg" /></div>              
             <?php } ?>
             
           <div class="rightwrap">             
            <?php for($fx=1; $fx<4; $fx++) { ?>
        	<?php if( get_theme_mod('page-column'.$fx,false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-column'.$fx,true));				
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
        	    <div class="threebox <?php if($fx % 3 == 0) { echo "last_column"; } ?>">
				 <a href="<?php the_permalink(); ?>">				 
                  <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail( array(65,65,true));?>                        
                   <?php } else { ?>
                       <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/img_404.png" width="65" alt=""/>
                   <?php } ?>
                  <h3><?php the_title(); ?></h3>
                 </a>
        	   </div>
             <?php endwhile;
						wp_reset_query(); ?>
        <?php } } ?>
             
             
             </div>
        <div class="clear"></div>
    </div><!-- .container -->
 </div><!-- #pagearea -->
<div class="clear"></div>
<?php } ?>

<?php if( get_theme_mod( 'hide_welcomesection' ) == '') { ?>      
<section id="wrapfirst">
            	<div class="container">
                    <div class="welcomewrap">
					<?php if( get_theme_mod('page-setting1')) { ?>
                    <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 		
                     <?php the_post_thumbnail( array(570,380, true));?>
                     <h1><?php the_title(); ?></h1>         
                     <?php the_content(); ?>                     
                     <div class="clear"></div>
                    <?php endwhile; } else { ?>                    
                    <div class="infomessage"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/welcome-info.jpg" /></div>                   
                    <?php } ?>
                      
               </div><!-- welcomewrap-->
              <div class="clear"></div>
            </div><!-- container -->
 </section><div class="clear"></div>   
       
<?php }}?>