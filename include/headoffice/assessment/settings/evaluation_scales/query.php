<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		
		$condition	=	array ( 
								'select' 	=> "scale_id",
								'where' 	=> array( 
														'scale_name'		=>	cleanvars($_POST['scale_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(EVALUATIONSSCALES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'scale_name'					=>	cleanvars($_POST['scale_name'])
								,'scale_shortname'				=>	cleanvars($_POST['scale_shortname'])
								,'scale_value'					=>	cleanvars($_POST['scale_value'])
								,'scale_status'					=>	cleanvars($_POST['scale_status'])
								,'scale_detail'					=>	cleanvars($_POST['scale_detail'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_added'						=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'					=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(EVALUATIONSSCALES, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('Evaluation Scale Added', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "scale_id",
								'where' 		=> array( 
														 'scale_name'	=>	cleanvars($_POST['scale_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'scale_id'		=>	cleanvars($_POST['scale_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(EVALUATIONSSCALES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'scale_name'					=>	cleanvars($_POST['scale_name'])
								,'scale_shortname'				=>	cleanvars($_POST['scale_shortname'])
								,'scale_value'					=>	cleanvars($_POST['scale_value'])
								,'scale_status'					=>	cleanvars($_POST['scale_status'])
								,'scale_detail'					=>	cleanvars($_POST['scale_detail'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_modify'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(EVALUATIONSSCALES , $values , "WHERE scale_id= '".cleanvars($_POST['scale_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['scale_id'];
				
				sendRemark('Evaluation Scale Updated', '2',$latestID);
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

		$sqlDel = $dblms->Update(EVALUATIONSSCALES , $values , "WHERE scale_id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Evaluation Scale Deleted','3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>