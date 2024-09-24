<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "dtype_id",
								'where' 	=> array( 
														'dtype_name'		=>	cleanvars($_POST['dtype_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(DTYPE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'dtype_name'				=>	cleanvars($_POST['dtype_name'])
								,'dtype_status'				=>	cleanvars($_POST['dtype_status'])
								,'dtype_details'			=>	cleanvars($_POST['dtype_details'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(DTYPE, $values);
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('Document Type Added ', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "dtype_id",
								'where' 		=> array( 
														 'dtype_name'	=>	cleanvars($_POST['dtype_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'dtype_id'		=>	cleanvars($_POST['dtype_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(DTYPE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'dtype_name'			=>	cleanvars($_POST['dtype_name'])
								,'dtype_status'				=>	cleanvars($_POST['dtype_status'])
								,'dtype_details'		=>	cleanvars($_POST['dtype_details'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(DTYPE , $values , "WHERE dtype_id= '".cleanvars($_POST['dtype_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['dtype_id'];
				
				sendRemark('Document Type Updated ', '2',$latestID);
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

		$sqlDel = $dblms->Update(DTYPE , $values , "WHERE dtype_id= '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Document Type Deleted ', '3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>