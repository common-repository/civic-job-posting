<?php
/**
 * The Template for displaying all jobs
 */
get_header();

require_once plugin_dir_path( __FILE__ ) . 'cjp-includes/cjp-fields-group.php';
require_once plugin_dir_path( __FILE__ ) . 'cjp-includes/cjp-numeric-posts-nav.php';

?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="cjp-job-post-group">

				<?php if ( have_posts() ) : ?>

				<div class="cjp-job-post-header">
					<h1>
						<?php
						if ( is_day() ) :
							printf( __( 'Daily Jobs: %s' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Monthly Jobs: %s' ), get_the_date( _x( 'F Y', 'monthly jobs date format' ) ) );
						elseif ( is_year() ) :
							printf( __( 'Yearly Jobs: %s' ), get_the_date( _x( 'Y', 'yearly jobs date format' ) ) );
						else :
							_e( 'Available Jobs' );
						endif;
						?>
					</h1>
				</div><!-- .page-header -->
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post();
						?>

						<div class="cjp-job-post-box">
							<div class="cjp-job-post-box-header">
								<h2><?php the_title(); ?></h2>
								<div class="cjp-job-extra-information cjp-job-extra-information-box--single cjp-flex-wrap">
									<?php if ( $cjp_organization_name ) : ?>
									<div class="cjp-job-extra-information-box">
										<ul>
											<li><strong><?php _e( 'Organization Name:', 'civic-job-posting' ); ?></strong></li>
											<li><?php echo esc_attr( $cjp_organization_name ); ?></li>
										</ul>
									</div>
									<?php endif; ?>

									<?php if ( $cjp_base_salary_value || $cjp_base_min_salary_value || $cjp_base_max_salary_value ) : ?>
									<div class="cjp-job-extra-information-box">
										<ul>
											<li><strong><?php _e( 'Base Salary:', 'civic-job-posting' ); ?></strong></li>
											<li><?php echo esc_attr( $cjp_final_salary_value ); ?> <?php echo __( 'per', 'civic-job-posting' ) . ' ' . esc_attr( $cjp_job_base_salary_unit_text ); ?></li>
										</ul>
									</div>
									<?php endif; ?>

									<?php if ( $cjp_job_location_start_date ) : ?>
									<div class="cjp-job-extra-information-box">
										<ul>
											<li><strong><?php _e( 'Starting Date:', 'civic-job-posting' ); ?></strong></li>
											<li><?php echo esc_attr( $cjp_job_location_start_date ); ?></li>
										</ul>
									</div>
									<?php endif; ?>

									<?php if ( $cjp_job_location_expiry_date ) : ?>
									<div class="cjp-job-extra-information-box">
										<ul>
											<li><strong><?php _e( 'Closing Date:', 'civic-job-posting' ); ?></strong></li>
											<li><?php echo esc_attr( $cjp_job_location_expiry_date ); ?></li>
										</ul>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="cjp-job-post-box-content">
								<?php if ( get_the_excerpt() ) : ?>
								<p><?php the_excerpt(); ?></p>
								<?php else : ?>
									<?php echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( apply_filters( 'the_content', get_post_meta( $post->ID, 'cjp_job_description', true ) ) ), 50 ) ) ); ?>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>" class="cjp-btn-apply"><?php _e( 'Read more', 'civic-job-posting' ); ?></a>
							</div>
						</div>
						<?php
					   endwhile;
					else :
						echo '<h5>' . __( 'No Available Jobs' ) . '</h5>';
					endif;
					cjp_numeric_posts_nav();
					?>
			</div>
		</div><!-- #content -->
	</section><!-- #primary -->
<?php

get_footer();
