<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "head_id",
								'where' 	=> array( 
														 'id_emply'	=>	cleanvars($_POST['id_emply'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(PAY_SETTINGS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: pay_settings.php", true, 301);
			exit();
		}else{
			foreach($_POST['id_head'] as $key => $val):
				$values = array(
									 'payset_status'	=>	1
									,'id_emply'			=>	cleanvars($_POST['id_emply'])
									,'id_head'			=>	cleanvars($val)
									,'head_value'		=>	cleanvars($_POST['head_value'][$key])
									,'id_added'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
									,'date_added'		=>	date('Y-m-d H:i:s')
				); 
				$sqllms		=	$dblms->insert(PAY_SETTINGS, $values);
			endforeach;

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Pay Setting Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: pay_settings.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$PaySetArr = explode(',',$_POST['payset_id']);
		foreach($_POST['head_value'] as $key => $val):
			$values = array(
								 'head_value'			=>	cleanvars($val)
								,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'			=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(PAY_SETTINGS , $values , "WHERE payset_id  = '".cleanvars($PaySetArr[$key])."'");
		endforeach;

		if($sqllms) { 

			$latestID = $_POST['head_id'];
			
			sendRemark('Pay Setting Updates ID:'.cleanvars($latestID), '2');
			sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
			header("Location: pay_settings.php", true, 301);
			exit();
		}
	}

	// DELETE RECORD
	if(isset($_GET['deleteid'])) {
		$values = array(
						 'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
						,'is_deleted'	=>	'1'
						,'ip_deleted'	=>	cleanvars(LMS_IP)
						,'date_deleted'	=>	date('Y-m-d H:i:s')
					   );   
		$sqlDel = $dblms->Update(PAY_SETTINGS , $values , "WHERE head_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Pay Setting Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: pay_settings.php", true, 301);
			exit();
		}
	}
?>