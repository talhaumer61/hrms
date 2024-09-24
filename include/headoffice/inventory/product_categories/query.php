<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {

		$condition	=	array ( 
								'select' 	=> "cat_id",
								'where' 	=> array( 
														'cat_name'		=>	cleanvars($_POST['cat_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(PRODUCTS_CATEGORY, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: product_categories.php", true, 301);
			exit();
		}else{

			$values = array(
							 	 'cat_status'			=>	cleanvars($_POST['cat_status'])
								,'cat_name'				=>	cleanvars($_POST['cat_name'])
								,'cat_code'				=>	cleanvars($_POST['cat_code'])
								,'cat_details'			=>	cleanvars($_POST['cat_details'])
								,'id_added'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'			=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms		=	$dblms->insert(PRODUCTS_CATEGORY, $values);
			
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				sendRemark('Product Category Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: product_categories.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "cat_id",
								'where' 	=> array( 
														'cat_name'		=>	cleanvars($_POST['cat_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'cat_id'		=>	cleanvars($_POST['cat_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(PRODUCTS_CATEGORY, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: product_categories.php", true, 301);
			exit();
		}else{
			$values = array(
								 'cat_status'			=>	cleanvars($_POST['cat_status'])
								,'cat_name'				=>	cleanvars($_POST['cat_name'])
								,'cat_code'				=>	cleanvars($_POST['cat_code'])
								,'cat_details'			=>	cleanvars($_POST['cat_details'])
								,'id_modify'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'			=>	date('Y-m-d H:i:s')
						   ); 

			$sqllms = $dblms->Update(PRODUCTS_CATEGORY , $values , "WHERE cat_id  = '".cleanvars($_POST['cat_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['cat_id'];
				sendRemark('Product Category Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: product_categories.php", true, 301);
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

		$sqlDel = $dblms->Update(PRODUCTS_CATEGORY , $values , "WHERE cat_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Product Category Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: product_categories.php", true, 301);
			exit();
		}
	}
?>