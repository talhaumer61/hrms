<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		
		$condition	=	array ( 
								'select' 	=> "scalegroup_id",
								'where' 	=> array( 
														'scalegroup_name'		=>	cleanvars($_POST['scalegroup_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(SCALESGROUP, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'scalegroup_name'				=>	cleanvars($_POST['scalegroup_name'])
								,'scalegroup_mins'				=>	cleanvars($_POST['scalegroup_mins'])
								,'scalegroup_maxs'				=>	cleanvars($_POST['scalegroup_maxs'])
								,'scalegroup_color'				=>	cleanvars($_POST['scalegroup_color'])
								,'scalegroup_status'			=>	cleanvars($_POST['scalegroup_status'])
								,'id_scale'						=>	cleanvars($_POST['id_scale'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_added'						=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'					=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(SCALESGROUP, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('Scale Group Added', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "scalegroup_id",
								'where' 		=> array( 
														 'scalegroup_name'	=>	cleanvars($_POST['scalegroup_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'scalegroup_id'		=>	cleanvars($_POST['scalegroup_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(SCALESGROUP, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'scalegroup_name'				=>	cleanvars($_POST['scalegroup_name'])
								,'scalegroup_mins'				=>	cleanvars($_POST['scalegroup_mins'])
								,'scalegroup_maxs'				=>	cleanvars($_POST['scalegroup_maxs'])
								,'scalegroup_color'				=>	cleanvars($_POST['scalegroup_color'])
								,'scalegroup_status'			=>	cleanvars($_POST['scalegroup_status'])
								,'id_scale'						=>	cleanvars($_POST['id_scale'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_modify'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'					=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(SCALESGROUP , $values , "WHERE scalegroup_id= '".cleanvars($_POST['scalegroup_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['scalegroup_id'];
				
				sendRemark('Scale Group Updated', '2',$latestID);
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

		$sqlDel = $dblms->Update(SCALESGROUP , $values , "WHERE scalegroup_id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Scale Group Deleted', '3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>