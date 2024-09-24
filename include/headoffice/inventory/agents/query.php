<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "agent_id",
								'where' 	=> array( 
														'agent_name'		=>	cleanvars($_POST['agent_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(AGENTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: agents.php", true, 301);
			exit();
		}else{
			$values = array(
								 'agent_status'				=>	cleanvars($_POST['agent_status'])
								,'agent_name'				=>	cleanvars($_POST['agent_name'])
								,'agent_phone'				=>	cleanvars($_POST['agent_phone'])
								,'agent_email'				=>	cleanvars($_POST['agent_email'])
								,'agent_address'			=>	cleanvars($_POST['agent_address'])
								,'agent_account_title'		=>	cleanvars($_POST['agent_account_title'])
								,'agent_account_number'		=>	cleanvars($_POST['agent_account_number'])
								,'agent_cnic_number'		=>	cleanvars($_POST['agent_cnic_number'])
								,'agent_bank_name'			=>	cleanvars($_POST['agent_bank_name'])
								,'agent_branch_code'		=>	cleanvars($_POST['agent_branch_code'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(AGENTS, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Agent Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: agents.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "agent_id",
								'where' 	=> array( 
														'agent_name'	=>	cleanvars($_POST['agent_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'agent_id'		=>	cleanvars($_POST['agent_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(AGENTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: agents.php", true, 301);
			exit();
		}else{
			$values = array(
								 'agent_status'				=>	cleanvars($_POST['agent_status'])
								,'agent_name'				=>	cleanvars($_POST['agent_name'])
								,'agent_phone'				=>	cleanvars($_POST['agent_phone'])
								,'agent_email'				=>	cleanvars($_POST['agent_email'])
								,'agent_address'			=>	cleanvars($_POST['agent_address'])
								,'agent_account_title'		=>	cleanvars($_POST['agent_account_title'])
								,'agent_account_number'		=>	cleanvars($_POST['agent_account_number'])
								,'agent_cnic_number'		=>	cleanvars($_POST['agent_cnic_number'])
								,'agent_bank_name'			=>	cleanvars($_POST['agent_bank_name'])
								,'agent_branch_code'		=>	cleanvars($_POST['agent_branch_code'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(AGENTS , $values , "WHERE agent_id  = '".cleanvars($_POST['agent_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['agent_id'];
				sendRemark('Agent Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: agents.php", true, 301);
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

		$sqlDel = $dblms->Update(AGENTS , $values , "WHERE agent_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Agent Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: agents.php", true, 301);
			exit();
		}
	}
?>