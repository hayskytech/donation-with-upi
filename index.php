<?php
/**
 * Plugin Name: #Donation with UPI
 * Plugin URI: https://haysky.com/
 * Description: [donation_qr] Use this shortcode to display QR Code in any page or post.
 * Version: 1.0.0
 * Author: Haysky
 * Author URI: https://haysky.com/
 * License: GPLv2 or later
  */
// $wpdb->show_errors(); $wpdb->print_error();
// error_reporting(E_ERROR | E_PARSE);
add_action('init',function(){
    $slug = get_option('upi_slug');
    if (!$slug) {
        $slug = 'pay';
    }
    if (isset($_GET[$slug])) {
        $pa = get_option('upi_link');
        $pn = get_option('payee_name');
        $opt_amount = get_option("amount");
        $am = $opt_amount ? $opt_amount : $_GET[$slug];
        $url = 'upi://pay?pa='.$pa.'&pn='.$pn.'&cu=INR&am='.$am;
        if ( wp_redirect( $url ) ) {
            exit;
        }
    }
});

add_action('admin_menu' , function(){
    add_menu_page('Donation Options','Donation Options','manage_options', 'donation_options_admin', 'donation_options_ium', 'dashicons-admin-users','2');
});

function donation_options_ium(){ include 'donation_options.php'; }


add_shortcode('donation_qr',function(){ 
    ob_start();
    include 'donation_qr.php'; 
    return ob_get_clean();
});
