<?php
/*
Plugin Name: Local Video Player Flowplayer Google Analytics
Plugin URI: 
Description: Track Flowplayer video events with Google Analytics Events.
Version: 1.0
Author: Austin Matzko
Author URI: http://austinmatzko.com
*/

if ( version_compare( PHP_VERSION, '5.2.0') >= 0 ) {

	if ( function_exists( 'load_local_video_player' ) ) {
		require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'core.php';
	} else {
		
		function flowplayer_ga_dependency_message()
		{
			?>
			<div id="flowplayer-ga-warning" class="updated fade error">
				<p>
					<?php 
					printf(
						__('<strong>ERROR</strong>: You must be using the <em>Local Video Player</em> WordPress plugin before the <em>Local Video Player Flowplayer Google Analytics</em> plugin will work.', 'flowplayer-ga'),
						'' // @todo add link to lvp repository
					);
					?>
				</p>
			</div>
			<?php
		}

		add_action('admin_notices', 'flowplayer_ga_dependency_message');
	}
	
} else {
	
	function flowplayer_ga_php_version_message()
	{
		?>
		<div id="flowplayer-ga-warning" class="updated fade error">
			<p>
				<?php 
				printf(
					__('<strong>ERROR</strong>: Your WordPress site is using an outdated version of PHP, %s.  Version 5.2 of PHP is required to use the Flowplayer Google Analytics plugin. Please ask your host to update.', 'flowplayer-ga'),
					PHP_VERSION
				);
				?>
			</p>
		</div>
		<?php
	}

	add_action('admin_notices', 'flowplayer_ga_php_version_message');
}

function flowplayer_ga_load_event()
{
	load_plugin_textdomain('flowplayer-ga', null, dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'l10n');
}

add_action('plugins_loaded', 'flowplayer_ga_load_event');
