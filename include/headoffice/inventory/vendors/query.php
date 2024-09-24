<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {

		$condition	=	array ( 
								'select' 	=> "vendor_id",
								'where' 	=> array( 
														'vendor_name'		=>	cleanvars($_POST['vendor_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(VENDORS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: vendors.php", true, 301);
			exit();
		}else{

			$values = array(
								 'vendor_status'			=>	cleanvars($_POST['vendor_status'])
								,'vendor_name'				=>	cleanvars($_POST['vendor_name'])
								,'vendor_phone'				=>	cleanvars($_POST['vendor_phone'])
								,'vendor_email'				=>	cleanvars($_POST['vendor_email'])
								,'vendor_address'			=>	cleanvars($_POST['vendor_address'])
								,'vendor_contactperson'		=>	cleanvars($_POST['vendor_contactperson'])
								,'vendor_contactemail'		=>	cleanvars($_POST['vendor_contactemail'])
								,'vendor_contactphone'		=>	cleanvars($_POST['vendor_contactphone'])
								,'vendor_contactwhatsapp'	=>	cleanvars($_POST['vendor_contactwhatsapp'])
								,'vendor_accountno'			=>	cleanvars($_POST['vendor_accountno'])
								,'vendor_accounttitle'		=>	cleanvars($_POST['vendor_accounttitle'])
								,'vendor_bank'				=>	cleanvars($_POST['vendor_bank'])
								,'vendor_bankcode'			=>	cleanvars($_POST['vendor_bankcode'])
								,'vendor_cnic'				=>	cleanvars($_POST['vendor_cnic'])
								,'vendor_bankaddress'		=>	cleanvars($_POST['vendor_bankaddress'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(VENDORS, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Vendor Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: vendors.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "vendor_id",
								'where' 	=> array( 
														'vendor_name'	=>	cleanvars($_POST['vendor_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'vendor_id'		=>	cleanvars($_POST['vendor_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(VENDORS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: vendors.php", true, 301);
			exit();
		}else{
			$values = array(
								 'vendor_status'			=>	cleanvars($_POST['vendor_status'])
								,'vendor_name'				=>	cleanvars($_POST['vendor_name'])
								,'vendor_phone'				=>	cleanvars($_POST['vendor_phone'])
								,'vendor_email'				=>	cleanvars($_POST['vendor_email'])
								,'vendor_address'			=>	cleanvars($_POST['vendor_address'])
								,'vendor_contactperson'		=>	cleanvars($_POST['vendor_contactperson'])
								,'vendor_contactemail'		=>	cleanvars($_POST['vendor_contactemail'])
								,'vendor_contactphone'		=>	cleanvars($_POST['vendor_contactphone'])
								,'vendor_contactwhatsapp'	=>	cleanvars($_POST['vendor_contactwhatsapp'])
								,'vendor_accountno'			=>	cleanvars($_POST['vendor_accountno'])
								,'vendor_accounttitle'		=>	cleanvars($_POST['vendor_accounttitle'])
								,'vendor_bank'				=>	cleanvars($_POST['vendor_bank'])
								,'vendor_bankcode'			=>	cleanvars($_POST['vendor_bankcode'])
								,'vendor_cnic'				=>	cleanvars($_POST['vendor_cnic'])
								,'vendor_bankaddress'		=>	cleanvars($_POST['vendor_bankaddress'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(VENDORS , $values , "WHERE vendor_id  = '".cleanvars($_POST['vendor_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['vendor_id'];
				sendRemark('Vendor Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: vendors.php", true, 301);
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

		$sqlDel = $dblms->Update(VENDORS , $values , "WHERE vendor_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Vendor Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: vendors.php", true, 301);
			exit();
		}
	}
?>