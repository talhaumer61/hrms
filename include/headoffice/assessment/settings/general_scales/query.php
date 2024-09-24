<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		
		$condition	=	array ( 
								'select' 	=> "gscale_id",
								'where' 	=> array( 
														'gscale_name'		=>	cleanvars($_POST['gscale_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(GENERALSCALES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'gscale_name'				=>	cleanvars($_POST['gscale_name'])
								,'gscale_total'				=>	cleanvars($_POST['gscale_total'])
								,'gscale_status'			=>	cleanvars($_POST['gscale_status'])
								,'gscale_detail'			=>	cleanvars($_POST['gscale_detail'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(GENERALSCALES, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				foreach($_POST['ggroup_name'] as $key => $value) {
					$values = array(
						'ggroup_name'				=>	cleanvars($_POST['ggroup_name'][$key])
					   ,'ggroup_min'				=>	cleanvars($_POST['ggroup_min'][$key])
					   ,'ggroup_max'				=>	cleanvars($_POST['ggroup_max'][$key])					   
					   ,'id_gscale'					=>	cleanvars($latestID)					   
					   ,'ggroup_status'				=>	1
				  ); 
   					$sqllms		=	$dblms->insert(GENERALSCALEGROUP, $values);
				}
				sendRemark('Document Type Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "gscale_id",
								'where' 		=> array( 
														 'gscale_name'	=>	cleanvars($_POST['gscale_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'gscale_id'		=>	cleanvars($_POST['gscale_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(GENERALSCALES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'gscale_name'				=>	cleanvars($_POST['gscale_name'])
								,'gscale_total'				=>	cleanvars($_POST['gscale_total'])
								,'gscale_status'			=>	cleanvars($_POST['gscale_status'])
								,'gscale_detail'			=>	cleanvars($_POST['gscale_detail'])
								,'id_company'				=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(GENERALSCALES , $values , "WHERE gscale_id= '".cleanvars($_POST['gscale_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['gscale_id'];
				$sqlDel = $dblms->querylms( "DELETE FROM ".GENERALSCALEGROUP. " WHERE id_gscale  = '".$latestID."'");
				if($sqlDel){
					foreach($_POST['ggroup_name'] as $key => $value) {
						$values = array(
							'ggroup_name'				=>	cleanvars($_POST['ggroup_name'][$key])
						   ,'ggroup_min'				=>	cleanvars($_POST['ggroup_min'][$key])
						   ,'ggroup_max'				=>	cleanvars($_POST['ggroup_max'][$key])					   
						   ,'id_gscale'					=>	cleanvars($latestID)					   
						   ,'ggroup_status'				=>	1
					  ); 
						   $sqllms		=	$dblms->insert(GENERALSCALEGROUP, $values);
					}
				}
				sendRemark('General Scale Updated', '2',cleanvars($latestID));
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

		$sqlDel = $dblms->Update(GENERALSCALES , $values , "WHERE gscale_id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('General Scale Deleted', '3',cleanvars($_GET['deleteid']));
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>