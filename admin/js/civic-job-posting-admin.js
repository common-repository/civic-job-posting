(function( $ ) {
	'use strict';

	$(document).on('change', '#cjpJsonFile', function(event) {

		var reader = new FileReader();

		reader.onload = function(event) {
			try {
				var jsonObj = JSON.parse(event.target.result);
				console.log(jsonObj.type);
				if(jsonObj.type && jsonObj.project_id && jsonObj.private_key_id && jsonObj.private_key_id && jsonObj.private_key && jsonObj.client_email && jsonObj.client_id && jsonObj.auth_uri && jsonObj.token_uri && jsonObj.auth_provider_x509_cert_url && jsonObj.client_x509_cert_url){

					$('#cjpJsonType').val(jsonObj.type);
					$('#cjpJsonProjectId').val(jsonObj.project_id);
					$('#cjpJsonPrivateKeyId').val(jsonObj.private_key_id);
					$('#cjpJsonPrivateKey').val(jsonObj.private_key);
					$('#cjpJsonClientEmail').val(jsonObj.client_email);
					$('#cjpJsonClientId').val(jsonObj.client_id);
					$('#cjpJsonAuthUri').val(jsonObj.auth_uri);
					$('#cjpJsonTokenUri').val(jsonObj.token_uri);
					$('#cjpJsonAuthProviderX509CertUrl').val(jsonObj.auth_provider_x509_cert_url);
					$('#cjpJsonClientX509CertUrl').val(jsonObj.client_x509_cert_url);

					alert('Your file have been imported. Please check  the values and then Save your Settings !');

				} else {
					alert('This .json file is not valid for google service account. Please try with a different .json file or insert your values manually !');
				}
			}
			catch(err) {
				alert('This file is invalid. Please Upload a .json file !');
			}
		};

		reader.readAsText(event.target.files[0]);
	});

})( jQuery );
