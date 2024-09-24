<?php
// ADD RECORD
if(isset($_POST['submit_add'])) {

	$condition	=	array ( 
							'select' 	=> "grade_id",
							'where' 	=> array( 
													'grade_name'		=>	cleanvars($_POST['grade_name'])
													,'is_deleted'	=>	'0'	
												),
							'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(GRADES, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location: grades.php", true, 301);
		exit();
	}else{

		$values = array(
								'grade_name'			=>	cleanvars($_POST['grade_name'])
							,'grade_code'			=>	cleanvars($_POST['grade_code'])
							,'grade_benifits'		=>	cleanvars($_POST['grade_benifits'])
							,'grade_status'			=>	cleanvars($_POST['grade_status'])
							,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_added'			=>	date('Y-m-d H:i:s')
						); 
		
		$sqllms		=	$dblms->insert(GRADES, $values);
		
		if($sqllms) { 
			$latestID   =	$dblms->lastestid();
			sendRemark('Grade Added ID:'.$latestID, '1');
			sessionMsg('Successfully', 'Record Successfully Added.', 'success');
			header("Location: grades.php", true, 301);
			exit();
		}
	}
}

// EDIT RECORD
if(isset($_POST['submit_edit'])) {
	$condition	=	array ( 
							'select' 	=> "grade_id",
							'where' 	=> array( 
													'grade_name'		=>	cleanvars($_POST['grade_name'])
													,'is_deleted'	=>	'0'	
												),
							'not_equal' 	=> array( 
													'grade_id'		=>	cleanvars($_POST['grade_id'])
												),					
							'return_type' 	=> 'count' 
							); 
	if($dblms->getRows(GRADES, $condition)) {
		sessionMsg('Error','Record Already Exists.','danger');
		header("Location: grades.php", true, 301);
		exit();
	}else{
		$values = array(
								'grade_status'			=>	cleanvars($_POST['grade_status'])
							,'grade_name'			=>	cleanvars($_POST['grade_name'])
							,'grade_code'			=>	cleanvars($_POST['grade_code'])
							,'grade_benifits'		=>	cleanvars($_POST['grade_benifits'])
							,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_modify'			=>	date('Y-m-d H:i:s')
						); 
		$sqllms = $dblms->Update(GRADES , $values , "WHERE grade_id  = '".cleanvars($_POST['grade_id'])."'");
		if($sqllms) { 
			$latestID = $_POST['grade_id'];
			sendRemark('Grade Updates ID:'.cleanvars($latestID), '2');
			sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
			header("Location: grades.php", true, 301);
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

	$sqlDel = $dblms->Update(GRADES , $values , "WHERE grade_id  = '".cleanvars($_GET['deleteid'])."'");
	if($sqlDel) { 
		sendRemark('Deleted Region #:'.cleanvars($_GET['deleteid']), '3');
		sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
		header("Location: grades.php", true, 301);
		exit();
	}
}
?>