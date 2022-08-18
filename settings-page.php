<?php
function aawp_settings_page()
{
	if (!current_user_can('manage_options')) {
		return;
	}
?>
	<div class="wrap">

		<h1>Artivain Analytics</h1>

		<img src="https://assets.artivain.com/logo/main/logo.png" alt="" style="max-height: 100px;">

		<h2>View stats</h2>
		<a href="https://analytics.artivain.com" target="_blank" class="button button-primary">
			View stats on Analytics dashboard <span class="dashicons dashicons-external" style="line-height: 1.2;"></span>
		</a>

		<?php
		settings_errors('aawp_messages');
		?>

		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wporg"
			settings_fields('aawp_options');
			// output setting sections and their fields
			// (sections are registered for "wporg", each field is registered to a specific section)
			do_settings_sections('aawp_settings');
			// output save settings button
			submit_button('Save');
			?>
		</form>

	</div>
<?php
}
