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
	if($dblms->getRows(OVERTIMES , $condition)) {
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
							, 'timestart' 			    => cleanvars($_POST['timestart'])
							, 'timeend' 				=> cleanvars($_POST['timeend'])
							, 'shiftstarttime' 			=> cleanvars($_POST['shiftstarttime'])
							, 'shiftendtime' 			=> cleanvars($_POST['shiftendtime'])
							, 'duration' 			    => cleanvars($_POST['duration'])
							, 'approved_duration' 		=> cleanvars($_POST['approved_duration'])
							, 'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
							, 'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							, 'date_added'				=>	date('Y-m-d G:i:s')
						);
		$sqllms = $dblms->insert(OVERTIMES, $values);
		
		if($sqllms) { 
			$latestID   =	$dblms->lastestid();
			sendRemark('Overtimes Added ID:'.$latestID, '1');
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
	if($dblms->getRows(OVERTIMES, $condition)) {
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
							, 'timestart' 			    => cleanvars($_POST['timestart'])
							, 'timeend' 				=> cleanvars($_POST['timeend'])
							, 'shiftstarttime' 			=> cleanvars($_POST['shiftstarttime'])
							, 'shiftendtime' 			=> cleanvars($_POST['shiftendtime'])
							, 'duration' 			    => cleanvars($_POST['duration'])
							, 'approved_duration' 		=> cleanvars($_POST['approved_duration'])
							,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_modify'				=>	date('Y-m-d G:i:s')
						); 
		$sqllms = $dblms->Update(OVERTIMES, $values , "WHERE id  = '".cleanvars($_POST['id'])."'");
		if($sqllms) { 
			$latestID = $_POST['id'];
			sendRemark('Overtimes Updated ID:'.cleanvars($latestID), '2');
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

	$sqlDel = $dblms->Update(OVERTIMES, $values , "WHERE id  = '".cleanvars($_GET['deleteid'])."'");
	if($sqlDel) { 
		sendRemark('Deleted Overtimes ID:'.cleanvars($_GET['deleteid']), '3');
		sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
		header("Location: ".moduleName().".php", true, 301);
		exit();
	}
}
?>