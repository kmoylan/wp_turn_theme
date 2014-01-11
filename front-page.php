<?php
wp_head();
get_header();
?>

<style type="text/css">
body{
	background:#eee;
}

</style>

<div id="flipbook">
	<div class="hard"><h1>Get to know POD Consulting</h1>
	Just turn the page to see what we're all about.
	</div>
	<?php 
		echo (build_flipbook_pages());
	?>
	<div class="hard"> The End </div>
</div>
<script type="text/javascript">
	jQuery("#flipbook").turn({
		width: 800,
		height: 800,
		display: 'single',
		autoCenter: true,
		acceleration: true,
		elevation:50
	});
</script>

