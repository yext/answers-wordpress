# Yext Answers Site Search for Wordpress

Your customers have questions. Can your website answer them?

Boost conversion, reduce support costs, and gain new customer intelligence by adding Yext Answers site search to your Wordpress-powered website. The Yext Answers Site Search plugin allows you to seamlessly integrate your Yext Answers search bar and search results page to your existing Wordpress pages. If you don’t currently work with Yext but would like to add the world’s best site search to your Wordpress site, get started today at [yext.com](https://www.yext.com/free-trial/?utm_source=Wordpress).

## Installation
### Installing from within Wordpress:
1. Visit Plugins > Add New.
2. Search for Yext Answers Site Search.
3. Install and activate the Yext Answers Site Search plugin. 

### Installing Manually:
1. Download answers-wordpress-main.zip from this repository (you don't need to clone the entire repo, just go to https://github.com/yext/answers-wordpress then hit "Code" and "Download ZIP").
2. Unzip answers-wordpress-main.zip and upload its content to your wp-content/plugins directory. 
3. Visit Plugins.
4. Activate the Yext Answers Site Search plugin. 

### After Installation
To configure Answers on your Wordpress site, click "Settings" and select "Yext Answers Site Search". Fill out the following attributes on the Settings page:
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
