<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "applicant_id",
								'where' 	=> array( 
														'applicant_name'	=>	cleanvars($_POST['applicant_name'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php", true, 301);
			exit();
		}else{
			$values = array(
								 'applicant_status'				=>	cleanvars($_POST['applicant_status'])
								,'id_referral'					=>	cleanvars($_POST['id_referral'])
								,'applicant_refno'				=>	cleanvars($_POST['applicant_refno'])
								,'applicant_name'				=>	cleanvars($_POST['applicant_name'])
								,'applicant_gender'				=>	cleanvars($_POST['applicant_gender'])
								,'applicant_fatherhusband'		=>	cleanvars($_POST['applicant_fatherhusband'])
								,'applicant_cnic'				=>	cleanvars($_POST['applicant_cnic'])
								,'applicant_dob'				=>	cleanvars($_POST['applicant_dob'])
								,'applicant_marital'			=>	cleanvars($_POST['applicant_marital'])
								,'applicant_education'			=>	cleanvars($_POST['applicant_education'])
								,'applicant_currentinstitute'	=>	cleanvars($_POST['applicant_currentinstitute'])
								,'applicant_phone'				=>	cleanvars($_POST['applicant_phone'])
								,'applicant_whatsapp'			=>	cleanvars($_POST['applicant_whatsapp'])
								,'applicant_email'				=>	cleanvars($_POST['applicant_email'])
								,'applicant_currentaddress'		=>	cleanvars($_POST['applicant_currentaddress'])
								,'applicant_permanentaddres'	=>	cleanvars($_POST['applicant_permanentaddres'])
								,'applicant_residence'			=>	cleanvars($_POST['applicant_residence'])
								,'applicant_residingduration'	=>	cleanvars($_POST['applicant_residingduration'])
								,'applicant_dependents'			=>	cleanvars($_POST['applicant_dependents'])
								,'applicant_familymembers'		=>	cleanvars($_POST['applicant_familymembers'])
								,'applicant_familyearners'		=>	cleanvars($_POST['applicant_familyearners'])
								,'applicant_profession'			=>	cleanvars($_POST['applicant_profession'])
								,'applicant_professionanme'		=>	cleanvars($_POST['applicant_professionanme'])
								,'applicant_industry'			=>	cleanvars($_POST['applicant_industry'])
								,'applicant_doj'				=>	cleanvars($_POST['applicant_doj'])
								,'applicant_officephone'		=>	cleanvars($_POST['applicant_officephone'])
								,'applicant_officeemail'		=>	cleanvars($_POST['applicant_officeemail'])
								,'applicant_experience'			=>	cleanvars($_POST['applicant_experience'])
								,'applicant_officeaddress'		=>	cleanvars($_POST['applicant_officeaddress'])
								,'applicant_monthlyincome'		=>	cleanvars($_POST['applicant_monthlyincome'])
								,'applicant_annualicome'		=>	cleanvars($_POST['applicant_annualicome'])
								,'applicant_previousloan'		=>	cleanvars($_POST['applicant_previousloan'])
								,'applicant_otherincome'		=>	cleanvars($_POST['applicant_otherincome'])
								,'applicant_monthlyexpense'		=>	cleanvars($_POST['applicant_monthlyexpense'])
								,'applicant_remarks'			=>	cleanvars($_POST['applicant_remarks'])
								,'id_added'						=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'					=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(APPLICANTS, $values);
			

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				$files = array(
					'applicant_educationverify', 
					'applicant_professionproof', 
					'applicant_cnicfront', 
					'applicant_cnicback', 
					'applicant_photo'
				);

				$img_dir 			= 'uploads/images/applicants/clients/';

				// Picture
				foreach($files as $Fkey => $Fval):
					if(!empty($_FILES[$Fval]['name'])):
						$UFiles 				= $_FILES[$Fval]['name'];
						$path_parts 			= pathinfo($UFiles);
						$extension 				= strtolower($path_parts['extension']);
						if(in_array($extension , array('jpeg','jpg','png','pdf'))):
							$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['applicant_name'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$img_fileName		= to_seo_url(cleanvars($_POST['applicant_name'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$dataImage 			= array( $Fval => $img_fileName );
							$sqlUpdateImg 		= $dblms->Update(APPLICANTS, $dataImage, "WHERE applicant_id = '".$latestID."'");
							if ($sqlUpdateImg) {
								move_uploaded_file($_FILES[$Fval]['tmp_name'],$originalImage);
							}
						endif;
					endif;
				endforeach;

				sendRemark('Applicant Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: applicants.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "applicant_id",
								'where' 	=> array( 
														'applicant_name'	=>	cleanvars($_POST['applicant_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'applicant_id'		=>	cleanvars($_POST['applicant_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php", true, 301);
			exit();
		}else{
			$values = array(
								 'applicant_status'				=>	cleanvars($_POST['applicant_status'])
								,'id_referral'					=>	cleanvars($_POST['id_referral'])
								,'applicant_refno'				=>	cleanvars($_POST['applicant_refno'])
								,'applicant_name'				=>	cleanvars($_POST['applicant_name'])
								,'applicant_gender'				=>	cleanvars($_POST['applicant_gender'])
								,'applicant_fatherhusband'		=>	cleanvars($_POST['applicant_fatherhusband'])
								,'applicant_cnic'				=>	cleanvars($_POST['applicant_cnic'])
								,'applicant_dob'				=>	cleanvars($_POST['applicant_dob'])
								,'applicant_marital'			=>	cleanvars($_POST['applicant_marital'])
								,'applicant_education'			=>	cleanvars($_POST['applicant_education'])
								,'applicant_currentinstitute'	=>	cleanvars($_POST['applicant_currentinstitute'])
								,'applicant_phone'				=>	cleanvars($_POST['applicant_phone'])
								,'applicant_whatsapp'			=>	cleanvars($_POST['applicant_whatsapp'])
								,'applicant_email'				=>	cleanvars($_POST['applicant_email'])
								,'applicant_currentaddress'		=>	cleanvars($_POST['applicant_currentaddress'])
								,'applicant_permanentaddres'	=>	cleanvars($_POST['applicant_permanentaddres'])
								,'applicant_residence'			=>	cleanvars($_POST['applicant_residence'])
								,'applicant_residingduration'	=>	cleanvars($_POST['applicant_residingduration'])
								,'applicant_dependents'			=>	cleanvars($_POST['applicant_dependents'])
								,'applicant_familymembers'		=>	cleanvars($_POST['applicant_familymembers'])
								,'applicant_familyearners'		=>	cleanvars($_POST['applicant_familyearners'])
								,'applicant_profession'			=>	cleanvars($_POST['applicant_profession'])
								,'applicant_professionanme'		=>	cleanvars($_POST['applicant_professionanme'])
								,'applicant_industry'			=>	cleanvars($_POST['applicant_industry'])
								,'applicant_doj'				=>	cleanvars($_POST['applicant_doj'])
								,'applicant_officephone'		=>	cleanvars($_POST['applicant_officephone'])
								,'applicant_officeemail'		=>	cleanvars($_POST['applicant_officeemail'])
								,'applicant_experience'			=>	cleanvars($_POST['applicant_experience'])
								,'applicant_officeaddress'		=>	cleanvars($_POST['applicant_officeaddress'])
								,'applicant_monthlyincome'		=>	cleanvars($_POST['applicant_monthlyincome'])
								,'applicant_annualicome'		=>	cleanvars($_POST['applicant_annualicome'])
								,'applicant_previousloan'		=>	cleanvars($_POST['applicant_previousloan'])
								,'applicant_otherincome'		=>	cleanvars($_POST['applicant_otherincome'])
								,'applicant_monthlyexpense'		=>	cleanvars($_POST['applicant_monthlyexpense'])
								,'applicant_remarks'			=>	cleanvars($_POST['applicant_remarks'])
								,'id_modify'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'					=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(APPLICANTS , $values , "WHERE applicant_id  = '".cleanvars($_POST['applicant_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['applicant_id'];
				// Picture
				$files = array(
					'applicant_educationverify', 
					'applicant_professionproof', 
					'applicant_cnicfront', 
					'applicant_cnicback', 
					'applicant_photo'
				);

				$img_dir 			= 'uploads/images/applicants/clients/';

				// Picture
				foreach($files as $Fkey => $Fval):
					if(!empty($_FILES[$Fval]['name'])):
						$UFiles 				= $_FILES[$Fval]['name'];
						$path_parts 			= pathinfo($UFiles);
						$extension 				= strtolower($path_parts['extension']);
						if(in_array($extension , array('jpeg','jpg','png','pdf'))):
							$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['applicant_name'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$img_fileName		= to_seo_url(cleanvars($_POST['applicant_name'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$dataImage 			= array( $Fval => $img_fileName );
							$sqlUpdateImg 		= $dblms->Update(APPLICANTS, $dataImage, "WHERE applicant_id = '".$latestID."'");
							if ($sqlUpdateImg) {
								move_uploaded_file($_FILES[$Fval]['tmp_name'],$originalImage);
							}
						endif;
					endif;
				endforeach;
				sendRemark('Applicant Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: applicants.php?id=".$latestID."", true, 301);
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

		$sqlDel = $dblms->Update(APPLICANTS , $values , "WHERE applicant_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Applicant Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: applicants.php", true, 301);
			exit();
		}
	}



	// ADD GUARANTOR
	if (isset($_POST['submit_add_guarantor'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$condition	=	array ( 
								'select' 	=> "id",
								'where' 	=> array( 
														'fullname'	=>	cleanvars($_POST['fullname'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS_GUARANTORS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}else{
			$values = array(
								 'status'			=>	1
								,'fullname'			=>	cleanvars($_POST['fullname'])
								,'fathername'		=>	cleanvars($_POST['fathername'])
								,'withrelation'		=>	cleanvars($_POST['withrelation'])
								,'cnic'				=>	cleanvars($_POST['cnic'])
								,'phone'			=>	cleanvars($_POST['phone'])
								,'whatsapp'			=>	cleanvars($_POST['whatsapp'])
								,'years_know'		=>	cleanvars($_POST['years_know'])
								,'address'			=>	cleanvars($_POST['address'])
								,'id_applicant'		=>	$applicant_id
								,'id_added'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'		=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(APPLICANTS_GUARANTORS, $values);
			

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				$files = array(
					'photo', 
					'cnic_front', 
					'cnic_back'
				);

				$img_dir 			= 'uploads/images/applicants/guarantors/';

				// Picture
				foreach($files as $Fkey => $Fval):
					if(!empty($_FILES[$Fval]['name'])):
						$UFiles 				= $_FILES[$Fval]['name'];
						$path_parts 			= pathinfo($UFiles);
						$extension 				= strtolower($path_parts['extension']);
						if(in_array($extension , array('jpeg','jpg','png','pdf'))):
							$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['fullname'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$img_fileName		= to_seo_url(cleanvars($_POST['fullname'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$dataImage 			= array( $Fval => $img_fileName );
							$sqlUpdateImg 		= $dblms->Update(APPLICANTS_GUARANTORS, $dataImage, "WHERE id = '".$latestID."'");
							if ($sqlUpdateImg) {
								move_uploaded_file($_FILES[$Fval]['tmp_name'],$originalImage);
							}
						endif;
					endif;
				endforeach;

				sendRemark('Guarantor Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: applicants.php?id=".$applicant_id."", true, 301);
				exit();
			}
		}
	}

	// EDIT GUARANTOR
	if (isset($_POST['submit_edit_guarantor'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$condition	=	array ( 
								'select' 		=> "id",
								'where' 		=> array( 
														 'fullname'			=>	cleanvars($_POST['fullname'])
														,'is_deleted'		=>	'0'	
													),
								'not_equal' 	=> array( 
														'id'				=>	cleanvars($_POST['guarantor_id'])
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS_GUARANTORS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}else{
			$values = array(
								 'fullname'			=>	cleanvars($_POST['fullname'])
								,'fathername'		=>	cleanvars($_POST['fathername'])
								,'withrelation'		=>	cleanvars($_POST['withrelation'])
								,'cnic'				=>	cleanvars($_POST['cnic'])
								,'phone'			=>	cleanvars($_POST['phone'])
								,'whatsapp'			=>	cleanvars($_POST['whatsapp'])
								,'years_know'		=>	cleanvars($_POST['years_know'])
								,'address'			=>	cleanvars($_POST['address'])
								,'id_modify'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'		=>	date('Y-m-d H:i:s')
						   ); 
			
			$sqllms = $dblms->Update(APPLICANTS_GUARANTORS , $values , "WHERE id  = '".cleanvars($_POST['guarantor_id'])."'");

			if($sqllms) { 
				$latestID = $_POST['guarantor_id']; 

				$files = array(
					'photo', 
					'cnic_front', 
					'cnic_back'
				);

				$img_dir 			= 'uploads/images/applicants/guarantors/';

				// Picture
				foreach($files as $Fkey => $Fval):
					if(!empty($_FILES[$Fval]['name'])):
						$UFiles 				= $_FILES[$Fval]['name'];
						$path_parts 			= pathinfo($UFiles);
						$extension 				= strtolower($path_parts['extension']);
						if(in_array($extension , array('jpeg','jpg','png','pdf'))):
							$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['fullname'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$img_fileName		= to_seo_url(cleanvars($_POST['fullname'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$dataImage 			= array( $Fval => $img_fileName );
							$sqlUpdateImg 		= $dblms->Update(APPLICANTS_GUARANTORS, $dataImage, "WHERE id = '".$latestID."'");
							if ($sqlUpdateImg) {
								move_uploaded_file($_FILES[$Fval]['tmp_name'],$originalImage);
							}
						endif;
					endif;
				endforeach;

				sendRemark('Guarantor Updated ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'info');
				header("Location: applicants.php?id=".$applicant_id."", true, 301);
				exit();
			}
		}
	}

	// DELETE GUARANTOR
	if(isset($_GET['guarantorDeletedId'])) {
		$values = array(
							'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'is_deleted'	=>	'1'
							,'ip_deleted'	=>	cleanvars($ip)
							,'date_deleted'	=>	date('Y-m-d H:i:s')
					   );   

		$sqlDel = $dblms->Update(APPLICANTS_GUARANTORS , $values , "WHERE id  = '".cleanvars($_GET['guarantorDeletedId'])."'");
		if($sqlDel) { 
			sendRemark('Applicant Deleted #:'.cleanvars($_GET['guarantorDeletedId']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			exit();
			header("Location: applicants.php?id=".cleanvars($_GET['applicant_id'])."", true, 301);
		}
	}



	// ADD BANK ACCOUNT
	if (isset($_POST['submit_add_bank_account'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$values = array(
							 'status'				=>	1
							,'id_bank'				=>	cleanvars($_POST['id_bank'])
							,'branchname'			=>	cleanvars($_POST['branchname'])
							,'account_type'			=>	cleanvars($_POST['account_type'])
							,'account_title'		=>	cleanvars($_POST['account_title'])
							,'account_no'			=>	cleanvars($_POST['account_no'])
							,'account_openingdate'	=>	date('Y-m-d',strtotime($_POST['account_openingdate']))
							,'id_applicant'			=>	$applicant_id
							,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_added'			=>	date('Y-m-d H:i:s')
						); 
		$sqllms		=	$dblms->insert(APPLICANTS_BANK_ACCOUNTS, $values);
		if($sqllms) { 
			$latestID   =	$dblms->lastestid();
			sendRemark('Bank Account Added ID:'.$latestID, '1');
			sessionMsg('Successfully', 'Record Successfully Added.', 'success');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}
	}

	// EDIT BANK ACCOUNT
	if (isset($_POST['submit_edit_bank_account'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$values = array(
							 'id_bank'				=>	cleanvars($_POST['id_bank'])
							,'branchname'			=>	cleanvars($_POST['branchname'])
							,'account_type'			=>	cleanvars($_POST['account_type'])
							,'account_title'		=>	cleanvars($_POST['account_title'])
							,'account_no'			=>	cleanvars($_POST['account_no'])
							,'account_openingdate'	=>	date('Y-m-d',strtotime($_POST['account_openingdate']))
							,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'date_modify'			=>	date('Y-m-d H:i:s')
						); 
		$sqllms = $dblms->Update(APPLICANTS_BANK_ACCOUNTS , $values , "WHERE id  = '".cleanvars($_POST['bank_account_id'])."'");
		if($sqllms) { 
			$latestID = $_POST['bank_account_id']; 
			sendRemark('Bank Account Updated ID:'.$latestID, '1');
			sessionMsg('Successfully', 'Record Successfully Added.', 'info');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}
	}
	
	// DELETE BANK ACCOUNT
	if(isset($_GET['bankAccountDeletedId'])) {
		$values = array(
							'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'is_deleted'	=>	'1'
							,'ip_deleted'	=>	cleanvars($ip)
							,'date_deleted'	=>	date('Y-m-d H:i:s')
					   );   
		$sqlDel = $dblms->Update(APPLICANTS_BANK_ACCOUNTS , $values , "WHERE id  = '".cleanvars($_GET['bankAccountDeletedId'])."'");
		if($sqlDel) { 
			sendRemark('Bank Account Deleted #:'.cleanvars($_GET['bankAccountDeletedId']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			exit();
			header("Location: applicants.php?id=".cleanvars($_GET['applicant_id'])."", true, 301);
		}
	}

	

	// ADD DOCUMENT
	if (isset($_POST['submit_add_document'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$condition	=	array ( 
								'select' 		=> "id",
								'where' 		=> array( 
														 'id_product'		=>	cleanvars($_POST['id_product'])
														,'documenttitle'	=>	cleanvars($_POST['documenttitle'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS_DOCUMENTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}else{
			$values = array(
								 'status'			=>	1
								,'id_product'		=>	cleanvars($_POST['id_product'])
								,'documenttitle'	=>	cleanvars($_POST['documenttitle'])
								,'document_date'	=>	date('Y-m-d',strtotime($_POST['document_date']))
								,'id_applicant'		=>	$applicant_id
								,'id_added'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'		=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(APPLICANTS_DOCUMENTS, $values);
			

			if($sqllms) { 
				$latestID   =	$dblms->lastestid();

				$img_dir 			= 'uploads/images/applicants/documents/';

				// File
				if(!empty($_FILES['documentfile']['name'])):
					$UFiles 				= $_FILES['documentfile']['name'];
					$path_parts 			= pathinfo($UFiles);
					$extension 				= strtolower($path_parts['extension']);
					if(in_array($extension , array('docx','dot','dotx','pdf'))):
						$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['id_product'])).'-'.$latestID.".".($extension);
						$img_fileName		= to_seo_url(cleanvars($_POST['id_product'])).'-'.$latestID.".".($extension);
						$dataImage 			= array( 'documentfile' => $img_fileName );
						$sqlUpdateImg 		= $dblms->Update(APPLICANTS_DOCUMENTS, $dataImage, "WHERE id = '".$latestID."'");
						if ($sqlUpdateImg) {
							move_uploaded_file($_FILES['documentfile']['tmp_name'],$originalImage);
						}
					endif;
				endif;

				sendRemark('Document ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: applicants.php?id=".$applicant_id."", true, 301);
				exit();
			}
		}
	}

	// CREATE DOCUMENT
	if (isset($_POST['submit_add_document_create'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$condition	=	array ( 
								'select' 	=> "id",
								'where' 	=> array( 
														 'id_product'		=>	cleanvars($_POST['id_product'])
														,'documenttitle'	=>	cleanvars($_POST['documenttitle'])
														,'is_deleted'		=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS_DOCUMENTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}else{
			$values = array(
								 'status'			=>	1
								,'id_product'		=>	cleanvars($_POST['id_product'])
								,'documenttitle'	=>	cleanvars($_POST['documenttitle'])
								,'document_content'	=>	cleanvars($_POST['document_content'])
								,'document_date'	=>	date('Y-m-d')
								,'id_applicant'		=>	$applicant_id
								,'id_added'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'		=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(APPLICANTS_DOCUMENTS, $values);
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Document ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: applicants.php?id=".$applicant_id."", true, 301);
				exit();
			}
		}
	}

	// CREATE DOCUMENT
	if (isset($_POST['submit_edit_document_create'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$condition	=	array ( 
								'select' 		=> "id",
								'where' 		=> array( 
														 'id_product'		=>	cleanvars($_POST['id_product'])
														,'documenttitle'	=>	cleanvars($_POST['documenttitle'])
														,'is_deleted'		=>	'0'	
													),
								'not_equal' 	=> array( 
														'id'				=>	cleanvars($_POST['document_id'])
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS_DOCUMENTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}else{
			$values = array(
								 'id_product'		=>	cleanvars($_POST['id_product'])
								,'documenttitle'	=>	cleanvars($_POST['documenttitle'])
								,'document_content'	=>	cleanvars($_POST['document_content'])
								,'document_date'	=>	date('Y-m-d')
								,'id_modify'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'		=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(APPLICANTS_DOCUMENTS , $values , "WHERE id  = '".cleanvars($_POST['document_id'])."'");
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Document Updated ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'success');
				header("Location: applicants.php?id=".$applicant_id."", true, 301);
				exit();
			}
		}
	}

	// EDIT DOCUMENT
	if (isset($_POST['submit_edit_guarantor'])) {
		$applicant_id = cleanvars($_POST['applicant_id']);
		$condition	=	array ( 
								'select' 		=> "id",
								'where' 		=> array( 
														 'fullname'			=>	cleanvars($_POST['fullname'])
														,'is_deleted'		=>	'0'	
													),
								'not_equal' 	=> array( 
														'id'				=>	cleanvars($_POST['guarantor_id'])
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(APPLICANTS_GUARANTORS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: applicants.php?id=".$applicant_id."", true, 301);
			exit();
		}else{
			$values = array(
								 'fullname'			=>	cleanvars($_POST['fullname'])
								,'fathername'		=>	cleanvars($_POST['fathername'])
								,'withrelation'		=>	cleanvars($_POST['withrelation'])
								,'cnic'				=>	cleanvars($_POST['cnic'])
								,'phone'			=>	cleanvars($_POST['phone'])
								,'whatsapp'			=>	cleanvars($_POST['whatsapp'])
								,'years_know'		=>	cleanvars($_POST['years_know'])
								,'address'			=>	cleanvars($_POST['address'])
								,'id_modify'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'		=>	date('Y-m-d H:i:s')
						   ); 
			
			$sqllms = $dblms->Update(APPLICANTS_GUARANTORS , $values , "WHERE id  = '".cleanvars($_POST['guarantor_id'])."'");

			if($sqllms) { 
				$latestID = $_POST['guarantor_id']; 

				$files = array(
					'photo', 
					'cnic_front', 
					'cnic_back'
				);

				$img_dir 			= 'uploads/images/applicants/guarantors/';

				// Picture
				foreach($files as $Fkey => $Fval):
					if(!empty($_FILES[$Fval]['name'])):
						$UFiles 				= $_FILES[$Fval]['name'];
						$path_parts 			= pathinfo($UFiles);
						$extension 				= strtolower($path_parts['extension']);
						if(in_array($extension , array('jpeg','jpg','png','pdf'))):
							$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['fullname'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$img_fileName		= to_seo_url(cleanvars($_POST['fullname'])).'-'.$latestID.'-'.$Fkey.".".($extension);
							$dataImage 			= array( $Fval => $img_fileName );
							$sqlUpdateImg 		= $dblms->Update(APPLICANTS_GUARANTORS, $dataImage, "WHERE id = '".$latestID."'");
							if ($sqlUpdateImg) {
								move_uploaded_file($_FILES[$Fval]['tmp_name'],$originalImage);
							}
						endif;
					endif;
				endforeach;

				sendRemark('Guarantor Updated ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'info');
				header("Location: applicants.php?id=".$applicant_id."", true, 301);
				exit();
			}
		}
	}

	// DELETE DOCUMENT
	if(isset($_GET['guarantorDeletedId'])) {
		$values = array(
							'id_deleted'	=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'is_deleted'	=>	'1'
							,'ip_deleted'	=>	cleanvars($ip)
							,'date_deleted'	=>	date('Y-m-d H:i:s')
					   );   

		$sqlDel = $dblms->Update(APPLICANTS_GUARANTORS , $values , "WHERE id  = '".cleanvars($_GET['guarantorDeletedId'])."'");
		if($sqlDel) { 
			sendRemark('Applicant Deleted #:'.cleanvars($_GET['guarantorDeletedId']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			exit();
			header("Location: applicants.php?id=".cleanvars($_GET['applicant_id'])."", true, 301);
		}
	}


	// EDIT KYC
	if(isset($_POST['submit_kyc_edit'])) {

		$values = array(
							 'id_applicant'								=>	cleanvars($_POST['applicant_id'])
							,'kyc_id'									=>	cleanvars($_POST['kyc_id'])
							,'mother_name'								=>	cleanvars($_POST['mother_name'])
							,'current_residential_address'				=>	cleanvars($_POST['current_residential_address'])
							,'father_husband_name'						=>	cleanvars($_POST['father_husband_name'])
							,'phone'									=>	cleanvars($_POST['phone'])
							,'name'										=>	cleanvars($_POST['name'])
							,'type_of_account'							=>	cleanvars($_POST['type_of_account'])
							,'residence_status'							=>	cleanvars($_POST['residence_status'])
							,'tax_status'								=>	cleanvars($_POST['tax_status'])
							,'source_of_income'							=>	cleanvars($_POST['source_of_income'])
							,'profession'								=>	cleanvars($_POST['profession'])
							,'other_profession'							=>	cleanvars($_POST['other_profession'])
							,'profession_name'							=>	cleanvars($_POST['profession_name'])
							,'investment_income'						=>	cleanvars($_POST['investment_income'])
							,'purpose_nature_of_business'				=>	cleanvars($_POST['purpose_nature_of_business'])
							,'expected_monthly_turnover'				=>	cleanvars($_POST['expected_monthly_turnover'])
							,'no_of_transactions'						=>	cleanvars($_POST['no_of_transactions'])
							,'delivery_channels'						=>	cleanvars($_POST['delivery_channels'])
							,'verification_document_type'				=>	cleanvars($_POST['verification_document_type'])
							,'verification_document_number'				=>	cleanvars($_POST['verification_document_number'])
							,'verification_document_issue_date'			=>	date('Y-m-d',strtotime($_POST['verification_document_issue_date']))
							,'verification_document_expiry_date'		=>	date('Y-m-d',strtotime($_POST['verification_document_expiry_date']))
							,'verification_document_date_of_birth'		=>	date('Y-m-d',strtotime($_POST['verification_document_date_of_birth']))
							,'verification_document_place_of_birth'		=>	cleanvars($_POST['verification_document_place_of_birth'])
							,'self_pep'									=>	cleanvars($_POST['self_pep'])
							,'family_pep'								=>	cleanvars($_POST['family_pep'])
						); 
		
		if (isset($_POST['kyc_id']) && !empty($_POST['kyc_id'])) {
			$values['id_modify'] 		= cleanvars($_SESSION['userlogininfo']['LOGINIDA']);
			$values['date_modify'] 		= date('Y-m-d H:i:s');

			$sqllms = $dblms->Update(APPLICANTS_KYC , $values , "WHERE kyc_id = '".cleanvars($_POST['kyc_id'])."'");
		} else {
			$values['id_added'] 		= cleanvars($_SESSION['userlogininfo']['LOGINIDA']);
			$values['date_added'] 		= date('Y-m-d H:i:s');

			$sqllms = $dblms->Insert(APPLICANTS_KYC , $values);
		}

		if($sqllms) { 
			$latestID = $_POST['applicant_id'];
			sendRemark('Applicant KYC Updates ID:'.cleanvars($latestID), '2');
			sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
			header("Location: applicants.php?id=".$latestID."&tab_active=5", true, 301);
			exit();
		}
	}
?>