<?php
/**
 * SKT Coffee Theme Customizer
 *
 * @package SKT Coffee
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_coffee_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_coffee_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function skt_coffee_render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#c38346',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-coffee'),			
			 'description'	=> __('More color options in PRO Version','skt-coffee'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'skt-coffee'),
            'priority' => null,
			'description'	=> __('Featured Image Size Should be ( 1420x607 ) More slider settings available in PRO Version','skt-coffee'),           	
        )
    );
	
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'skt_coffee_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','skt-coffee'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_coffee_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','skt-coffee'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_coffee_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','skt-coffee'),
			'section'	=> 'slider_section'
	));	// Slider Section
	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> __('Hide slider Section','skt-coffee'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Our Speciality Section','skt-coffee'),
		'description'	=> __('Select Pages from the dropdown for homepage our speciality and three circle section','skt-coffee'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('speciality',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_coffee_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'speciality',array('type' => 'dropdown-pages',
			'label' => __('','skt-coffee'),
			'section' => 'section_second',
	));	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_coffee_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'label' => __('','skt-coffee'),
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_coffee_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'label' => __('','skt-coffee'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_coffee_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'label' => __('','skt-coffee'),
			'section' => 'section_second',
	));	//end three column part
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagefourboxes',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_pagefourboxes', array(
    	   'section'   => 'section_second',    	 
		   'label'	=> __('Hide four column page boxes','skt-coffee'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section
	
	// Home Welcome Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> __('Homepage Welcome Section','skt-coffee'),
		'description'	=> __('Select Page from the dropdown for first section','skt-coffee'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_coffee_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',
			'label' => __('','skt-coffee'),
			'section' => 'section_first',
	));
	
	//Hide Welcome Section
	$wp_customize->add_setting('hide_welcomesection',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_welcomesection', array(
    	   'section'   => 'section_first',    	 
		   'label'	=> __('Hide Welcome Section','skt-coffee'),
    	   'type'      => 'checkbox'
     )); // Welcome Section	
	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-coffee'),				
			'description'	=> __('More social icon available in PRO Version','skt-coffee'),				
			'priority'		=> null
	));
	
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> 'http://www.facebook.com',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-coffee'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> 'http://www.twitter.com',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-coffee'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> 'http://www.plus.google.com',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-coffee'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> 'http://www.linkedin.com',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-coffee'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','skt-coffee'),
			'priority'	=> null,
			'description'	=> __('Add footer copyright text','skt-coffee')
	));
	
	$wp_customize->add_setting('menu_title',array(
			'default'	=> __('Main Menu','skt-coffee'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('menu_title',array(
			'label'	=> __('Add title for menu','skt-coffee'),
			'section'	=> 'footer_area',
			'setting'	=> 'menu_title'
	));	
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('Our Philosophy','skt-coffee'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for our philosophy','skt-coffee'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description',array(
			'default'	=> __('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue.','skt-coffee'),
			'sanitize_callback'	=> 'wp_filter_post_kses'
	));
	
	$wp_customize->add_control('about_description', array(	
			'label'	=> __('Add description for about us','skt-coffee'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_description',
			'type' => 'textarea',
	));
	
	
	$wp_customize->add_setting('footermore_link',array(
			'default'	=> '#',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('footermore_link',array(
			'label'	=> __('Add link for footer read more button','skt-coffee'),
			'section'	=> 'footer_area',
			'setting'	=> 'footermore_link'
	));
	
	$wp_customize->add_setting('latest_title',array(
			'default'	=> __('Latest Post','skt-coffee'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('latest_title',array(
			'label'	=> __('Add title for footer latest post','skt-coffee'),
			'section'	=> 'footer_area',
			'setting'	=> 'latest_title'
	));		
	
	
	$wp_customize->add_section('header_info',array(
			'title'	=> __('Header Info','skt-coffee'),
			'description'	=> __('Add phone number and address','skt-coffee'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('header_phone',array(
			'default'	=> __(' +123 456 7890','skt-coffee'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('header_phone',array(
			'label'	=> __('Add contact phone number for header','skt-coffee'),
			'section'	=> 'header_info',
			'setting'	=> 'header_phone'
	));	
	
	
	$wp_customize->add_setting('header_address',array(
			'default'	=> __('1600 Amphitheatre Parkway Mountain View, CA 94043','skt-coffee'),
			'sanitize_callback'	=> 'wp_filter_post_kses'
	));
	
	$wp_customize->add_control('header_address', array(
				'label'	=> __('Add contact address for header','skt-coffee'),
				'section'	=> 'header_info',
				'setting'	=> 'header_address',
				'type' => 'textarea',
			));
	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Footer Contact Info','skt-coffee'),
			'description'	=> __('Add your contact details here','skt-coffee'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('1600 Amphitheatre Parkway Mountain View, CA 94043','skt-coffee'),
			'sanitize_callback'	=> 'wp_filter_post_kses'
	));
	
	$wp_customize->add_control('contact_add', array(
				'label'	=> __('Add contact address here','skt-coffee'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add',
				'type' => 'textarea',
			));
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+123 456 7890','skt-coffee'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-coffee'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','skt-coffee'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));	
		
}
add_action( 'customize_register', 'skt_coffee_customize_register' );

//Integer
function skt_coffee_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return absint( $input );
    }
}

function skt_coffee_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function skt_coffee_custom_css(){
		?>
        	<style type="text/css"> 
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,								
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,					
					.phone-no strong,					
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a,					
					.logo h1 span,
					.headertop .left a:hover,
					.services-wrap .one_third h4,
					.cols-4 h5 span,
					.welcomewrap h2 span			
					{ color:<?php echo esc_html(get_theme_mod('color_scheme','#c38346')); ?>;}
					 
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,					
					.nivo-controlNav a.active,				
					h3.widget-title,				
					.wpcf7 input[type='submit'],
					.headertop .right a,
					.services-wrap .one_third:hover
					{ background-color:<?php echo esc_html(get_theme_mod('color_scheme','#c38346')); ?>;}
					
						
					.header,
					section#home_slider					
					{ border-color:<?php echo esc_html(get_theme_mod('color_scheme','#c38346')); ?>;}
					
			</style> 
<?php 
}
         
add_action('wp_head','skt_coffee_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_coffee_customize_preview_js() {
	wp_enqueue_script( 'skt_coffee_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_coffee_customize_preview_js' );

function skt_coffee_custom_customize_enqueue() {
	wp_enqueue_script( 'skt-coffee-custom-customize', get_template_directory_uri() . '/js/custom-customize.js', array( 'jquery', 'customize-controls' ), false, true );
	wp_localize_script( 'custom-customize', 'custom_customize_vars', array('accordion-section-title' => __('Upgrade to PRO Version', 'skt-coffee'),
	'li#accordion-panel-widgets ul li .accordion-section-content' => __('More Widgets in', 'skt-coffee'),
	'li#accordion-panel-widgets ul li .accordion-section-content' => __('PRO Version', 'skt-coffee')
		));
} 
add_action( 'customize_controls_enqueue_scripts', 'skt_coffee_custom_customize_enqueue' );