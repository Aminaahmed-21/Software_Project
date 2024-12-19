<?php
/**
 * The template part for header
 *
 * @package Movie Critic Review  
 * @subpackage movie-critic-review
 * @since movie-critic-review 1.0
 */
?>

<div id="header">
    <div class="toggle-nav mobile-menu text-lg-end text-md-center text-center">
      <button role="tab" onclick="movie_critic_review_menu_open_nav()" class="responsivetoggle"><i class="<?php echo esc_attr(get_theme_mod('movie_critic_review_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','movie-critic-review'); ?></span></button>
    </div>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'movie-critic-review' ); ?>">
      <?php
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
      ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="movie_critic_review_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('movie_critic_review_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','movie-critic-review'); ?></span></a>
    </nav>
  </div>
</div>