<?php
/**
 *
 * Plugin Name: WP Customer Feedback
 * Plugin URI: http://endual.com/wp-customer-feedback/
 * Description: Simple way to get user feedback for your site
 * Version: 1.3.0
 * Author: Adrian Gray
 * Author URI: http://endual.com/about-adrian-gray/
 * License: GPLv2
 */

/**
 *  Copyright 2015 Adrian Gray (email : adrian@endual.com)
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License, version 2, as
 *  published by the Free Software Foundation.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined('ABSPATH') or die("No script kiddies please!");

include('admin-page.php'); // the plugin options page HTML and save functions

class ENDUAL_CUSTOMER_FEEDBACK {

  function __construct() {
    add_shortcode( 'get-feedback', array( $this, 'feedback_cb' ) );
    add_action( 'wp_ajax_process_form_data' , array( $this, 'process_form_data' ) );
    add_action( 'wp_ajax_nopriv_process_form_data' , array( $this, 'process_form_data' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
  }


  function enqueue_scripts() {
    if ( isset( $_COOKIE['wp-customer-feedback'] ) ) {
      return;
    }
    wp_enqueue_style(   'endual-feedback', plugins_url( '/css/feedback.css', __FILE__ ) );
    wp_register_script( 'endual-feedback', plugins_url( '/js/feedback.js', __FILE__ ), array( 'jquery' ), '1.3.0', true);
  }


  function feedback_cb( $atts, $content ) {

    if ( isset($hasBeenCalled) ) { return; }
    static $hasBeenCalled = TRUE;

    $atts = shortcode_atts(
      array(
        'color'    => '#ED5100',
        'title'    => 'How did you find us?',
        'question' => '',
        'email'    => 'Your email address?',
        'submit'   => 'Submit',
        'delay'    => '0',
        'thankyou' => 'Thanks for the feedback!',
        'ajaxurl'  => admin_url( 'admin-ajax.php' )
      ), $atts
    );

    if( $atts[ 'question' ] == '') {
      $atts[ 'question' ] = $atts[ 'title' ];
    }

    wp_localize_script( 'endual-feedback', 'endual', $atts );
    wp_enqueue_script( 'endual-feedback' );
  }


  function process_form_data() {
    $cookie = setcookie('wp-customer-feedback');
    if ( isset( $_POST['comment'] ) ) {
      $comment = implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $_POST['comment'] ) ) );
      $email = sanitize_text_field( $_POST["email"] );
      if ( $email == '' ) {
        $message = "no email\n";
      } else {
        $message = "from: $email\n";
      }
      $message .= "----------------------------\n";
      $message .= "comment:\n\n";
      $message .= stripslashes($comment);
      $to = get_option( 'admin_email' );
      $header = 'From: '.get_bloginfo('name').' <'.get_option( 'admin_email' ).'>';
      $subject = 'New feedback for ' . get_option( 'blogname' );
      wp_mail($to, $subject, $message, $header);
    }
    die();
  }
}

new ENDUAL_CUSTOMER_FEEDBACK;