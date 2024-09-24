<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "designation_id",
								'where' 	=> array( 
														'designation_name'	=>	cleanvars($_POST['designation_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(DESIGNATIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: designations.php", true, 301);
			exit();
		}else{
			$values = array(
								 'designation_status'				=>	cleanvars($_POST['designation_status'])
								,'designation_name'					=>	cleanvars($_POST['designation_name'])
								,'designation_shortname'			=>	cleanvars($_POST['designation_shortname'])
								,'designation_description'			=>	cleanvars($_POST['designation_description'])
								,'id_added'							=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'						=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(DESIGNATIONS, $values);

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('Designation Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: designations.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "designation_id",
								'where' 	=> array( 
														 'designation_name'	=>	cleanvars($_POST['designation_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'designation_id'		=>	cleanvars($_POST['designation_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(DESIGNATIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: designations.php", true, 301);
			exit();
		}else{
			$values = array(
								 'designation_status'				=>	cleanvars($_POST['designation_status'])
								,'designation_name'					=>	cleanvars($_POST['designation_name'])
								,'designation_shortname'			=>	cleanvars($_POST['designation_shortname'])
								,'designation_description'			=>	cleanvars($_POST['designation_description'])
								,'id_modify'						=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'						=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(DESIGNATIONS , $values , "WHERE designation_id  = '".cleanvars($_POST['designation_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['designation_id'];
				
				sendRemark('Designation Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: designations.php", true, 301);
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

		$sqlDel = $dblms->Update(DESIGNATIONS , $values , "WHERE designation_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Designation Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: designations.php", true, 301);
			exit();
		}
	}
?>