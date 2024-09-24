<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "head_id",
								'where' 	=> array( 
														'head_name'	=>	cleanvars($_POST['head_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(SALARY_HEADS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: pay_heads.php", true, 301);
			exit();
		}else{
			$values = array(
								 'head_status'			=>	cleanvars($_POST['head_status'])
								,'head_name'			=>	cleanvars($_POST['head_name'])
								,'head_shortname'		=>	cleanvars($_POST['head_shortname'])
								,'head_type'			=>	cleanvars($_POST['head_type'])
								,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'			=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(SALARY_HEADS, $values);

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('Pay Head Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: pay_heads.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "head_id",
								'where' 	=> array( 
														 'head_name'	=>	cleanvars($_POST['head_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'head_id'		=>	cleanvars($_POST['head_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(SALARY_HEADS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: pay_heads.php", true, 301);
			exit();
		}else{
			$values = array(
								 'head_status'			=>	cleanvars($_POST['head_status'])
								,'head_name'			=>	cleanvars($_POST['head_name'])
								,'head_shortname'		=>	cleanvars($_POST['head_shortname'])
								,'head_type'			=>	cleanvars($_POST['head_type'])
								,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'			=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(SALARY_HEADS , $values , "WHERE head_id  = '".cleanvars($_POST['head_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['head_id'];
				
				sendRemark('Pay Head Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: pay_heads.php", true, 301);
				exit();
			}
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
		$sqlDel = $dblms->Update(SALARY_HEADS , $values , "WHERE head_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Pay Head Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: pay_heads.php", true, 301);
			exit();
		}
	}
?>