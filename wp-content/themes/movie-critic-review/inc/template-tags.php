<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Movie Critic Review 
 */

if ( ! function_exists( 'movie_critic_review_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function movie_critic_review_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'movie_critic_review_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function movie_critic_review_categorized_blog() {
	if ( false === ( $movie_critic_review_all_the_cool_cats = get_transient( 'movie_critic_review_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$movie_critic_review_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$movie_critic_review_all_the_cool_cats = count( $movie_critic_review_all_the_cool_cats );

		set_transient( 'movie_critic_review_all_the_cool_cats', $movie_critic_review_all_the_cool_cats );
	}

	if ( '1' != $movie_critic_review_all_the_cool_cats ) {
		// This blog has more than 1 category so movie_critic_review_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so movie_critic_review_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'movie_critic_review_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since movie-critic-review
 */
function movie_critic_review_the_custom_logo() {	
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in movie_critic_review_categorized_blog
 */
function movie_critic_review_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'movie_critic_review_all_the_cool_cats' );
}
add_action( 'edit_category', 'movie_critic_review_category_transient_flusher' );
add_action( 'save_post',     'movie_critic_review_category_transient_flusher' );

add_theme_support( 'admin-bar', array( 'callback' => 'movie_critic_review_my_admin_bar_css') );
function movie_critic_review_my_admin_bar_css(){
?>
<style type="text/css" media="screen">	
	html body { margin-top: 0px !important; }
</style>
<?php
}

/*-- Custom metafield --*/
function movie_critic_review_custom_job_field() {
  	add_meta_box( 'bn_meta', __( 'Movie Critic Review Meta Fields', 'movie-critic-review' ), 'movie_critic_review_meta_technology_callback', 'post', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'movie_critic_review_custom_job_field');
}

function movie_critic_review_meta_technology_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'movie_critic_review_technology_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
	$meta_feature_today_date_title = get_post_meta( $post->ID, 'meta_feature_today_date_title', true );
  	$meta_feature_today_date = get_post_meta( $post->ID, 'meta_feature_today_date', true );
  	$meta_blog_user_reviews_rate = get_post_meta( $post->ID, 'meta_blog_user_reviews_rate', true );
  	$meta_blog_user_video = get_post_meta( $post->ID, 'meta_blog_user_video', true );
  	?>
  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">

   		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Director Name :', 'movie-critic-review' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="meta_feature_today_date_title" id="meta_feature_today_date_title" value="<?php echo esc_attr($meta_feature_today_date_title); ?>" />
		          	</td>
		        </tr>

		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Movie Release Year :', 'movie-critic-review' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="meta_feature_today_date" id="meta_feature_today_date" value="<?php echo esc_attr($meta_feature_today_date); ?>" />
		          	</td>
		        </tr>

   		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Reviews Rate :', 'movie-critic-review' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="meta_blog_user_reviews_rate" id="meta_blog_user_reviews_rate" value="<?php echo esc_attr($meta_blog_user_reviews_rate); ?>" />
		          	</td>
		        </tr>

		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Movie Video Link :', 'movie-critic-review' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="meta_blog_user_video" id="meta_blog_user_video" value="<?php echo esc_attr($meta_blog_user_video); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function movie_critic_review_save( $post_id ) {
  	if (!isset($_POST['movie_critic_review_technology_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['movie_critic_review_technology_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	}

	if( isset( $_POST[ 'meta_feature_today_date_title' ] ) ) {
    	update_post_meta( $post_id, 'meta_feature_today_date_title', strip_tags( wp_unslash( $_POST[ 'meta_feature_today_date_title' ]) ) );
  	}

  	if( isset( $_POST[ 'meta_feature_today_date' ] ) ) {
    	update_post_meta( $post_id, 'meta_feature_today_date', strip_tags( wp_unslash( $_POST[ 'meta_feature_today_date' ]) ) );
  	}

  	if( isset( $_POST[ 'meta_blog_user_reviews_rate' ] ) ) {
    	update_post_meta( $post_id, 'meta_blog_user_reviews_rate', strip_tags( wp_unslash( $_POST[ 'meta_blog_user_reviews_rate' ]) ) );
  	}

	if( isset( $_POST[ 'meta_blog_user_video' ] ) ) {
    	update_post_meta( $post_id, 'meta_blog_user_video', strip_tags( wp_unslash( $_POST[ 'meta_blog_user_video' ]) ) );
  	}
}
add_action( 'save_post', 'movie_critic_review_save' );

/**
 * Posts pagination.
 */
if ( ! function_exists( 'movie_critic_review_blog_posts_pagination' ) ) {
	function movie_critic_review_blog_posts_pagination() {
		$pagination_type = get_theme_mod( 'movie_critic_review_blog_pagination_type', 'blog-page-numbers' );
		if ( $pagination_type == 'blog-page-numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation();
		}
	}
}