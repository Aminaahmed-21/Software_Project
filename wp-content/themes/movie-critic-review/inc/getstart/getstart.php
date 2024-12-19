<?php
//about theme info
add_action( 'admin_menu', 'movie_critic_review_gettingstarted' );
function movie_critic_review_gettingstarted() {
	add_theme_page( esc_html__('About Movie Critic Review ', 'movie-critic-review'), esc_html__('About Movie Critic Review ', 'movie-critic-review'), 'edit_theme_options', 'movie_critic_review_guide', 'movie_critic_review_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function movie_critic_review_admin_theme_style() {
	wp_enqueue_style('movie-critic-review-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('movie-critic-review-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'movie_critic_review_admin_theme_style');

//guidline for about theme
function movie_critic_review_mostrar_guide() { 
	$movie_critic_review_return = add_query_arg( array()) ;
	$movie_critic_review_theme = wp_get_theme( 'movie-critic-review' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Movie Critic Review ', 'movie-critic-review' ); ?> <span class="version"><?php esc_html_e( 'Version', 'movie-critic-review' ); ?>: <?php echo esc_html($movie_critic_review_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','movie-critic-review'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Movie Critic Review at 20% Discount','movie-critic-review'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','movie-critic-review'); ?> ( <span><?php esc_html_e('vwpro20','movie-critic-review'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url(MOVIE_CRITIC_REVIEW_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'movie-critic-review' ); ?></a>
			</div>
		</div>
	</div>


    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="movie_critic_review_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'movie-critic-review' ); ?></button>
			<button class="tablinks" onclick="movie_critic_review_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'movie-critic-review' ); ?></button>
			<button class="tablinks" onclick="movie_critic_review_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'movie-critic-review' ); ?></button>
			<button class="tablinks" onclick="movie_critic_review_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'movie-critic-review' ); ?></button>
			<button class="tablinks" onclick="movie_critic_review_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'movie-critic-review' ); ?></button>
		  	<button class="tablinks" onclick="movie_critic_review_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'movie-critic-review' ); ?></button>
		</div>

		<?php
			$movie_critic_review_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$movie_critic_review_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Movie_Critic_Review_Plugin_Activation_Settings::get_instance();
				$movie_critic_review_actions = $plugin_ins->recommended_actions;
				?>
				<div class="movie-critic-review-recommended-plugins">
				    <div class="movie-critic-review-action-list">
				        <?php if ($movie_critic_review_actions): foreach ($movie_critic_review_actions as $key => $movie_critic_review_actionValue): ?>
				                <div class="movie-critic-review-action" id="<?php echo esc_attr($movie_critic_review_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($movie_critic_review_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($movie_critic_review_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($movie_critic_review_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','movie-critic-review'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($movie_critic_review_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'movie-critic-review' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('Movie Critic Review is a specialized and visually captivating solution designed for movie critics, film enthusiasts, and review websites. The theme comes with a unique design and provides an ideal platform to share insightful movie reviews and engage with a dedicated audience. It also comes with comprehensive features, and user-friendly customization options that help movie critics create a stunning website all by themselves. The Movie Critic Review WordPress theme offers a visually striking and immersive design that captures the essence of the cinematic world. Its eye-catching layout and dynamic elements create an engaging browsing experience for visitors, inviting them to explore movie reviews and discover new films. The theme provides dedicated sections for showcasing featured reviews, latest releases, top-rated movies, and upcoming films, making it easy for users to navigate and access the content they are interested in. Movie Critic Review includes a powerful review rating system, allowing critics to rate movies based on various criteria such as plot, acting, cinematography, and overall impression. The theme provides options to display detailed movie information, including cast and crew details, release dates, genre, and synopsis. Users can easily navigate through different movie categories and search for specific films, enhancing the overall user experience.','movie-critic-review'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'movie-critic-review' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'movie-critic-review' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'movie-critic-review' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'movie-critic-review'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'movie-critic-review'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'movie-critic-review'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'movie-critic-review'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'movie-critic-review'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'movie-critic-review'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'movie-critic-review'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'movie-critic-review'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'movie-critic-review'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'movie-critic-review' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','movie-critic-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','movie-critic-review'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','movie-critic-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_featured_section') ); ?>" target="_blank"><?php esc_html_e('Featured Section','movie-critic-review'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','movie-critic-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','movie-critic-review'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','movie-critic-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','movie-critic-review'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','movie-critic-review'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','movie-critic-review'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','movie-critic-review'); ?></span><?php esc_html_e(' Go to ','movie-critic-review'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','movie-critic-review'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','movie-critic-review'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','movie-critic-review'); ?></span><?php esc_html_e(' Go to ','movie-critic-review'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','movie-critic-review'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','movie-critic-review'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','movie-critic-review'); ?> <a class="doc-links" href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','movie-critic-review'); ?></a></p>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$plugin_ins = movie_critic_review_Plugin_Activation_Settings::get_instance();
				$movie_critic_review_actions = $plugin_ins->recommended_actions;
				?>
				<div class="movie-critic-review-recommended-plugins">
				    <div class="movie-critic-review-action-list">
				        <?php if ($movie_critic_review_actions): foreach ($movie_critic_review_actions as $key => $movie_critic_review_actionValue): ?>
				                <div class="movie-critic-review-action" id="<?php echo esc_attr($movie_critic_review_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($movie_critic_review_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($movie_critic_review_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($movie_critic_review_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','movie-critic-review'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($movie_critic_review_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'movie-critic-review' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','movie-critic-review'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon.','movie-critic-review'); ?></b></p>
	              	<div class="movie-critic-review-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','movie-critic-review'); ?></a>
				    </div>
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    <p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Sections >> Publish.','movie-critic-review'); ?></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'movie-critic-review' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','movie-critic-review'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','movie-critic-review'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','movie-critic-review'); ?></a>
							</div>

							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','movie-critic-review'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','movie-critic-review'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','movie-critic-review'); ?></a>
							</div>
						</div>
					</div>
				</div>
	     	</div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Movie_Critic_Review_Plugin_Activation_Settings::get_instance();
			$movie_critic_review_actions = $plugin_ins->recommended_actions;
			?>
				<div class="movie-critic-review-recommended-plugins">
				    <div class="movie-critic-review-action-list">
				        <?php if ($movie_critic_review_actions): foreach ($movie_critic_review_actions as $key => $movie_critic_review_actionValue): ?>
				                <div class="movie-critic-review-action" id="<?php echo esc_attr($movie_critic_review_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($movie_critic_review_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($movie_critic_review_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($movie_critic_review_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'movie-critic-review' ); ?></h3>
				<hr class="h3hr">
				<div class="movie-critic-review-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','movie-critic-review'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'movie-critic-review' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','movie-critic-review'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','movie-critic-review'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','movie-critic-review'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','movie-critic-review'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=movie_critic_review_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','movie-critic-review'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','movie-critic-review'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Movie_Critic_Review_Plugin_Activation_Woo_Products::get_instance();
				$movie_critic_review_actions = $plugin_ins->recommended_actions;
				?>
				<div class="movie-critic-review-recommended-plugins">
				    <div class="movie-critic-review-action-list">
				        <?php if ($movie_critic_review_actions): foreach ($movie_critic_review_actions as $key => $movie_critic_review_actionValue): ?>
				                <div class="movie-critic-review-action" id="<?php echo esc_attr($movie_critic_review_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($movie_critic_review_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($movie_critic_review_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($movie_critic_review_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'movie-critic-review' ); ?></h3>
				<hr class="h3hr">
				<div class="movie-critic-review-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','movie-critic-review'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','movie-critic-review'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','movie-critic-review'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','movie-critic-review'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','movie-critic-review'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','movie-critic-review'); ?></b></p>
	              	<div class="movie-critic-review-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','movie-critic-review'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','movie-critic-review'); ?></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'movie-critic-review' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Movie Review WordPress Theme is the perfect solution for anyone looking to create a professional and engaging movie review website. With its sleek design and powerful features, this theme will captivate your audience and provide an immersive movie review experience. This theme is carefully crafted to highlight movie reviews, featuring a clean and modern layout that showcases your content in an elegant and organized manner. Whether you’re a film critic, a movie enthusiast, or a blogger wanting to share your thoughts on the latest blockbusters, the Movie Review WordPress Theme will meet all your needs. With this theme, you have full control over your website’s appearance and functionality. It offers customizable options, allowing you to personalize the design to match your brand or style. You can easily showcase movie posters, trailers, ratings, and insightful reviews, all in one place.','movie-critic-review'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'movie-critic-review'); ?></a>
					<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'movie-critic-review'); ?></a>
					<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'movie-critic-review'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'movie-critic-review' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'movie-critic-review'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'movie-critic-review'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'movie-critic-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'movie-critic-review'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'movie-critic-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'movie-critic-review'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'movie-critic-review'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'movie-critic-review'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'movie-critic-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'movie-critic-review'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'movie-critic-review'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'movie-critic-review'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'movie-critic-review'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'movie-critic-review'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'movie-critic-review'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'movie-critic-review'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'movie-critic-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'movie-critic-review'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'movie-critic-review'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'movie-critic-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'movie-critic-review'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'movie-critic-review'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'movie-critic-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'movie-critic-review'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'movie-critic-review'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'movie-critic-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','movie-critic-review'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'movie-critic-review'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'movie-critic-review'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( MOVIE_CRITIC_REVIEW_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'movie-critic-review'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>