<?php
	$img_dir 			= 'uploads/company/';

    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "type_id",
								'where' 	=> array( 
														'type_name'	=>	cleanvars($_POST['type_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONNAIRESTYPE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'type_status'				=>	cleanvars($_POST['type_status'])
								,'type_name'				=>	cleanvars($_POST['type_name'])
								,'type_detail'				=>	cleanvars($_POST['type_detail'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(QUESTIONNAIRESTYPE, $values);

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Questionnaire Type Added', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "type_id",
								'where' 		=> array( 
														 'type_name'	=>	cleanvars($_POST['type_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'type_id'		=>	cleanvars($_POST['type_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONNAIRESTYPE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'type_status'				=>	cleanvars($_POST['type_status'])
								,'type_name'				=>	cleanvars($_POST['type_name'])
								,'type_detail'				=>	cleanvars($_POST['type_detail'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(QUESTIONNAIRESTYPE , $values , "WHERE type_id= '".cleanvars($_POST['type_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['type_id'];
				
				sendRemark('Questionnaire Type Updated', '2',$latestID);
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

		$sqlDel = $dblms->Update(QUESTIONNAIRESTYPE , $values , "WHERE type_id   = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Questionnaire Type Deleted', '3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>