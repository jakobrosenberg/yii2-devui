<?php
/**
 * Created by Jakob
 * Date: 05-12-13
 * Time: 17:13
 */


function adminer_object() {
	// required to run any plugin
	include_once "./plugins/plugin.php";

	// autoloader
	foreach (glob("plugins/*.php") as $filename) {
		include_once "./$filename";
	}

	$plugins = array(
		// specify enabled plugins here
		new AdminerFrames,
	);

	/* It is possible to combine customization and plugins:
	class AdminerCustomization extends AdminerPlugin {
	}
	return new AdminerCustomization($plugins);
	*/

	return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include('adminer-4.0.0.php') ?>