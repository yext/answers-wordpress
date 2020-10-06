<?php
/**
 * Plugin Name: Yext Answers Plugin
 * Plugin URI: https://www.yext.com
 * Description: Add an answers experience to your website seamlessly.
 * Version: 0.1
 * Text Domain: yext-answers-plugin
 * Author: Chris
 * Author URI: https://www.yext.com
 */

function get_value_for_option ($key, $default = '') {
  $options = get_option('yext_answers_options');
  $optionValue = isset($options[$key]) ? $options[$key] : $default;
  return $optionValue;
}

/**
 * Replaces the shortcode with an answers searchbar. We place the stylesheet
 * link, the SDK cdn script, and the initAnswers configuration in the place of
 * the shortcode in HTML.
 * 
 * @param $atts.container_selector The ID to use for the SearchBar
 * @param $atts.name The name to use for the SearchBar
 */
function yext_searchbar_shortcode_handler($atts) {
  // Get option values from Yext Settings
  $options = get_option('yext_answers_options');

  $api_key = esc_attr(get_value_for_option('yext_api_key'));
  $experience_key = esc_attr(get_value_for_option('yext_experience_key'));
  $business_id = esc_attr(get_value_for_option('yext_business_id'));
  $locale = esc_attr(get_value_for_option('yext_locale'));
  $redirectUrl = esc_attr(get_value_for_option('yext_redirect_url'));
  $version = esc_attr(get_value_for_option('yext_version'));
  $css_overrides = get_value_for_option('yext_css_overrides');

  $user_init_configuration = get_value_for_option('yext_init_passthrough', '{}');
  $user_init_configuration = ($user_init_configuration == '') ? '{}' : $user_init_configuration;
  $user_search_configuration = get_value_for_option('yext_searchbar_passthrough', '{}');
  $user_search_configuration = ($user_search_configuration == '') ? '{}' : $user_search_configuration;

  // Get option values from shortcode attributes
  $atts = shortcode_atts( array(
    'container_selector' => 'yext-search-form',
    'name' => 'SearchBar',
  ), $atts);
  $container_selector = $atts['container_selector'];
  $name = $atts['name'];

  // Merge user-override search and init configuration with default
  $default_init_configuration = array(
    'apiKey' => $api_key,
    'experienceKey' => $experience_key,
    'experienceVersion' => 'PRODUCTION',
    'locale' => $locale,
    'businessId' => $business_id,
  );
  $init_configuration = array_merge(
    $default_init_configuration,
    json_decode($user_init_configuration, true)
  );
  $init_configuration_encoded = json_encode($init_configuration);

  $default_search_configuration = array(
    'container' => '#' . $container_selector,
    'redirectUrl' => $redirectUrl,
    'promptHeader' => 'You can ask:',
    'searchText' => 'What can we help you find?',
    'placeholderText' => 'Search...',
    'name' => $name
  );
  $search_configuration = array_merge(
    $default_search_configuration,
    json_decode($user_search_configuration, true)
  );
  $search_configuration_encoded = json_encode($search_configuration);

  // Get css overrides HTML
  $css_content = '';
  if ($css_overrides != '') {
    $css_content = "
      <style>
        {$css_overrides}
      </style>
    ";
  }

  $content = "
    <div id=\"${container_selector}\"></div>
    <link rel=\"stylesheet\" href=\"https://assets.sitescdn.net/answers/{$version}/answers.css\">
    {$css_content}
    <script>
      function initAnswers${name} () {
        const searchbarConfiguration = {$search_configuration_encoded};
        const initConfiguration = {$init_configuration_encoded};
        initConfiguration.onReady = function () {
          ANSWERS.addComponent('SearchBar', searchbarConfiguration);
        }
        ANSWERS.init(initConfiguration);
      }
    </script>
    <script
      src=\"https://assets.sitescdn.net/answers/{$version}/answers.min.js\"
      onload=\"ANSWERS.domReady (initAnswers${name})\"
      async
      defer
    >
    </script>
  ";
  return $content;
}
add_shortcode('yext_searchbar', 'yext_searchbar_shortcode_handler');

/**
 * Creates a Yext Answers admin settings page for experience configuration
 */
