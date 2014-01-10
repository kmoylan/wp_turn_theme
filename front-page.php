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
	<div>
		<h1>
			<?php 
				echo(get_page( 155 )->post_title)?> 
		</h1>
		<div>
			<?php 
				echo(get_page( 155 )->post_content)?> 
		</div>
	</div>
	<div>
		<h1>
			<?php 
				echo(get_page( 151 )->post_title)?> 
		</h1>
		<div>
			<?php 
				echo(get_page( 151 )->post_content)?> 
		</div>
	</div>
	<div>
		<h1>
			<?php 
				echo(get_page( 153 )->post_title)?> 
		</h1>
		<div>
			<?php 
				echo(get_page( 153 )->post_content)?> 
		</div>
	</div>
	<div>
		<h1>
			<?php 
				echo(get_page( 26 )->post_title)?> 
		</h1>
		<div>
			<?php 
				echo(get_page( 26 )->post_content)?> 
		</div>
	</div>
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

