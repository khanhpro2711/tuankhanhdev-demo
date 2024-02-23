<?php
/**
 * SKT Coffee About Theme
 *
 * @package SKT Coffee
 */
 
//about theme info
add_action( 'admin_menu', 'skt_coffee_abouttheme' );
function skt_coffee_abouttheme() {    	
	add_theme_page( __('About Theme', 'skt-coffee'), __('About Theme', 'skt-coffee'), 'edit_theme_options', 'skt_coffee_guide', 'skt_coffee_mostrar_guide');   
} 

//guidline for about theme
function skt_coffee_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_html_e('About Theme Info', 'skt-coffee'); ?>
		   </div>
          <p><?php esc_html_e('SKT Coffee is a responsive cafe and restaurant WordPress theme which is multipurpose and can be used for hotels, food, recipes, nature, agriculture, business, personal and corporate. Google map compatible for location, Video compatible for videos and qTranslate X compatible for multilingual and translation ready. WooCommerce compatible for Ecommerce and Nextgen Gallery compatible for gallery and portfolio websites. Contact form 7 compatible and WordPress SEO plugins compatible.','skt-coffee'); ?></p>
		  <a href="<?php echo esc_url(SKT_COFFEE_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo esc_url(SKT_COFFEE_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-coffee'); ?></a> | 
				<a href="<?php echo esc_url(SKT_COFFEE_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-coffee'); ?></a> | 
				<a href="<?php echo esc_url(SKT_COFFEE_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-coffee'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_COFFEE_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>