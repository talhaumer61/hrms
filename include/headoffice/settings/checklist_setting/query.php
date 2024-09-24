<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {

		$condition	=	array ( 
								'select' 	=> "particular_id",
								'where' 	=> array( 
														'particular_name'		=>	cleanvars($_POST['particular_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(CHECKLIST_PARTICULARS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: checklist_setting.php", true, 301);
			exit();
		}else{

			$values = array(
							 	 'particular_status'	=>	cleanvars($_POST['particular_status'])
								,'particular_name'		=>	cleanvars($_POST['particular_name'])
								,'particular_stage'		=>	cleanvars($_POST['particular_stage'])
								,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'			=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(CHECKLIST_PARTICULARS, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Check List Particular Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: checklist_setting.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "particular_id",
								'where' 	=> array( 
														'particular_name'		=>	cleanvars($_POST['particular_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'particular_id'		=>	cleanvars($_POST['particular_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(CHECKLIST_PARTICULARS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: checklist_setting.php", true, 301);
			exit();
		}else{
			$values = array(
								 'particular_status'	=>	cleanvars($_POST['particular_status'])
								,'particular_name'		=>	cleanvars($_POST['particular_name'])
								,'particular_stage'		=>	cleanvars($_POST['particular_stage'])
								,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'			=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms = $dblms->Update(CHECKLIST_PARTICULARS , $values , "WHERE particular_id  = '".cleanvars($_POST['particular_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['particular_id'];
				sendRemark('Check List Particular Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: checklist_setting.php", true, 301);
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

		$sqlDel = $dblms->Update(CHECKLIST_PARTICULARS , $values , "WHERE region_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Deleted Region #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: checklist_setting.php", true, 301);
			exit();
		}
	}
?>