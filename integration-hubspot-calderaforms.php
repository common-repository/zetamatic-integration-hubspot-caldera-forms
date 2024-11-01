<?php
/**
 * Plugin Name: Integration of HubSpot and Caldera Forms
 * Plugin URI:  https://zetamatic.com
 * Description: The HubSpot and Caldera Forms Integration plugin lets you add a new HubSpot Processor to Caldera form. It automatically syncs data from your Caldera form to your HubSpot CRM when the form is submitted.
 * Version:     1.0.7
 * Author:      ZetaMatic
 * Author URI: https://zetamatic.com/?utm_src=zetamatic-integration-hubspot-caldera-forms
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: integration-hubspot-calderaforms
 * Domain Path: /languages
 * Tested up to: 5.7
 *
 * @package integration-hubspot-calderaforms
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'IHCF_PLUGIN_FILE' ) ) {
	define( 'IHCF_PLUGIN_FILE', __FILE__ );
}


// Define plugin version
define( 'IHCF_VERSION', '1.0.7' );
define( 'WPCFHS_PLUGIN_PATH', dirname(__FILE__) );


if ( ! version_compare( PHP_VERSION, '5.6', '>=' ) ) {
	add_action( 'admin_notices', 'ihcf_fail_php_version' );
} else {
	// Include the IHCF class.
	require_once dirname( __FILE__ ) . '/inc/class-integration-hubspot-calderaforms.php';
}


/**
 * Admin notice for minimum PHP version.
 *
 * Warning when the site doesn't have the minimum required PHP version.
 *
 * @since 0.0.1
 *
 * @return void
 */
function ihcf_fail_php_version() {

	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}

	/* translators: %s: PHP version */
	$message      = sprintf( esc_html__( 'Integration of HubSpot and Caldera Forms requires PHP version %s+, plugin is currently NOT RUNNING.', 'integration-hubspot-calderaforms' ), '5.6' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}
if(!function_exists('wpcfhs_activate')) {
  function wpcfhs_activate() {
    if(function_exists('ihcf_fail_php_version_pro')) {
      require(WPCFHS_PLUGIN_PATH . "/inc/plugin-activation-error.php");
      exit;
    }
  }
  register_activation_hook( __FILE__, 'wpcfhs_activate' );
}

if(get_option("wpcfhs_disable_pro_notice") != "YES"){
	add_action( 'admin_notices', 'wpcfhs_download_pro_plugin' );
}
add_action( 'wp_ajax_wpcfhs_hide_pro_notice', 'wpcfhs_hide_pro_notice' );

define( 'WPCFHS_PLUGIN_NAME', 'Integration of HubSpot and Caldera Forms' );
function wpcfhs_download_pro_plugin() {
	$class = 'notice notice-warning is-dismissible wpcfhs-notice-buy-pro';
	$plugin_url = 'https://zetamatic.com/downloads/caldera-forms-hubspot-integration-pro/';
	$message = __( 'Glad to know that you are already using our '.WPCFHS_PLUGIN_NAME.'. Do you want send data from your Caldera form dynamically to HubSpot? Then please visit <a href="'.$plugin_url.'?utm_src='.WPCFHS_PLUGIN_NAME.'" target="_blank">here</a>.', 'integration-hubspot-calderaforms' );
	$dont_show = __( "Don't show this message again!", 'integration-hubspot-calderaforms' );
	printf( '<div class="%1$s"><p>%2$s</p><p><a href="javascript:void(0);" class="wpcfhs-hide-pro-notice">%3$s</a></p></div>
	<script type="text/javascript">
		(function () {
			jQuery(function () {
				jQuery("body").on("click", ".wpcfhs-hide-pro-notice", function () {
					jQuery(".wpcfhs-notice-buy-pro").hide();
					jQuery.ajax({
						"type": "post",
						"dataType": "json",
						"url": ajaxurl,
						"data": {
							"action": "wpcfhs_hide_pro_notice"
						},
						"success": function(response){
						}
					});
				});
			});
		})();
		</script>', esc_attr( $class ), $message, $dont_show );
}
function wpcfhs_hide_pro_notice() {
  update_option("wpcfhs_disable_pro_notice", "YES");
  echo json_encode(["status" => "success"]);
  wp_die();
}
