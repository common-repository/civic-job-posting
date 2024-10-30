<div class="cjp_box">
	<div class="cjp-note-box">
		<div class="dashicons dashicons-warning"><span class="screen-reader-text"><?php _e( 'warning', 'civic-job-posting' ); ?></span></div>
		<span><?php _e( ' You can also include the recommended properties to add more information about your content, which could provide a better user experience. You can <a href="https://developers.google.com/search/docs/data-types/job-posting#JobPosting-definition" target="_blank">read more here</a>.', 'civic-job-posting' ); ?> </span>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Applicant Location Requirements', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<p><?php _e( 'This property is only recommended if applicants may be located in one or more geographic locations and the job may or must be 100% remote. If the job can either be done remotely from the country , you have to check " Is this work remotely 100% ? " and then you can fill the field "Applicant Remote Country" for Example USA.', 'civic-job-posting' ); ?></p>
			<?php $check_remote_value = esc_attr( get_post_meta( get_the_ID(), 'cjp_applicant_remotely_check', true ) ); ?>
			<label for="cjp_applicant_remotely_check"><?php _e( 'Is this work remotely 100% ?', 'civic-job-posting' ); ?></label>
			<input id="cjp_applicant_remotely_check"
				   type="checkbox"
				   name="cjp_applicant_remotely_check" value="checked"
					<?php echo checked( 'checked', $check_remote_value, false ); ?>>
		</div>
		<div class="cjp-field-group">
			<p><?php _e( 'Please fill this field only for specific Applicant Remote Country. If you need multiple Countries then separated by commas.', 'civic-job-posting' ); ?></p>
			<label for="cjp_applicant_country"><?php _e( 'Applicant Remote Country', 'civic-job-posting' ); ?></label>
			<input id="cjp_applicant_country"
				   type="text"
				   name="cjp_applicant_country"
				   placeholder="Canada,Brazil"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_applicant_country', true ) ); ?>">
		</div>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Base Salary', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<label for="cjp_job_base_salary_currency"><?php _e( 'Base Salary Currency', 'civic-job-posting' ); ?></label>
			<select id="cjp_job_base_salary_currency"
				   name="cjp_job_base_salary_currency">
				<?php $currency_select = esc_attr( get_post_meta( get_the_ID(), 'cjp_job_base_salary_currency', true ) ); ?>

				<option value="USD" <?php selected( $currency_select, 'USD' ); ?>>United States Dollars</option>
				<option value="EUR" <?php selected( $currency_select, 'EUR' ); ?>>Euro</option>
				<option value="GBP" <?php selected( $currency_select, 'GBP' ); ?>>United Kingdom Pounds</option>
				<option value="DZD" <?php selected( $currency_select, 'DZD' ); ?>>Algeria Dinars</option>
				<option value="ARP" <?php selected( $currency_select, 'ARP' ); ?>>Argentina Pesos</option>
				<option value="AUD" <?php selected( $currency_select, 'AUD' ); ?>>Australia Dollars</option>
				<option value="ATS" <?php selected( $currency_select, 'ATS' ); ?>>Austria Schillings</option>
				<option value="BSD" <?php selected( $currency_select, 'BSD' ); ?>>Bahamas Dollars</option>
				<option value="BBD" <?php selected( $currency_select, 'BBD' ); ?>>Barbados Dollars</option>
				<option value="BEF" <?php selected( $currency_select, 'BEF' ); ?>>Belgium Francs</option>
				<option value="BMD" <?php selected( $currency_select, 'BMD' ); ?>>Bermuda Dollars</option>
				<option value="BRR" <?php selected( $currency_select, 'BRR' ); ?>>Brazil Real</option>
				<option value="BGL" <?php selected( $currency_select, 'BGL' ); ?>>Bulgaria Lev</option>
				<option value="CAD" <?php selected( $currency_select, 'CAD' ); ?>>Canada Dollars</option>
				<option value="CLP" <?php selected( $currency_select, 'CLP' ); ?>>Chile Pesos</option>
				<option value="CNY" <?php selected( $currency_select, 'CNY' ); ?>>China Yuan Renmimbi</option>
				<option value="CYP" <?php selected( $currency_select, 'CYP' ); ?>>Cyprus Pounds</option>
				<option value="CSK" <?php selected( $currency_select, 'CSK' ); ?>>Czech Republic Koruna</option>
				<option value="DKK" <?php selected( $currency_select, 'DKK' ); ?>>Denmark Kroner</option>
				<option value="NLG" <?php selected( $currency_select, 'NLG' ); ?>>Dutch Guilders</option>
				<option value="XCD" <?php selected( $currency_select, 'XCD' ); ?>>Eastern Caribbean Dollars</option>
				<option value="EGP" <?php selected( $currency_select, 'EGP' ); ?>>Egypt Pounds</option>
				<option value="FJD" <?php selected( $currency_select, 'FJD' ); ?>>Fiji Dollars</option>
				<option value="FIM" <?php selected( $currency_select, 'FIM' ); ?>>Finland Markka</option>
				<option value="FRF" <?php selected( $currency_select, 'FRF' ); ?>>France Francs</option>
				<option value="DEM" <?php selected( $currency_select, 'DEM' ); ?>>Germany Deutsche Marks</option>
				<option value="XAU" <?php selected( $currency_select, 'XAU' ); ?>>Gold Ounces</option>
				<option value="GRD" <?php selected( $currency_select, 'GRD' ); ?>>Greece Drachmas</option>
				<option value="HKD" <?php selected( $currency_select, 'HKD' ); ?>>Hong Kong Dollars</option>
				<option value="HUF" <?php selected( $currency_select, 'HUF' ); ?>>Hungary Forint</option>
				<option value="ISK" <?php selected( $currency_select, 'ISK' ); ?>>Iceland Krona</option>
				<option value="INR" <?php selected( $currency_select, 'INR' ); ?>>India Rupees</option>
				<option value="IDR" <?php selected( $currency_select, 'IDR' ); ?>>Indonesia Rupiah</option>
				<option value="IEP" <?php selected( $currency_select, 'IEP' ); ?>>Ireland Punt</option>
				<option value="ILS" <?php selected( $currency_select, 'ILS' ); ?>>Israel New Shekels</option>
				<option value="ITL" <?php selected( $currency_select, 'ITL' ); ?>>Italy Lira</option>
				<option value="JMD" <?php selected( $currency_select, 'JMD' ); ?>>Jamaica Dollars</option>
				<option value="JPY" <?php selected( $currency_select, 'JPY' ); ?>>Japan Yen</option>
				<option value="JOD" <?php selected( $currency_select, 'JOD' ); ?>>Jordan Dinar</option>
				<option value="KRW" <?php selected( $currency_select, 'KRW' ); ?>>Korea (South) Won</option>
				<option value="LBP" <?php selected( $currency_select, 'LBP' ); ?>>Lebanon Pounds</option>
				<option value="LUF" <?php selected( $currency_select, 'LUF' ); ?>>Luxembourg Francs</option>
				<option value="MYR" <?php selected( $currency_select, 'MYR' ); ?>>Malaysia Ringgit</option>
				<option value="MXP" <?php selected( $currency_select, 'MXP' ); ?>>Mexico Pesos</option>
				<option value="NLG" <?php selected( $currency_select, 'NLG' ); ?>>Netherlands Guilders</option>
				<option value="NZD" <?php selected( $currency_select, 'NZD' ); ?>>New Zealand Dollars</option>
				<option value="NOK" <?php selected( $currency_select, 'NOK' ); ?>>Norway Kroner</option>
				<option value="PKR" <?php selected( $currency_select, 'PKR' ); ?>>Pakistan Rupees</option>
				<option value="XPD" <?php selected( $currency_select, 'XPD' ); ?>>Palladium Ounces</option>
				<option value="PHP" <?php selected( $currency_select, 'PHP' ); ?>>Philippines Pesos</option>
				<option value="XPT" <?php selected( $currency_select, 'XPT' ); ?>>Platinum Ounces</option>
				<option value="PLZ" <?php selected( $currency_select, 'PLZ' ); ?>>Poland Zloty</option>
				<option value="PTE" <?php selected( $currency_select, 'PTE' ); ?>>Portugal Escudo</option>
				<option value="ROL" <?php selected( $currency_select, 'ROL' ); ?>>Romania Leu</option>
				<option value="RUR" <?php selected( $currency_select, 'RUR' ); ?>>Russia Rubles</option>
				<option value="SAR" <?php selected( $currency_select, 'SAR' ); ?>>Saudi Arabia Riyal</option>
				<option value="XAG" <?php selected( $currency_select, 'XAG' ); ?>>Silver Ounces</option>
				<option value="SGD" <?php selected( $currency_select, 'SGD' ); ?>>Singapore Dollars</option>
				<option value="SKK" <?php selected( $currency_select, 'SKK' ); ?>>Slovakia Koruna</option>
				<option value="ZAR" <?php selected( $currency_select, 'ZAR' ); ?>>South Africa Rand</option>
				<option value="KRW" <?php selected( $currency_select, 'KRW' ); ?>>South Korea Won</option>
				<option value="ESP" <?php selected( $currency_select, 'ESP' ); ?>>Spain Pesetas</option>
				<option value="XDR" <?php selected( $currency_select, 'XDR' ); ?>>Special Drawing Right (IMF)</option>
				<option value="SDD" <?php selected( $currency_select, 'SDD' ); ?>>Sudan Dinar</option>
				<option value="SEK" <?php selected( $currency_select, 'SEK' ); ?>>Sweden Krona</option>
				<option value="CHF" <?php selected( $currency_select, 'CHF' ); ?>>Switzerland Francs</option>
				<option value="TWD" <?php selected( $currency_select, 'TWD' ); ?>>Taiwan Dollars</option>
				<option value="THB" <?php selected( $currency_select, 'THB' ); ?>>Thailand Baht</option>
				<option value="TTD" <?php selected( $currency_select, 'TTD' ); ?>>Trinidad and Tobago Dollars</option>
				<option value="TRL" <?php selected( $currency_select, 'TRL' ); ?>>Turkey Lira</option>
				<option value="VEB" <?php selected( $currency_select, 'VEB' ); ?>>Venezuela Bolivar</option>
				<option value="ZMK" <?php selected( $currency_select, 'ZMK' ); ?>>Zambia Kwacha</option>
				</select>
		</div>
		<p><?php _e( 'The actual base salary for the job, as provided by the employer (not an estimate).', 'civic-job-posting' ); ?></p>
		<div class="cjp-field-group">
			<label for="cjp_base_salary_value"><?php _e( 'Salary Base Value', 'civic-job-posting' ); ?></label>
			<input id="cjp_base_salary_value"
				   type="number"
				   min="0"
				   name="cjp_base_salary_value"
				   placeholder="40.00"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_base_salary_value', true ) ); ?>">
		</div>
		<p><?php _e( 'To specify a salary range, define a minValue and a maxValue, rather than a single value. If you choose to define a minValue and a maxValue the Above Salary Value will be ignored.', 'civic-job-posting' ); ?></p>
		<div class="cjp-field-group">
			<label for="cjp_base_min_salary_value"><?php _e( 'Salary Min Value', 'civic-job-posting' ); ?></label>
			<input id="cjp_base_min_salary_value"
				   type="number"
				   min="0"
				   name="cjp_base_min_salary_value"
				   placeholder="40.00"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_base_min_salary_value', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<label for="cjp_base_max_salary_value"><?php _e( 'Salary Max Value', 'civic-job-posting' ); ?></label>
			<input id="cjp_base_max_salary_value"
				   type="number"
				   min="0"
				   name="cjp_base_max_salary_value"
				   placeholder="50.00"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_base_max_salary_value', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<label for="cjp_job_base_salary_unit_text"><?php _e( 'Salary Unit', 'civic-job-posting' ); ?></label>
			<select id="cjp_job_base_salary_unit_text"
					name="cjp_job_base_salary_unit_text">
				<?php $salary_unit = get_post_meta( get_the_ID(), 'cjp_job_base_salary_unit_text', true ); ?>
				<option value="HOUR" <?php selected( $salary_unit, 'HOUR' ); ?>><?php _e( 'HOUR', 'civic-job-posting' ); ?></option>
				<option value="DAY" <?php selected( $salary_unit, 'DAY' ); ?>><?php _e( 'DAY', 'civic-job-posting' ); ?></option>
				<option value="WEEK" <?php selected( $salary_unit, 'WEEK' ); ?>><?php _e( 'WEEK', 'civic-job-posting' ); ?></option>
				<option value="MONTH" <?php selected( $salary_unit, 'MONTH' ); ?>><?php _e( 'MONTH', 'civic-job-posting' ); ?></option>
				<option value="YEAR" <?php selected( $salary_unit, 'YEAR' ); ?>><?php _e( 'YEAR', 'civic-job-posting' ); ?></option>
			</select>
		</div>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Employment Type', 'civic-job-posting' ); ?></h3>
		<p><?php _e( 'Type of employment. You can Choose Multiple types of employment with Ctrl + left click.', 'civic-job-posting' ); ?></p>
		<div class="cjp-field-group">
			<label for="cjp_job_employment_type"><?php _e( 'Employment Type', 'civic-job-posting' ); ?></label>
			<select id="cjp_job_employment_type"
					name="cjp_job_employment_type[]" multiple>
				<?php
				$select_employments = get_post_meta( get_the_ID(), 'cjp_job_employment_type', true );
				?>
				<option value="FULL_TIME" <?php if($select_employments) if(in_array('FULL_TIME', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Full Time', 'civic-job-posting' ); ?></option>
				<option value="PART_TIME" <?php if($select_employments) if(in_array('PART_TIME', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Part Time', 'civic-job-posting' ); ?></option>
				<option value="CONTRACTOR" <?php if($select_employments) if(in_array('CONTRACTOR', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Contractor', 'civic-job-posting' ); ?></option>
				<option value="TEMPORARY"  <?php if($select_employments) if(in_array('TEMPORARY', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Temporary', 'civic-job-posting' ); ?></option>
				<option value="INTERN" <?php if($select_employments) if(in_array('INTERN', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Intern', 'civic-job-posting' ); ?></option>
				<option value="VOLUNTEER" <?php if($select_employments) if(in_array('VOLUNTEER', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Volunteer', 'civic-job-posting' ); ?></option>
				<option value="PER_DIEM" <?php if($select_employments) if(in_array('PER_DIEM', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Per Diem', 'civic-job-posting' ); ?></option>
				<option value="OTHER" <?php if($select_employments) if(in_array('OTHER', $select_employments)) { ?> selected <?php } ?>><?php _e( 'Other', 'civic-job-posting' ); ?></option>
			</select>
		</div>

	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Identifier', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<p><?php _e( 'The hiring organization\'s unique identifier for the job.', 'civic-job-posting' ); ?></p>
			<label for="cjp_identifier_name"><?php _e( 'Identifier Name', 'civic-job-posting' ); ?></label>
			<input id="cjp_identifier_name"
				   type="text"
				   name="cjp_identifier_name"
				   placeholder="Example"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_identifier_name', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<label for="cjp_identifier_value"><?php _e( 'Identifier Value', 'civic-job-posting' ); ?></label>
			<input id="cjp_identifier_value"
				   type="text"
				   name="cjp_identifier_value"
				   placeholder="1234567"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_identifier_value', true ) ); ?>">
		</div>
	</div>
	<div class="meta-options cjp_field">
		<h3><?php _e( 'Apply', 'civic-job-posting' ); ?></h3>
		<div class="cjp-field-group">
			<p><?php _e( 'Apply Url for this job.', 'civic-job-posting' ); ?></p>
			<label for="cjp_apply_value"><?php _e( 'Apply Url', 'civic-job-posting' ); ?></label>
			<input id="cjp_apply_value"
				   type="url"
				   name="cjp_apply_value"
				   placeholder="https://www.example.com/job-apply"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_apply_value', true ) ); ?>">
		</div>
		<div class="cjp-field-group">
			<p><?php _e( 'Apply Email for this job. If you fill the Apply Email field then your above Apply Url will be ignored.', 'civic-job-posting' ); ?></p>
			<label for="cjp_apply_value_email"><?php _e( 'Apply Email', 'civic-job-posting' ); ?></label>
			<input id="cjp_apply_value_email"
				   type="email"
				   name="cjp_apply_value_email"
				   placeholder="admin@gmail.com"
				   value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'cjp_apply_value_email', true ) ); ?>">
		</div>
	</div>
</div>
