<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "btype_id",
								'where' 	=> array( 
														'btype_name'		=>	cleanvars($_POST['btype_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(BREAKTYPES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'btype_name'				=>	cleanvars($_POST['btype_name'])
								,'btype_code'				=>	cleanvars($_POST['btype_code'])
								,'btype_status'				=>	cleanvars($_POST['btype_status'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'btype_detail'				=>	cleanvars($_POST['btype_detail'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(BREAKTYPES, $values);
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark(moduleName(false).' Added','1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "btype_id",
								'where' 		=> array( 
														 'btype_name'	=>	cleanvars($_POST['btype_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'btype_id'		=>	cleanvars($_POST['btype_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(BREAKTYPES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'btype_name'				=>	cleanvars($_POST['btype_name'])
								,'btype_code'				=>	cleanvars($_POST['btype_code'])
								,'btype_status'				=>	cleanvars($_POST['btype_status'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'btype_detail'				=>	cleanvars($_POST['btype_detail'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(BREAKTYPES , $values , "WHERE btype_id= '".cleanvars($_POST['btype_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['btype_id'];
				
				sendRemark(moduleName(false).' Updated','2',$latestID);
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

	// DELETE RECORD
	if(isset($_GET['deleteid'])) {
		$latestID= $_GET['deleteid'];
		$values = array(
						 'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
						,'is_deleted'	=>	'1'
						,'ip_deleted'	=>	cleanvars($ip)
						,'date_deleted'	=>	date('Y-m-d H:i:s')
					   );   

		$sqlDel = $dblms->Update(BREAKTYPES , $values , "WHERE btype_id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark(moduleName(false).' Deleted','3',$latestID);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>