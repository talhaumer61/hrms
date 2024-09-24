<?php
// ADD RECORD
if(isset($_POST['submit_add'])) {

	$condition	=	array ( 
							'select' 	=> "role_id",
							'where' 	=> array( 
													'role_name'		=>	cleanvars($_POST['role_name'])
													,'role_type'		=>	cleanvars($_POST['role_type'])
													,'is_deleted'	=>	'0'	
												),
							'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(ROLES, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location: roles.php", true, 301);
		exit();
	}else{

		$values = array(
							'role_name'			=>	cleanvars($_POST['role_name'])
							,'role_type'		=>	cleanvars($_POST['role_type'])
							,'id_type'		=>	cleanvars($_POST['id_type'])
							,'role_status'			=>	cleanvars($_POST['role_status'])
							,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_added'			=>	date('Y-m-d H:i:s')
						); 
		
		$sqllms		=	$dblms->insert(ROLES, $values);
		
		if($sqllms) { 
			$latestID   =	$dblms->lastestid();
			sendRemark('Role Added ID:'.$latestID, '1');
			sessionMsg('Successfully', 'Record Successfully Added.', 'success');
			header("Location: roles.php", true, 301);
			exit();
		}
	}
}

// EDIT RECORD
if(isset($_POST['submit_edit'])) {
	$condition	=	array ( 
							'select' 	=> "role_id",
							'where' 	=> array( 
													'role_name'		=>	cleanvars($_POST['role_name'])
													,'is_deleted'	=>	'0'	
												),
							'not_equal' 	=> array( 
													'role_id'		=>	cleanvars($_POST['role_id'])
												),					
							'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(ROLES, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location: roles.php", true, 301);
		exit();
	}else{
		$values = array(
								'role_status'			=>	cleanvars($_POST['role_status'])
							,'role_name'			=>	cleanvars($_POST['role_name'])
							,'id_type'			=>	cleanvars($_POST['id_type'])
							,'role_type'		=>	cleanvars($_POST['role_type'])
							,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_modify'			=>	date('Y-m-d H:i:s')
						); 
		$sqllms = $dblms->Update(ROLES , $values , "WHERE role_id  = '".cleanvars($_POST['role_id'])."'");
		if($sqllms) { 
			$latestID = $_POST['role_id'];
			sendRemark('Role Updates ID:'.cleanvars($latestID), '2');
			sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
			header("Location: roles.php", true, 301);
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

	$sqlDel = $dblms->Update(ROLES , $values , "WHERE role_id = '".cleanvars($_GET['deleteid'])."'");
	if($sqlDel) { 
		sendRemark('Deleted Region #:'.cleanvars($_GET['deleteid']), '3');
		sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
		header("Location: roles.php", true, 301);
		exit();
	}
}
?>