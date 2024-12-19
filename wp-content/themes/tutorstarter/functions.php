<?php
/**
 * Handles loading all the necessary files
 *
 * @package Tutor_Starter
 */

defined( 'ABSPATH' ) || exit;

// Content width.
if ( ! isset( $content_width ) ) {
	$content_width = apply_filters( 'tutorstarter_content_width', get_theme_mod( 'content_width_value', 1140 ) );
}

// Theme GLOBALS.
$theme = wp_get_theme();
define( 'TUTOR_STARTER_VERSION', $theme->get( 'Version' ) );

// Load autoloader.
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

// Include TGMPA class.
if ( file_exists( dirname( __FILE__ ) . '/inc/Custom/class-tgm-plugin-activation.php' ) ) :
	require_once dirname( __FILE__ ) . '/inc/Custom/class-tgm-plugin-activation.php';
endif;

// Register services.
if ( class_exists( 'Tutor_Starter\\Init' ) ) :
	Tutor_Starter\Init::register_services();
endif;

// Add Qualification Field to Instructor and Student Registration Forms
function custom_registration_fields(){
    ?>

    <div class="tutor-form-col-6">
        <div class="tutor-form-group">
            <label>
                <?php esc_html_e( 'Qualification', 'tutor' ); ?>
            </label>

            <textarea name="qualification" rows="4" placeholder="<?php esc_attr_e( 'Enter your qualifications', 'tutor' ); ?>"><?php echo esc_textarea( tutor_utils()->input_old( 'qualification' ) ); ?></textarea>
        </div>
    </div>

    <?php
}
// Add to Instructor Registration Form
add_action( 'tutor_instructor_reg_form_end', 'custom_registration_fields' );

// Add to Student Registration Form
add_action( 'tutor_student_reg_form_end', 'custom_registration_fields' );

// Make Qualification Field Required for Both
function required_qualification_field( $atts ){
    $atts['qualification'] = esc_html__( 'Qualification field is required', 'tutor' );
    return $atts;
}
add_filter( 'tutor_instructor_registration_required_fields', 'required_qualification_field' );
add_filter( 'tutor_student_registration_required_fields', 'required_qualification_field' );

// Save Qualification Field Data
function save_qualification_field_values( $user_id ){
    if ( ! empty( $_POST['qualification'] ) ) {
        $qualification = sanitize_textarea_field( $_POST['qualification'] );
        update_user_meta( $user_id, '_qualification', $qualification );
    }
}
add_action( 'user_register', 'save_qualification_field_values' );
add_action( 'profile_update', 'save_qualification_field_values' );

// Show Qualification Field in Profile Edit Form (Instructor and Student)
function show_qualification_field_info( $user ){
    $qualification = get_user_meta( $user->ID, '_qualification', true );
    ?>

    <div class="tutor-row">
        <div class="tutor-col-12 tutor-col-sm-6 tutor-col-md-12 tutor-col-lg-6 tutor-mb-32">
            <label class="tutor-form-label tutor-color-secondary">
                <?php esc_html_e( 'Qualification', 'tutor' ); ?>
            </label>
            <textarea class="tutor-form-control" name="qualification" rows="4" placeholder="<?php esc_attr_e( 'Enter your qualifications', 'tutor' ); ?>"><?php echo esc_textarea( $qualification ); ?></textarea>
        </div>
    </div>

    <?php
}
function handle_custom_form_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_form'])) {
        global $wpdb;

        // Sanitize form inputs
        $name    = isset($_POST['fname']) ? sanitize_text_field($_POST['fname']) : '';
        $email   = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
        $subject = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '';
        $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

        // Ensure all required fields are filled
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            echo '<p>Please fill in all fields.</p>';
            return;
        }

        // Define the table name
        $table_name = 'contact_form_data';

        // Insert data into the table
        $wpdb->insert(
            $table_name,
            array(
                'name'    => $name,
                'email'   => $email,
                'subject' => $subject,
                'message' => $message,
                'date'    => current_time('mysql')
            )
        );

        // Display a success message
        echo '<p>Thank you for your submission! We will get back to you soon.</p>';
    }
}
add_action('init', 'handle_custom_form_submission');
add_filter('woocommerce_is_sold_individually', '__return_true');

