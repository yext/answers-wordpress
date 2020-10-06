<?php
/**
 * Plugin Name: yext_answers_plugin
 * Plugin URI: https://www.yext.com
 * Description: Display content using a shortcode to insert in a page or post
 * Version: 0.1
 * Text Domain: tbare-wordpress-plugin-demo
 * Author: Chris
 * Author URI: https://www.yext.com
 */
function yext_searchbar_shortcode_handler($atts) {
  $options = get_option('yext_answers_options');

  $api_key = esc_attr($options['yext_api_key']);
  $experience_key = esc_attr($options['yext_experience_key']);
  $business_id = esc_attr($options['yext_business_id']);
  $locale = esc_attr($options['yext_locale']);
  $redirectUrl = esc_attr($options['yext_redirect_url']);
  $version = esc_attr($options['yext_version']);

  $container_selector = 'yext-search-form';
  if (!empty($atts['container_selector'])) {
    $container_selector = $atts['container_selector'];
  }

  $name = 'SearchBar';
  if (!empty($atts['name'])) {
    $name = $atts['name'];
  }

  $content = "
    <div id=\"${container_selector}\"></div>
    <link rel=\"stylesheet\" href=\"https://assets.sitescdn.net/answers/{$version}/answers.css\">
    <script>
      function initAnswers${name} () {
        ANSWERS.init({
          apiKey: '${api_key}',
          experienceKey: '${experience_key}',
          experienceVersion: 'PRODUCTION',
          locale: '${locale}',
          businessId: '${business_id}',
          onReady: function () {
            ANSWERS .addComponent( 'SearchBar', {
              container: '#${container_selector}',
              redirectUrl: '${redirectUrl}',
              promptHeader: 'You can ask:',
              searchText: 'What can we help you find?',
              placeholderText: 'Search...',
              name: '${name}'
            });
          }
        });
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

function test_answers_admin() {
        //add_options_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null )
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
        //do_settings_sections( string $page )
        do_settings_sections('yext_answers_options'); 
        submit_button();
?>
    </form>
    <?php
}
function test_answers_register_settings() {
        //register_setting( $option_group, $option_name, $args )
        register_setting('yext_answers_options', 'yext_answers_options');
        // add_settings_section( $id, $title, $callback, $page )
        add_settings_section('yext_answers_options', 'Init Configuration', null, 'yext_answers_options');
        //add_settings_field( $id, $title, $callback, $page, $section = 'default', $args = array() )
        add_settings_field('yext_answers_plugin_api_key', 'API Key', 'yext_answers_plugin_api_key', 'yext_answers_options', 'yext_answers_options');
        add_settings_field('yext_answers_plugin_experience_key', 'Experience Key', 'yext_answers_plugin_experience_key', 'yext_answers_options', 'yext_answers_options');
        add_settings_field('yext_answers_plugin_business_id', 'Business ID', 'yext_answers_plugin_business_id', 'yext_answers_options', 'yext_answers_options');
        add_settings_field('yext_answers_plugin_locale', 'Locale', 'yext_answers_plugin_locale', 'yext_answers_options', 'yext_answers_options');
        add_settings_field('yext_answers_plugin_redirect_url', 'Redirect URL', 'yext_answers_plugin_redirect_url', 'yext_answers_options', 'yext_answers_options');
        add_settings_field('yext_answers_plugin_version', 'Version', 'yext_answers_plugin_version', 'yext_answers_options', 'yext_answers_options');
        //add_settings_field('yext_answers_init_passthrough', 'Init Passthrough', 'yext_answers_plugin_init_passthrough', 'yext_answers_options', 'yext_answers_options');
        //add_settings_field('yext_answers_searchbar_passthrough', 'SearchBar Passthrough', 'yext_answers_plugin_searchbar_passthrough', 'yext_answers_options', 'yext_answers_options');
}
function yext_answers_plugin_api_key() {
        $options = get_option('yext_answers_options');
        echo "<input id='yext_answers_plugin_api_key' name='yext_answers_options[yext_api_key]' type='text' value='{$options['yext_api_key']}' />";
}
function yext_answers_plugin_experience_key() {
        $options = get_option('yext_answers_options');
        echo "<input id='yext_answers_plugin_experience_key' name='yext_answers_options[yext_experience_key]' type='text' value='{$options['yext_experience_key']}' />";
}
function yext_answers_plugin_business_id() {
        $options = get_option('yext_answers_options');
        echo "<input id='yext_answers_plugin_business_id' name='yext_answers_options[yext_business_id]' type='text' value='{$options['yext_business_id']}' />";
}
function yext_answers_plugin_locale() {
        $options = get_option('yext_answers_options');
        echo "<input id='yext_answers_plugin_locale' name='yext_answers_options[yext_locale]' type='text' value='{$options['yext_locale']}' />";
}
function yext_answers_plugin_redirect_url() {
        $options = get_option('yext_answers_options');
        echo "<input id='yext_answers_plugin_redirect_url' name='yext_answers_options[yext_redirect_url]' type='text' value='{$options['yext_redirect_url']}' />";
}
function yext_answers_plugin_version() {
        $options = get_option('yext_answers_options');
        $option = esc_attr($options['yext_version']);
        echo "<input id='yext_answers_plugin_version' name='yext_answers_options[yext_version]' type='text' value='{$option}' />";
}
/*
function yext_answers_plugin_init_passthrough() {
        $options = get_option('yext_answers_options');
        //$option = esc_attr($options['yext_init_passthrough']);
        echo "<input id='yext_answers_plugin_init_passthrough' name='yext_answers_options[yext_init_passthrough]' type='text' value='' />";
}
 */
add_action('admin_init', 'test_answers_register_settings');
add_action('admin_menu', 'test_answers_admin');

function test_answers_iframe() {
        $options = get_option('yext_answers_options');
        $api_key = esc_attr($options['yext_api_key']);
        $experience_key = esc_attr($options['yext_experience_key']);
        $business_id = esc_attr($options['yext_business_id']);
        $locale = esc_attr($options['yext_locale']);
        $redirectUrl = esc_attr($options['yext_redirect_url']);
        $Content = "
         <div id=\"answers-container\"></div>
         <script src=\"{$options['yext_redirect_url']}iframe.js\"></script>
";      
    return $Content;
}
add_shortcode('answersiframe', 'test_answers_iframe');
