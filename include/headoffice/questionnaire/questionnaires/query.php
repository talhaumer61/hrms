<?php
	$img_dir 			= 'uploads/company/';

    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "questionnaire_id",
								'where' 	=> array( 
														'questionnaire_name'	=>	cleanvars($_POST['questionnaire_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONNAIRES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'questionnaire_status'							=>	cleanvars($_POST['questionnaire_status'])
								,'questionnaire_name'							=>	cleanvars($_POST['questionnaire_name'])
								,'id_type'										=>	cleanvars($_POST['id_type'])
								,'questionnaire_time'							=>	cleanvars($_POST['questionnaire_time'])
								,'questionnaire_sufflequestions'				=>	cleanvars($_POST['questionnaire_sufflequestions'])
								,'questionnaire_suffleoptions'					=>	cleanvars($_POST['questionnaire_suffleoptions'])
								,'questionnaire_score'							=>	cleanvars($_POST['questionnaire_score'])
								,'questionnaire_count'							=>	cleanvars($_POST['questionnaire_count'])
								,'questionnaire_detail'							=>	cleanvars($_POST['questionnaire_detail'])
								,'id_company'									=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_added'										=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'									=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(QUESTIONNAIRES, $values);

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Questionnaire Added ', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "questionnaire_id",
								'where' 		=> array( 
														 'questionnaire_name'	=>	cleanvars($_POST['questionnaire_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'questionnaire_id'		=>	cleanvars($_POST['questionnaire_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONNAIRES, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'questionnaire_status'							=>	cleanvars($_POST['questionnaire_status'])
								,'questionnaire_name'							=>	cleanvars($_POST['questionnaire_name'])
								,'id_type'										=>	cleanvars($_POST['id_type'])
								,'questionnaire_time'							=>	cleanvars($_POST['questionnaire_time'])
								,'questionnaire_sufflequestions'				=>	cleanvars($_POST['questionnaire_sufflequestions'])
								,'questionnaire_suffleoptions'					=>	cleanvars($_POST['questionnaire_suffleoptions'])
								,'questionnaire_score'							=>	cleanvars($_POST['questionnaire_score'])
								,'questionnaire_count'							=>	cleanvars($_POST['questionnaire_count'])
								,'questionnaire_detail'							=>	cleanvars($_POST['questionnaire_detail'])
								,'id_company'									=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_modify'									=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'									=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(QUESTIONNAIRES , $values , "WHERE questionnaire_id= '".cleanvars($_POST['questionnaire_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['questionnaire_id'];
				
				sendRemark('Questionnaire Updated ','2',$latestID);
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

		$sqlDel = $dblms->Update(QUESTIONNAIRES , $values , "WHERE questionnaire_id   = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Questionnaire Added ','3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>