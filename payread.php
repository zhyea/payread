<?php

/*
Plugin Name: PayRead
Plugin URI: http://wordpress.org/plugins/read-pay/
Description: pay for content with paypal.
Version: 1.0
Author: Robin Zhang
Author URI: http://www.zhyea.com
License: Apache License
*/

if ( !function_exists( 'add_action' ) ) {
    echo 'PayRead is just a plugin.';
    exit;
}

define('PAYREAD_VERSION', '1.1');
define('PAYREAD_URL', plugins_url('', __FILE__));
define('PAYREAD_PATH', dirname( __FILE__ ));
define('PAYREAD_ADMIN_URL', admin_url());


global $wpdb, $payread_table;

$payread_table = isset($table_prefix) ? ($table_prefix . 'payread') : ($wpdb->prefix . 'payread');