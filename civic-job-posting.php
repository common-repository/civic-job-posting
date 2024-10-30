<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.civicuk.com/
 * @since             1.0.0
 * @package           Civic_Job_Posting
 *
 * @wordpress-plugin
 * Plugin Name:       Civic Job Posting
 * Plugin URI:        https://wordpress.org/plugins/civic-job-posting/
 * Description:       Civic Job Posting offers a mechanism to easily handle the medatadata of your job postings in order for them to appear in the special Job section of Google Search results.
 * Version:           1.2.0
 * Author:            Civic Uk
 * Author URI:        https://www.civicuk.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       civic-job-posting
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
define( 'CIVIC_JOB_POSTING_VERSION', '1.2.0' );
define( 'CIVIC_JOB_POSTING_SLUG', 'civic-job-posting' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-civic-job-posting-activator.php
 */
function activate_civic_job_posting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-civic-job-posting-activator.php';
	Civic_Job_Posting_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-civic-job-posting-deactivator.php
 */
function deactivate_civic_job_posting() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-civic-job-posting-deactivator.php';
	Civic_Job_Posting_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_civic_job_posting' );
register_deactivation_hook( __FILE__, 'deactivate_civic_job_posting' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-civic-job-posting.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_civic_job_posting() {

	$plugin = new Civic_Job_Posting();
	$plugin->run();

}
run_civic_job_posting();
