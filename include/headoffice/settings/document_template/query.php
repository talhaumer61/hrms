<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {

		$condition	=	array ( 
								'select' 	=> "template_id",
								'where' 	=> array( 
														'template_name'		=>	cleanvars($_POST['template_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(DOCUMENT_TEMPLATE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: document_template.php", true, 301);
			exit();
		}else{

			$values = array(
							 	 'template_status'		=>	cleanvars($_POST['template_status'])
								,'template_name'		=>	cleanvars($_POST['template_name'])
								,'template_contents'	=>	cleanvars($_POST['template_contents'])
								,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'			=>	date('Y-m-d H:i:s')
						   ); 
			
			$sqllms		=	$dblms->insert(DOCUMENT_TEMPLATE, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Document Template Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: document_template.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "template_id",
								'where' 	=> array( 
														'template_name'		=>	cleanvars($_POST['template_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'template_id'		=>	cleanvars($_POST['template_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(DOCUMENT_TEMPLATE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: document_template.php", true, 301);
			exit();
		}else{
			$values = array(
								 'template_status'		=>	cleanvars($_POST['template_status'])
								,'template_name'		=>	cleanvars($_POST['template_name'])
								,'template_contents'	=>	cleanvars($_POST['template_contents'])
								,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'			=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(DOCUMENT_TEMPLATE , $values , "WHERE template_id  = '".cleanvars($_POST['template_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['template_id'];
				sendRemark('Document Template Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: document_template.php", true, 301);
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

		$sqlDel = $dblms->Update(DOCUMENT_TEMPLATE , $values , "WHERE template_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Deleted Region #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: document_template.php", true, 301);
			exit();
		}
	}
?>