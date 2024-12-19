<?php
/**
 * The template part for Top Header
 *
 * @package Movie Critic Review 
 * @subpackage movie-critic-review
 * @since movie-critic-review 1.0
 */
?>
<!-- Top Header -->
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-6 col-12 topbar-left align-self-center text-md-start text-lg-start text-center">
        <?php if( get_theme_mod('movie_critic_review_topbar_text') != '' || get_theme_mod('movie_critic_review_topbar_text_click') != '' || get_theme_mod('movie_critic_review_topbar_link') != ''){ ?>
          <div class="header-text">
            <span class="badge"><?php echo esc_html('New','movie-critic-review');?></span>
            <span class="long-text"><?php echo esc_html(get_theme_mod('movie_critic_review_topbar_text',''));?></span><a class="link-text" href="<?php echo esc_url(get_theme_mod('movie_critic_review_topbar_link',''));?>"><?php echo esc_html(get_theme_mod('movie_critic_review_topbar_text_click',''));?></span></a>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-6 col-12 text-lg-end text-md-end text-center align-self-center topbar-col">
        <div class="social-icons">
          <?php dynamic_sidebar('social-widget'); ?>
        </div>
      </div>
    </div>
  </div> 
</div> 