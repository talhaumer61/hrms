<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "dept_id",
								'where' 	=> array( 
														'dept_name'	=>	cleanvars($_POST['dept_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(DEPARTMENTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: departments.php", true, 301);
			exit();
		}else{
			$values = array(
								 'dept_status'			=>	cleanvars($_POST['dept_status'])
								,'dept_name'			=>	cleanvars($_POST['dept_name'])
								,'dept_shorname'		=>	cleanvars($_POST['dept_shorname'])
								,'dept_description'		=>	cleanvars($_POST['dept_description'])
								,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'			=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(DEPARTMENTS, $values);

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('Department Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: departments.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "dept_id",
								'where' 	=> array( 
														 'dept_name'	=>	cleanvars($_POST['dept_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'dept_id'		=>	cleanvars($_POST['dept_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(DEPARTMENTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: departments.php", true, 301);
			exit();
		}else{
			$values = array(
								 'dept_status'		=>	cleanvars($_POST['dept_status'])
								,'dept_name'		=>	cleanvars($_POST['dept_name'])
								,'dept_description'		=>	cleanvars($_POST['dept_description'])
								,'id_modify'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'		=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(DEPARTMENTS , $values , "WHERE dept_id  = '".cleanvars($_POST['dept_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['dept_id'];
				
				sendRemark('Applicant Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: departments.php", true, 301);
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

		$sqlDel = $dblms->Update(DEPARTMENTS , $values , "WHERE dept_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Applicant Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: departments.php", true, 301);
			exit();
		}
	}
?>