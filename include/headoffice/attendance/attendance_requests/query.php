<?php
// ADD RECORD
if(isset($_POST['submit_add'])) {
	$condition	=	array ( 
							'select' 	=> "id",
							'where' 	=> array( 
													 'id_emply'	        => cleanvars($_POST['id_emply'])
													, 'status'	            => cleanvars($_POST['status'])
													,'is_deleted'			=> 0															
													,'id_company'			=> cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
												),
							'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(ATTENDANCEREQUESTS , $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location: ".moduleName().".php", true, 301);
		exit();
	}else{
		$values = array(
							 'status'					=>	cleanvars($_POST['status'])
							,'id_emply'				    =>	cleanvars($_POST['id_emply'])
							,'detail'					=>	cleanvars($_POST['detail'])
							, 'id_dept' 			    => cleanvars($_POST['id_dept'])
							, 'id_designation' 			=> cleanvars($_POST['id_designation'])
							, 'id_location' 			=> cleanvars($_POST['id_location'])
							, 'id_branch' 				=> cleanvars($_POST['id_branch'])
							, 'id_shift' 				=> cleanvars($_POST['id_shift'])
							, 'dated'					=> cleanvars($_POST['dated'])
							, 'checkintime' 			=> cleanvars($_POST['checkintime'])
							, 'timeend' 				=> cleanvars($_POST['timeend'])
							, 'checkouttime' 			=> cleanvars($_POST['checkouttime'])
							, 'approved_duration' 		=> cleanvars($_POST['approved_duration'])
							, 'punchtype' 				=> cleanvars($_POST['punchtype'])
							, 'punchtime'				=> cleanvars($_POST['punchtime'])
							, 'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
							, 'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							, 'date_added'				=>	date('Y-m-d G:i:s')
						);
		$sqllms = $dblms->insert(ATTENDANCEREQUESTS, $values);
		
		if($sqllms) { 
			$latestID   =	$dblms->lastestid();
			sendRemark('Attendance Request Added ID:'.$latestID, '1');
			sessionMsg('Successfully', 'Record Successfully Added.', 'success');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
}

// EDIT RECORD
if(isset($_POST['submit_edit'])) {
	$condition	=	array ( 
							'select' 	=> "id",
							'where' 	=> array( 
													 'id_emply'	        => cleanvars($_POST['id_emply'])
													, 'status'	        => cleanvars($_POST['status'])
													,'is_deleted'		=> 0	
													,'id_company'		=> cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
												),
							'not_equal' 	=> array( 
													'id'		=>	cleanvars($_POST['id'])
												),					
							'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(ATTENDANCEREQUESTS, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location: ".moduleName().".php", true, 301);
		exit();
	}else{
		$values = array( 	'status'					=>	cleanvars($_POST['status'])
							,'id_emply'				    =>	cleanvars($_POST['id_emply'])
							,'detail'					=>	cleanvars($_POST['detail'])
							, 'id_dept' 			    => cleanvars($_POST['id_dept'])
							, 'id_designation' 			=> cleanvars($_POST['id_designation'])
							, 'id_location' 			=> cleanvars($_POST['id_location'])
							, 'id_branch' 				=> cleanvars($_POST['id_branch'])
							, 'id_shift' 				=> cleanvars($_POST['id_shift'])
							, 'dated'					=> cleanvars($_POST['dated'])
							, 'checkintime' 			=> cleanvars($_POST['checkintime'])
							, 'timeend' 				=> cleanvars($_POST['timeend'])
							, 'checkouttime' 			=> cleanvars($_POST['checkouttime'])
							, 'approved_duration' 		=> cleanvars($_POST['approved_duration'])
							, 'punchtype' 				=> cleanvars($_POST['punchtype'])
							, 'punchtime'				=> cleanvars($_POST['punchtime'])
							,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_modify'				=>	date('Y-m-d G:i:s')
						); 
		$sqllms = $dblms->Update(ATTENDANCEREQUESTS, $values , "WHERE id  = '".cleanvars($_POST['id'])."'");
		if($sqllms) { 
			$latestID = $_POST['id'];
			sendRemark('Attendance Request Updated ID:'.cleanvars($latestID), '2');
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
						,'date_deleted'	=>	date('Y-m-d G:i:s')
					);   

	$sqlDel = $dblms->Update(ATTENDANCEREQUESTS, $values , "WHERE id  = '".cleanvars($_GET['deleteid'])."'");
	if($sqlDel) { 
		sendRemark('Deleted Attendance Request ID:'.cleanvars($_GET['deleteid']), '3');
		sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
		header("Location: ".moduleName().".php", true, 301);
		exit();
	}
}
?>