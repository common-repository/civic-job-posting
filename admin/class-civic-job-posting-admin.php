<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Civic_Job_Posting
 * @subpackage Civic_Job_Posting/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Civic_Job_Posting
 * @subpackage Civic_Job_Posting/admin
 * @author     civicuk <info@civicuk.com>
 */

require_once 'google-api-php-client-2.2.2/vendor/autoload.php';


class Civic_Job_Posting_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Civic_Job_Posting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Civic_Job_Posting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/civic-job-posting-admin.css', array(), $this->version, 'all' );

	}


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Civic_Job_Posting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Civic_Job_Posting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/civic-job-posting-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function add_plugin_admin_menu() {

		add_menu_page( 'Civic Job Posting', 'Civic Job Posting', 'manage_options', $this->plugin_name, array( $this, 'display_plugin_setup_page' ), 'dashicons-nametag' );
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {
		/*
		*  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
		*/
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', $this->plugin_name ) . '</a>',
		);
		return array_merge( $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
		include_once 'partials/civic-job-posting-admin-display.php';
	}

	/**
	 * Register meta boxes.
	 */
	function cjp_register_meta_boxes() {

		add_meta_box( 'cjp-required', __( 'Required Fields', 'cjp' ), array( $this, 'cjp_display_callback_required' ), 'civic-job-posting' );
		add_meta_box( 'cjp-optional', __( 'Optional Fields', 'cjp' ), array( $this, 'cjp_display_callback_optional' ), 'civic-job-posting' );

	}
	// add_action( 'add_meta_boxes', 'cjp_register_meta_boxes' );

	/**
	 * Meta box display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function cjp_display_callback_required( $post ) {

		include plugin_dir_path( __FILE__ ) . 'partials/civic-job-posting-required-fields.php';

	}


	function cjp_display_callback_optional( $post ) {

		include plugin_dir_path( __FILE__ ) . 'partials/civic-job-posting-optional-fields.php';

	}

	function cjp_google_indexing_array(){

		$cjp_options = get_option( 'cjp_settings' );

		$cjp_options_type                    = isset( $cjp_options['type'] ) ? esc_attr( $cjp_options['type'] ) : '';
		$cjp_options_projectId               = isset( $cjp_options['projectId'] ) ? esc_attr( $cjp_options['projectId'] ) : '';
		$cjp_options_privateKeyId            = isset( $cjp_options['privateKeyId'] ) ? esc_attr( $cjp_options['privateKeyId'] ) : '';
		$cjp_options_privateKey              = isset( $cjp_options['privateKey'] ) ? stripslashes( esc_textarea( $cjp_options['privateKey'] ) ) : '';
		$cjp_options_clientEmail             = isset( $cjp_options['clientEmail'] ) ? esc_attr( $cjp_options['clientEmail'] ) : '';
		$cjp_options_clientId                = isset( $cjp_options['clientId'] ) ? esc_attr( $cjp_options['clientId'] ) : '';
		$cjp_options_authUri                 = isset( $cjp_options['authUri'] ) ? esc_url( $cjp_options['authUri'] ) : '';
		$cjp_options_tokenUri                = isset( $cjp_options['tokenUri'] ) ? esc_url( $cjp_options['tokenUri'] ) : '';
		$cjp_options_authProviderX509CertUrl = isset( $cjp_options['authProviderX509CertUrl'] ) ? esc_url( $cjp_options['authProviderX509CertUrl'] ) : '';
		$cjp_options_clientX509CertUrl       = isset( $cjp_options['clientX509CertUrl'] ) ? esc_url( $cjp_options['clientX509CertUrl'] ) : '';

		$jsonAr = array(
			'type'                        => $cjp_options_type,
			'project_id'                  => $cjp_options_projectId,
			'private_key_id'              => $cjp_options_privateKeyId,
			'private_key'                 => $cjp_options_privateKey,
			'client_email'                => $cjp_options_clientEmail,
			'client_id'                   => $cjp_options_clientId,
			'auth_uri'                    => $cjp_options_authUri,
			'token_uri'                   => $cjp_options_tokenUri,
			'auth_provider_x509_cert_url' => $cjp_options_authProviderX509CertUrl,
			'client_x509_cert_url'        => $cjp_options_clientX509CertUrl,
		);

		return $jsonAr;

	}

	function cjp_google_authorize() {

		$cjp_options = get_option( 'cjp_settings' );

		if ( isset( $cjp_options['privateKey'] ) ) {

			//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/service_account_file.php';

		//	$jsonFile = plugin_dir_path( dirname( __FILE__ ) ) . 'admin/service_account_file.json';

			$jsonFile = $this->cjp_google_indexing_array();

			$client = new Google_Client();
			// service_account_file.json is the private key that you created for your service account.
			$client->setAuthConfig( $jsonFile );

			$client->addScope( 'https://www.googleapis.com/auth/indexing' );

			// Get a Guzzle HTTP Client
			$httpClient = $client->authorize();

			return $httpClient;

		}
		
	}

	function cjp_save_meta_box_required( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}
		$fields_text   = [
			'cjp_organization_name',
			'cjp_job_location_street_address',
			'cjp_job_location_address_locality',
			'cjp_job_location_address_region',
			'cjp_job_location_postal_code',
			'cjp_job_location_address_country',
			'cjp_job_location_start_date',
			'cjp_job_location_expiry_date',
		];
		$fields_url    = [
			'cjp_organization_url',
			'cjp_organization_logo',
		];
		$fields_editor = [
			'cjp_job_description',
		];

		foreach ( $fields_text as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
			}
		}

		foreach ( $fields_url as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, esc_url_raw( wp_unslash( $_POST[ $field ] ) ) );
			}
		}

		foreach ( $fields_editor as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, wp_kses_post( $_POST[ $field ] ) );
			}
		}

	}

	function cjp_save_meta_box_optional( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( $parent_id = wp_is_post_revision( $post_id ) ) {
			$post_id = $parent_id;
		}

		$fields_text = [
			'cjp_applicant_country',
			'cjp_job_base_salary_currency',
			'cjp_base_salary_value',
			'cjp_base_min_salary_value',
			'cjp_base_max_salary_value',
			'cjp_job_base_salary_unit_text',
			'cjp_job_employment_type',
			'cjp_identifier_name',
			'cjp_identifier_value',
			'cjp_apply_value_email',
		];

		$fields_url = [
			'cjp_apply_value',
		];

		$fields_check = [
			'cjp_applicant_remotely_check',
		];

		$fields_select_multi = [
			'cjp_job_employment_type',
		];

		foreach ( $fields_text as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
			}
		}

		foreach ( $fields_select_multi as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				if(isset($_POST[$field])){
					update_post_meta( $post_id, $field,  array_map( 'strip_tags', wp_unslash( $_POST[$field] ) ) );
				}
			}
		}

		foreach ( $fields_url as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, esc_url_raw( wp_unslash( $_POST[ $field ] ) ) );
			}
		}

		foreach ( $fields_check as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta( $post_id, $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
			} else {
				delete_post_meta( $post_id, $field );
			}
		}

	}

	function filter_joblisting_json( $data, $post, $context ) {

		// Required Fields
		$cjp_job_description               = apply_filters( 'the_content', get_post_meta( $post->ID, 'cjp_job_description', true ) );
		$cjp_organization_name             = get_post_meta( $post->ID, 'cjp_organization_name', true );
		$cjp_organization_url              = get_post_meta( $post->ID, 'cjp_organization_url', true );
		$cjp_organization_logo             = get_post_meta( $post->ID, 'cjp_organization_logo', true );
		$cjp_job_location_street_address   = get_post_meta( $post->ID, 'cjp_job_location_street_address', true );
		$cjp_job_location_address_locality = get_post_meta( $post->ID, 'cjp_job_location_address_locality', true );
		$cjp_job_location_address_region   = get_post_meta( $post->ID, 'cjp_job_location_address_region', true );
		$cjp_job_location_postal_code      = get_post_meta( $post->ID, 'cjp_job_location_postal_code', true );
		$cjp_job_location_address_country  = get_post_meta( $post->ID, 'cjp_job_location_address_country', true );
		$cjp_job_location_start_date       = get_post_meta( $post->ID, 'cjp_job_location_start_date', true );
		$cjp_job_location_expiry_date      = get_post_meta( $post->ID, 'cjp_job_location_expiry_date', true );

		// Optional Fields
		$cjp_applicant_remotely_check  = get_post_meta( $post->ID, 'cjp_applicant_remotely_check', true );
		$cjp_applicant_country         = get_post_meta( $post->ID, 'cjp_applicant_country', true );
		$cjp_job_base_salary_currency  = get_post_meta( $post->ID, 'cjp_job_base_salary_currency', true );
		$cjp_base_salary_value         = get_post_meta( $post->ID, 'cjp_base_salary_value', true );
		$cjp_base_min_salary_value     = get_post_meta( $post->ID, 'cjp_base_min_salary_value', true );
		$cjp_base_max_salary_value     = get_post_meta( $post->ID, 'cjp_base_max_salary_value', true );
		$cjp_job_base_salary_unit_text = get_post_meta( $post->ID, 'cjp_job_base_salary_unit_text', true );
		$cjp_job_employment_type       = get_post_meta( $post->ID, 'cjp_job_employment_type', true );
		$cjp_identifier_name           = get_post_meta( $post->ID, 'cjp_identifier_name', true );
		$cjp_identifier_value          = get_post_meta( $post->ID, 'cjp_identifier_value', true );
		$cjp_apply_value               = get_post_meta( $post->ID, 'cjp_apply_value', true );
		$cjp_apply_value_email         = get_post_meta( $post->ID, 'cjp_apply_value_email', true );

		if ( $cjp_job_description ) {
			$data->data['cjp_job_description'] = $cjp_job_description;
		}
		if ( $cjp_organization_name ) {
			$data->data['cjp_organization_name'] = $cjp_organization_name;
		}
		if ( $cjp_organization_url ) {
			$data->data['cjp_organization_url'] = $cjp_organization_url;
		}
		if ( $cjp_organization_logo ) {
			$data->data['cjp_organization_logo'] = $cjp_organization_logo;
		}
		if ( $cjp_job_location_street_address ) {
			$data->data['cjp_job_location_street_address'] = $cjp_job_location_street_address;
		}
		if ( $cjp_job_location_address_locality ) {
			$data->data['cjp_job_location_address_locality'] = $cjp_job_location_address_locality;
		}
		if ( $cjp_job_location_address_region ) {
			$data->data['cjp_job_location_address_region'] = $cjp_job_location_address_region;
		}
		if ( $cjp_job_location_postal_code ) {
			$data->data['cjp_job_location_postal_code'] = $cjp_job_location_postal_code;
		}
		if ( $cjp_job_location_address_country ) {
			$data->data['cjp_job_location_address_country'] = $cjp_job_location_address_country;
		}
		if ( $cjp_job_location_start_date ) {
			$data->data['cjp_job_location_start_date'] = $cjp_job_location_start_date;
		}
		if ( $cjp_job_location_expiry_date ) {
			$data->data['cjp_job_location_expiry_date'] = $cjp_job_location_expiry_date;
		}

		if ( $cjp_applicant_remotely_check ) {
			$data->data['cjp_applicant_remotely_check'] = $cjp_applicant_remotely_check;
		}
		if ( $cjp_applicant_country ) {
			$data->data['cjp_applicant_country'] = $cjp_applicant_country;
		}
		if ( $cjp_job_base_salary_currency ) {
			$data->data['cjp_job_base_salary_currency'] = $cjp_job_base_salary_currency;
		}
		if ( $cjp_base_salary_value ) {
			$data->data['cjp_base_salary_value'] = $cjp_base_salary_value;
		}
		if ( $cjp_base_min_salary_value ) {
			$data->data['cjp_base_min_salary_value'] = $cjp_base_min_salary_value;
		}
		if ( $cjp_base_max_salary_value ) {
			$data->data['cjp_base_max_salary_value'] = $cjp_base_max_salary_value;
		}
		if ( $cjp_job_employment_type ) {
			$data->data['cjp_job_employment_type'] = $cjp_job_employment_type;
		}
		if ( $cjp_identifier_name ) {
			$data->data['cjp_identifier_name'] = $cjp_identifier_name;
		}
		if ( $cjp_identifier_value ) {
			$data->data['cjp_identifier_value'] = $cjp_identifier_value;
		}
		if ( $cjp_job_base_salary_unit_text ) {
			$data->data['cjp_job_base_salary_unit_text'] = $cjp_job_base_salary_unit_text;
		}
		if ( $cjp_apply_value ) {
			$data->data['cjp_apply_value'] = $cjp_apply_value;
		}
		if ( $cjp_apply_value_email ) {
			$data->data['cjp_apply_value_email'] = $cjp_apply_value_email;
		}

		return $data;
	}


	function schema_job_posting_json() {

		if ( is_singular( 'civic-job-posting' ) ) {

			$post_id = get_the_ID();

			// Required Fields
			$cjp_job_description               = apply_filters( 'the_content', get_post_meta( $post_id, 'cjp_job_description', true ) );
			$cjp_organization_name             = get_post_meta( $post_id, 'cjp_organization_name', true );
			$cjp_organization_url              = get_post_meta( $post_id, 'cjp_organization_url', true );
			$cjp_organization_logo             = get_post_meta( $post_id, 'cjp_organization_logo', true );
			$cjp_job_location_street_address   = get_post_meta( $post_id, 'cjp_job_location_street_address', true );
			$cjp_job_location_address_locality = get_post_meta( $post_id, 'cjp_job_location_address_locality', true );
			$cjp_job_location_address_region   = get_post_meta( $post_id, 'cjp_job_location_address_region', true );
			$cjp_job_location_postal_code      = get_post_meta( $post_id, 'cjp_job_location_postal_code', true );
			$cjp_job_location_address_country  = get_post_meta( $post_id, 'cjp_job_location_address_country', true );
			$cjp_job_location_start_date       = get_post_meta( $post_id, 'cjp_job_location_start_date', true );
			$cjp_job_location_expiry_date      = get_post_meta( $post_id, 'cjp_job_location_expiry_date', true );

			// Optional Fields
			$cjp_applicant_remotely_check  = get_post_meta( $post_id, 'cjp_applicant_remotely_check', true );
			$cjp_applicant_country         = get_post_meta( $post_id, 'cjp_applicant_country', true );
			$cjp_job_base_salary_currency  = get_post_meta( $post_id, 'cjp_job_base_salary_currency', true );
			$cjp_base_salary_value         = get_post_meta( $post_id, 'cjp_base_salary_value', true );
			$cjp_base_min_salary_value     = get_post_meta( $post_id, 'cjp_base_min_salary_value', true );
			$cjp_base_max_salary_value     = get_post_meta( $post_id, 'cjp_base_max_salary_value', true );
			$cjp_job_base_salary_unit_text = get_post_meta( $post_id, 'cjp_job_base_salary_unit_text', true );
			$cjp_job_employment_type       = get_post_meta( $post_id, 'cjp_job_employment_type', true );
			$cjp_identifier_name           = get_post_meta( $post_id, 'cjp_identifier_name', true );
			$cjp_identifier_value          = get_post_meta( $post_id, 'cjp_identifier_value', true );

			$schema = array(
				'@context'   => 'http://schema.org',
				// Tell search engines the content type it is looking at
				'@type'      => 'JobPosting',
				'title'      => get_the_title( $post_id ),
				'datePosted' => esc_attr( $cjp_job_location_start_date ),
			);
			// Job Description
			if ( $cjp_job_description ) {
				$schema['description'] = apply_filters( 'the_content', $cjp_job_description );
			}
			// Expiry Date
			if ( $cjp_job_location_expiry_date ) {
				$schema['validThrough'] = esc_attr( $cjp_job_location_expiry_date );
			}

			// Employment Type
			if ( $cjp_job_employment_type ) {
				$schema['employmentType'] = $cjp_job_employment_type;
			}

			// Hiring Organization
			if ( $cjp_organization_name ) {
				$schema['hiringOrganization'] = array();
				$hiring                       = array(
					'@type' => 'Organization',
					'name'  => esc_attr( $cjp_organization_name ),
				);
				if ( $cjp_organization_url ) {
					$hiring['sameAs'] = esc_url( $cjp_organization_url );
				}
				if ( $cjp_organization_logo ) {
					$hiring['logo'] = esc_url( $cjp_organization_logo );
				}
				array_push( $schema['hiringOrganization'], $hiring );
			}

			// Job Location
			if ( $cjp_job_location_street_address ) {
				$schema['jobLocation'] = array();
				$jobLocation           = array(
					'@type'   => 'Place',
					'address' => array(
						'@type'         => 'PostalAddress',
						'streetAddress' => esc_attr( $cjp_job_location_street_address ),
					),
				);
				if ( $cjp_job_location_address_locality ) {
					$jobLocation['address']['addressLocality'] = esc_attr( $cjp_job_location_address_locality );
				}
				if ( $cjp_job_location_address_region ) {
					$jobLocation['address']['addressRegion'] = esc_attr( $cjp_job_location_address_region );
				}
				if ( $cjp_job_location_postal_code ) {
					$jobLocation['address']['postalCode'] = esc_attr( $cjp_job_location_postal_code );
				}
				if ( $cjp_job_location_address_country ) {
					$jobLocation['address']['addressCountry'] = esc_attr( $cjp_job_location_address_country );
				}
				array_push( $schema['jobLocation'], $jobLocation );
			}

			// Remote Work
			if ( $cjp_applicant_country ) {
				$cjp_applicant_country_multi             = preg_replace( '/\s*,\s*/', ',', $cjp_applicant_country );
				$cjp_applicant_country_multi_array       = explode( ',', $cjp_applicant_country_multi );
				$schema['applicantLocationRequirements'] = array();
				foreach ( $cjp_applicant_country_multi_array as $cjp_applicant_country_multi_single ) {
					$applicantCountry = array(
						'@type' => 'Country',
						'name'  => esc_attr( $cjp_applicant_country_multi_single ),
					);
					array_push( $schema['applicantLocationRequirements'], $applicantCountry );
				}
			}
			if ( $cjp_applicant_remotely_check == 'checked' ) {
				$schema['jobLocationType'] = 'TELECOMMUTE';
			}

			// Organization Identifier
			if ( $cjp_identifier_name ) {
				$schema['identifier'] = array();
				$identifier           = array(
					'@type' => 'PropertyValue',
					'name'  => esc_attr( $cjp_identifier_name ),
				);
				if ( $cjp_identifier_value ) {
					$identifier['value'] = esc_attr( $cjp_identifier_value );
				}

				array_push( $schema['identifier'], $identifier );
			}

			// Base Salary
			if ( $cjp_job_base_salary_currency &&  ( $cjp_base_salary_value || $cjp_base_min_salary_value || $cjp_base_max_salary_value ) ) {
				$schema['baseSalary'] = array();
				$baseSalaryFull       = array(
					'@type'    => 'MonetaryAmount',
					'currency' => esc_attr( $cjp_job_base_salary_currency ),
				);
				if ( $cjp_base_salary_value || $cjp_base_min_salary_value || $cjp_base_max_salary_value ) {
					$baseSalaryFull['value'] = array(
						'@type' => 'QuantitativeValue',
					);
				}
				if ( $cjp_base_salary_value && ! $cjp_base_min_salary_value ) {
					$baseSalaryFull['value']['value'] = esc_attr( $cjp_base_salary_value );
				}
				if ( $cjp_base_min_salary_value ) {
					$baseSalaryFull['value']['minValue'] = esc_attr( $cjp_base_min_salary_value );
				}
				if ( $cjp_base_max_salary_value ) {
					$baseSalaryFull['value']['maxValue'] = esc_attr( $cjp_base_max_salary_value );
				}

				if ( $cjp_job_base_salary_unit_text ) {
					$baseSalaryFull['value']['unitText'] = esc_attr( $cjp_job_base_salary_unit_text );
				}

				array_push( $schema['baseSalary'], $baseSalaryFull );
			}

			echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_PRETTY_PRINT ) . '</script>';
		}
	}


	function cjp_settings_validate() {

		if ( $_POST['cjp_settings'] ) {

			$input = $_POST['cjp_settings'];

			$input['enableIndexing'] = sanitize_text_field( wp_filter_nohtml_kses( $input['enableIndexing'] ) );

			$input['type']                    = sanitize_text_field( wp_filter_nohtml_kses( $input['type'] ) );
			$input['projectId']               = sanitize_text_field( wp_filter_nohtml_kses( $input['projectId'] ) );
			$input['type']                    = sanitize_text_field( wp_filter_nohtml_kses( $input['type'] ) );
			$input['privateKeyId']            = sanitize_text_field( wp_filter_nohtml_kses( $input['privateKeyId'] ) );
			$input['privateKey']              = stripslashes( sanitize_textarea_field( $input['privateKey'] ) );
			$input['clientEmail']             = sanitize_text_field( wp_filter_nohtml_kses( $input['clientEmail'] ) );
			$input['clientId']                = sanitize_text_field( wp_filter_nohtml_kses( $input['clientId'] ) );
			$input['authUri']                 = esc_url_raw( ( $input['authUri'] ) );
			$input['tokenUri']                = esc_url_raw( ( $input['tokenUri'] ) );
			$input['authProviderX509CertUrl'] = esc_url_raw( ( $input['authProviderX509CertUrl'] ) );
			$input['clientX509CertUrl']       = esc_url_raw( ( $input['clientX509CertUrl'] ) );

			return $input;
		}

	}

	public function cjp_options_update() {

		register_setting( 'cjp_settings', 'cjp_settings', array( $this, 'cjp_settings_validate' ) );

	}



	function cjp_update_indexing_api( $post_ID ) {

		update_post_meta( $post_ID, 'cjp_job_permalink_published', get_permalink( $post_ID ) );

		$job_url = get_post_meta( $post_ID, 'cjp_job_permalink_published', true );

		try {
			$httpClient = $this->cjp_google_authorize();

			$endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

			$content = "{
              \"url\": \"$job_url\",
              \"type\": \"URL_UPDATED\"
            }";

			$response = $httpClient->post( $endpoint, [ 'body' => $content ] );

			$status_code = $response->getStatusCode();

			add_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );

			return $status_code;

		} catch ( \Throwable $e ) {

			add_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );

			return $e->getMessage();

		} catch ( \Exception $e ) {

			add_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );

			return $e->getMessage();
		}

	}

	public function add_notice_query_var( $location ) {

		$status = $this->cjp_update_indexing_api( get_the_ID() );

		remove_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );

		if ( $status == '200' ) {
			return esc_url_raw( add_query_arg( array( 'Updated_to_Google' => 'yes' ), $location ) );
		} else {
			return esc_url_raw(
				add_query_arg(
					array(
						'Updated_to_Google' => 'no',
						'Error_message'     => $status,
					),
					$location
				)
			);
		}
	}

	public function cjp_admin_notices() {

		if ( ! isset( $_GET['Updated_to_Google'] ) ) {
			return;
		} elseif ( $_GET['Updated_to_Google'] == 'yes' ) {

			echo '<div class="updated notice notice-success is-dismissible">
            <p>' . __( 'Your Job Status updated  to Google Indexing.', 'civic-job-posting' ) . '</p>
        </div>';

		} elseif ( $_GET['Updated_to_Google'] == 'no' ) {

			echo '<div class="updated notice error is-dismissible">
            <p>' . __( 'Ops something went wrong, your Job could not be updated to Google Indexing. Please check your Credentials from your Google Service Account , your server configuration, make sure that you have correct permission for plugin folder or try again later.', 'civic-job-posting' ) . '</p>
            <p>' . __( 'Your error message is : ' ) . ' <strong>' . esc_attr( $_GET['Error_message'] ) . '</strong></p>
        </div>';

		}

	}

	function cjp_delete_indexing_api( $post_ID ) {

		$job_url = get_post_meta( $post_ID, 'cjp_job_permalink_published', true );

		if ( $job_url ) {
			try {
				$httpClient = $this->cjp_google_authorize();

				$endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';

					$content = "{
              \"url\": \"$job_url\",
              \"type\": \"URL_DELETED\"
            }";

				$response = $httpClient->post( $endpoint, [ 'body' => $content ] );

				$status_code = $response->getStatusCode();

				return $status_code;

			} catch ( \Throwable $e ) {

				add_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );

				return $e->getMessage();
			} catch ( \Exception $e ) {

				add_filter( 'redirect_post_location', array( $this, 'add_notice_query_var' ), 99 );

				return $e->getMessage();
			}
		}

	}

	function cjp_force_job_title( $post ) {
		// List of post types that we want to require post titles for.
		$post_types = array(
			'civic-job-posting',
		);
		// If the current post is not one of the chosen post types, exit this function.
		if ( ! in_array( $post->post_type, $post_types ) ) {
			return;
		}
		?>
		<script type='text/javascript'>
			( function ( $ ) {
				$( document ).ready( function () {
					//Require post title when adding/editing Project Summaries
					$( 'body' ).on( 'submit.edit-post', '#post', function () {
						// If the title isn't set
						if ( $( "#title" ).val().replace( / /g, '' ).length === 0 ) {
							// Show the alert
							if ( !$( "#title-required-msj" ).length ) {
								$( "#titlewrap" ).append( '<div id="title-required-msj"><strong>Title is required.</strong></div>' ).addClass('cjp-mandatory-field');
							}
							// Hide the spinner
							$( '#major-publishing-actions .spinner' ).hide();
							// The buttons get "disabled" added to them on submit. Remove that class.
							$( '#major-publishing-actions' ).find( ':button, :submit, a.submitdelete, #post-preview' ).removeClass( 'disabled' );
							// Focus on the title field.
							$( "#title" ).focus();
							return false;
						}
						if(!$('#cjp_applicant_remotely_check').is(':checked') && ( !$('#cjp_job_location_street_address').val() || !$('#cjp_job_location_address_locality').val() || !$('#cjp_job_location_address_region').val() || !$('#cjp_job_location_postal_code').val() || !$('#cjp_job_location_address_country').val() ) ){
							alert('Please fill all Job Location fields or Applicant Location Requirements.');
							$( '#major-publishing-actions .spinner' ).hide();
							$( '#major-publishing-actions' ).find( ':button, :submit, a.submitdelete, #post-preview' ).removeClass( 'disabled' );
							return false;
						}

					});
				});
			}( jQuery ) );
		</script>
		<?php
	}

}
