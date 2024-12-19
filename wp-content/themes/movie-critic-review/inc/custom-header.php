<?php
/**
 * @package Movie Critic Review 
 * Setup the WordPress core custom header feature.
 *
 * @uses movie_critic_review_header_style()
*/
function movie_critic_review_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'movie_critic_review_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 70,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'movie_critic_review_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'movie_critic_review_custom_header_setup' );

if ( ! function_exists( 'movie_critic_review_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see movie_critic_review_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'movie_critic_review_header_style' );

function movie_critic_review_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .top-header, .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'movie-critic-review-basic-style', $custom_css );
	endif;
}
endif;