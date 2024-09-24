<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "adm_id",
								'where' 	=> array( 
														'adm_userpass'	=>	cleanvars($_POST['adm_userpass'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(ADMINS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								'adm_status'							=>	cleanvars($_POST['adm_status'])
							,'adm_userpass'							=>	cleanvars($_POST['adm_userpass'])
							,'adm_type'								=>	cleanvars($_POST['adm_type'])
							,'adm_username'							=>	cleanvars($_POST['adm_username'])
							,'adm_fullname'							=>	cleanvars($_POST['adm_fullname'])
							,'adm_email'							=>	cleanvars($_POST['adm_email'])
							,'adm_phone'							=>	cleanvars($_POST['adm_phone'])
							,'id_office'							=>	1
							,'id_company'							=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
						); 

			$sqllms		=	$dblms->insert(ADMINS, $values);

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				echo'<prer>';
				print_r($_POST);
				echo'</prer>';
				exit;
				foreach ($_POST['right_name'] as $key => $value) {
					$values = array(
									 'right_name'							=>	cleanvars($_POST['right_name'][$key])
									,'added'								=>	cleanvars($_POST['added'][$key])
									,'updated'								=>	cleanvars($_POST['updated'][$key])
									,'deleted'								=>	cleanvars($_POST['deleted'][$key])
									,'view'									=>	cleanvars($_POST['view'][$key] )
									,'right_type'							=>	cleanvars($_POST['right_type'][$key])
									,'id_adm'								=>	cleanvars($latestID)
								); 

   					$sqllms		=	$dblms->insert(ADMIN_ROLES, $values);
				}
				sendRemark('Admin Added ', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "adm_id",
								'where' 		=> array( 
														 'adm_username '	=>	cleanvars($_POST['adm_username '])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'adm_id'		=>	cleanvars($_POST['adm_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(ADMINS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
							 'adm_status'							=>	cleanvars($_POST['adm_status'])
							,'adm_userpass'							=>	cleanvars($_POST['adm_userpass'])
							,'adm_type'								=>	cleanvars($_POST['adm_type'])
							,'adm_username'							=>	cleanvars($_POST['adm_username'])
							,'adm_fullname'							=>	cleanvars($_POST['adm_fullname'])
							,'adm_email'							=>	cleanvars($_POST['adm_email'])
							,'adm_phone'							=>	cleanvars($_POST['adm_phone'])
						); 
						   
			$sqllms = $dblms->Update(ADMINS , $values , "WHERE adm_id= '".cleanvars($_POST['adm_id'])."'");

			if($sqllms) { 
				// echo'<pre>';
				// print_r($_POST);
				// echo'</pre>';
				// exit;
				$uniIndex = 0;
				$latestID = $_POST['adm_id'];
				$delete_record = $dblms->querylms("DELETE FROM ".ADMIN_ROLES." WHERE id_adm=".$latestID."");
				foreach ($_POST['right_name'] as $key => $value) {
					$uniIndex++;
					$val = array(
									'right_name'						=>	cleanvars($_POST['right_name'][$key])
								,'added'								=>	cleanvars($_POST['added'][$uniIndex])
								,'updated'								=>	cleanvars($_POST['updated'][$uniIndex])
								,'deleted'								=>	cleanvars($_POST['deleted'][$uniIndex])
								,'view'									=>	cleanvars($_POST['view'][$uniIndex] )
								,'right_type '							=>	cleanvars($_POST['right_type'][$key])
								,'id_adm'								=>	cleanvars($latestID)
							); 

   					$sqllms		=	$dblms->insert(ADMIN_ROLES, $val);
				}
				sendRemark('ADMIN Updated ','2',$latestID);
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

	// DELETE RECORD
	if(isset($_GET['deleteid'])) {
		$values = array(
						'is_deleted'	=>	'1'
					   );   

		$sqlDel = $dblms->Update(ADMINS , $values , "WHERE adm_id   = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('ADMIN Deleted ','3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>