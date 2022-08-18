<?php
function aawp_head()
{
	$options = get_option('aawp_options');
	if (!empty($options["aawp_site_id"])) {
		$site_id = $options["aawp_site_id"];
		echo "<script async defer data-website-id='$site_id' src='https://analytics.artivain.com/umami.js'></script>";
	}
}

add_action("wp_head", "aawp_head");