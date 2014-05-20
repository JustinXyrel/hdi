<?php
	include('var_functions.php'); 
	$var_func = new var_functions();


   $data = json_decode($_POST['data'],true);

 //echo "<pre>", var_dump($_POST['data']), "</pre>";die();
?>
<html >

<head>

<script src="js/jquery-1.9.1.js" type="text/javascript" language="javascript"></script>

<script src="js/advancedtable_v2.js" type="text/javascript" language="javascript"></script>
	
<script src="js/jquery-ui.js" type="text/javascript" language="javascript"></script>
<script src="js/home.js" type="text/javascript" language="javascript"></script>
<script src="js/is_loading.js" type="text/javascript" language="javascript"></script>
<script language="javascript" type="text/javascript">

	$(document).ready(function() {
		$('select').children().remove();
		$("#searchtable").show();

		$("table#restadmin_report").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});
	});

</script>

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />-->

<link href="css/advancedtable.css" rel="stylesheet" type="text/css" />

<style>

#searchtable td select, input#search {
	padding: 6px 12px;
	font-size: 14px;
	line-height: 1.428571429;
	color: #555555;
	background-color: #ffffff;
	background-image: none;
	border: 1px solid #cccccc;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	-webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
	transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}

</style>

</head>

<body>

     <table class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none; width: 100%; margin-bottom: 10px;">
       <tr>
         <td width="80%">Search / Filter by Columns:  <select id="searchOn" name="searchOn" style="display:none;"/>&nbsp;&nbsp;<input name="search" type="text" id="search" style="display:none;" /></td>
         <td width="20%"><div id="loader" style="display:none;"><img src="css/images/loader.gif" alt="Laoder" /></div></td>
       </tr>
	<!--   <tr>
	        <td width="80%">Search / Filter by Date: <input type="date" id= "from_date" placeholder="From Date:"> <input type="date" id= "to_date"  placeholder="To Date:"></td>
	   </tr>-->
     </table><!-- /searchtable -->

     <table width="100%" id="restadmin_report" class="advancedtable" border="0" cellspacing="0" cellpadding="0">

     <thead>

		<tr>
			<th>Full Name</th>
			<th>Address</th>
			<th>Contact no.</th>
			<th>Email</th>
			<th>Location</th>
			<th>Image</th>
			<th>Date Uploaded</th>
		</tr>

     </thead>

       <tbody>

<?php 	foreach($data as $info){ 
     
?>
  
			<tr id = "<?php echo $info['billboard_id'];?>">
				<td>
				 <?php 
				   echo ucwords($info['full_name']); ?>
				</td>
				<td>
				 <?php 
				   echo ucwords($info['address']); ?>
				</td>
				<td>
				 <?php echo $info['contact_no']?>
				</td>
				<td>
				 <?php echo $info['email'];?>
				</td>
				<td>
				 <?php echo $info['ad_location'];?>
				</td>
				<td>
				 <img src="data:image/jpeg;base64,<?php echo $info['ad_image'];?> " style="width:100">
				 <?php //echo $info['total_order'];?>
				</td>
					<td>
				 <?php echo $info['date_uploaded'];?>
				</td>
				
			</tr>

   
	   <?php
	   } 
	   ?>

       </tbody>

     </table><!-- /staff -->


   

</div>
<div id='dialog_staff'>

</div>
</body></html>
 