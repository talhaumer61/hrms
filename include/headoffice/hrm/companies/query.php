<?php
	$img_dir 			= 'uploads/company/';

    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "company_id",
								'where' 	=> array( 
														'company_name'	=>	cleanvars($_POST['company_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(COMPANIES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'company_status'			=>	cleanvars($_POST['company_status'])
								,'company_name'				=>	cleanvars($_POST['company_name'])
								,'company_shortname'		=>	cleanvars($_POST['company_shortname'])
								,'company_code'				=>	cleanvars($_POST['company_code'])
								,'company_website'			=>	cleanvars($_POST['company_website'])
								,'company_address'			=>	cleanvars($_POST['company_address'])
								,'company_ntn'				=>	cleanvars($_POST['company_ntn'])
								,'id_timezone'				=>	cleanvars($_POST['id_timezone'])
								,'id_currency'				=>	cleanvars($_POST['id_currency'])
								,'id_country'				=>	cleanvars($_POST['id_country'])
								,'company_description'		=>	cleanvars($_POST['company_description'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(COMPANIES, $values);

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				if(!empty($_FILES['company_logo']['name'])) {
					$path_parts 			= pathinfo($_FILES["company_logo"]["name"]);
					$extension 				= strtolower($path_parts['extension']);
					if(in_array($extension , array('jpeg','jpg', 'png'))) {
						$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['company_name'])).'-'.$latestID.".".($extension);
						$img_fileName		= to_seo_url(cleanvars($_POST['company_name'])).'-'.$latestID.".".($extension);
						$dataImage 			= array( 'company_logo' => $img_fileName );
						$sqlUpdateImg 		= $dblms->Update(COMPANIES, $dataImage, "WHERE company_id = '".$latestID."'");
						if ($sqlUpdateImg) {
							move_uploaded_file($_FILES['company_logo']['tmp_name'],$originalImage);
						}
					}
				}
				if(!empty($_FILES['company_logo2']['name'])) {
					$path_parts 			= pathinfo($_FILES["company_logo2"]["name"]);
					$extension 				= strtolower($path_parts['extension']);
					if(in_array($extension , array('jpeg','jpg', 'png'))) {
						$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['company_name'])).'-'.$latestID."2.".($extension);
						$img_fileName		= to_seo_url(cleanvars($_POST['company_name'])).'-'.$latestID."2.".($extension);
						$dataImage 			= array( 'company_logo2' => $img_fileName );
						$sqlUpdateImg 		= $dblms->Update(COMPANIES, $dataImage, "WHERE company_id= '".$latestID."'");
						if ($sqlUpdateImg) {
							move_uploaded_file($_FILES['company_logo2']['tmp_name'],$originalImage);
						}
					}
				}

				sendRemark('Company Added ', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "company_id",
								'where' 		=> array( 
														 'company_name'	=>	cleanvars($_POST['company_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'company_id'		=>	cleanvars($_POST['company_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(COMPANIES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'company_status'			=>	cleanvars($_POST['company_status'])
								,'company_name'				=>	cleanvars($_POST['company_name'])
								,'company_shortname'		=>	cleanvars($_POST['company_shortname'])
								,'company_code'				=>	cleanvars($_POST['company_code'])
								,'company_website'			=>	cleanvars($_POST['company_website'])
								,'company_address'			=>	cleanvars($_POST['company_address'])
								,'company_description'		=>	cleanvars($_POST['company_description'])
								,'company_ntn'				=>	cleanvars($_POST['company_ntn'])
								,'id_timezone'				=>	cleanvars($_POST['id_timezone'])
								,'id_currency'				=>	cleanvars($_POST['id_currency'])
								,'id_country'				=>	cleanvars($_POST['id_country'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(COMPANIES , $values , "WHERE company_id= '".cleanvars($_POST['company_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['company_id'];
				
				sendRemark('Company Updated ', '2',$latestID);
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

	// DELETE RECORD
	if(isset($_GET['deleteid'])) {
		$values = array(
						 'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
						,'is_deleted'	=>	'1'
						,'ip_deleted'	=>	cleanvars($ip)
						,'date_deleted'	=>	date('Y-m-d H:i:s')
					   );   

		$sqlDel = $dblms->Update(COMPANIES , $values , "WHERE company_id   = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Company Deleted ', '3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>