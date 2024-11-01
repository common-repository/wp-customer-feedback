<?php

defined('ABSPATH') or die("No script kiddies please!");

class ENDUAL_CUSTOMER_FEEDBACK_ADMIN {

  function __construct() {
    if( is_admin() ) {
      global $endualcf_settings_page;
      add_action( 'admin_menu', array( $this, 'endualcf_add_options_link' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'endualcf_enqueue_color_picker' ) );
    }
  }


  function endualcf_enqueue_color_picker( $hook ) {
    global $endualcf_settings_page;
    if ( $hook != $endualcf_settings_page ) { return; }

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'endualcf-admin-css', plugins_url( '/css/feedback.css', __FILE__ ) );
    wp_enqueue_script( 'endualcf-admin-script', plugins_url( '/js/admin.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '1.3.0', true );
  }


  function endualcf_add_options_link() {
    global $endualcf_settings_page;

    $endualcf_settings_page = add_options_page(
      'Customer Feedback Shortcode Generator',
      'WP Customer Feedback',
      'manage_options',
      'wp-customer-feedback-options',
      array( $this, 'endualcf_options_page' )
    );
  }


  function endualcf_options_page() {
    ob_start(); ?>
    <div class="wrap">
      <h2>WP Customer Feedback shortcode generator</h2>
      <h3>Walk through video</h3>
      <a href="//fast.wistia.net/embed/iframe/cj34mg9sbp?popover=true" class="wistia-popover[height=421,playerColor=7b796a,width=640]"><img src="http://embed-0.wistia.com/deliveries/938c57981edacf359a158b49b43f5bb1f664fda3.jpg?image_play_button=true&image_play_button_color=7b796ae0&image_crop_resized=150x99" alt="" /></a>
      <script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>
      <form>
        <div class="endualcf-admin-imput">
          <label class=".endualcf-admin-label" for="endualcf_color"><?php _e('Title Bar Color', 'endualcf_domain'); ?></label>
          <br />
          <input class="endualcf_color" name="endualcf_color" type="text" value="#ED5100" />
        </div>

        <div class="endualcf-admin-imput">
          <label class=".endualcf-admin-label" for="endualcf_title"><?php _e('Title', 'endualcf_domain'); ?></label>
          <br />
          <input id="endualcf_title" class="endualcf-text-input" name="endualcf_title" type="text" placeholder="How did you find us?" />
        </div>

        <div class="endualcf-admin-imput">
          <label class=".endualcf-admin-label" for="endualcf_question"><?php _e('Question (defaults to match the title)', 'endualcf_domain'); ?></label>
          <br />
          <input id="endualcf_question" class="endualcf-text-input" name="endualcf_question" type="text" placeholder="How did you find us?" value="" />
        </div>

        <div class="endualcf-admin-imput">
          <label class=".endualcf-admin-label" for="endualcf_email"><?php _e("Email (text to request user's email address)", 'endualcf_domain'); ?></label>
          <br />
          <input id="endualcf_email" class="endualcf-text-input" name="endualcf_email" type="text" placeholder="<?php _e('Your email address?', 'endualcf_domain'); ?>" />
        </div>

        <div class="endualcf-admin-imput">
          <label class=".endualcf-admin-label" for="endualcf_submit"><?php _e('Submit button title', 'endualcf_domain'); ?></label>
          <br />
          <input id="endualcf_submit" class="endualcf-text-input" name="endualcf_submit" type="text" placeholder="<?php _e('Submit', 'endualcf_domain'); ?>" />
        </div>

        <div class="endualcf-admin-imput">
          <label class=".endualcf-admin-label" for="endualcf_thankyou"><?php _e('Thankyou message (brief thankyou after user submits feedback', 'endualcf_domain'); ?></label>
          <br />
          <input id="endualcf_thankyou" class="endualcf-text-input" name="endualcf_thankyou" type="text" placeholder="<?php _e('Thanks for the feedback!', 'endualcf_domain'); ?>" />
        </div>

        <div class="endualcf-admin-imput">
          <label class=".endualcf-admin-label" for="endualcf_delay"><?php _e('Delay (seconds before the panel slides in)', 'endualcf_domain'); ?></label>
          <br />
          <input id="endualcf_delay" class="endualcf-text-input" type="text" placeholder="0" />
        </div>
      </div>
    </form>
    <div class="wrap">
      <h2>Generated Shortcode</h2>
      <form>
        <input id="endualcf-shortcode" class="endualcf-text-input" type="text-field" value='[get-feedback]' />
      </form>
      <h4>Copy and paste the above Shortcode into your page or post</h4>
    </div>
    <?php
    echo ob_get_clean();
  }

}

new ENDUAL_CUSTOMER_FEEDBACK_ADMIN;