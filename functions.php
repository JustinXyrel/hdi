<?php
	
	class functions extends table{
		/*
		  Author : Justin Xyrel
		  Function: image_base64_decode
		  Desc: Decode an  image using base64 of php
		  Params: {arr: array of data where to locate the image,
				   img_key: key of image in the array, 
				   dir: directory of image, 
				   default_img: default image to use if doesn't have image stored}

		*/
		  private function image_process($arr,$img_key,$dir,$default_img = NULL){
			 foreach($arr as &$detail){ 
			// echo file_exists($dir.$detail[$img_key]);
			    if(file_exists($dir.$detail[$img_key])){
					$logo =  base64_encode(file_get_contents($dir.$detail[$img_key]));
				}
				$detail[$img_key] = ((file_exists($dir.$detail[$img_key])) && (!empty($detail[$img_key]))) ? $logo : '';
			 }
			return json_encode($arr);
		  }
		  
		 /*
		  Author : Justin Xyrel 
		  Date: 05/19/14
		  Function: login_user
		  Desc: Locate the account of the user where the user type is not equal to customer
		  Params: post data such us $usr(username) and $pwd($password)
		*/ 
		public function login_user(){		 
			global $conn;
			extract($_POST);

			$sql_que = "SELECT u.*,ut.user_type from tbl_users u join tbl_user_types ut on u.user_type_id =ut.user_type_id where 
                   u.username= '".$usr."' and u.password ='".$pwd."'";
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_data = json_encode($results);
  		    echo $json_data;
		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/23/14
		  Function: sha1_pass
		  Desc: encrypt the params (which is password) in sha1 , a function mostly used when the js script needs the password to be encoded
          Params: post data such as $usr(username) and $pwd($password)
		*/ 		
		
		public function sha1_pass(){
		   extract($_POST);
		   $pass_encrypted = sha1($pwd);
		   echo $pass_encrypted;
		}
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: logout
		  Desc: unsets the session which is the basis if the account is logged in
          Params: NONE
		*/ 		
				
		public function logout(){
		  if(!isset($_SESSION)){
			session_start();
		  }
		   unset($_SESSION['auth']);

		}

		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: login_success
		  Desc: set the session['auth'] if successful logged in
          Params: post data which is the user's account information
		*/ 					
		
		public function login_success(){
		   extract($_POST);
		    if(!isset($_SESSION)){
				session_start();
			}
		   $user_info = json_decode($data,true);
		   $_SESSION['auth'] = $user_info;

		}
	
	    
		 /*
		  Author : Justin Xyrel 
		  Date: 04/24/14
		  Function: get_profile
		  Desc: get the current user information thru getting the session['auth']
          Params: NONE
		*/ 				
		public function get_billboard_audience(){
		  global $conn;
		  if(!isset($_SESSION)){
			session_start();
		  }
		  	$sql_que = "SELECT tb.billboard_id,tb.full_name,tb.address,tb.contact_no,tb.email,tb.ad_location,tb.date_uploaded,tb.ad_image,
							   tc.celebrity
							  FROM tbl_billboard tb JOIN tbl_celebrity tc on tb.celebrity_id = tc.celebrity_id";
			$query = $conn->query($sql_que);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
			$results = $this->image_process($results,'ad_image','./images/billboard/','');
		/*  $this->table = 'tbl_billboard';
		  $results = $this->select_all();*/
		// echo $results;die();
		echo $results;
		 // $json_data = json_encode($results);
		 // echo $json_data;
		
		}
		
		

	}
	
?>