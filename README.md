# Yext Answers for Wordpress

Your customers have questions. Can your website answer them?

Boost conversion, reduce support costs, and gain new customer intelligence by adding Yext Answers site search to your Wordpress-powered website. The Yext Answers plugin allows you to seamlessly integrate your Yext Answers search bar and search results page to your existing Wordpress pages.

To use the Yext Answers plug in, you must have a Yext account. Visit www.yext.com for more information. 

## Installation
### Installing from within Wordpress:
1. Download yext-answers.zip from this repository (you don't need to clone the entire repo, just go to https://github.com/yext/answers-wordpress/blob/main/yext-answers.zip and hit "download").
2. Visit Plugins > Add New.
3. Search for Yext Answers.
4. Install and activate the Yext Answers plugin. 

### Installing Manually:
1. Download yext-answers.zip from this repository (you don't need to clone the entire repo, just go to https://github.com/yext/answers-wordpress/blob/main/yext-answers.zip and hit "download").
2. Unzip yext-answers.zip and upload its content to your wp-content/plugins directory. 
3. Visit Plugins.
4. Activate the Yext Answers plugin. 

### After Installation
To configure Answers on your Wordpress site, click "Settings" and select "Yext Answers". Fill out the following attributes on the Settings page:
* `API Key`
* `Experience Key`
* `Business ID`
* `Locale`
* `Redirect URL` - The URL of the search results page.
* `Answers Javascript Version` - The most recent version of the Yext Answers Javascript library.
* `iFrame Script URL` - Fill this out if provided by your administrator.

Once installed, use the following shortcodes to add the Answers experience to your page:

* Search bar:  `[yext_searchbar placeholder_text = "Search..."]`
* Search results page: `[yext_results_page]`
