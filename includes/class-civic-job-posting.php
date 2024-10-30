<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Civic_Job_Posting
 * @subpackage Civic_Job_Posting/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Civic_Job_Posting
 * @subpackage Civic_Job_Posting/includes
 * @author     civicuk <info@civicuk.com>
 */
class Civic_Job_Posting {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Civic_Job_Posting_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'CIVIC_JOB_POSTING_VERSION' ) ) {
			$this->version = CIVIC_JOB_POSTING_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		if ( defined( 'CIVIC_JOB_POSTING_SLUG' ) ) {
			$this->plugin_name = CIVIC_JOB_POSTING_SLUG;
		} else {
			$this->plugin_name = 'civic-job-posting';
		}

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Civic_Job_Posting_Loader. Orchestrates the hooks of the plugin.
	 * - Civic_Job_Posting_i18n. Defines internationalization functionality.
	 * - Civic_Job_Posting_Admin. Defines all hooks for the admin area.
	 * - Civic_Job_Posting_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-civic-job-posting-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-civic-job-posting-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-civic-job-posting-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-civic-job-posting-public.php';

		/**
		 * Cpt Jobs
		 */

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/civic-job-posting-cpt.php';

		$this->loader = new Civic_Job_Posting_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Civic_Job_Posting_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Civic_Job_Posting_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */

	private function define_admin_hooks() {

		$plugin_admin = new Civic_Job_Posting_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Add menu item
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );

		// Add Settings link to the plugin
		$plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
		$this->loader->add_filter( 'plugin_action_links_' . $plugin_basename, $plugin_admin, 'add_action_links' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'cjp_options_update' );

		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'cjp_register_meta_boxes' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'cjp_save_meta_box_required' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'cjp_save_meta_box_optional' );
		$this->loader->add_filter( 'rest_prepare_civic-job-posting', $plugin_admin, 'filter_joblisting_json', 10, 3 );

		$this->loader->add_action( 'wp_head', $plugin_admin, 'schema_job_posting_json' );
		$this->loader->add_action( 'edit_form_advanced', $plugin_admin, 'cjp_force_job_title' );

		$cjp_options = get_option( 'cjp_settings' );

		if ( isset( $cjp_options['enableIndexing'] ) && $cjp_options['enableIndexing'] == 'enabled' ) {

			$this->loader->add_action( 'publish_civic-job-posting', $plugin_admin, 'cjp_update_indexing_api' );
			$this->loader->add_action( 'draft_civic-job-posting', $plugin_admin, 'cjp_delete_indexing_api' );
			$this->loader->add_action( 'pending_civic-job-posting', $plugin_admin, 'cjp_delete_indexing_api' );
			$this->loader->add_action( 'auto-draft_civic-job-posting', $plugin_admin, 'cjp_delete_indexing_api' );
			$this->loader->add_action( 'private_civic-job-posting', $plugin_admin, 'cjp_delete_indexing_api' );
			$this->loader->add_action( 'trash_civic-job-posting', $plugin_admin, 'cjp_delete_indexing_api' );
			$this->loader->add_action( 'admin_notices', $plugin_admin, 'cjp_admin_notices' );
		}

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */

	private function define_public_hooks() {

		$plugin_public = new Civic_Job_Posting_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );

		$this->loader->add_filter( 'template_include', $plugin_public, 'cjp_include_templates' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Civic_Job_Posting_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
