<?php
/**
 * Service Account File
 */
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

$json_data = wp_json_encode( $jsonAr );
$fp        = fopen( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/service_account_file.json', 'w' );
fwrite( $fp, $json_data );
fclose( $fp );
