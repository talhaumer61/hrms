<?php
	$img_dir 			= 'uploads/questions/';
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "question_id",
								'where' 	=> array( 
														'question_name'		=>	cleanvars($_POST['question_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'question_name'				=>	cleanvars($_POST['question_name'])
								,'question_status'				=>	cleanvars($_POST['question_status'])
								,'question_type'				=>	cleanvars($_POST['question_type'])
								,'question_level'				=>	cleanvars($_POST['question_level'])
								,'id_scale'						=>	cleanvars($_POST['id_scale'])
								,'question_detail'				=>	cleanvars($_POST['question_detail'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_added'						=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'					=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(QUESTIONS, $values);
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				foreach ($_POST['mcqs_option'] as $key => $value) {

					$s = ($key==$_POST['mcqs_option_s'] ) ? 1 : 0;
					$values = array(
						'option_name'				=>	cleanvars($value)
					   ,'option_istrue'				=>	cleanvars($s)
					   ,'id_question'				=>	cleanvars($latestID)
					   ,'option_status'				=>	cleanvars($_POST['question_status'])
					   
				  	); 

   					$sqllms		=	$dblms->insert(OPTIONS, $values);
				}

				if(!empty($_FILES['question_attachment']['name'])) {
					$path_parts 			= pathinfo($_FILES["question_attachment"]["name"]);
					$extension 				= strtolower($path_parts['extension']);
					if(in_array($extension , array('jpeg','jpg', 'png'))) {
						$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['question_name'])).'-'.$latestID."2.".($extension);
						$img_fileName		= to_seo_url(cleanvars($_POST['question_name'])).'-'.$latestID."2.".($extension);
						$dataImage 			= array( 'question_attachment' => $img_fileName );
						$sqlUpdateImg 		= $dblms->Update(QUESTIONS, $dataImage, "WHERE question_id= '".$latestID."'");
						if ($sqlUpdateImg) {
							move_uploaded_file($_FILES['question_attachment']['tmp_name'],$originalImage);
						}
					}
				}
				sendRemark('Question Added', '1',$latestID);
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: ".moduleName().".php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 		=> "question_id",
								'where' 		=> array( 
														 'question_name'	=>	cleanvars($_POST['question_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'question_id'		=>	cleanvars($_POST['question_id'])
													),					
								'return_type' 	=> 'count' 
							  );
		if($dblms->getRows(QUESTIONS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}else{
			$values = array(
								 'question_name'				=>	cleanvars($_POST['question_name'])
								,'question_status'				=>	cleanvars($_POST['question_status'])
								,'question_type'				=>	cleanvars($_POST['question_type'])
								,'question_level'				=>	cleanvars($_POST['question_level'])
								,'id_scale'						=>	cleanvars($_POST['id_scale'])
								,'question_detail'				=>	cleanvars($_POST['question_detail'])
								,'id_company'					=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
								,'id_modify'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'					=>	date('Y-m-d H:i:s')
						   ); 
						   
			$sqllms = $dblms->Update(QUESTIONS , $values , "WHERE question_id= '".cleanvars($_POST['question_id'])."'");

			if($sqllms) { 

				$latestID = $_POST['question_id'];
				foreach ($_POST['mcqs_option'] as $key => $value) {

					$s = ($key==$_POST['mcqs_option_s'] ) ? 1 : 0;
					$values = array(
						'option_name'				=>	cleanvars($value)
					   ,'option_istrue'				=>	cleanvars($s)
					   ,'id_question'				=>	cleanvars($latestID)
					   ,'option_status'				=>	cleanvars($_POST['question_status'])
					   
				  	); 

   					$sqllms		=	$dblms->Update(OPTIONS, $values, "WHERE option_id= '".cleanvars($_POST['option_id'][$key])."'");
				}

				sendRemark('Question Updated', '2',$latestID);
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

		$sqlDel = $dblms->Update(QUESTIONS , $values , "WHERE question_id='".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Question Deleted', '3',$_GET['deleteid']);
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: ".moduleName().".php", true, 301);
			exit();
		}
	}
?>