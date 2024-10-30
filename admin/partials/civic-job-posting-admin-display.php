<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Civic_Job_Posting
 * @subpackage Civic_Job_Posting/admin/partials
 */
?>

<?php $cjp_options = get_option( 'cjp_settings' ); ?>

<section class="cjp-container">
	<div class="cjp-settings-group">
		<header>
			<h1><?php _e( 'Job Posting by Civic', 'civic-job-posting' ); ?></h1>
		</header>
		<hr>
		<div class="wrap">
			<p><?php _e( 'Get your required service account credentials. Please read more <a href="https://developers.google.com/search/apis/indexing-api/v3/prereqs#create-project" target="_blank">here</a>', 'civic-job-posting' ); ?>. After you create your service account , please import  your json file that you downloaded from Google , or copy and paste each value to fields.</p>
			<hr>
			<form method="post" action="options.php" id="cjp-form-settings-indexing" enctype="multipart/form-data">
				<?php
				settings_fields( 'cjp_settings' );
				do_settings_sections( 'cjp_settings' );
				?>

				<h2><?php _e( 'Your Job Posting Information', 'civic-job-posting' ); ?></h2>
				<p><?php _e( 'If you want to enable Google Indexing API , please check the "Enable Indexing". If you have another way for google to index your jobs (like another plugin or sitemap) you can leave this field empty so there will be no conflict.' ); ?></p>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="cjp_settings[enableIndexing]"><?php _e( 'Enable Google Indexing', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="checkbox" name="cjp_settings[enableIndexing]" value="enabled" <?php checked( 'enabled', ( isset( $cjp_options['enableIndexing'] ) ? $cjp_options['enableIndexing'] : '' ) ); ?>>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjp_settings[jsonFile]"><?php _e( 'Upload JSON File', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<p><?php _e( 'Please upload your JSON file, this is the file you have downloaded from Google. The file will populate the form below. Carefully check each field and make sure that all values are correct before saving your settings. Alternatively, you can copy and paste or manually enter values to the form. Please make sure that all fields are properly populated before you save your settings.' ); ?></p>
							<br>
							<input type="file" name="cjp_settings[jsonFile]" id="cjpJsonFile" />
						</td>
					</tr>
				</table>
				<h3><?php _e( 'Service Account File Information' ); ?></h3>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="cjpJsonType"><?php _e( 'Type', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="text" name="cjp_settings[type]" id="cjpJsonType"  value="<?php echo ( isset( $cjp_options['type'] ) ? esc_attr( $cjp_options['type'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonProjectId"><?php _e( 'Project ID', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="text" name="cjp_settings[projectId]" id="cjpJsonProjectId"  value="<?php echo ( isset( $cjp_options['projectId'] ) ? esc_attr( $cjp_options['projectId'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonPrivateKeyId"><?php _e( 'Private Key ID', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="text" name="cjp_settings[privateKeyId]" id="cjpJsonPrivateKeyId"  value="<?php echo ( isset( $cjp_options['privateKeyId'] ) ? esc_attr( $cjp_options['privateKeyId'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonPrivateKey"><?php _e( 'Private Key', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<textarea cols="52" rows="15" name="cjp_settings[privateKey]" id="cjpJsonPrivateKey" ><?php echo ( isset( $cjp_options['privateKey'] ) ? stripslashes( esc_textarea( $cjp_options['privateKey'] ) ) : '' ); ?></textarea>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonClientEmail"><?php _e( 'Client Email', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="text" name="cjp_settings[clientEmail]" id="cjpJsonClientEmail"  value="<?php echo ( isset( $cjp_options['clientEmail'] ) ? esc_attr( $cjp_options['clientEmail'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonClientId"><?php _e( 'Client ID', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="text" name="cjp_settings[clientId]" id="cjpJsonClientId"  value="<?php echo ( isset( $cjp_options['clientId'] ) ? esc_attr( $cjp_options['clientId'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonAuthUri"><?php _e( 'Auth Uri', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="url" name="cjp_settings[authUri]" id="cjpJsonAuthUri"  value="<?php echo ( isset( $cjp_options['authUri'] ) ? esc_url( $cjp_options['authUri'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonTokenUri"><?php _e( 'Token Uri', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="url" name="cjp_settings[tokenUri]" id="cjpJsonTokenUri"  value="<?php echo ( isset( $cjp_options['tokenUri'] ) ? esc_url( $cjp_options['tokenUri'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonAuthProviderX509CertUrl"><?php _e( 'Auth Provider x509 Cert Url', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="url" name="cjp_settings[authProviderX509CertUrl]" id="cjpJsonAuthProviderX509CertUrl"  value="<?php echo ( isset( $cjp_options['authProviderX509CertUrl'] ) ? esc_url( $cjp_options['authProviderX509CertUrl'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
					<tr>
						<th scope="row">
							<label for="cjpJsonClientX509CertUrl"><?php _e( 'Client X509 Cert Url', 'civic-job-posting' ); ?></label>
						</th>
						<td>
							<input type="url" name="cjp_settings[clientX509CertUrl]" id="cjpJsonClientX509CertUrl"  value="<?php echo ( isset( $cjp_options['clientX509CertUrl'] ) ? esc_url( $cjp_options['clientX509CertUrl'] ) : '' ); ?>" size="50" />
						</td>
					</tr>
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e( 'Save Settings', 'civic-job-posting' ); ?>" />
				</p>
			</form>
		</div>
	</div>
</section>
