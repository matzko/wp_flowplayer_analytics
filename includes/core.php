<?php
/*
based on http://flowplayer.org/demos/events/google-analytics.html
*/

class Flowplayer_GA_Control
{

}

function load_flowplayer_ga()
{
	global $flowplayer_ga;
	$flowplayer_ga = new Flowplayer_GA_Control;
}

add_action( 'plugins_loaded', 'load_flowplayer_ga' );
