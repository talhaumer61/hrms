<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "product_id",
								'where' 	=> array( 
														'product_name'		=>	cleanvars($_POST['product_name'])
														,'is_deleted'	=>	'0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(PRODUCTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: products.php", true, 301);
			exit();
		}else{
			$values = array(
								 'product_status'			=>	cleanvars($_POST['product_status'])
								,'product_name'				=>	cleanvars($_POST['product_name'])
								,'product_brand'			=>	cleanvars($_POST['product_brand'])
								,'product_model'			=>	cleanvars($_POST['product_model'])
								,'product_code'				=>	cleanvars($_POST['product_code'])
								,'product_quantity'			=>	cleanvars($_POST['product_quantity'])
								,'product_price'			=>	cleanvars($_POST['product_price'])
								,'product_details'			=>	cleanvars($_POST['product_details'])
								,'id_vendor'				=>	cleanvars($_POST['id_vendor'])
								,'id_cat'					=>	cleanvars($_POST['id_cat'])
								,'id_added'					=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_added'				=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms		=	$dblms->insert(PRODUCTS, $values);
			if($sqllms) { 
				$latestID   =	$dblms->lastestid();
				// Picture
				if(!empty($_FILES['product_photo']['name'])) {
					$path_parts 			= pathinfo($_FILES["product_photo"]["name"]);
					$extension 				= strtolower($path_parts['extension']);
					if(in_array($extension , array('jpeg','jpg', 'png'))) {
						$img_dir 			= 'uploads/images/inventory/product/';
						$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['product_name'])).'-'.$latestID.".".($extension);
						$img_fileName		= to_seo_url(cleanvars($_POST['product_name'])).'-'.$latestID.".".($extension);
						$dataImage 			= array( 'product_photo' => $img_fileName );
						$sqlUpdateImg 		= $dblms->Update(PRODUCTS, $dataImage, "WHERE product_id = '".$latestID."'");
						if ($sqlUpdateImg) {
							move_uploaded_file($_FILES['product_photo']['tmp_name'],$originalImage);
						}
					}
				}
				sendRemark('Product Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: products.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition	=	array ( 
								'select' 	=> "product_id",
								'where' 	=> array( 
														'product_name'	=>	cleanvars($_POST['product_name'])
														,'is_deleted'	=>	'0'	
													),
								'not_equal' 	=> array( 
														'product_id'		=>	cleanvars($_POST['product_id'])
													),					
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(PRODUCTS, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: products.php", true, 301);
			exit();
		}else{
			$values = array(
								 'product_status'			=>	cleanvars($_POST['product_status'])
								,'product_name'				=>	cleanvars($_POST['product_name'])
								,'product_brand'			=>	cleanvars($_POST['product_brand'])
								,'product_model'			=>	cleanvars($_POST['product_model'])
								,'product_code'				=>	cleanvars($_POST['product_code'])
								,'product_quantity'			=>	cleanvars($_POST['product_quantity'])
								,'product_price'			=>	cleanvars($_POST['product_price'])
								,'product_details'			=>	cleanvars($_POST['product_details'])
								,'id_vendor'				=>	cleanvars($_POST['id_vendor'])
								,'id_cat'					=>	cleanvars($_POST['id_cat'])
								,'id_modify'				=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'				=>	date('Y-m-d H:i:s')
						   ); 
			$sqllms = $dblms->Update(PRODUCTS , $values , "WHERE product_id  = '".cleanvars($_POST['product_id'])."'");
			if($sqllms) { 
				$latestID = $_POST['product_id'];
				// Picture
				if(!empty($_FILES['product_photo']['name'])) {
					$path_parts 			= pathinfo($_FILES["product_photo"]["name"]);
					$extension 				= strtolower($path_parts['extension']);
					if(in_array($extension , array('jpeg','jpg', 'png'))) {
						$img_dir 			= 'uploads/images/inventory/product/';
						$originalImage		= $img_dir.to_seo_url(cleanvars($_POST['product_name'])).'-'.$latestID.".".($extension);
						$img_fileName		= to_seo_url(cleanvars($_POST['product_name'])).'-'.$latestID.".".($extension);
						$dataImage 			= array( 'product_photo' => $img_fileName );
						$sqlUpdateImg 		= $dblms->Update(PRODUCTS, $dataImage, "WHERE product_id = '".$latestID."'");
						if ($sqlUpdateImg) {
							move_uploaded_file($_FILES['product_photo']['tmp_name'],$originalImage);
						}
					}
				}
				sendRemark('Product Updates ID:'.cleanvars($latestID), '2');
				sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
				header("Location: products.php", true, 301);
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

		$sqlDel = $dblms->Update(PRODUCTS , $values , "WHERE product_id  = '".cleanvars($_GET['deleteid'])."'");
		if($sqlDel) { 
			sendRemark('Product Deleted #:'.cleanvars($_GET['deleteid']), '3');
			sessionMsg('Warning', 'Record Successfully Deleted.', 'warning');
			header("Location: products.php", true, 301);
			exit();
		}
	}
?>