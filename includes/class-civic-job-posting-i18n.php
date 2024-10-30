<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Civic_Job_Posting
 * @subpackage Civic_Job_Posting/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Civic_Job_Posting
 * @subpackage Civic_Job_Posting/includes
 * @author     civicuk <info@civicuk.com>
 */
class Civic_Job_Posting_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'civic-job-posting',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}


}
