<?php
require_once(  get_stylesheet_directory() .'/settings.php' );

/**
 * register the turn.js javascript library.  Right now it's not in the most ideal place
 * 
 * It might also be good to make the JS that does this into a script file instead of putting it
 * in the php/html output of front-page.php
 */
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

/**
 * Build up the HTML for all of the flipbook pages configured on the flipbook config page
 */
function build_flipbook_pages(){
	$html_out = "";
	$num =  get_option('flipbook_num');
	for ($i=0; $i<$num; $i++){
		$q = 'flipbook_page_'.$i;
		$page_id = get_option($q);
		if (!empty($page_id)){
			$html_out .= create_flipbook_page_div($page_id);
		}
	}
	
	return $html_out;
}
/**
 * 
 * @param int $page_id -- the page ID for the page to add the div for
 * 
 * the div output should look something like this:
 * <div>
 *   <h1>
 *     Page Title
 *   </h1>
 *   <div>
 *     Page content
 *   </div>
 *</div>
 */
function create_flipbook_page_div($page_id){
	$output  ="<div>";
	$output .="  <h1 class=mytitle>";
	$output .=      get_page( $page_id )->post_title;
	$output .="  </h1>";
	$output .="  <div>";
	$output .=      get_page( $page_id )->post_content;
	$output .="  </div>";
	$output .="</div>";
	
	
	return $output;
}
?>