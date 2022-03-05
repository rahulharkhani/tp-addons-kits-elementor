<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://thatpeoples.com/
 * @since             1.0.0
 * @package           Elementor_Addons_Kits
 *
 * @wordpress-plugin
 * Plugin Name:       TP Elementor Addons Kits
 * Plugin URI:        https://thatpeoples.com/
 * Description:       TP Elementor Addons Kits for an effective and user-friendly way to showcase your team profiles cards with unique card-style/design. 
 * Version:           1.0.0
 * Author:            Rahul Harkhani
 * Author URI:        https://profiles.wordpress.org/rahulharkhani/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tp-elementor-addons-kits
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ELEMENTOR_ADDONS_KITS_VERSION', '1.0.0' );
define( 'ELEMENTOR_ADDONS_KITS_URL', plugins_url('/', __FILE__) );  // Define Plugin URL
define( 'ELEMENTOR_ADDONS_KITS_PATH', plugin_dir_path(__FILE__) );  // Define Plugin Directory Path
define( 'ELEMENTOR_ADDONS_KITS_DOMAIN', 'tp-elementor-addons-kits' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elementor-addons-kits-activator.php
 */
function activate_elementor_addons_kits() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-addons-kits-activator.php';
	Elementor_Addons_Kits_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elementor-addons-kits-deactivator.php
 */
function deactivate_elementor_addons_kits() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-addons-kits-deactivator.php';
	Elementor_Addons_Kits_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_elementor_addons_kits' );
register_deactivation_hook( __FILE__, 'deactivate_elementor_addons_kits' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-elementor-addons-kits.php';

/*
 * Register the widgtes file in elementor widgtes.
 */
if (!function_exists('elementor_profile_addons_kits_widget_register')) {
	function elementor_profile_addons_kits_widget_register() {
		require_once ELEMENTOR_ADDONS_KITS_PATH . 'widgets/profile-card-widget.php';
	}
}

/**
 * Check current version of Elementor
 */
if (!function_exists('elementor_addons_kits_plugin_load')) {

	function elementor_addons_kits_plugin_load() {
		// Load plugin textdomain
		load_plugin_textdomain('ELEMENTOR_ADDONS_KITS_DOMAIN');

		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', 'elementor_addons_kits_widget_fail_load');
			return;
		}
		$elementor_version_required = '1.1.2';
		if (!version_compare(ELEMENTOR_VERSION, $elementor_version_required, '>=')) {
			add_action('admin_notices', 'elementor_addons_kits_update_notice');
			return;
		}
	}

}


/**
 * This notice will appear if Elementor is not installed or activated or both
 */
if (!function_exists('elementor_addons_kits_widget_fail_load')) {

	function elementor_addons_kits_widget_fail_load() {
		$screen = get_current_screen();
		if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
			return;
		}

		$plugin = 'elementor/elementor.php';

		if (elementor_addons_kits_installed()) {
			if (!current_user_can('activate_plugins')) {
				return;
			}
			$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);

			$message = '<p>' . __('<strong>Elementor Addons Kits</strong> requires <strong>Elementor</strong> plugin to be active. Please activate Elementor to continue.', ELEMENTOR_ADDONS_KITS_DOMAIN) . '</p>';
			$message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor', ELEMENTOR_ADDONS_KITS_DOMAIN)) . '</p>';
		} else {
			if (!current_user_can('install_plugins')) {
				return;
			}

			$install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');

			$message = '<p>' . __('<strong>Elementor Card Design</strong> widgets not working because you need to install the Elemenor plugin', ELEMENTOR_ADDONS_KITS_DOMAIN) . '</p>';
			$message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor', ELEMENTOR_ADDONS_KITS_DOMAIN)) . '</p>';
		}

		echo '<div class="error"><p>' . esc_html(  $message ) . '</p></div>';
	}

}


/**
 * Display admin notice for Elementor update if Elementor version is old
 */
if (!function_exists('elementor_addons_kits_update_notice')) {

	function elementor_addons_kits_update_notice() {
		if (!current_user_can('update_plugins')) {
			return;
		}

		$file_path = 'elementor/elementor.php';

		$upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
		$message = '<p>' . __('<strong>Card Elements</strong> widgets not working because you are using an old version of Elementor.', ELEMENTOR_ADDONS_KITS_DOMAIN) . '</p>';
		$message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, __('Update Elementor Now', ELEMENTOR_ADDONS_KITS_DOMAIN)) . '</p>';
		echo '<div class="error"><p>' . esc_html(  $message ) . '</p></div>';
	}

}

/**
 * Action when plugin installed
 */
if (!function_exists('elementor_addons_kits_installed')) {

	function elementor_addons_kits_installed() {

		$file_path = 'elementor/elementor.php';
		$installed_plugins = get_plugins();

		return isset($installed_plugins[$file_path]);
	}

}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_elementor_addons_kits() {

	$plugin = new Elementor_Addons_Kits();
	$plugin->run();

}
run_elementor_addons_kits();
