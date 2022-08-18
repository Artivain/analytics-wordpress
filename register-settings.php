<?php
require_once("icon.php");

function aawp_register_settings_page()
{
	global $aawp_icon;
	add_menu_page("Artivain Analytics", "Analytics", "manage_options", "analytics", "aawp_settings_page", $aawp_icon);
}

add_action('admin_menu', 'aawp_register_settings_page');

function aawp_register_settings()
{
	register_setting('aawp_options', 'aawp_options', "aawp_options_callback");
	add_settings_section(
		'basic_settings',
		"Settings",
		'aawp_basic_settings_callback',
		'aawp_settings'
	);

	add_settings_field('aawp_site_id', 'Site ID', 'aawp_site_id_callback', 'aawp_settings', 'basic_settings');
}

/** @param array $args */
function aawp_basic_settings_callback($args)
{
}

function aawp_options_callback($input)
{
	$error = false;

	// Check site id
	if (empty($input["aawp_site_id"])) {
		add_settings_error("aawp_messages", "aawp_site_id_invalid", "You must enter the site ID", "error");
		$error = true;
	}

	if (!$error) add_settings_error('aawp_messages', 'aawp_success', "Settings saved!", 'updated');

	return $input;
}

function aawp_site_id_callback()
{
	$options = get_option('aawp_options');

	if (isset($options['aawp_site_id'])) {
		$option = $options['aawp_site_id'];
	} else {
		$option = "";
	}

	echo "<input id='aawp_site_id' class='regular-text code' name='aawp_options[aawp_site_id]' type='text' value='" . esc_attr($option) . "' placeholder='xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx' required />";
}

add_action('admin_init', 'aawp_register_settings');
