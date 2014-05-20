<?php
	include('scripts.php'); 
	$var_func = new var_functions();
	
	if(!isset($_SESSION)){
		session_start();
	}
	//echo "<pre>",print_r($_SESSION['auth']),"</pre>";
	if($var_func->is_logged_in()){
	    $username = ucfirst($_SESSION['auth']['0']['fname']);
		$usertype_id = ucfirst($_SESSION['auth']['0']['user_type_id']);
		$account_type = ucwords(str_replace('_', ' ' ,$_SESSION['auth']['0']['user_type']));
	} else {
		echo "<script>window.location.assign('index.php');</script>";
	}
?>

<script>
$(document).ready(function(){
	$('#menu').slicknav({
		prependTo:'#slickdiv'
	});

	$('#menu').slicknav();
	$('.slicknav_menu').attr('style','display:block;');
});		
</script>

<style>

</style>

	<table id="tbl_left">
		<tr>
			<td>
				<a href="home.php"><img src="images/hdi_logo.png" /></a>
			</td>
			
		</tr>
	</table>
	

	