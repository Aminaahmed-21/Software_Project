<?php
/**
 * Movie Critic Review  Theme Customizer
 *
 * @package Movie Critic Review 
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function movie_critic_review_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'movie_critic_review_custom_controls' );

function movie_critic_review_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'movie_critic_review_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'movie_critic_review_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'movie_critic_review_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'movie-critic-review' ),
		'priority' => 10,
	));

   	// Header Background color
	$wp_customize->add_setting('movie_critic_review_header_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_critic_review_header_background_color', array(
		'label'    => __('Header Background Color', 'movie-critic-review'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('movie_critic_review_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','movie-critic-review'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'movie-critic-review' ),
			'center top'   => esc_html__( 'Top', 'movie-critic-review' ),
			'right top'   => esc_html__( 'Top Right', 'movie-critic-review' ),
			'left center'   => esc_html__( 'Left', 'movie-critic-review' ),
			'center center'   => esc_html__( 'Center', 'movie-critic-review' ),
			'right center'   => esc_html__( 'Right', 'movie-critic-review' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'movie-critic-review' ),
			'center bottom'   => esc_html__( 'Bottom', 'movie-critic-review' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'movie-critic-review' ),
		),
	));

	//Topbar 
	$wp_customize->add_section('movie_critic_review_header_section' , array(
  		'title' => __( 'Topbar Section', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_panel_id'
	) );

	$wp_customize->add_setting('movie_critic_review_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_topbar_text',array(
		'label'	=> esc_html__('Topbar Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'John Wick 4 movie review is finally here! Read it now.', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_topbar_text_click',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_topbar_text_click',array(
		'label'	=> esc_html__('Topbar Click Button Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Click Here', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_topbar_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('movie_critic_review_topbar_link',array(
		'label'	=> esc_html__('Add Topbar Text Link','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_header_section',
		'type'=> 'url'
	));

    $wp_customize->add_setting('movie_critic_review_account_btn_link',array(
        'default'=> '',
        'sanitize_callback'	=> 'esc_url_raw'
    ));
    $wp_customize->add_control('movie_critic_review_account_btn_link',array(
        'label'	=> esc_html__('Add Account Button Link','movie-critic-review'),
        'section'=> 'movie_critic_review_header_section',
        'type'=> 'url'
    ));

	//Slider
	$wp_customize->add_section( 'movie_critic_review_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'movie-critic-review' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/movie-review-wordpress-theme/">GO PRO</a>','movie-critic-review'),
		'panel' => 'movie_critic_review_panel_id'
	) );

	$wp_customize->add_setting( 'movie_critic_review_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));  
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','movie-critic-review' ),
      'section' => 'movie_critic_review_slidersettings'
    )));

  	$wp_customize->add_setting('movie_critic_review_slider_type',array(
	    'default' => 'Default slider',
	    'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	) );
	$wp_customize->add_control('movie_critic_review_slider_type', array(
	    'type' => 'select',
	    'label' => __('Slider Type','movie-critic-review'),
	    'section' => 'movie_critic_review_slidersettings',
	    'choices' => array(
	        'Default slider' => __('Default slider','movie-critic-review'),
	        'Advance slider' => __('Advance slider','movie-critic-review'),
        ),
	));

	$wp_customize->add_setting('movie_critic_review_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','movie-critic-review'),
		'section'=> 'movie_critic_review_slidersettings',
		'type'=> 'text',
		'active_callback' => 'movie_critic_review_advance_slider'
	));

	$wp_customize->add_setting( 'movie_critic_review_slider_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'movie_critic_review_slider_small_title', array(
		'label'    => __( 'Add Slider Small Text', 'movie-critic-review' ),
		'input_attrs' => array(
            'placeholder' => __( 'Popeye The Sailor', 'movie-critic-review' ),
        ),
		'section'  => 'movie_critic_review_slidersettings',
		'type'     => 'text',
		'active_callback' => 'movie_critic_review_default_slider'
	) );

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('movie_critic_review_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'movie_critic_review_customize_partial_movie_critic_review_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'movie_critic_review_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'movie_critic_review_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'movie_critic_review_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'movie-critic-review' ),
			'description' => __('Slider image size (1400 x 550)','movie-critic-review'),
			'section'  => 'movie_critic_review_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('movie_critic_review_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Image_Radio_Control($wp_customize, 'movie_critic_review_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','movie-critic-review'),
        'section' => 'movie_critic_review_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),'active_callback' => 'movie_critic_review_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('movie_critic_review_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','movie-critic-review'),
		'description'	=> __('Enter a value in %. Example:20%','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_slidersettings',
		'type'=> 'text',
		'active_callback' => 'movie_critic_review_default_slider'
	));

	$wp_customize->add_setting('movie_critic_review_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','movie-critic-review'),
		'description'	=> __('Enter a value in %. Example:20%','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_slidersettings',
		'type'=> 'text',
		'active_callback' => 'movie_critic_review_default_slider'
	));

  	//Slider excerpt
	$wp_customize->add_setting( 'movie_critic_review_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','movie-critic-review' ),
		'section'     => 'movie_critic_review_slidersettings',
		'type'        => 'range',
		'settings'    => 'movie_critic_review_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'movie_critic_review_default_slider'
	) );

	$wp_customize->add_setting( 'movie_critic_review_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'movie_critic_review_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','movie-critic-review'),
		'section' => 'movie_critic_review_slidersettings',
		'type'  => 'text',
		'active_callback' => 'movie_critic_review_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('movie_critic_review_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_slider_height',array(
		'label'	=> __('Slider Height','movie-critic-review'),
		'description'	=> __('Specify the slider height (px).','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_slidersettings',
		'type'=> 'text',
		'active_callback' => 'movie_critic_review_default_slider'
	)); 

	//Opacity
	$wp_customize->add_setting('movie_critic_review_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));

	$wp_customize->add_control( 'movie_critic_review_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','movie-critic-review' ),
		'section'     => 'movie_critic_review_slidersettings',
		'type'        => 'select',
		'settings'    => 'movie_critic_review_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','movie-critic-review'),
	      '0.1' =>  esc_attr('0.1','movie-critic-review'),
	      '0.2' =>  esc_attr('0.2','movie-critic-review'),
	      '0.3' =>  esc_attr('0.3','movie-critic-review'),
	      '0.4' =>  esc_attr('0.4','movie-critic-review'),
	      '0.5' =>  esc_attr('0.5','movie-critic-review'),
	      '0.6' =>  esc_attr('0.6','movie-critic-review'),
	      '0.7' =>  esc_attr('0.7','movie-critic-review'),
	      '0.8' =>  esc_attr('0.8','movie-critic-review'),
	      '0.9' =>  esc_attr('0.9','movie-critic-review')
	),'active_callback' => 'movie_critic_review_default_slider'
	));

	$wp_customize->add_setting( 'movie_critic_review_slider_image_overlay',array(
    	'default' => '#000',
    	'transport' => 'refresh',
    	'sanitize_callback' => 'movie_critic_review_switch_sanitization'
   ));
   $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','movie-critic-review' ),
      	'section' => 'movie_critic_review_slidersettings',
      	'active_callback' => 'movie_critic_review_default_slider'
   )));

   $wp_customize->add_setting('movie_critic_review_slider_image_overlay_color', array(
		'default'           => 1,
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_critic_review_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'movie-critic-review'),
		'section'  => 'movie_critic_review_slidersettings',
		'active_callback' => 'movie_critic_review_default_slider'
	)));

	$wp_customize->add_setting( 'movie_critic_review_slider_arrow_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	));
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','movie-critic-review' ),
		'section' => 'movie_critic_review_slidersettings',
		'active_callback' => 'movie_critic_review_default_slider'
	)));

	$wp_customize->add_setting('movie_critic_review_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_slidersettings',
		'setting'	=> 'movie_critic_review_slider_prev_icon',
		'type'		=> 'icon',
		'active_callback' => 'movie_critic_review_default_slider'
	)));

	$wp_customize->add_setting('movie_critic_review_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_slidersettings',
		'setting'	=> 'movie_critic_review_slider_next_icon',
		'type'		=> 'icon',
		'active_callback' => 'movie_critic_review_default_slider'
	)));

	// Featured Section
	$wp_customize->add_section('movie_critic_review_featured_section',array(
		'title'	=> __('Featured Section','movie-critic-review'),
		'description' => __('For more options of the featured section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/movie-review-wordpress-theme/">GO PRO</a>','movie-critic-review'),
		'panel' => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting( 'movie_critic_review_featured_heading', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'movie_critic_review_featured_heading', array(
		'label'    => __( 'Add Section Heading', 'movie-critic-review' ),
		'input_attrs' => array(
            'placeholder' => __( 'Featured Today', 'movie-critic-review' ),
        ),
		'section'  => 'movie_critic_review_featured_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'movie_critic_review_featured_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'movie_critic_review_featured_small_title', array(
		'label'    => __( 'Add Section Small Text', 'movie-critic-review' ),
		'input_attrs' => array(
            'placeholder' => __( 'Small Text', 'movie-critic-review' ),
        ),
		'section'  => 'movie_critic_review_featured_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'movie_critic_review_feature_today_video_icon_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'movie_critic_review_feature_today_video_icon_text', array(
		'label'    => __( 'Add Button Video Text', 'movie-critic-review' ),
		'section'  => 'movie_critic_review_featured_section',
		'type'     => 'text'
	) );

	// Video Post Section 

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

 	$wp_customize->add_setting('movie_critic_review_video_category',array(
     	'sanitize_callback' => 'movie_critic_review_sanitize_choices',
 	));
	$wp_customize->add_control('movie_critic_review_video_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Video Category','movie-critic-review'),
		'section' => 'movie_critic_review_featured_section',
 	));

	$wp_customize->add_setting('movie_critic_review_meta_field_separator_text',array(
		'default'=> '.',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_meta_field_separator_text',array(
		'label'	=> __('Add Meta Separator','movie-critic-review'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','movie-critic-review'),
		'section'=> 'movie_critic_review_featured_section',
		'type'=> 'text'
	));

	//fan favorites Section
	$wp_customize->add_section('movie_critic_review_fan_favorites_section', array(
		'title'       => __('Fan Favorites Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_fan_favorites_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_fan_favorites_text',array(
		'description' => __('<p>1. More options for fan favorites section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for fan favorites section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_fan_favorites_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_fan_favorites_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_fan_favorites_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_fan_favorites_section',
		'type'=> 'hidden'
	));

	//top week Section
	$wp_customize->add_section('movie_critic_review_top_week_section', array(
		'title'       => __('Top Week Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_top_week_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_top_week_text',array(
		'description' => __('<p>1. More options for top week section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for top week section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_top_week_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_top_week_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_top_week_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_top_week_section',
		'type'=> 'hidden'
	));

	//explore streming Section
	$wp_customize->add_section('movie_critic_review_explore_streming_section', array(
		'title'       => __('Explore Streming Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_explore_streming_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_explore_streming_text',array(
		'description' => __('<p>1. More options for explore streming section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for explore streming section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_explore_streming_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_explore_streming_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_explore_streming_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_explore_streming_section',
		'type'=> 'hidden'
	));

	//movie trailor Section
	$wp_customize->add_section('movie_critic_review_movie_trailor_section', array(
		'title'       => __('Movie Trailor Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_movie_trailor_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_movie_trailor_text',array(
		'description' => __('<p>1. More options for movie trailor section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for movie trailor section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_movie_trailor_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_movie_trailor_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_movie_trailor_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_movie_trailor_section',
		'type'=> 'hidden'
	));

	//top box office Section
	$wp_customize->add_section('movie_critic_review_top_box_office_section', array(
		'title'       => __('Top Box Office Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_top_box_office_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_top_box_office_text',array(
		'description' => __('<p>1. More options for top box office section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for top box office section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_top_box_office_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_top_box_office_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_top_box_office_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_top_box_office_section',
		'type'=> 'hidden'
	));

	//editor picks Section
	$wp_customize->add_section('movie_critic_review_editor_picks_section', array(
		'title'       => __('Editor Picks Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_editor_picks_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_editor_picks_text',array(
		'description' => __('<p>1. More options for editor picks section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for editor picks section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_editor_picks_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_editor_picks_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_editor_picks_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_editor_picks_section',
		'type'=> 'hidden'
	));

	//blog news Section
	$wp_customize->add_section('movie_critic_review_blog_news_section', array(
		'title'       => __('Blog News Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_blog_news_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_blog_news_text',array(
		'description' => __('<p>1. More options for blog news section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog news section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_blog_news_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_blog_news_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_blog_news_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_blog_news_section',
		'type'=> 'hidden'
	));

	//newsletter Section
	$wp_customize->add_section('movie_critic_review_newsletter_section', array(
		'title'       => __('Newsletter Section', 'movie-critic-review'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','movie-critic-review'),
		'priority'    => null,
		'panel'       => 'movie_critic_review_panel_id',
	));

	$wp_customize->add_setting('movie_critic_review_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','movie-critic-review'),
		'section'=> 'movie_critic_review_newsletter_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('movie_critic_review_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=movie_critic_review_guide') ." '>More Info</a>",
		'section'=> 'movie_critic_review_newsletter_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('movie_critic_review_footer',array(
		'title'	=> esc_html__('Footer Settings','movie-critic-review'),
		'description' => __('For more options of the footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/movie-review-wordpress-theme/">GO PRO</a>','movie-critic-review'),
		'panel' => 'movie_critic_review_panel_id',
	));	

	$wp_customize->add_setting( 'movie_critic_review_footer_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_footer_hide_show',array(
		'label' => esc_html__( 'Show / Hide Footer','movie-critic-review' ),
		'section' => 'movie_critic_review_footer'
    )));

	$wp_customize->add_setting('movie_critic_review_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_critic_review_footer_background_color', array(
		'label'    => __('Footer Background Color', 'movie-critic-review'),
		'section'  => 'movie_critic_review_footer',
	)));

	$wp_customize->add_setting('movie_critic_review_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'movie_critic_review_footer_background_image',array(
        'label' => __('Footer Background Image','movie-critic-review'),
        'section' => 'movie_critic_review_footer'
	)));

	$wp_customize->add_setting('movie_critic_review_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','movie-critic-review'),
		'section' => 'movie_critic_review_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'movie-critic-review' ),
			'center top'   => esc_html__( 'Top', 'movie-critic-review' ),
			'right top'   => esc_html__( 'Top Right', 'movie-critic-review' ),
			'left center'   => esc_html__( 'Left', 'movie-critic-review' ),
			'center center'   => esc_html__( 'Center', 'movie-critic-review' ),
			'right center'   => esc_html__( 'Right', 'movie-critic-review' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'movie-critic-review' ),
			'center bottom'   => esc_html__( 'Bottom', 'movie-critic-review' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'movie-critic-review' ),
		),
	));

	// Footer
	$wp_customize->add_setting('movie_critic_review_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','movie-critic-review'),
		'choices' => array(
            'fixed' => __('fixed','movie-critic-review'),
            'scroll' => __('scroll','movie-critic-review'),
        ),
		'section'=> 'movie_critic_review_footer',
	));

	$wp_customize->add_setting('movie_critic_review_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','movie-critic-review'),
        'section' => 'movie_critic_review_footer',
        'choices' => array(
        	'Left' => __('Left','movie-critic-review'),
            'Center' => __('Center','movie-critic-review'),
            'Right' => __('Right','movie-critic-review')
        ),
	) );

	$wp_customize->add_setting('movie_critic_review_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','movie-critic-review'),
        'section' => 'movie_critic_review_footer',
        'choices' => array(
        	'Left' => __('Left','movie-critic-review'),
            'Center' => __('Center','movie-critic-review'),
            'Right' => __('Right','movie-critic-review')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('movie_critic_review_footer_padding',array(
		'default'=> '',
		'priority'    => null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'movie-critic-review' ),
    ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));

    // footer social icon
  	$wp_customize->add_setting( 'movie_critic_review_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','movie-critic-review' ),
		'section' => 'movie_critic_review_footer'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('movie_critic_review_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'movie_critic_review_Customize_partial_movie_critic_review_footer_text', 
	));

	$wp_customize->add_setting( 'movie_critic_review_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','movie-critic-review' ),
      'section' => 'movie_critic_review_footer'
    )));

	$wp_customize->add_setting( 'movie_critic_review_copyright_first_color', array(
	    'default' => '#FEE882',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movie_critic_review_copyright_first_color', array(
  		'label' => __('Copyright First Color Option', 'movie-critic-review'),
	    'section' => 'movie_critic_review_footer',
	    'settings' => 'movie_critic_review_copyright_first_color',
  	)));

  	$wp_customize->add_setting( 'movie_critic_review_copyright_second_color', array(
	    'default' => '#DBB155',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movie_critic_review_copyright_second_color', array(
  		'label' => __('Copyright Second Color Option', 'movie-critic-review'),
	    'section' => 'movie_critic_review_footer',
	    'settings' => 'movie_critic_review_copyright_second_color',
  	))); 

	$wp_customize->add_setting( 'movie_critic_review_copyright_third_color', array(
	    'default' => '#FFF79F',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movie_critic_review_copyright_third_color', array(
  		'label' => __('Copyright Third Color Option', 'movie-critic-review'),
	    'section' => 'movie_critic_review_footer',
	    'settings' => 'movie_critic_review_copyright_third_color',
  	))); 
	
	$wp_customize->add_setting( 'movie_critic_review_copyright_fourth_color', array(
	    'default' => '#FEE882',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movie_critic_review_copyright_fourth_color', array(
  		'label' => __('Copyright Fourth Color Option', 'movie-critic-review'),
	    'section' => 'movie_critic_review_footer',
	    'settings' => 'movie_critic_review_copyright_fourth_color',
  	))); 

  	$wp_customize->add_setting( 'movie_critic_review_copyright_fifth_color', array(
	    'default' => '#C99740',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'movie_critic_review_copyright_fifth_color', array(
  		'label' => __('Copyright Fourth Color Option', 'movie-critic-review'),
	    'section' => 'movie_critic_review_footer',
	    'settings' => 'movie_critic_review_copyright_fifth_color',
  	))); 
	
	$wp_customize->add_setting('movie_critic_review_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('movie_critic_review_footer_text',array(
		'label'	=> esc_html__('Copyright Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));


	$wp_customize->add_setting('movie_critic_review_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Image_Radio_Control($wp_customize, 'movie_critic_review_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','movie-critic-review'),
        'section' => 'movie_critic_review_footer',
        'settings' => 'movie_critic_review_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'movie_critic_review_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));  
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','movie-critic-review' ),
      	'section' => 'movie_critic_review_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('movie_critic_review_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'movie_critic_review_Customize_partial_movie_critic_review_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('movie_critic_review_scroll_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_scroll_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_footer',
		'setting'	=> 'movie_critic_review_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('movie_critic_review_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_scroll_to_top_width',array(
		'label'	=> __('Icon Width','movie-critic-review'),
		'description'	=> __('Enter a value in pixels Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_scroll_to_top_height',array(
		'label'	=> __('Icon Height','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'movie_critic_review_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','movie-critic-review' ),
		'section'     => 'movie_critic_review_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('movie_critic_review_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Image_Radio_Control($wp_customize, 'movie_critic_review_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','movie-critic-review'),
        'section' => 'movie_critic_review_footer',
        'settings' => 'movie_critic_review_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( 'movie_critic_review_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'movie_critic_review_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('movie_critic_review_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'movie_critic_review_Customize_partial_movie_critic_review_toggle_postdate', 
	));

	//Blog layout
    $wp_customize->add_setting('movie_critic_review_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
    ));
    $wp_customize->add_control(new Movie_Critic_Review_Image_Radio_Control($wp_customize, 'movie_critic_review_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','movie-critic-review'),
        'section' => 'movie_critic_review_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	$wp_customize->add_setting('movie_critic_review_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','movie-critic-review'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','movie-critic-review'),
        'section' => 'movie_critic_review_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','movie-critic-review'),
            'Right Sidebar' => esc_html__('Right Sidebar','movie-critic-review'),
            'One Column' => esc_html__('One Column','movie-critic-review'),
            'Three Columns' => __('Three Columns','movie-critic-review'),
            'Four Columns' => __('Four Columns','movie-critic-review'),
            'Grid Layout' => esc_html__('Grid Layout','movie-critic-review')
        ),
	) );

  	$wp_customize->add_setting('movie_critic_review_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_post_settings',
		'setting'	=> 'movie_critic_review_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'movie_critic_review_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','movie-critic-review' ),
        'section' => 'movie_critic_review_post_settings'
    )));

	$wp_customize->add_setting('movie_critic_review_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_post_settings',
		'setting'	=> 'movie_critic_review_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'movie_critic_review_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_author',array(
		'label' => esc_html__( 'Show / Hide Author','movie-critic-review' ),
		'section' => 'movie_critic_review_post_settings'
    )));

    $wp_customize->add_setting('movie_critic_review_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_post_settings',
		'setting'	=> 'movie_critic_review_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'movie_critic_review_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','movie-critic-review' ),
		'section' => 'movie_critic_review_post_settings'
    )));

    $wp_customize->add_setting('movie_critic_review_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_post_settings',
		'setting'	=> 'movie_critic_review_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'movie_critic_review_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_time',array(
		'label' => esc_html__( 'Show / Hide Time','movie-critic-review' ),
		'section' => 'movie_critic_review_post_settings'
    )));

    $wp_customize->add_setting( 'movie_critic_review_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	));
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','movie-critic-review' ),
		'section' => 'movie_critic_review_post_settings'
    )));

    $wp_customize->add_setting( 'movie_critic_review_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','movie-critic-review' ),
		'section'     => 'movie_critic_review_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'movie_critic_review_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','movie-critic-review' ),
		'section'     => 'movie_critic_review_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('movie_critic_review_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'movie_critic_review_sanitize_choices'
	));
  	$wp_customize->add_control('movie_critic_review_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','movie-critic-review'),
		'section'	=> 'movie_critic_review_post_settings',
		'choices' => array(
		'default' => __('Default','movie-critic-review'),
		'custom' => __('Custom Image Size','movie-critic-review'),
      ),
  	));

	$wp_customize->add_setting('movie_critic_review_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('movie_critic_review_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'movie-critic-review' ),),
		'section'=> 'movie_critic_review_post_settings',
		'type'=> 'text',
		'active_callback' => 'movie_critic_review_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('movie_critic_review_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'movie-critic-review' ),),
		'section'=> 'movie_critic_review_post_settings',
		'type'=> 'text',
		'active_callback' => 'movie_critic_review_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'movie_critic_review_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	));
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_toggle_tags', array(
		'label' => esc_html__( 'Tags','movie-critic-review' ),
		'section' => 'movie_critic_review_post_settings'
    )));

    $wp_customize->add_setting( 'movie_critic_review_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'movie_critic_review_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','movie-critic-review' ),
		'section'     => 'movie_critic_review_post_settings',
		'type'        => 'range',
		'settings'    => 'movie_critic_review_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('movie_critic_review_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','movie-critic-review'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','movie-critic-review'),
		'section'=> 'movie_critic_review_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('movie_critic_review_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','movie-critic-review'),
        'section' => 'movie_critic_review_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','movie-critic-review'),
            'Excerpt' => esc_html__('Excerpt','movie-critic-review'),
            'No Content' => esc_html__('No Content','movie-critic-review')
        ),
	) );

	$wp_customize->add_setting('movie_critic_review_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'movie_critic_review_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','movie-critic-review' ),
		'section' => 'movie_critic_review_post_settings'
    )));

	$wp_customize->add_setting( 'movie_critic_review_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'movie_critic_review_sanitize_choices'
    ));
    $wp_customize->add_control( 'movie_critic_review_blog_pagination_type', array(
        'section' => 'movie_critic_review_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'movie-critic-review' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'movie-critic-review' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'movie-critic-review' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'movie_critic_review_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('movie_critic_review_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'movie_critic_review_Customize_partial_movie_critic_review_button_text', 
	));

    $wp_customize->add_setting('movie_critic_review_button_text',array(
		'default'=> esc_html__('Read More','movie-critic-review'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_button_text',array(
		'label'	=> esc_html__('Add Button Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('movie_critic_review_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_button_font_size',array(
		'label'	=> __('Button Font Size','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'movie-critic-review' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'movie_critic_review_button_settings',
	));

	$wp_customize->add_setting( 'movie_critic_review_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','movie-critic-review' ),
		'section'     => 'movie_critic_review_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('movie_critic_review_button_padding_top_bottom_blog',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_button_padding_top_bottom_blog',array(
		'label'	=> __('Padding Top Bottom','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_button_padding_left_right_blog',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_button_padding_left_right_blog',array(
		'label'	=> __('Padding Left Right','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_button_settings',
		'type'=> 'text'
	));

	// text trasform
	$wp_customize->add_setting('movie_critic_review_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','movie-critic-review'),
		'choices' => array(
            'Uppercase' => __('Uppercase','movie-critic-review'),
            'Capitalize' => __('Capitalize','movie-critic-review'),
            'Lowercase' => __('Lowercase','movie-critic-review'),
        ),
		'section'=> 'movie_critic_review_button_settings',
	));

	$wp_customize->add_setting('movie_critic_review_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'movie-critic-review' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'movie_critic_review_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'movie_critic_review_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('movie_critic_review_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'movie_critic_review_Customize_partial_movie_critic_review_related_post_title', 
	));

    $wp_customize->add_setting( 'movie_critic_review_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_related_post',array(
		'label' => esc_html__( 'Related Post','movie-critic-review' ),
		'section' => 'movie_critic_review_related_posts_settings'
    )));

    $wp_customize->add_setting('movie_critic_review_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('movie_critic_review_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'movie_critic_review_sanitize_number_absint'
	));
	$wp_customize->add_control('movie_critic_review_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'movie_critic_review_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','movie-critic-review' ),
		'section'     => 'movie_critic_review_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'movie_critic_review_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'movie_critic_review_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('movie_critic_review_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_single_blog_settings',
		'setting'	=> 'movie_critic_review_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'movie_critic_review_toggle_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_toggle_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','movie-critic-review' ),
	   'section' => 'movie_critic_review_single_blog_settings'
	)));

	$wp_customize->add_setting('movie_critic_review_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_single_author_icon',array(
		'label'	=> __('Add Author Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_single_blog_settings',
		'setting'	=> 'movie_critic_review_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'movie_critic_review_toggle_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_toggle_author',array(
	    'label' => esc_html__( 'Show / Hide Author','movie-critic-review' ),
	    'section' => 'movie_critic_review_single_blog_settings'
	)));

   	$wp_customize->add_setting('movie_critic_review_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_single_blog_settings',
		'setting'	=> 'movie_critic_review_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'movie_critic_review_toggle_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_toggle_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','movie-critic-review' ),
	    'section' => 'movie_critic_review_single_blog_settings'
	)));

  	$wp_customize->add_setting('movie_critic_review_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_single_time_icon',array(
		'label'	=> __('Add Time Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_single_blog_settings',
		'setting'	=> 'movie_critic_review_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'movie_critic_review_toggle_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_toggle_time',array(
	    'label' => esc_html__( 'Show / Hide Time','movie-critic-review' ),
	    'section' => 'movie_critic_review_single_blog_settings'
	)));

	$wp_customize->add_setting( 'movie_critic_review_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	));
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','movie-critic-review' ),
		'section' => 'movie_critic_review_single_blog_settings'
    )));

	$wp_customize->add_setting( 'movie_critic_review_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
 	 $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','movie-critic-review' ),
		'section' => 'movie_critic_review_single_blog_settings'
    )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'movie_critic_review_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','movie-critic-review' ),
		'section' => 'movie_critic_review_single_blog_settings'
    )));

	$wp_customize->add_setting('movie_critic_review_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','movie-critic-review'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','movie-critic-review'),
		'section'=> 'movie_critic_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'movie_critic_review_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	));
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','movie-critic-review' ),
		  'section' => 'movie_critic_review_single_blog_settings'
	)));

	//navigation text
	$wp_customize->add_setting('movie_critic_review_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('movie_critic_review_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','movie-critic-review'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'movie-critic-review' ),
    	),
		'section'=> 'movie_critic_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('movie_critic_review_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','movie-critic-review'),
		'description'	=> __('Enter a value in %. Example:50%','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'movie_critic_review_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('movie_critic_review_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_grid_layout_settings',
		'setting'	=> 'movie_critic_review_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'movie_critic_review_grid_postdate',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_grid_postdate',array(
      'label' => esc_html__( 'Show / Hide Post Date','movie-critic-review' ),
      'section' => 'movie_critic_review_grid_layout_settings'
  	)));

	$wp_customize->add_setting('movie_critic_review_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_grid_author_icon',array(
		'label'	=> __('Add Author Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_grid_layout_settings',
		'setting'	=> 'movie_critic_review_grid_author_icon',
		'type'		=> 'icon'
	)));

  	$wp_customize->add_setting( 'movie_critic_review_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
  	) );
  	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','movie-critic-review' ),
		'section' => 'movie_critic_review_grid_layout_settings'
  	)));

    $wp_customize->add_setting('movie_critic_review_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_grid_layout_settings',
		'setting'	=> 'movie_critic_review_grid_comments_icon',
		'type'		=> 'icon'
	)));

  	$wp_customize->add_setting( 'movie_critic_review_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
	) );
	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','movie-critic-review' ),
		'section' => 'movie_critic_review_grid_layout_settings'
	)));

 	$wp_customize->add_setting('movie_critic_review_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','movie-critic-review'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','movie-critic-review'),
		'section'=> 'movie_critic_review_grid_layout_settings',
		'type'=> 'text'
	));

  	$wp_customize->add_setting('movie_critic_review_grid_button_text',array(
		'default'=> esc_html__('Read More','movie-critic-review'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_grid_layout_settings',
		'type'=> 'text'
	));

  	$wp_customize->add_setting('movie_critic_review_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','movie-critic-review'),
	    'section' => 'movie_critic_review_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','movie-critic-review'),
	      'Without Blocks' => __('Without Blocks','movie-critic-review')
	      ),
	) );

  	$wp_customize->add_setting('movie_critic_review_grid_button_text',array(
		'default'=> esc_html__('Read More','movie-critic-review'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_grid_layout_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('movie_critic_review_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','movie-critic-review'),
        'section' => 'movie_critic_review_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','movie-critic-review'),
            'Excerpt' => esc_html__('Excerpt','movie-critic-review'),
            'No Content' => esc_html__('No Content','movie-critic-review')
        ),
	) );

    $wp_customize->add_setting( 'movie_critic_review_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','movie-critic-review' ),
		'section'     => 'movie_critic_review_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'movie_critic_review_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','movie-critic-review' ),
		'section'     => 'movie_critic_review_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );
	
	//Other
	$wp_customize->add_panel( 'movie_critic_review_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'movie-critic-review' ),
		'panel' => 'movie_critic_review_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'movie_critic_review_left_right', array(
    	'title' => esc_html__('General Settings', 'movie-critic-review'),
		'panel' => 'movie_critic_review_other_parent_panel'
	) );

	$wp_customize->add_setting('movie_critic_review_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Image_Radio_Control($wp_customize, 'movie_critic_review_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','movie-critic-review'),
        'description' => esc_html__('Here you can change the width layout of Website.','movie-critic-review'),
        'section' => 'movie_critic_review_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('movie_critic_review_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','movie-critic-review'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','movie-critic-review'),
        'section' => 'movie_critic_review_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','movie-critic-review'),
            'Right_Sidebar' => esc_html__('Right Sidebar','movie-critic-review'),
            'One_Column' => esc_html__('One Column','movie-critic-review')
        ),
	) );

	 //Wow Animation
	$wp_customize->add_setting( 'movie_critic_review_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_animation',array(
        'label' => esc_html__( 'Show / Hide Animation ','movie-critic-review' ),
        'description' => __('Here you can disable overall site animation effect','movie-critic-review'),
        'section' => 'movie_critic_review_left_right'
    )));

	$wp_customize->add_setting( 'movie_critic_review_single_page_breadcrumb',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','movie-critic-review' ),
		'section' => 'movie_critic_review_left_right'
  	)));

    // Pre-Loader
	$wp_customize->add_setting( 'movie_critic_review_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','movie-critic-review' ),
        'section' => 'movie_critic_review_left_right'
    )));

	$wp_customize->add_setting('movie_critic_review_preloader_bg_color', array(
		'default'           => '#ECB72F',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_critic_review_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'movie-critic-review'),
		'section'  => 'movie_critic_review_left_right',
	)));

	$wp_customize->add_setting('movie_critic_review_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_critic_review_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'movie-critic-review'),
		'section'  => 'movie_critic_review_left_right',
	)));

	$wp_customize->add_setting('movie_critic_review_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'movie_critic_review_preloader_bg_img',array(
        'label' => __('Preloader Background Image','movie-critic-review'),
        'section' => 'movie_critic_review_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('movie_critic_review_404_page',array(
		'title'	=> __('404 Page Settings','movie-critic-review'),
		'panel' => 'movie_critic_review_other_parent_panel',
	));

	$wp_customize->add_setting('movie_critic_review_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('movie_critic_review_404_page_title',array(
		'label'	=> __('Add Title','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('movie_critic_review_404_page_content',array(
		'label'	=> __('Add Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_404_page_button_text',array(
		'label'	=> __('Add Button Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('movie_critic_review_no_results_page',array(
		'title'	=> __('No Results Page Settings','movie-critic-review'),
		'panel' => 'movie_critic_review_other_parent_panel',
	));

	$wp_customize->add_setting('movie_critic_review_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('movie_critic_review_no_results_page_title',array(
		'label'	=> __('Add Title','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('movie_critic_review_no_results_page_content',array(
		'label'	=> __('Add Text','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('movie_critic_review_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','movie-critic-review'),
		'panel' => 'movie_critic_review_other_parent_panel',
	));

	$wp_customize->add_setting('movie_critic_review_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_social_icon_padding',array(
		'label'	=> __('Icon Padding','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_social_icon_width',array(
		'label'	=> __('Icon Width','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_social_icon_height',array(
		'label'	=> __('Icon Height','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('movie_critic_review_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','movie-critic-review'),
		'panel' => 'movie_critic_review_other_parent_panel',
	));

    $wp_customize->add_setting( 'movie_critic_review_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));  
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','movie-critic-review' ),
      	'section' => 'movie_critic_review_responsive_media'
    )));

    $wp_customize->add_setting( 'movie_critic_review_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));  
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','movie-critic-review' ),
      	'section' => 'movie_critic_review_responsive_media'
    )));

    $wp_customize->add_setting( 'movie_critic_review_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ));  
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','movie-critic-review' ),
      	'section' => 'movie_critic_review_responsive_media'
    )));

    $wp_customize->add_setting('movie_critic_review_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#ECB72F',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'movie_critic_review_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'movie-critic-review'),
		'section'  => 'movie_critic_review_responsive_media',
	)));

    $wp_customize->add_setting('movie_critic_review_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_responsive_media',
		'setting'	=> 'movie_critic_review_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('movie_critic_review_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Movie_Critic_Review_Fontawesome_Icon_Chooser(
        $wp_customize,'movie_critic_review_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','movie-critic-review'),
		'transport' => 'refresh',
		'section'	=> 'movie_critic_review_responsive_media',
		'setting'	=> 'movie_critic_review_res_close_menu_icon',
		'type'		=> 'icon'
	)));


    //Woocommerce settings
	$wp_customize->add_section('movie_critic_review_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'movie-critic-review'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'movie_critic_review_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'movie_critic_review_customize_partial_movie_critic_review_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'movie_critic_review_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','movie-critic-review' ),
		'section' => 'movie_critic_review_woocommerce_section'
    )));

    $wp_customize->add_setting('movie_critic_review_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','movie-critic-review'),
        'section' => 'movie_critic_review_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','movie-critic-review'),
            'Right Sidebar' => __('Right Sidebar','movie-critic-review'),
        ),
	) );

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'movie_critic_review_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'movie_critic_review_customize_partial_movie_critic_review_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'movie_critic_review_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','movie-critic-review' ),
		'section' => 'movie_critic_review_woocommerce_section'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'movie_critic_review_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','movie-critic-review' ),
		'section' => 'movie_critic_review_woocommerce_section'
    )));

   	$wp_customize->add_setting('movie_critic_review_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','movie-critic-review'),
        'section' => 'movie_critic_review_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','movie-critic-review'),
            'Right Sidebar' => __('Right Sidebar','movie-critic-review'),
        ),
	) );

	//Products padding
	$wp_customize->add_setting('movie_critic_review_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'movie_critic_review_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','movie-critic-review' ),
		'section'     => 'movie_critic_review_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'movie_critic_review_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','movie-critic-review' ),
		'section'     => 'movie_critic_review_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('movie_critic_review_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'movie_critic_review_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','movie-critic-review' ),
		'section'     => 'movie_critic_review_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('movie_critic_review_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'movie_critic_review_sanitize_choices'
	));
	$wp_customize->add_control('movie_critic_review_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','movie-critic-review'),
        'section' => 'movie_critic_review_woocommerce_section',
        'choices' => array(
            'left' => __('Left','movie-critic-review'),
            'right' => __('Right','movie-critic-review'),
        ),
	) );

	$wp_customize->add_setting('movie_critic_review_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('movie_critic_review_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('movie_critic_review_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','movie-critic-review'),
		'description'	=> __('Enter a value in pixels. Example:20px','movie-critic-review'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'movie-critic-review' ),
        ),
		'section'=> 'movie_critic_review_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'movie_critic_review_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'movie_critic_review_sanitize_number_range'
	) );
	$wp_customize->add_control( 'movie_critic_review_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','movie-critic-review' ),
		'section'     => 'movie_critic_review_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    //Related Products
	$wp_customize->add_setting( 'movie_critic_review_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'movie_critic_review_switch_sanitization'
    ) );
    $wp_customize->add_control( new Movie_Critic_Review_Toggle_Switch_Custom_Control( $wp_customize, 'movie_critic_review_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','movie-critic-review' ),
        'section' => 'movie_critic_review_woocommerce_section'
    )));

}

add_action( 'customize_register', 'movie_critic_review_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Movie_Critic_Review_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Movie_Critic_Review_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Movie_Critic_Review_Customize_Section_Pro( $manager,'movie_critic_review_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'MOVIE REVIEW PRO', 'movie-critic-review' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'movie-critic-review' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/movie-review-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Movie_Critic_Review_Customize_Section_Pro($manager,'movie_critic_review_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'movie-critic-review' ),
			'pro_text' => esc_html__( 'DOCS', 'movie-critic-review' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-movie-critic-review/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'movie-critic-review-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'movie-critic-review-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Movie_Critic_Review_Customize::get_instance();