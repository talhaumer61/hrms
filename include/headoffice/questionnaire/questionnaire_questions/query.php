<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		
		$condition	=	array ( 
								'select' 	=> "id",
								'where' 	=> array( 
														'id_questionnaire'		=>	cleanvars($_POST['id_questionnaire'])
														,'is_deleted'		=>	'0'
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONNAIREQUESTIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'id_questionnaire'				=>	cleanvars($_POST['id_questionnaire'])
								,'id_questions'					=>	cleanvars(implode(',',$_POST['id_questions']))
								,'id_added'						=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'					=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(QUESTIONNAIREQUESTIONS, $values);
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Questionnaire Questions Added','1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {

		$condition	=	array ( 
								'select' 		=> "id",
								'where' 		=> array( 
														 'id_questionnaire'	=>	cleanvars($_POST['id_questionnaire'])
														 ,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'id'		=>	cleanvars($_POST['id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONNAIREQUESTIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'id_questionnaire'				=>	cleanvars($_POST['id_questionnaire'])
								,'id_questions'					=>	cleanvars(implode(',',$_POST['id_questions']))
								,'id_modify'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'					=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(QUESTIONNAIREQUESTIONS , $values , "WHERE id= '".cleanvars($_POST['id'])."'");

			if($sqllms) { 

				$latestID = $_POST['id'];
				
				sendRemark('Questionnaire Questions Updated','2',$latestID);
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

		$sqlDel = $dblms->Update(QUESTIONNAIREQUESTIONS , $values , "WHERE id='".cleanvars($_GET['deleteid'])."'");
		// $sqldel= $dblms->querylms("DELETE FROM ".QUESTIONNAIREQUESTIONS." WHERE id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Questionnaire Questions Deleted','3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>