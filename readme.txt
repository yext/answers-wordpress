=== Yext Answers ===
Contributors: thundersnow
Tags: search, site-search, yext, autocomplete, relevant-search, better-search, custom-search, search-by-category, natural-language-search, search-engine
Requires at least: 4.9.8
Tested up to: 5.6
Stable tag: 1.0.1
Requires PHP: 7.0
License: BSD 3-Clause "New" or "Revised" License
License URI:  https://opensource.org/licenses/BSD-3-Clause

Add the world's best search experience to your website in minutes.

== Description ==

Your customers have questions. Can your website answer them?

Boost conversion, reduce support costs, and gain new customer intelligence by adding Yext Answers site search to your Wordpress-powered website. The Yext Answers plugin allows you to seamlessly integrate your Yext Answers search bar and search results page to your existing Wordpress pages.

To use the Yext Answers plugin, you must have a Yext account. The Yext Answers plugin is search-as-a-service; Upon download, you will need to provide your Answers API key and a few other pieces of information in order for the plugin to work. We'll be calling the Answers Javascript SDK (and its CSS and templates) in order to render the search bar, and Javascript from our Pages platform to load the search results page. 

Visit www.yext.com for more information. Using Yext Answers is subject to the agreement entered into between you and Yext. View Yext's privacy policy here: https://www.yext.com/privacy-policy.

### Why do I need Answers?

**Answer Customers' Questions.**
Deliver a cutting-edge search experience on your website that understands natural language questions, provides direct answers (not blue links), and paves the path from search to conversion.

Use Yext Answers to power a variety of onsite search experiences — from job finders to store locators, or even full site search — on your Wordpress site.

**Operate Efficiently.** 
The Yext Answers plugin is an out-of-the-box solution that minimizes the need for IT to manage and optimize an effective search experience. Once you’ve downloaded the plug in, all you need to do is use the provided shortcodes for the Answers search bar and search results page. 

**Retain Traffic and Boost Conversion.**
When your website answers your customers’ questions, they’re more likely to stay on your site, instead of bouncing to a search engine or a competitor.

And, customizable CTAs pave the path from search to conversion: early adopters have seen Yext Answers driving a 36% higher website conversion rate than legacy keyword-based search providers.

**Reduce Support Costs.**
When your website can answer more customers’ questions, fewer of them will turn to your call center or live chat — saving you valuable resources.

**Gain New Customer Insights.**
If you could see every question a customer asked on your website, would you adjust your content to better suit their needs? With insights from Yext Answers, you can learn what matters to your customers and give them more of what they’re looking for.

== Installation ==
### Installing from within Wordpress:
1. Download yext-answers.zip.
2. Visit Plugins > Add New.
3. Search for Yext Answers.
4. Install and activate the Yext Answers plugin. 

### Installing Manually:
1. Download yext-answers.zip.
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

== Frequently Asked Questions ==

= What information will I need to use the plug in? =

Your administrator will help you obtain the needed information. You’ll need your API Key, Experience Key, Business ID, Locale, the URL of the search results page, and a version number for our javascript library

= How does the plug in work? =

Search bar: Under the hood, this shortcode calls our Answers Javascript Library to create the search bar component using your provided configuration.
Search Results page: This shortcode creates a div and adds a script tag to place the iframe with your Answers search results. 

= Do I need to host the search results page on Wordpress? =

No, you can still use our search bar shortcode, and link out to a different page for the search results page.