function test_answers_admin() {
  // add_options_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
  add_options_page(
    'Answers plugin page',
    'Yext Answers',
    'manage_options',
    'yext_answers_options', 
    'test_answers_render');
}
function test_answers_render() {
  ?>
    <h2>Yext Answers Settings</h2>
    <form action="options.php" method="post">
      <?php 
        // settings_fields( string $option_group )
        settings_fields('yext_answers_options');
        // do_settings_sections( string $page )
        do_settings_sections('yext_answers_options'); 
        submit_button();
      ?>
    </form>
  <?php
}
function test_answers_register_settings() {
  // register_setting( $option_group, $option_name, $args )
  register_setting('yext_answers_options', 'yext_answers_options');
  // add_settings_section( $id, $title, $callback, $page )
  add_settings_section('yext_answers_options', 'Init Configuration', 'yext_answers_config_section_text', 'yext_answers_options');
  add_settings_section('yext_answers_advanced_options', 'Advanced Configuration', 'yext_answers_config_advanced_section_text', 'yext_answers_options');
  // add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() )
  add_settings_field('yext_answers_plugin_api_key', 'API Key', 'yext_answers_plugin_api_key', 'yext_answers_options', 'yext_answers_options');
  add_settings_field('yext_answers_plugin_experience_key', 'Experience Key', 'yext_answers_plugin_experience_key', 'yext_answers_options', 'yext_answers_options');
  add_settings_field('yext_answers_plugin_business_id', 'Business ID', 'yext_answers_plugin_business_id', 'yext_answers_options', 'yext_answers_options');
  add_settings_field('yext_answers_plugin_locale', 'Locale', 'yext_answers_plugin_locale', 'yext_answers_options', 'yext_answers_options');
  add_settings_field('yext_answers_plugin_redirect_url', 'Redirect URL', 'yext_answers_plugin_redirect_url', 'yext_answers_options', 'yext_answers_options');
  add_settings_field('yext_answers_plugin_version', 'Version', 'yext_answers_plugin_version', 'yext_answers_options', 'yext_answers_options');
  add_settings_field('yext_answers_plugin_init_passthrough', 'Init Passthrough', 'yext_answers_plugin_init_passthrough', 'yext_answers_options', 'yext_answers_advanced_options');
  add_settings_field('yext_answers_plugin_searchbar_passthrough', 'SearchBar Passthrough', 'yext_answers_plugin_searchbar_passthrough', 'yext_answers_options', 'yext_answers_advanced_options');
  add_settings_field('yext_answers_plugin_css_overrides', 'CSS Overrides', 'yext_answers_plugin_css_overrides', 'yext_answers_options', 'yext_answers_advanced_options');
}
function yext_answers_config_section_text() {
  echo '<p>Required. Configure the Answers Searchbar for your Wordpress site.</p>';
}
function yext_answers_config_advanced_section_text() {
  echo '<p>Optional. Configure the Answers Searchbar further with advanced configuration.</p>';
}
function yext_answers_plugin_api_key() {
  $optionValue = esc_attr(get_value_for_option('yext_api_key'));
  echo "<input id='yext_answers_plugin_api_key' name='yext_answers_options[yext_api_key]' type='text' value='{$optionValue}' />";
}
function yext_answers_plugin_experience_key() {
  $optionValue = esc_attr(get_value_for_option('yext_experience_key'));
  echo "<input id='yext_answers_plugin_experience_key' name='yext_answers_options[yext_experience_key]' type='text' value='{$optionValue}' />";
}
function yext_answers_plugin_business_id() {
  $optionValue = esc_attr(get_value_for_option('yext_business_id'));
  echo "<input id='yext_answers_plugin_business_id' name='yext_answers_options[yext_business_id]' type='text' value='{$optionValue}' />";
}
function yext_answers_plugin_locale() {
  $optionValue = esc_attr(get_value_for_option('yext_locale'));
  echo "<input id='yext_answers_plugin_locale' name='yext_answers_options[yext_locale]' type='text' value='{$optionValue}' />";
}
function yext_answers_plugin_redirect_url() {
  $optionValue = esc_attr(get_value_for_option('yext_redirect_url'));
  echo "<input id='yext_answers_plugin_redirect_url' name='yext_answers_options[yext_redirect_url]' type='text' value='{$optionValue}' />";
}
function yext_answers_plugin_version() {
  $optionValue = esc_attr(get_value_for_option('yext_version'));
  echo "<input id='yext_answers_plugin_version' name='yext_answers_options[yext_version]' type='text' value='{$optionValue}' />";
}
function yext_answers_plugin_init_passthrough() {
  $optionValue = esc_attr(get_value_for_option('yext_init_passthrough'));
  echo "<textarea id='yext_answers_plugin_init_passthrough' name='yext_answers_options[yext_init_passthrough]'>{$optionValue}</textarea>";
}
function yext_answers_plugin_searchbar_passthrough() {
  $optionValue = esc_attr(get_value_for_option('yext_searchbar_passthrough'));
  echo "<textarea id='yext_answers_plugin_searchbar_passthrough' name='yext_answers_options[yext_searchbar_passthrough]' type='text' value='{$optionValue}'></textarea>";
}
function yext_answers_plugin_css_overrides() {
  $optionValue = esc_attr(get_value_for_option('yext_css_overrides'));
  echo "<textarea id='yext_answers_plugin_css_overrides' name='yext_answers_options[yext_css_overrides]'>{$optionValue}</textarea>";
}
add_action('admin_init', 'test_answers_register_settings');
add_action('admin_menu', 'test_answers_admin');

function yext_results_page_shortcode_handler($atts) {
  $options = get_option('yext_answers_options');

  $redirectUrl = esc_attr($options['yext_redirect_url']);

  $atts = shortcode_atts(array(
    'iframe_url' => $redirectUrl . 'iframe.js',
  ), $atts);

  $iframe_url = $atts['iframe_url'];

  $content = "
    <div id=\"answers-container\"></div>
    <script src=\"{$iframe_url}\"></script>
  ";
  return $content;
}
add_shortcode('yext_results_page', 'yext_results_page_shortcode_handler');
