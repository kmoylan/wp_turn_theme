<?php
function reg_pod_turn()
{
	wp_register_script('turn', includes_url().'turn/turn.js/turn.js', array('jquery'));
	wp_enqueue_script('turn');
	//array( 'jquery', 'turn' )
	// Register the script like this for a theme:
	//wp_register_script( 'pod_turn', get_stylesheet_directory() . '/js/pod_turn.js',array( 'jquery') );
	// For either a plugin or a theme, you can then enqueue the script:
	//wp_enqueue_script( 'pod_turn' );
}
add_action( 'wp_enqueue_scripts', 'reg_pod_turn' );

?>