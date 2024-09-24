<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "occtype_id",
								'where' 	=> array( 
														'occtype_name'		=>	cleanvars($_POST['occtype_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(OCCTYPE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'occtype_name'				=>	cleanvars($_POST['occtype_name'])
								,'occtype_status'			=>	cleanvars($_POST['occtype_status'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'occtype_details'			=>	cleanvars($_POST['occtype_details'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(OCCTYPE, $values);
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('Occupation Tpye Added', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "occtype_id",
								'where' 		=> array( 
														 'occtype_name'	=>	cleanvars($_POST['occtype_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'occtype_id'		=>	cleanvars($_POST['occtype_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(OCCTYPE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'occtype_name'				=>	cleanvars($_POST['occtype_name'])
								,'occtype_status'			=>	cleanvars($_POST['occtype_status'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'occtype_details'			=>	cleanvars($_POST['occtype_details'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(OCCTYPE , $values , "WHERE occtype_id= '".cleanvars($_POST['occtype_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['occtype_id'];
				
				sendRemark('Occupation Type Updated', '2',$latestID);
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
						,'date_deleted'	=>	date('Y-m-d H:i:s')
					   );   

		$sqlDel = $dblms->Update(OCCTYPE , $values , "WHERE occtype_id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('occupation Type Added', '3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>