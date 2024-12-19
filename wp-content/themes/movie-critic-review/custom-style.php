<?php

	$movie_critic_review_custom_css= "";



	/*----------------------First highlight color-------------------*/

	$movie_critic_review_first_color = get_theme_mod('movie_critic_review_first_color');

	$movie_critic_review_custom_css = ''; 

	if($movie_critic_review_first_color != false){
		$movie_critic_review_custom_css .=' .rating, .scrollup i, .middle-bar h6, #sidebar h3, #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .post-nav-links span, .post-nav-links a, .woocommerce span.onsale , #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .pagination a:hover, .pagination .current, span.post-page-numbers.current, .post-nav-links a:hover,#footer input[type="submit"], #preloader, .wp-block-tag-cloud a:hover,#sidebar label.wp-block-search__label, #sidebar .wp-block-heading{';
			$movie_critic_review_custom_css .='background: '.esc_attr($movie_critic_review_first_color).';';
		$movie_critic_review_custom_css .='}';
	}

	if($movie_critic_review_first_color != false){
		$movie_critic_review_custom_css .=' .single-post .post-info:hover a,#sidebar ul li:hover, .post-main-box:hover h3 a, #sidebar ul li a:hover, #footer li a:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .post-navigation a:hover, .post-navigation a:focus, .post-main-box:hover .post-info span a, .post-main-box:hover h2 a, a, .woocommerce .star-rating span, .woocommerce p.stars a, .woocommerce-message::before, .woocommerce-info::before, #slider .slider-btn a:hover, #slider .inner_carousel h1 a:hover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .tags-bg a:hover,.post-navigation span.meta-nav:hover,p.site-title a:hover, .logo h1 a:hover{';
			$movie_critic_review_custom_css .='color: '.esc_attr($movie_critic_review_first_color).';';
		$movie_critic_review_custom_css .='}';
	}

	if($movie_critic_review_first_color != false){
		$movie_critic_review_custom_css .='.woocommerce-message, .woocommerce-info{';
			$movie_critic_review_custom_css .='border-top-color: '.esc_attr($movie_critic_review_first_color).';';
		$movie_critic_review_custom_css .='}';
	}

	if($movie_critic_review_first_color != false){
		$movie_critic_review_custom_css .='#slider .slider-btn a:hover{';
			$movie_critic_review_custom_css .='border: '.esc_attr($movie_critic_review_first_color).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_custom_css .='@media screen and (max-width:1000px) {';
		if($movie_critic_review_first_color != false){
			$movie_critic_review_custom_css .='.toggle-nav i{
			background-color:'.esc_attr($movie_critic_review_first_color).';
			}';
		}
	$movie_critic_review_custom_css .='}';

	/*-----------------Global Color highlight color-------------------*/

	$movie_critic_review_first_color = get_theme_mod('movie_critic_review_first_color');

	$movie_critic_review_second_color = get_theme_mod('movie_critic_review_second_color');

	$movie_critic_review_third_color = get_theme_mod('movie_critic_review_third_color');

	$movie_critic_review_fourth_color = get_theme_mod('movie_critic_review_fourth_color');

	$movie_critic_review_fifth_color = get_theme_mod('movie_critic_review_fifth_color');

	if($movie_critic_review_first_color != false || $movie_critic_review_second_color != false || $movie_critic_review_third_color != false || $movie_critic_review_fourth_color != false || $movie_critic_review_fifth_color != false ){
		$movie_critic_review_custom_css .='.slider-badge,.more-btn a, #comments input[type="submit"], #comments a.comment-reply-link, input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pro-button a, .woocommerce a.added_to_cart.wc-forward, nav.woocommerce-MyAccount-navigation ul li,.bradcrumbs a, .post-categories li a,.bradcrumbs span,.wp-block-button__link, .more-btn a, nav.navigation.posts-navigation .nav-previous a, nav.navigation.posts-navigation .nav-next a{
		background: linear-gradient(to right, '.esc_attr($movie_critic_review_first_color).', '.esc_attr($movie_critic_review_second_color).', '.esc_attr($movie_critic_review_third_color).', '.esc_attr($movie_critic_review_fourth_color).', '.esc_attr($movie_critic_review_fifth_color).');
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$movie_critic_review_theme_lay = get_theme_mod( 'movie_critic_review_width_option','Full Width');
    if($movie_critic_review_theme_lay == 'Boxed'){
		$movie_critic_review_custom_css .='body{';
			$movie_critic_review_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='right: 100px;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.row.outer-logo{';
			$movie_critic_review_custom_css .='margin-left: 0px;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_theme_lay == 'Wide Width'){
		$movie_critic_review_custom_css .='body{';
			$movie_critic_review_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='right: 30px;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.row.outer-logo{';
			$movie_critic_review_custom_css .='margin-left: 0px;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_theme_lay == 'Full Width'){
		$movie_critic_review_custom_css .='body{';
			$movie_critic_review_custom_css .='max-width: 100%;';
		$movie_critic_review_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$movie_critic_review_slider_height = get_theme_mod('movie_critic_review_slider_height');
	if($movie_critic_review_slider_height != false){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='height: '.esc_attr($movie_critic_review_slider_height).';';
		$movie_critic_review_custom_css .='}';
	}

	/*----------------- Slider Content Layout -------------------*/

	$movie_critic_review_theme_lay = get_theme_mod( 'movie_critic_review_slider_content_option','Left');
    if($movie_critic_review_theme_lay == 'Left'){
		$movie_critic_review_custom_css .='#slider .carousel-caption{';
			$movie_critic_review_custom_css .='text-align:left; left: 15%;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_theme_lay == 'Center'){
		$movie_critic_review_custom_css .='#slider .carousel-caption{';
			$movie_critic_review_custom_css .='text-align:center; right: 25%; left: 25%;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_theme_lay == 'Right'){
		$movie_critic_review_custom_css .='#slider .carousel-caption{';
			$movie_critic_review_custom_css .='text-align:right; right: 10%; left: 50%;';
		$movie_critic_review_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$movie_critic_review_slider_content_padding_top_bottom = get_theme_mod('movie_critic_review_slider_content_padding_top_bottom');
	$movie_critic_review_slider_content_padding_left_right = get_theme_mod('movie_critic_review_slider_content_padding_left_right');
	if($movie_critic_review_slider_content_padding_top_bottom != false || $movie_critic_review_slider_content_padding_left_right != false){
		$movie_critic_review_custom_css .='#slider .carousel-caption{';
			$movie_critic_review_custom_css .='top: '.esc_attr($movie_critic_review_slider_content_padding_top_bottom).'; bottom: '.esc_attr($movie_critic_review_slider_content_padding_top_bottom).';left: '.esc_attr($movie_critic_review_slider_content_padding_left_right).';right: '.esc_attr($movie_critic_review_slider_content_padding_left_right).';';
		$movie_critic_review_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$movie_critic_review_theme_lay = get_theme_mod( 'movie_critic_review_slider_opacity_color','0.5');
	if($movie_critic_review_theme_lay == '0'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.1'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.1';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.2'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.2';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.3'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.3';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.4'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.4';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.5'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.5';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.6'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.6';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.7'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.7';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.8'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.8';
		$movie_critic_review_custom_css .='}';
		}else if($movie_critic_review_theme_lay == '0.9'){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:0.9';
		$movie_critic_review_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$movie_critic_review_slider_image_overlay = get_theme_mod('movie_critic_review_slider_image_overlay', true);
	if($movie_critic_review_slider_image_overlay == false){
		$movie_critic_review_custom_css .='#slider img{';
			$movie_critic_review_custom_css .='opacity:1;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_slider_image_overlay_color = get_theme_mod('movie_critic_review_slider_image_overlay_color', true);
	if($movie_critic_review_slider_image_overlay_color != false){
		$movie_critic_review_custom_css .='#slider{';
			$movie_critic_review_custom_css .='background-color: '.esc_attr($movie_critic_review_slider_image_overlay_color).';';
		$movie_critic_review_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$movie_critic_review_resp_slider = get_theme_mod( 'movie_critic_review_resp_slider_hide_show',true);
	if($movie_critic_review_resp_slider == true && get_theme_mod( 'movie_critic_review_slider_hide_show', false) == false){
    	$movie_critic_review_custom_css .='#slider{';
			$movie_critic_review_custom_css .='display:none;';
		$movie_critic_review_custom_css .='} ';
	}
    if($movie_critic_review_resp_slider == true){
    	$movie_critic_review_custom_css .='@media screen and (max-width:575px) {';
		$movie_critic_review_custom_css .='#slider{';
			$movie_critic_review_custom_css .='display:block;';
		$movie_critic_review_custom_css .='} }';
	}else if($movie_critic_review_resp_slider == false){
		$movie_critic_review_custom_css .='@media screen and (max-width:575px) {';
		$movie_critic_review_custom_css .='#slider{';
			$movie_critic_review_custom_css .='display:none;';
		$movie_critic_review_custom_css .='} }';
		$movie_critic_review_custom_css .='@media screen and (max-width:575px){';
		$movie_critic_review_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$movie_critic_review_custom_css .='margin-top: 45px;';
		$movie_critic_review_custom_css .='} }';
	}

	$movie_critic_review_resp_sidebar = get_theme_mod( 'movie_critic_review_sidebar_hide_show',true);
    if($movie_critic_review_resp_sidebar == true){
    	$movie_critic_review_custom_css .='@media screen and (max-width:575px) {';
		$movie_critic_review_custom_css .='#sidebar{';
			$movie_critic_review_custom_css .='display:block;';
		$movie_critic_review_custom_css .='} }';
	}else if($movie_critic_review_resp_sidebar == false){
		$movie_critic_review_custom_css .='@media screen and (max-width:575px) {';
		$movie_critic_review_custom_css .='#sidebar{';
			$movie_critic_review_custom_css .='display:none;';
		$movie_critic_review_custom_css .='} }';
	}

	$movie_critic_review_resp_scroll_top = get_theme_mod( 'movie_critic_review_resp_scroll_top_hide_show',true);
	if($movie_critic_review_resp_scroll_top == true && get_theme_mod( 'movie_critic_review_hide_show_scroll',true) == false){
    	$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='visibility:hidden !important;';
		$movie_critic_review_custom_css .='} ';
	}
    if($movie_critic_review_resp_scroll_top == true){
    	$movie_critic_review_custom_css .='@media screen and (max-width:575px) {';
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='visibility:visible !important;';
		$movie_critic_review_custom_css .='} }';
	}else if($movie_critic_review_resp_scroll_top == false){
		$movie_critic_review_custom_css .='@media screen and (max-width:575px){';
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='visibility:hidden !important;';
		$movie_critic_review_custom_css .='} }';
	}

	/*-------------- Copyright Alignment ----------------*/

	$movie_critic_review_footer_background_color = get_theme_mod('movie_critic_review_footer_background_color');
	if($movie_critic_review_footer_background_color != false){
		$movie_critic_review_custom_css .='#footer{';
			$movie_critic_review_custom_css .='background-color: '.esc_attr($movie_critic_review_footer_background_color).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_footer_widgets_heading = get_theme_mod( 'movie_critic_review_footer_widgets_heading','Left');
    if($movie_critic_review_footer_widgets_heading == 'Left'){
		$movie_critic_review_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$movie_critic_review_custom_css .='text-align: left;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_footer_widgets_heading == 'Center'){
		$movie_critic_review_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$movie_critic_review_custom_css .='text-align: center;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_footer_widgets_heading == 'Right'){
		$movie_critic_review_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$movie_critic_review_custom_css .='text-align: right;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_footer_widgets_content = get_theme_mod( 'movie_critic_review_footer_widgets_content','Left');
    if($movie_critic_review_footer_widgets_content == 'Left'){
		$movie_critic_review_custom_css .='#footer .widget{';
		$movie_critic_review_custom_css .='text-align: left;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_footer_widgets_content == 'Center'){
		$movie_critic_review_custom_css .='#footer .widget{';
			$movie_critic_review_custom_css .='text-align: center;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_footer_widgets_content == 'Right'){
		$movie_critic_review_custom_css .='#footer .widget{';
			$movie_critic_review_custom_css .='text-align: right;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_copyright_font_size = get_theme_mod('movie_critic_review_copyright_font_size');
	if($movie_critic_review_copyright_font_size != false){
		$movie_critic_review_custom_css .='.copyright p{';
			$movie_critic_review_custom_css .='font-size: '.esc_attr($movie_critic_review_copyright_font_size).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_copyright_padding_top_bottom = get_theme_mod('movie_critic_review_copyright_padding_top_bottom');
	if($movie_critic_review_copyright_padding_top_bottom != false){
		$movie_critic_review_custom_css .='#footer-2{';
			$movie_critic_review_custom_css .='padding-top: '.esc_attr($movie_critic_review_copyright_padding_top_bottom).'!important; padding-bottom: '.esc_attr($movie_critic_review_copyright_padding_top_bottom).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_copyright_alignment = get_theme_mod('movie_critic_review_copyright_alignment');
	if($movie_critic_review_copyright_alignment != false){
		$movie_critic_review_custom_css .='.copyright p{';
			$movie_critic_review_custom_css .='text-align: '.esc_attr($movie_critic_review_copyright_alignment).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_footer_padding = get_theme_mod('movie_critic_review_footer_padding');
	if($movie_critic_review_footer_padding != false){
		$movie_critic_review_custom_css .='#footer{';
			$movie_critic_review_custom_css .='padding: '.esc_attr($movie_critic_review_footer_padding).' 0;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_footer_icon = get_theme_mod('movie_critic_review_footer_icon');
	if($movie_critic_review_footer_icon == false){
		$movie_critic_review_custom_css .='.copyright p{';
			$movie_critic_review_custom_css .='width:100%; text-align:center; float:none;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_footer_background_image = get_theme_mod('movie_critic_review_footer_background_image');
	if($movie_critic_review_footer_background_image != false){
		$movie_critic_review_custom_css .='#footer{';
			$movie_critic_review_custom_css .='background: url('.esc_attr($movie_critic_review_footer_background_image).');';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_copyright_first_color = get_theme_mod('movie_critic_review_copyright_first_color');

	$movie_critic_review_copyright_second_color = get_theme_mod('movie_critic_review_copyright_second_color');

	$movie_critic_review_copyright_third_color = get_theme_mod('movie_critic_review_copyright_third_color');

	$movie_critic_review_copyright_fourth_color = get_theme_mod('movie_critic_review_copyright_fourth_color');

	$movie_critic_review_copyright_fifth_color = get_theme_mod('movie_critic_review_copyright_fifth_color');

	if($movie_critic_review_copyright_first_color != false || $movie_critic_review_copyright_second_color != false || $movie_critic_review_copyright_third_color != false || $movie_critic_review_copyright_fourth_color != false || $movie_critic_review_copyright_fifth_color != false ){
		$movie_critic_review_custom_css .='#footer-2{
		background: linear-gradient(to right, '.esc_attr($movie_critic_review_copyright_first_color).', '.esc_attr($movie_critic_review_copyright_second_color).', '.esc_attr($movie_critic_review_copyright_third_color).', '.esc_attr($movie_critic_review_copyright_fourth_color).', '.esc_attr($movie_critic_review_copyright_fifth_color).');
		}';
	}

	$movie_critic_review_theme_lay = get_theme_mod( 'movie_critic_review_img_footer','scroll');
	if($movie_critic_review_theme_lay == 'fixed'){
		$movie_critic_review_custom_css .='#footer{';
			$movie_critic_review_custom_css .='background-attachment: fixed !important;';
		$movie_critic_review_custom_css .='}';
	}elseif ($movie_critic_review_theme_lay == 'scroll'){
		$movie_critic_review_custom_css .='#footer{';
			$movie_critic_review_custom_css .='background-attachment: scroll !important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_footer_img_position = get_theme_mod('movie_critic_review_footer_img_position','center center');
	if($movie_critic_review_footer_img_position != false){
		$movie_critic_review_custom_css .='#footer{';
			$movie_critic_review_custom_css .='background-position: '.esc_attr($movie_critic_review_footer_img_position).'!important;';
		$movie_critic_review_custom_css .='}';
	} 

	/*----------------Sroll to top Settings ------------------*/

	$movie_critic_review_scroll_to_top_font_size = get_theme_mod('movie_critic_review_scroll_to_top_font_size');
	if($movie_critic_review_scroll_to_top_font_size != false){
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='font-size: '.esc_attr($movie_critic_review_scroll_to_top_font_size).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_scroll_to_top_padding = get_theme_mod('movie_critic_review_scroll_to_top_padding');
	$movie_critic_review_scroll_to_top_padding = get_theme_mod('movie_critic_review_scroll_to_top_padding');
	if($movie_critic_review_scroll_to_top_padding != false){
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='padding-top: '.esc_attr($movie_critic_review_scroll_to_top_padding).';padding-bottom: '.esc_attr($movie_critic_review_scroll_to_top_padding).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_scroll_to_top_width = get_theme_mod('movie_critic_review_scroll_to_top_width');
	if($movie_critic_review_scroll_to_top_width != false){
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='width: '.esc_attr($movie_critic_review_scroll_to_top_width).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_scroll_to_top_height = get_theme_mod('movie_critic_review_scroll_to_top_height');
	if($movie_critic_review_scroll_to_top_height != false){
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='height: '.esc_attr($movie_critic_review_scroll_to_top_height).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_scroll_to_top_border_radius = get_theme_mod('movie_critic_review_scroll_to_top_border_radius');
	if($movie_critic_review_scroll_to_top_border_radius != false){
		$movie_critic_review_custom_css .='.scrollup i{';
			$movie_critic_review_custom_css .='border-radius: '.esc_attr($movie_critic_review_scroll_to_top_border_radius).'px;';
		$movie_critic_review_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$movie_critic_review_preloader_bg_color = get_theme_mod('movie_critic_review_preloader_bg_color');
	if($movie_critic_review_preloader_bg_color != false){
		$movie_critic_review_custom_css .='#preloader{';
			$movie_critic_review_custom_css .='background-color: '.esc_attr($movie_critic_review_preloader_bg_color).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_preloader_border_color = get_theme_mod('movie_critic_review_preloader_border_color');
	if($movie_critic_review_preloader_border_color != false){
		$movie_critic_review_custom_css .='.loader-line{';
			$movie_critic_review_custom_css .='border-color: '.esc_attr($movie_critic_review_preloader_border_color).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_preloader_bg_img = get_theme_mod('movie_critic_review_preloader_bg_img');
	if($movie_critic_review_preloader_bg_img != false){
		$movie_critic_review_custom_css .='#preloader{';
			$movie_critic_review_custom_css .='background: url('.esc_attr($movie_critic_review_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$movie_critic_review_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$movie_critic_review_logo_padding = get_theme_mod('movie_critic_review_logo_padding');
	if($movie_critic_review_logo_padding != false){
		$movie_critic_review_custom_css .='.logo{';
			$movie_critic_review_custom_css .='padding: '.esc_attr($movie_critic_review_logo_padding).' !important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_logo_margin = get_theme_mod('movie_critic_review_logo_margin');
	if($movie_critic_review_logo_margin != false){
		$movie_critic_review_custom_css .='.logo{';
			$movie_critic_review_custom_css .='margin: '.esc_attr($movie_critic_review_logo_margin).';';
		$movie_critic_review_custom_css .='}';
	}

	// Site title Font Size
	$movie_critic_review_site_title_font_size = get_theme_mod('movie_critic_review_site_title_font_size');
	if($movie_critic_review_site_title_font_size != false){
		$movie_critic_review_custom_css .='.logo p.site-title, .logo h1{';
			$movie_critic_review_custom_css .='font-size: '.esc_attr($movie_critic_review_site_title_font_size).';';
		$movie_critic_review_custom_css .='}';
	}

	// Site tagline Font Size
	$movie_critic_review_site_tagline_font_size = get_theme_mod('movie_critic_review_site_tagline_font_size');
	if($movie_critic_review_site_tagline_font_size != false){
		$movie_critic_review_custom_css .='.logo p.site-description{';
			$movie_critic_review_custom_css .='font-size: '.esc_attr($movie_critic_review_site_tagline_font_size).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_site_title_color = get_theme_mod('movie_critic_review_site_title_color');
	if($movie_critic_review_site_title_color != false){
		$movie_critic_review_custom_css .='p.site-title a, .logo h1 a{';
			$movie_critic_review_custom_css .='color: '.esc_attr($movie_critic_review_site_title_color).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_site_tagline_color = get_theme_mod('movie_critic_review_site_tagline_color');
	if($movie_critic_review_site_tagline_color != false){
		$movie_critic_review_custom_css .='.logo p.site-description{';
			$movie_critic_review_custom_css .='color: '.esc_attr($movie_critic_review_site_tagline_color).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_logo_width = get_theme_mod('movie_critic_review_logo_width');
	if($movie_critic_review_logo_width != false){
		$movie_critic_review_custom_css .='.logo img{';
			$movie_critic_review_custom_css .='width: '.esc_attr($movie_critic_review_logo_width).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_logo_height = get_theme_mod('movie_critic_review_logo_height');
	if($movie_critic_review_logo_height != false){
		$movie_critic_review_custom_css .='.logo img{';
			$movie_critic_review_custom_css .='height: '.esc_attr($movie_critic_review_logo_height).';';
		$movie_critic_review_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$movie_critic_review_preloader_bg_color = get_theme_mod('movie_critic_review_preloader_bg_color');
	if($movie_critic_review_preloader_bg_color != false){
		$movie_critic_review_custom_css .='#preloader{';
			$movie_critic_review_custom_css .='background-color: '.esc_attr($movie_critic_review_preloader_bg_color).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_preloader_border_color = get_theme_mod('movie_critic_review_preloader_border_color');
	if($movie_critic_review_preloader_border_color != false){
		$movie_critic_review_custom_css .='.loader-line{';
			$movie_critic_review_custom_css .='border-color: '.esc_attr($movie_critic_review_preloader_border_color).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$movie_critic_review_theme_lay = get_theme_mod( 'movie_critic_review_blog_layout_option','Default');
    if($movie_critic_review_theme_lay == 'Default'){
		$movie_critic_review_custom_css .='.post-main-box{';
			$movie_critic_review_custom_css .='';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_theme_lay == 'Center'){
		$movie_critic_review_custom_css .='.post-main-box, .post-main-box h2, .new-text p, .content-bttn{';
			$movie_critic_review_custom_css .='text-align:center;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.post-info{';
			$movie_critic_review_custom_css .='margin-top:10px;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.post-info hr{';
			$movie_critic_review_custom_css .='margin:15px auto;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_theme_lay == 'Left'){
		$movie_critic_review_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$movie_critic_review_custom_css .='text-align:Left;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.post-info hr{';
			$movie_critic_review_custom_css .='margin-bottom:10px;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.post-main-box h2{';
			$movie_critic_review_custom_css .='margin-top:10px;';
		$movie_critic_review_custom_css .='}';
		$movie_critic_review_custom_css .='.service-text .more-btn{';
			$movie_critic_review_custom_css .='display:inline-block;';
		$movie_critic_review_custom_css .='}';
	} 

	/*--------------------- Blog Page Posts -------------------*/

	$movie_critic_review_blog_page_posts_settings = get_theme_mod( 'movie_critic_review_blog_page_posts_settings','Into Blocks');
    if($movie_critic_review_blog_page_posts_settings == 'Without Blocks'){
		$movie_critic_review_custom_css .='.post-main-box{';
			$movie_critic_review_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$movie_critic_review_custom_css .='}';
	}

	// featured image dimention
	$movie_critic_review_blog_post_featured_image_dimension = get_theme_mod('movie_critic_review_blog_post_featured_image_dimension', 'default');
	$movie_critic_review_blog_post_featured_image_custom_width = get_theme_mod('movie_critic_review_blog_post_featured_image_custom_width',250);
	$movie_critic_review_blog_post_featured_image_custom_height = get_theme_mod('movie_critic_review_blog_post_featured_image_custom_height',250);
	if($movie_critic_review_blog_post_featured_image_dimension == 'custom'){
		$movie_critic_review_custom_css .='.post-main-box img{';
			$movie_critic_review_custom_css .='width: '.esc_attr($movie_critic_review_blog_post_featured_image_custom_width).'; height: '.esc_attr($movie_critic_review_blog_post_featured_image_custom_height).';';
		$movie_critic_review_custom_css .='}';
	}

	/*---------------- Posts Settings ------------------*/

	$movie_critic_review_featured_image_border_radius = get_theme_mod('movie_critic_review_featured_image_border_radius', 0);
	if($movie_critic_review_featured_image_border_radius != false){
		$movie_critic_review_custom_css .='.box-image img, .feature-box img{';
			$movie_critic_review_custom_css .='border-radius: '.esc_attr($movie_critic_review_featured_image_border_radius).'px;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_featured_image_box_shadow = get_theme_mod('movie_critic_review_featured_image_box_shadow',0);
	if($movie_critic_review_featured_image_box_shadow != false){
		$movie_critic_review_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$movie_critic_review_custom_css .='box-shadow: '.esc_attr($movie_critic_review_featured_image_box_shadow).'px '.esc_attr($movie_critic_review_featured_image_box_shadow).'px '.esc_attr($movie_critic_review_featured_image_box_shadow).'px #cccccc;';
		$movie_critic_review_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$movie_critic_review_button_letter_spacing = get_theme_mod('movie_critic_review_button_letter_spacing',14);
	$movie_critic_review_custom_css .='.post-main-box .more-btn{';
		$movie_critic_review_custom_css .='letter-spacing: '.esc_attr($movie_critic_review_button_letter_spacing).';';
	$movie_critic_review_custom_css .='}';

	$movie_critic_review_button_border_radius = get_theme_mod('movie_critic_review_button_border_radius');
	if($movie_critic_review_button_border_radius != false){
		$movie_critic_review_custom_css .='.post-main-box .more-btn a{';
			$movie_critic_review_custom_css .='border-radius: '.esc_attr($movie_critic_review_button_border_radius).'px;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_button_padding_top_bottom_blog = get_theme_mod('movie_critic_review_button_padding_top_bottom_blog');
	$movie_critic_review_button_padding_left_right_blog = get_theme_mod('movie_critic_review_button_padding_left_right_blog');
	if($movie_critic_review_button_padding_top_bottom_blog != false || $movie_critic_review_button_padding_left_right_blog != false){
		$movie_critic_review_custom_css .='.more-btn a{';
			$movie_critic_review_custom_css .='padding-top: '.esc_attr($movie_critic_review_button_padding_top_bottom_blog).'!important; padding-bottom: '.esc_attr($movie_critic_review_button_padding_top_bottom_blog).'!important;padding-left: '.esc_attr($movie_critic_review_button_padding_left_right_blog).'!important;padding-right: '.esc_attr($movie_critic_review_button_padding_left_right_blog).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_button_font_size = get_theme_mod('movie_critic_review_button_font_size',14);
	$movie_critic_review_custom_css .='.post-main-box .more-btn a{';
		$movie_critic_review_custom_css .='font-size: '.esc_attr($movie_critic_review_button_font_size).';';
	$movie_critic_review_custom_css .='}';

	$movie_critic_review_theme_lay = get_theme_mod( 'movie_critic_review_button_text_transform','Capitalize');
	if($movie_critic_review_theme_lay == 'Capitalize'){
		$movie_critic_review_custom_css .='.post-main-box .more-btn a{';
			$movie_critic_review_custom_css .='text-transform:Capitalize;';
		$movie_critic_review_custom_css .='}';
	}
	if($movie_critic_review_theme_lay == 'Lowercase'){
		$movie_critic_review_custom_css .='.post-main-box .more-btn a{';
			$movie_critic_review_custom_css .='text-transform:Lowercase;';
		$movie_critic_review_custom_css .='}';
	}
	if($movie_critic_review_theme_lay == 'Uppercase'){
		$movie_critic_review_custom_css .='.post-main-box .more-btn a{';
			$movie_critic_review_custom_css .='text-transform:Uppercase;';
		$movie_critic_review_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$movie_critic_review_single_blog_comment_title = get_theme_mod('movie_critic_review_single_blog_comment_title', 'Leave a Reply');
	if($movie_critic_review_single_blog_comment_title == ''){
		$movie_critic_review_custom_css .='#comments h2#reply-title {';
			$movie_critic_review_custom_css .='display: none;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_single_blog_comment_button_text = get_theme_mod('movie_critic_review_single_blog_comment_button_text', 'Post Comment');
	if($movie_critic_review_single_blog_comment_button_text == ''){
		$movie_critic_review_custom_css .='#comments p.form-submit {';
			$movie_critic_review_custom_css .='display: none;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_comment_width = get_theme_mod('movie_critic_review_single_blog_comment_width');
	if($movie_critic_review_comment_width != false){
		$movie_critic_review_custom_css .='#comments textarea{';
			$movie_critic_review_custom_css .='width: '.esc_attr($movie_critic_review_comment_width).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_single_blog_post_navigation_show_hide = get_theme_mod('movie_critic_review_single_blog_post_navigation_show_hide',true);
	if($movie_critic_review_single_blog_post_navigation_show_hide != true){
		$movie_critic_review_custom_css .='.post-navigation{';
			$movie_critic_review_custom_css .='display: none;';
		$movie_critic_review_custom_css .='}';
	}

	// Header Background Color

	$movie_critic_review_header_background_color = get_theme_mod('movie_critic_review_header_background_color');
	if($movie_critic_review_header_background_color != false){
		$movie_critic_review_custom_css .='.middle-header{';
			$movie_critic_review_custom_css .='background-color: '.esc_attr($movie_critic_review_header_background_color).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_header_img_position = get_theme_mod('movie_critic_review_header_img_position','center top');
	if($movie_critic_review_header_img_position != false){
		$movie_critic_review_custom_css .='.middle-header{';
			$movie_critic_review_custom_css .='background-position: '.esc_attr($movie_critic_review_header_img_position).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$movie_critic_review_social_icon_font_size = get_theme_mod('movie_critic_review_social_icon_font_size');
	if($movie_critic_review_social_icon_font_size != false){
		$movie_critic_review_custom_css .='#sidebar .custom-social-icons i{';
			$movie_critic_review_custom_css .='font-size: '.esc_attr($movie_critic_review_social_icon_font_size).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_social_icon_padding = get_theme_mod('movie_critic_review_social_icon_padding');
	if($movie_critic_review_social_icon_padding != false){
		$movie_critic_review_custom_css .='#sidebar .custom-social-icons i{';
			$movie_critic_review_custom_css .='padding: '.esc_attr($movie_critic_review_social_icon_padding).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_social_icon_width = get_theme_mod('movie_critic_review_social_icon_width');
	if($movie_critic_review_social_icon_width != false){
		$movie_critic_review_custom_css .='#sidebar .custom-social-icons i{';
			$movie_critic_review_custom_css .='width: '.esc_attr($movie_critic_review_social_icon_width).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_social_icon_height = get_theme_mod('movie_critic_review_social_icon_height');
	if($movie_critic_review_social_icon_height != false){
		$movie_critic_review_custom_css .='#sidebar .custom-social-icons i{';
			$movie_critic_review_custom_css .='height: '.esc_attr($movie_critic_review_social_icon_height).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_header_img_position = get_theme_mod('movie_critic_review_header_img_position','center top');
	if($movie_critic_review_header_img_position != false){
		$movie_critic_review_custom_css .='.middle-header{';
			$movie_critic_review_custom_css .='background-position: '.esc_attr($movie_critic_review_header_img_position).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_resp_menu_toggle_btn_bg_color = get_theme_mod('movie_critic_review_resp_menu_toggle_btn_bg_color');
	if($movie_critic_review_resp_menu_toggle_btn_bg_color != false){
		$movie_critic_review_custom_css .='.toggle-nav i{';
			$movie_critic_review_custom_css .='background-color: '.esc_attr($movie_critic_review_resp_menu_toggle_btn_bg_color).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$movie_critic_review_related_product_show_hide = get_theme_mod('movie_critic_review_related_product_show_hide',true);
	if($movie_critic_review_related_product_show_hide != true){
		$movie_critic_review_custom_css .='.related.products{';
			$movie_critic_review_custom_css .='display: none;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_products_padding_top_bottom = get_theme_mod('movie_critic_review_products_padding_top_bottom');
	if($movie_critic_review_products_padding_top_bottom != false){
		$movie_critic_review_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$movie_critic_review_custom_css .='padding-top: '.esc_attr($movie_critic_review_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($movie_critic_review_products_padding_top_bottom).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_products_padding_left_right = get_theme_mod('movie_critic_review_products_padding_left_right');
	if($movie_critic_review_products_padding_left_right != false){
		$movie_critic_review_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$movie_critic_review_custom_css .='padding-left: '.esc_attr($movie_critic_review_products_padding_left_right).'!important; padding-right: '.esc_attr($movie_critic_review_products_padding_left_right).'!important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_products_box_shadow = get_theme_mod('movie_critic_review_products_box_shadow');
	if($movie_critic_review_products_box_shadow != false){
		$movie_critic_review_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$movie_critic_review_custom_css .='box-shadow: '.esc_attr($movie_critic_review_products_box_shadow).'px '.esc_attr($movie_critic_review_products_box_shadow).'px '.esc_attr($movie_critic_review_products_box_shadow).'px #ccc;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_products_border_radius = get_theme_mod('movie_critic_review_products_border_radius', 0);
	if($movie_critic_review_products_border_radius != false){
		$movie_critic_review_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$movie_critic_review_custom_css .='border-radius: '.esc_attr($movie_critic_review_products_border_radius).'px;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_products_btn_padding_top_bottom = get_theme_mod('movie_critic_review_products_btn_padding_top_bottom');
	if($movie_critic_review_products_btn_padding_top_bottom != false){
		$movie_critic_review_custom_css .='.woocommerce a.button{';
			$movie_critic_review_custom_css .='padding-top: '.esc_attr($movie_critic_review_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($movie_critic_review_products_btn_padding_top_bottom).' !important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_products_btn_padding_left_right = get_theme_mod('movie_critic_review_products_btn_padding_left_right');
	if($movie_critic_review_products_btn_padding_left_right != false){
		$movie_critic_review_custom_css .='.woocommerce a.button{';
			$movie_critic_review_custom_css .='padding-left: '.esc_attr($movie_critic_review_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($movie_critic_review_products_btn_padding_left_right).' !important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_products_button_border_radius = get_theme_mod('movie_critic_review_products_button_border_radius', 0);
	if($movie_critic_review_products_button_border_radius != false){
		$movie_critic_review_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$movie_critic_review_custom_css .='border-radius: '.esc_attr($movie_critic_review_products_button_border_radius).'px;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_woocommerce_sale_position = get_theme_mod( 'movie_critic_review_woocommerce_sale_position','right');
    if($movie_critic_review_woocommerce_sale_position == 'left'){
		$movie_critic_review_custom_css .='.woocommerce ul.products li.product .onsale{';
			$movie_critic_review_custom_css .='left: -10px !important; right: auto !important;';
		$movie_critic_review_custom_css .='}';
	}else if($movie_critic_review_woocommerce_sale_position == 'right'){
		$movie_critic_review_custom_css .='.woocommerce ul.products li.product .onsale{';
			$movie_critic_review_custom_css .='left: auto !important; right: 0 !important;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_woocommerce_sale_font_size = get_theme_mod('movie_critic_review_woocommerce_sale_font_size');
	if($movie_critic_review_woocommerce_sale_font_size != false){
		$movie_critic_review_custom_css .='.woocommerce span.onsale{';
			$movie_critic_review_custom_css .='font-size: '.esc_attr($movie_critic_review_woocommerce_sale_font_size).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_woocommerce_sale_padding_top_bottom = get_theme_mod('movie_critic_review_woocommerce_sale_padding_top_bottom');
	if($movie_critic_review_woocommerce_sale_padding_top_bottom != false){
		$movie_critic_review_custom_css .='.woocommerce span.onsale{';
			$movie_critic_review_custom_css .='padding-top: '.esc_attr($movie_critic_review_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($movie_critic_review_woocommerce_sale_padding_top_bottom).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_woocommerce_sale_padding_left_right = get_theme_mod('movie_critic_review_woocommerce_sale_padding_left_right');
	if($movie_critic_review_woocommerce_sale_padding_left_right != false){
		$movie_critic_review_custom_css .='.woocommerce span.onsale{';
			$movie_critic_review_custom_css .='padding-left: '.esc_attr($movie_critic_review_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($movie_critic_review_woocommerce_sale_padding_left_right).';';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_woocommerce_sale_border_radius = get_theme_mod('movie_critic_review_woocommerce_sale_border_radius', 100);
	if($movie_critic_review_woocommerce_sale_border_radius != false){
		$movie_critic_review_custom_css .='.woocommerce span.onsale{';
			$movie_critic_review_custom_css .='border-radius: '.esc_attr($movie_critic_review_woocommerce_sale_border_radius).'px;';
		$movie_critic_review_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$movie_critic_review_display_grid_posts_settings = get_theme_mod( 'movie_critic_review_display_grid_posts_settings','Into Blocks');
    if($movie_critic_review_display_grid_posts_settings == 'Without Blocks'){
		$movie_critic_review_custom_css .='.grid-post-main-box, .grid-post-main-box .post-info , .grid-post-main-box .entry-date, .grid-post-main-box .entry-author, .grid-post-main-box .entry-comments, .grid-post-main-box .post-info span a, .grid-post-main-box span.entry-comments, .grid-post-main-box span.entry-time, .grid-post-main-box .post-info i{';
			$movie_critic_review_custom_css .='box-shadow: none; border: none; background:none;color:#fff;';
		$movie_critic_review_custom_css .='}';
	}

	/*---------------- Grid Posts Settings ------------------*/

	$movie_critic_review_grid_featured_image_border_radius = get_theme_mod('movie_critic_review_grid_featured_image_border_radius', 0);
	if($movie_critic_review_grid_featured_image_border_radius != false){
		$movie_critic_review_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img{';
			$movie_critic_review_custom_css .='border-radius: '.esc_attr($movie_critic_review_grid_featured_image_border_radius).'px;';
		$movie_critic_review_custom_css .='}';
	}

	$movie_critic_review_grid_featured_image_box_shadow = get_theme_mod('movie_critic_review_grid_featured_image_box_shadow',0);
	if($movie_critic_review_grid_featured_image_box_shadow != false){
		$movie_critic_review_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$movie_critic_review_custom_css .='box-shadow: '.esc_attr($movie_critic_review_grid_featured_image_box_shadow).'px '.esc_attr($movie_critic_review_grid_featured_image_box_shadow).'px '.esc_attr($movie_critic_review_grid_featured_image_box_shadow).'px #cccccc;';
		$movie_critic_review_custom_css .='}';
	}