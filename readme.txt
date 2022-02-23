=== Yext Answers Site Search ===
Contributors: thundersnow
Tags: search, site-search, yext, autocomplete, relevant-search, better-search, custom-search, search-by-category, natural-language-search, search-engine
Requires at least: 4.9.8
Tested up to: 5.8
Stable tag: 1.0.3
Requires PHP: 7.0
License: BSD 3-Clause "New" or "Revised" License
License URI:  https://opensource.org/licenses/BSD-3-Clause


== Description ==

This plugin is no longer being maintained. If you are looking to add Answers to your Wordpress site, please use our new plugin: https://wordpress.org/plugins/yext-ai-search/.

== Installation ==
### Installing from within Wordpress:
1. Visit Plugins > Add New.
2. Search for Yext Answers Site Search.
3. Install and activate the Yext Answers Site Search plugin. 

### Installing Manually:
1. Download yext-answers.zip.
2. Unzip yext-answers.zip and upload its content to your wp-content/plugins directory. 
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

== Frequently Asked Questions ==

= What information will I need to use the plug in? =

Your administrator will help you obtain the needed information. You’ll need your API Key, Experience Key, Business ID, Locale, the URL of the search results page, and a version number for our javascript library

= How does the plug in work? =

Search bar: Under the hood, this shortcode calls our Answers Javascript Library to create the search bar component using your provided configuration.
Search Results page: This shortcode creates a div and adds a script tag to place the iframe with your Answers search results. 

= Do I need to host the search results page on Wordpress? =

No, you can still use our search bar shortcode, and link out to a different page for the search results page.
