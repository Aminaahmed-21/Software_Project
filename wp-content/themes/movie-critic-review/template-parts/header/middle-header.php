<?php
/**
 * The template part for Top Header
 *
 * @package Movie Critic Review 
 * @subpackage movie-critic-review
 * @since movie-critic-review 1.0
 */
?>

<div class="middle-header"> 
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-3 col-12 align-self-center text-md-start text-lg-start text-center py-lg-2 py-md-1"> 
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <?php if( get_theme_mod('movie_critic_review_logo_title_hide_show',true) == 1){ ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } ?>
                  <?php else : ?>
                    <?php if( get_theme_mod('movie_critic_review_logo_title_hide_show',true) == 1){ ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php } ?>
                  <?php endif; ?> 
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('movie_critic_review_tagline_hide_show',false) == 1){ ?>
                  <p class="site-description mb-0">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php } ?>
            <?php endif; ?> 
        </div>
      </div>
      <div class="col-lg-6 col-md-2 align-self-center py-lg-2 py-md-1">
        <div class="menu-section">
          <?php get_template_part('template-parts/header/navigation'); ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-5 align-self-center py-lg-2 py-md-1">
        <div class="search-box">
          <?php get_search_form(); ?>
        </div>
      </div>
      <div class="col-lg-1 col-md-2 col-12 align-self-center py-lg-2 py-md-1 py-3 text-lg-end text-md-end text-center">
        <div class="account">
          <a class="" href="<?php echo esc_url(get_theme_mod('movie_critic_review_account_btn_link',''));?>"><i class="fas fa-user"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>