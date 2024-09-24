<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {

		$condition	=	array ( 
								'select' 	=> "region_id",
								'where' 	=> array( 
														'region_name'		=>	cleanvars($_POST['region_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(REGIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: regions.php", true, 301);
			exit();
		}else{

			$values = array(
							 	 'region_status'		=>	cleanvars($_POST['region_status'])
								,'region_name'			=>	cleanvars($_POST['region_name'])
								,'region_code'			=>	cleanvars($_POST['region_code'])
								,'region_alpha'			=>	cleanvars($_POST['region_alpha'])
								,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'			=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(REGIONS, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Region Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: regions.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "region_id",
								'where' 	=> array( 
														'region_name'		=>	cleanvars($_POST['region_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'region_id'		=>	cleanvars($_POST['region_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(REGIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: regions.php", true, 301);
			exit();
		}else{
			$values = array(
								 'region_name'		=>	cleanvars($_POST['region_name'])
								,'region_code'		=>	cleanvars($_POST['region_code'])
								,'region_alpha'		=>	cleanvars($_POST['region_alpha'])
								,'region_status'	=>	cleanvars($_POST['region_status'])
								,'id_modify'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'		=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(REGIONS , $values , "WHERE region_id  = '".cleanvars($_POST['region_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['region_id'];
				sendRemark('Region Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: regions.php", true, 301);
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

		$sqlDel = $dblms->Update(REGIONS , $values , "WHERE region_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Deleted Region #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: regions.php", true, 301);
			exit();
		}
	}
?>