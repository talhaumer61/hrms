<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		
		$condition	=	array ( 
								'select' 	=> "ggroup_id",
								'where' 	=> array( 
														'ggroup_name'		=>	cleanvars($_POST['ggroup_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(GENERALSCALEGROUP, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'ggroup_name'				=>	cleanvars($_POST['ggroup_name'])
								,'ggroup_min'				=>	cleanvars($_POST['ggroup_min'])
								,'ggroup_status'			=>	cleanvars($_POST['ggroup_status'])
								,'id_gscale'				=>	cleanvars($_POST['id_gscale'])
								,'ggroup_max'				=>	cleanvars($_POST['ggroup_max'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(GENERALSCALEGROUP, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				sendRemark('General Scale Group Added', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "ggroup_id",
								'where' 		=> array( 
														 'ggroup_name'	=>	cleanvars($_POST['ggroup_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'ggroup_id'		=>	cleanvars($_POST['ggroup_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(GENERALSCALEGROUP, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'ggroup_name'				=>	cleanvars($_POST['ggroup_name'])
								,'ggroup_min'				=>	cleanvars($_POST['ggroup_min'])
								,'ggroup_status'			=>	cleanvars($_POST['ggroup_status'])
								,'id_gscale'				=>	cleanvars($_POST['id_gscale'])
								,'ggroup_max'				=>	cleanvars($_POST['ggroup_max'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(GENERALSCALEGROUP , $values , "WHERE ggroup_id= '".cleanvars($_POST['ggroup_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['ggroup_id'];
				
				sendRemark('General Scale Group Updated', '2',$latestID);
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

		$sqlDel = $dblms->Update(GENERALSCALEGROUP , $values , "WHERE ggroup_id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('General Scale Group Deleted', '3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>