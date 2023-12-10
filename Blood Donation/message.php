<div>
	<!-- php tag has been inlcuded get the error messgae corresponding to the task. -->
	<?php 
// counter variabkle has been included
	$counter=0; if(isset($_GET['msg'])) { 
// php tag has been stopped here
		?>
		<!-- div tag started  -->
		<div id="message">
			<!-- button has been created to close the erroe message -->
			<button type="button" class="close" data-dismiss="alert" title="close">&times;</button><?php echo $_GET['msg'];?>
		</div>
	<?php }?>
		<!-- php tag has been inlcuded get the error messgae corresponding to the task. -->
	<?php if(isset($_GET['error'])) { ?>
		<!-- din tag has been started  -->
		<div id="message">
						<!-- button has been created to close the erroe message -->
			<button type="button" class="close" data-dismiss="alert" title="close">&times;</button><?php echo $_GET['error'];?>
		</div>
	<?php }
// php tag end here
	?>
	<!-- div tag has been ended -->
</div>
<!-- java script has been added to execute the task successfully.  -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
	// script function has been inlcuded
$( document ).ready(function(){
	// messgae function has been added
	$('#message').fadeIn('slow', function(){
		// message function has been included
		$('#message').delay(5000).fadeOut(); 
	});
});
// sctipt function has been closed
</script>