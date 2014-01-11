<?php
/**
 *
 * Build the options page for setting with pages to show in the turn
 */
function flipbook_options_page() {
	?>
	<div>
       <div><p>Add the page_id for any page you want in the flipbook</div>
        <form action="options.php" method="post">
            <?php settings_fields( 'flipbook_settings' ); ?>
            <?php do_settings_sections( 'flipbook_menu_page' ); ?>
            <input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
        </form>
    </div>
<?php
}

function flipbook_menu_page() {
	$num =  get_option('flipbook_num');
	if (empty($num)){
		$num = 1;
	}
	$k = $num;
	$opt = get_option('flipbook_id_'.$k);
	while ($k < 10) {
		delete_option('flipbook_id_'.$k);
		$k++;
		$opt = get_option('flipbook_id_'.$k);
	}

	//make sure we remove any queries we didn't want to use
	if (!empty($num) && $num < 10){
		$k = $num;
		$opt = get_option('flipbook_id_'.$k);
		while ($k < 10) {
			delete_option('flipbook_id_'.$k);
			$k++;
		}
	}
	add_options_page('Flipbook settings', 'Flipbook Settings', 'manage_options',
			'flipbook_settings', 'flipbook_options_page');
}
add_action( 'admin_menu', 'flipbook_menu_page' );

function flipbook_settings_init() {
	add_settings_section( 'flipbook_settings', 'Flipbook settings', 'flipbook_settings_callback', 'flipbook_menu_page' );

	add_settings_field( 'flipbook_num', 'Number of pages to flip through', 'flipbook_num_callback', 'flipbook_menu_page', 'flipbook_settings' );
	register_setting( 'flipbook_settings', 'flipbook_num' );
	$num =  get_option('flipbook_num');

	if (empty($num)){
		$num = 5;
	}
	for($i = 0; $i < $num; $i++){
		add_settings_field( 'flipbook_page_'.$i, 'page_id - '.$i, 'flipbook_page_callback', 'flipbook_menu_page', 'flipbook_settings', $i );
		register_setting( 'flipbook_settings', 'flipbook_page_'.$i );
	}

}
add_action( 'admin_init', 'flipbook_settings_init' );

function flipbook_settings_callback() {
}

function flipbook_page_callback($i){
	$option = get_option('flipbook_page_'.$i);
	$name = 'flipbook_page_'.$i;
	echo "<input type='text' value='$option' name='$name' style='width: 60px;' />";
}


?>
