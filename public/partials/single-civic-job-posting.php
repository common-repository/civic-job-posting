<?php
/**
 * The Template for displaying single job
 * */

get_header();

require_once plugin_dir_path( __FILE__ ) . 'cjp-includes/cjp-fields-group.php';

?>

<section id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<div class="cjp-job-post-group">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				?>

				<div class="cjp-job-post-header">
					<h1><?php the_title(); ?> </h1>
				</div>

				<?php if ( $cjp_organization_name ) : ?>
					<div class="cjp-job-extra-information cjp-flex-wrap">
						<div class="cjp-job-extra-information-box cjp-job-extra-information-box--organization">
							<h5><?php _e( 'Hiring Organization' ); ?></h5>
							<ul>
								<li><strong><?php _e( 'Name:' ); ?></strong></li>
								<li><?php echo esc_attr( $cjp_organization_name ); ?></li>
							</ul>
							<?php if ( $cjp_organization_url ) : ?>
							<ul>
								<li><strong><?php _e( 'Url:' ); ?></strong></li>
								<li><a href="<?php echo esc_url( $cjp_organization_url ); ?>" target="_blank"><?php echo esc_url( $cjp_organization_url ); ?></a></li>
							</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $cjp_job_location_start_date ) : ?>
						<div class="cjp-job-extra-information-box cjp-job-extra-information-box--dates">
							<h5><?php _e( 'Job Apply dates', 'civic-job-posting' ); ?></h5>
							<ul>
								<li><strong><?php _e( 'Starting Date:', 'civic-job-posting' ); ?></strong></li>
								<li><?php echo esc_attr( $cjp_job_location_start_date ); ?></li>
							</ul>
						<?php if ( $cjp_job_location_expiry_date ) : ?>
							<ul>
								<li><strong><?php _e( 'Closing Date:', 'civic-job-posting' ); ?></strong></li>
								<li><?php echo esc_attr( $cjp_job_location_expiry_date ); ?></li>
							</ul>
						<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $cjp_identifier_name ) : ?>
						<div class="cjp-job-extra-information-box cjp-job-extra-information-box--remote">
							<h5><?php _e( 'Identifier', 'civic-job-posting' ); ?></h5>
							<ul>
								<li><strong><?php _e( 'Identifier Name:', 'civic-job-posting' ); ?></strong></li>
								<li><?php echo esc_attr( $cjp_identifier_name ); ?></li>
							</ul>
							<?php if ( $cjp_identifier_value ) : ?>
							<ul>
								<li><strong><?php _e( 'Identifier Value:', 'civic-job-posting' ); ?></strong></li>
								<li><?php echo esc_attr( $cjp_identifier_value ); ?></li>
							</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $cjp_job_location_street_address || $cjp_job_location_address_locality || $cjp_job_location_address_region || $cjp_job_location_postal_code || $cjp_job_location_address_country || $cjp_applicant_remotely_check ) : ?>
						<div class="cjp-job-extra-information-box cjp-job-extra-information-box--location">
							<h5><?php _e( 'Job Location', 'civic-job-posting' ); ?></h5>
							<ul>
								<li><strong><?php _e( 'physical location:', 'civic-job-posting' ); ?></strong></li>
								<li class="cjp-employment-type"><span><?php echo esc_attr( $cjp_job_location_street_address ); ?></span><span><?php echo esc_attr( $cjp_job_location_address_locality ); ?></span><span><?php echo esc_attr( $cjp_job_location_address_region ); ?></span><span><?php echo esc_attr( $cjp_job_location_postal_code ); ?></span> <span><?php echo esc_attr( $cjp_job_location_address_country ); ?></span></li>
							</ul>
							<ul>
								<li><strong><?php _e( 'Remote:', 'civic-job-posting' ); ?></strong></li>
								<li><?php echo ( $cjp_applicant_remotely_check ? __( 'Yes', 'civic-job-posting' ) : __( 'No', 'civic-job-posting' ) ); ?></li>
							</ul>
							<?php if ( $cjp_applicant_country ) : ?>
							<ul>
								<li><strong><?php _e( 'Remote for Countries:', 'civic-job-posting' ); ?></strong></li>
								<li><?php echo esc_attr( $cjp_applicant_country ); ?></li>
							</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( $cjp_base_salary_value || $cjp_base_min_salary_value || $cjp_base_max_salary_value || $employment_types ) : ?>
						<div class="cjp-job-extra-information-box cjp-job-extra-information-box--salary">
							<h5><?php _e( 'Salary', 'civic-job-posting' ); ?></h5>
							<ul>
								<li><strong><?php _e( 'Base Salary:', 'civic-job-posting' ); ?></strong></li>
								<li><?php echo esc_attr( $cjp_final_salary_value ); ?> <?php echo __( 'per', 'civic-job-posting' ) . ' ' . esc_attr( $cjp_job_base_salary_unit_text ); ?></li>
							</ul>
							<?php if ( $employment_types ) : ?>
							<ul>
								<li><strong><?php _e( 'Employment Type:', 'civic-job-posting' ); ?></strong></li>
								<li class="cjp-employment-type">
								<?php
								if ( $employment_types ) {
									foreach ( $employment_types  as $employment_type ) {
										$employment_type = str_replace( '_', ' ', $employment_type );
										echo '<span>' . esc_attr( $employment_type ) . '</span>';
									}
								}
								?>
									</li>
							</ul>
						<?php endif; ?>
						</div>
					<?php endif; ?>
					</div>

				<?php if ( get_post_meta( $post->ID, 'cjp_job_description', true ) ) : ?>
				<div class="cjp-job-post-content">
					<?php echo apply_filters( 'the_content', get_post_meta( $post->ID, 'cjp_job_description', true ) ); ?>
				</div>
				<?php endif; ?>

				<div class="cjp-job-post-footer">
					<?php if ( $cjp_apply_value_email ) : ?>
						<a href="mailto:<?php echo esc_attr( $cjp_apply_value_email ); ?>" class="cjp-btn-apply"> <?php _e( 'Apply', 'civic-job-posting' ); ?></a>
					<?php elseif ( $cjp_apply_value ) : ?>
						<a href="<?php echo esc_attr( $cjp_apply_value ); ?>" class="cjp-btn-apply" target="_blank"> <?php _e( 'Apply', 'civic-job-posting' ); ?></a>
					<?php endif; ?>
				</div>

				<?php
				  // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
			?>
		</div>

	</div><!-- #content -->
</section><!-- #primary -->

<?php
get_footer();
?>
