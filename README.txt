=== Civic Job Posting ===
Contributors: tasoscivicuk, aperperis, ralliaf 
Plugin Name: Civic Job Posting
Author URI: https://www.civicuk.com
Author: Civic Uk
Tags: Jobs, Google Search Jobs, Job Posting
Requires at least: 3.0.1
Tested up to: 5.2.2
Stable tag: trunk
Version: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Civic Job Posting offers a mechanism to easily handle the medatadata of your job postings in order for them to appear in the special Job section of Google Search results.

== Description ==

With Civic Job Posting plugin you may improve the visibility of job posts published in your Wordpress installation by automatically adding structured metadata in your job posting webpages. 
These structured metadata make your job related pages eligible to appear using a special user experience in Google Search results.

The plugin provides you with the ability to create your own job postings and to enable (if you need so) Google indexing from the corresponding 'Civic Job Posting' settings page. 
By installing the plugin the job posting metadata are always added in your job posting web pages, thus the related pages will be always indexed by Google as jobs irrespective of the selected option for google indexing.

Before enabling Google indexing from the plugin settings page you will need to create a service account with Google (please read more [here](https://developers.google.com/search/apis/indexing-api/v3/prereqs#create-project)) and fill in the corresponding information in the fields exposed by the Civic Job Posting plugin settings page. Alternatively you may import the JSON file provided by Google and this will be automatically parsed to fill the corresponding fields.

Once Google indexing is enabled and Google Job Posting API is properly authorised to index information from your website you may start using this functionality. 
Once a Job Posting post is created/edited/deleted the corresponding HTTP request is fired towards the Google Job Posting API requesting a reindex of your job post.
Google robots will almost instantly try to index your job posting webpage. Thus you should ensure that Googlebot can crawl your job posting web pages (not protected by a robots.txt file or robots meta tag) and that your webserver is properly configured to allow frequent crawls.

In order to make Job Posting web pages match your website branding you may apply your own CSS rules and/or modify the corresponding templates.
Adapting the templates for archive, category and single job, is as simple as copying the corresponding files and 'cjp-includes' located in 'civic-job-posting/public/partials' plugin folder, to your theme root folder. You may then proceed with any modification accordingly.


== Installation ==

1. Upload the entire plugin folder to the /wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' menu in Wordpress.
3. Create your own Job post.
4. Configure the Google Indexing by selecting 'Civic Job Posting' on your admin menu. 

== Frequently Asked Questions ==

= I'm getting an error message from Google Indexing =

Be sure to acquire your required account service credentials from Google. If you need support you may get further information from [here](https://developers.google.com/search/apis/indexing-api/v3/prereqs#create-project). 
If you are not sure on the validity of your service credentials you may disable the "Enable Google Indexing" option on the plugin settings page until you solve the problem.

= I Want to change the layout of my Job Posts =

You may change your job posts layout by adding custom CSS in your theme. 
If you want to completely change the layout template, you may copy the templates files for archive, category , single job and 'cjp-includes' located at 'civic-job-posting/public/partials' plugin folder, to your theme root folder. You may then proceed with any modification accordingly.

= Google is not indexing my job posting web pages =

Ensure that Googlebot can crawl your job posting web pages (not protected by a robots.txt file or robots meta tag) and that your webserver is properly configured to allow frequent crawls.

= WordPress plugin installation failed? =

If for any reason the installation failed, you can download and unzip the plugin folder. Then you can upload the entire plugin folder to the /wp-content/plugins/ directory and activate the plugin through the �Plugins� menu in WordPress.

== Changelog ==
= 1.2 =
* Correct Salary Unit to Month.

= 1.1 =
* Plugin better performance.

= 1.0 =
* Plugin 1st Release.
