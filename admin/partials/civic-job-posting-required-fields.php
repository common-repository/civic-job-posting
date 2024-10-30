<div class="cjp_box">
	<div class="cjp-note-box">
		<div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e( 'warning', 'civic-job-posting' ); ?></span></div>
		<span> <?php _e( ' You have to include the required properties for your content to be eligible for display in enhanced search results. You can <a href="https://developers.google.com/search/docs/data-types/job-posting#JobPosting-definition" target="_blank">read more here</a>.', 'civic-job-posting' ); ?></span>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Job Description', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<p><?php _e( 'The description should be a complete representation of the job, including job responsibilities, qualifications, skills, working hours, education requirements, and experience requirements. The description can\'t be the same as the title.', 'civic-job-posting' ); ?></p>
			<?php
			wp_editor(
				apply_filters( 'the_content', get_post_meta( get_the_ID(), 'cjp_job_description', true ) ),
				'cjp_job_description',
				$settings = array(
					'media_buttons' => false,
					'tinymce'       => array(
						'block_formats' => 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3; Header 4=h4; Header 5=h5',
						'toolbar1'      => 'formatselect,bold,italic,bullist,link',
					),
				)
			);
			?>
		</div>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Hiring Organization', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<p><?php _e( 'The organization offering the job position. This should be the name of the company (for example, “Starbucks, Inc”), and not the specific location that is hiring (for example, “Starbucks on Main Street”).', 'civic-job-posting' ); ?></p>
			<label for="cjp_organization_name"><?php _e( 'Organization Name', 'civic-job-posting' ); ?> <span>*</span></label>
			<input id="cjp_organization_name"
				   type="text"
				   name="cjp_organization_name"
				   placeholder="Example"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_organization_name', true ) ); ?>" required>
		</div>
		<div class="cjp-field-group">
			<p><?php _e( 'This should be the website url of the company (for example, “https://www.example.com”).', 'civic-job-posting' ); ?></p>
			<label for="cjp_organization_url"><?php _e( 'Organization Url', 'civic-job-posting' ); ?> <span>*</span></label>
			<input id="cjp_organization_url"
				   type="url"
				   name="cjp_organization_url"
				   placeholder="https://www.example.com"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_organization_url', true ) ); ?>" required >
		</div>
		<div class="cjp-field-group">
			<p>
			<?php
			_e(
				'If you have a third-party job site, you can provide a different logo for a given organization than the image shown in the organization\'s Knowledge Graph card. Additional image guidelines : <br> The image must be 112x112px, at minimum. <br> The image URL must be crawlable and indexable. <br> The image must be in .jpg, .png, or. gif format. <br> Make sure that you follow the logo  <a href="https://developers.google.com/search/docs/data-types/logo#logo-property" target="_blank">image guidelines</a>  and
                <a href="https://developers.google.com/search/docs/data-types/job-posting#company-logo" target="_blank">Company logo guidelines.</a>  Please provide the url of your image :',
				'civic-job-posting'
			);
			?>
			   </p>
			<label for="cjp_organization_logo"><?php _e( 'Organization Logo', 'civic-job-posting' ); ?></label>
			<input id="cjp_organization_logo"
				   type="url"
				   name="cjp_organization_logo"
				   placeholder="https://www.example.com/images/logo.png"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_organization_logo', true ) ); ?>">
		</div>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Job Location', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<p><?php _e( 'The physical location(s) of the business where the employee will report to work (such as an office or worksite), not the location where the job was posted. Include as many fields as possible. The more properties you provide, the higher quality the job posting is to our users', 'civic-job-posting' ); ?></p>
			<p><?php _e( 'You have to fill at least one Job location for Google Job Posting. for example , If you need your job to be only remote, please leave the Job Location fields empty and fill the Applicant Location Requirements inside the Optional Fields. Otherwise if you need your job to be at physical location or remote, please fill the Job Location fields and the Applicant Location Requirements.' ); ?></p>
			<label for="cjp_job_location_street_address"><?php _e( 'Street Address', 'civic-job-posting' ); ?></label>
			<input id="cjp_job_location_street_address"
				   type="text"
				   name="cjp_job_location_street_address"
				   placeholder="555 Clancy St"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_job_location_street_address', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<label for="cjp_job_location_address_locality"><?php _e( 'Locality', 'civic-job-posting' ); ?></label>
			<input id="cjp_job_location_address_locality"
				   type="text"
				   name="cjp_job_location_address_locality"
				   placeholder="Detroit"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_job_location_address_locality', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<label for="cjp_job_location_address_region"><?php _e( 'Region', 'civic-job-posting' ); ?></label>
			<input id="cjp_job_location_address_region"
				   type="text"
				   name="cjp_job_location_address_region"
				   placeholder="MI"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_job_location_address_region', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<label for="cjp_job_location_postal_code"><?php _e( 'Postal Code', 'civic-job-posting' ); ?></label>
			<input id="cjp_job_location_postal_code"
				   type="text"
				   name="cjp_job_location_postal_code"
				   placeholder="48201"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_job_location_postal_code', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<p><?php _e( 'Please fill the Country ISO code for Country Code. View full <a target="_blank" href="https://www.loc.gov/standards/iso639-2/php/code_list.php">list of languages codes.</a>', 'civic-job-posting' ); ?></p>
			<label for="cjp_job_location_address_country"><?php _e( 'Country Code', 'civic-job-posting' ); ?></label>
			<input id="cjp_job_location_address_country"
				   type="text"
				   name="cjp_job_location_address_country"
				   placeholder="US"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_job_location_address_country', true ) ); ?>">
		</div>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Job Dates', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<?php $date_start = get_post_meta( get_the_ID(), 'cjp_job_location_start_date', true ); ?>
			<p><?php _e( 'The date when the job posting will Start.', 'civic-job-posting' ); ?></p>
			<label for="cjp_job_location_start_date"><?php _e( 'Starting Date *', 'civic-job-posting' ); ?></label>
			<input id="cjp_job_location_start_date"
				   type="date"
				   name="cjp_job_location_start_date" required
				   value="<?php if ( $date_start ) { echo  esc_attr( $date_start ); } else { echo esc_attr( date('Y-m-d') ); } ?>">
		</div>
		<div class="cjp-field-group">
			<p><?php _e( 'The date when the job posting will expire. If a job posting never expires, or you do not know when the job will expire, do not include this property.', 'civic-job-posting' ); ?></p>
			<label for="cjp_job_location_expiry_date"><?php _e( 'Expiry Date', 'civic-job-posting' ); ?></label>
			<input id="cjp_job_location_expiry_date"
				   type="date"
				   name="cjp_job_location_expiry_date"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_job_location_expiry_date', true ) ); ?>">
		</div>
	</div>
	<div class="meta-options cjp_field">
		<div class="cjp-field-group">
			<input readonly id="cjp_job_permalink_published" name="cjp_job_permalink_published" type="hidden"  value="<?php echo esc_url( get_post_meta( get_the_ID(), 'cjp_job_permalink_published', true ) ); ?>" >
		</div>

	</div>
</div>
