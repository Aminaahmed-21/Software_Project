<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'movie_critic_review_before_slider' ); ?>

  <?php if( get_theme_mod( 'movie_critic_review_slider_hide_show', false) == 1 || get_theme_mod( 'movie_critic_review_resp_slider_hide_show', true) == 1) { ?> 
    <section id="slider">
      <?php if(get_theme_mod('movie_critic_review_slider_type', 'Default slider') == 'Default slider' ){ ?>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'movie_critic_review_slider_speed',4000)) ?>">
          <?php $movie_critic_review_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'movie_critic_review_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $movie_critic_review_pages[] = $mod;
              }
            }
            if( !empty($movie_critic_review_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $movie_critic_review_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <?php if( get_theme_mod('movie_critic_review_slider_small_title') != '' ){ ?>
                    <div class="wow slideInLeft delay-1000" data-wow-duration="2s">
                      <span class="slider-badge mb-1"><?php echo esc_html(get_theme_mod('movie_critic_review_slider_small_title',''));?></span>
                    </div>
                    <?php }?>
                    <h1 class="wow slideInLeft delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <p class="wow slideInLeft delay-1000" data-wow-duration="2s"><?php $movie_critic_review_excerpt = get_the_excerpt(); echo esc_html( movie_critic_review_string_limit_words( $movie_critic_review_excerpt, esc_attr(get_theme_mod('movie_critic_review_slider_excerpt_number','30')))); ?></p>
                    <div class="slider-btn wow slideInLeft delay-1000" data-wow-duration="2s">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html('Read Reviews','movie-critic-review');?><span class="screen-reader-text"><?php echo esc_html('Read Reviews','movie-critic-review');?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <?php if(get_theme_mod('movie_critic_review_slider_arrow_hide_show', true)){?>
            <a class="carousel-control-prev" data-bs-target="#carouselExampleInterval" data-bs-slide="prev" role="button">
              <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('movie_critic_review_slider_prev_icon','fas fa-angle-left')); ?>"></i></span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carouselExampleInterval" data-bs-slide="next" role="button">
              <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="<?php echo esc_attr(get_theme_mod('movie_critic_review_slider_next_icon','fas fa-angle-right')); ?>"></i></span>
            </a>
          <?php }?>
        </div> 
      <?php } else if(get_theme_mod('movie_critic_review_slider_type', 'Advance slider') == 'Advance slider'){?>
        <?php echo do_shortcode(get_theme_mod('movie_critic_review_advance_slider_shortcode')); ?>
      <?php } ?>
    </section>
  <?php }?>

  <?php do_action( 'movie_critic_review_after_slider' ); ?>

<!-- featured Section -->
  <?php if( get_theme_mod( 'movie_critic_review_featured_heading')|| get_theme_mod( 'movie_critic_review_featured_small_title') || get_theme_mod( 'movie_critic_review_featured_category')) { ?>
    <section id="featured-section" class="pt-5 wow bounceInDown delay-1000 container" data-wow-duration="3s">
      <div class="container-fluid px-0">
        <?php if( get_theme_mod('movie_critic_review_featured_heading') != '' ){ ?>
          <h2 class="text-center heading-text"><?php echo esc_html(get_theme_mod('movie_critic_review_featured_heading',''));?></h2>
        <?php }?>
        <hr>
        <?php if( get_theme_mod('movie_critic_review_featured_small_title') != '' ){ ?>
          <p class="text-center d-block"><?php echo esc_html(get_theme_mod('movie_critic_review_featured_small_title',''));?></p>
        <?php }?>
      </div>
      <div class="row">
        <?php 
        $catData=  get_theme_mod('movie_critic_review_video_category');
        if($catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'movie-critic-review')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-3 col-md-6">
              <div class="video-box">
                <?php the_post_thumbnail(); ?>
                <div class="ratings-star-sec">
                  <div class="d-flex justify-content-between ratings-star-setting">
                    <?php if( get_post_meta($post->ID,'meta_blog_user_video', true) !='' ){?>
                      <button class="popup-btn">
                        <div class="video">
                          <a class="video_icon">
                            <i class="fas fa-play-circle"></i>
                            <span class="video-icon-text">
                              <?php echo esc_html(get_theme_mod('movie_critic_review_feature_today_video_icon_text')); ?>
                            </span> 
                          </a>
                        </div>
                      </button>
                      <input type="hidden" name="video-url" value="<?php echo esc_html(get_post_meta($post->ID,'meta_blog_user_video',true)); ?>">
                    <?php }?>
                    <?php if( get_post_meta($post->ID, 'meta_blog_user_reviews_rate', true) ) {?>
                      <div class="rating text-end">
                        <span><i class="fa fa-star me-2" aria-hidden="true"></i><?php echo get_post_meta($post->ID,'meta_blog_user_reviews_rate',true) ?></span>
                      </div>
                    <?php }  ?>
                  </div>
                </div>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                <?php if( get_post_meta($post->ID, 'meta_feature_today_date_title', true) ) {?>
                <span class="lable-title mr-4"><?php echo esc_html(get_post_meta($post->ID,'meta_feature_today_date_title',true)); ?>
                <span class="seperator"><?php echo esc_html(get_theme_mod('movie_critic_review_meta_field_separator_text', '.'));?></span>
                </span>
              <?php }?>
                <?php if( get_post_meta($post->ID, 'meta_feature_today_date', true) ) {?>
                  <span class="lable-text"><?php echo esc_html(get_post_meta($post->ID,'meta_feature_today_date',true)); ?></span>
                <?php }?>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>  
      <div class="video-popup">
        <div class="popup-content">
          <embed src="" class="lable-video mr-4"></embed>
          <button class="close-btn">
            <a href=""><?php echo esc_html('Close','movie-critic-review');?><span class="screen-reader-text"><?php echo esc_html('Close','movie-critic-review');?></span></a>
          </button>
        </div>
      </div>
    </section>
  <?php }?>

<?php do_action( 'movie_critic_review_after_featured_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>