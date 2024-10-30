<?php
/**
 * Cjp fields
 */

$cjp_organization_name             = get_post_meta( $post->ID, 'cjp_organization_name', true );
$cjp_organization_url              = get_post_meta( $post->ID, 'cjp_organization_url', true );
$cjp_job_location_start_date       = get_post_meta( $post->ID, 'cjp_job_location_start_date', true );
$cjp_job_location_expiry_date      = get_post_meta( $post->ID, 'cjp_job_location_expiry_date', true );
$cjp_identifier_name               = get_post_meta( $post->ID, 'cjp_identifier_name', true );
$cjp_identifier_value              = get_post_meta( $post->ID, 'cjp_identifier_value', true );
$cjp_job_location_street_address   = get_post_meta( $post->ID, 'cjp_job_location_street_address', true );
$cjp_job_location_address_locality = get_post_meta( $post->ID, 'cjp_job_location_address_locality', true );
$cjp_job_location_address_region   = get_post_meta( $post->ID, 'cjp_job_location_address_region', true );
$cjp_job_location_postal_code      = get_post_meta( $post->ID, 'cjp_job_location_postal_code', true );
$cjp_job_location_address_country  = get_post_meta( $post->ID, 'cjp_job_location_address_country', true );
$cjp_applicant_remotely_check      = get_post_meta( $post->ID, 'cjp_applicant_remotely_check', true );
$cjp_job_location_address_country  = get_post_meta( $post->ID, 'cjp_job_location_address_country', true );
$cjp_applicant_country             = get_post_meta( $post->ID, 'cjp_applicant_country', true );
$cjp_base_salary_value             = get_post_meta( $post->ID, 'cjp_base_salary_value', true );
$cjp_base_min_salary_value         = get_post_meta( $post->ID, 'cjp_base_min_salary_value', true );
$cjp_base_max_salary_value         = get_post_meta( $post->ID, 'cjp_base_max_salary_value', true );
$cjp_job_base_salary_unit_text     = get_post_meta( $post->ID, 'cjp_job_base_salary_unit_text', true );
$cjp_job_base_salary_currency      = get_post_meta( $post->ID, 'cjp_job_base_salary_currency', true );
$employment_types                  = get_post_meta( $post->ID, 'cjp_job_employment_type', true );
$cjp_final_salary_value            = $cjp_base_salary_value . ' ' . $cjp_job_base_salary_currency;

if ( $cjp_base_min_salary_value || $cjp_base_max_salary_value ) {
	$cjp_final_salary_value = $cjp_base_min_salary_value . '-' . $cjp_base_max_salary_value . ' ' . $cjp_job_base_salary_currency;
}

$cjp_apply_value       = get_post_meta( $post->ID, 'cjp_apply_value', true );
$cjp_apply_value_email = get_post_meta( $post->ID, 'cjp_apply_value_email', true );
