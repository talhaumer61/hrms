<?php
    // ADD RECORD
	if(isset($_POST['submit_add'])) {
		$condition	=	array ( 
								'select' 	=> "attendance_id",
								'where' 	=> array( 
														'yearmonth'			=> date('Y-m-d',strtotime($_POST['attendanceDate']))
														,'id_dept'          => cleanvars($_POST['id_dept'])
														,'is_deleted'		=> '0'	
													),
								'return_type' 	=> 'count' 
							  ); 
		if($dblms->getRows(EMPLOYEE_ATTENDANCE, $condition)) {
			sessionMsg('Error','Record Already Exists.','danger');
			header("Location: employee_attendance.php", true, 301);
			exit();
		}else{
			$condition = array(
									'select'       =>  'emply_id,emply_name'
									,'where'        =>  array(
																 'is_deleted'       => 0
																,'emply_status'     => 1
																,'id_dept'          => cleanvars($_POST['id_dept'])
															)
									,'order_by'     =>  'emply_id ASC'
									,'return_type'  =>  'all'
			);
			$EMPLOYEES     = $dblms->getRows(EMPLOYEES, $condition);
			foreach ($EMPLOYEES as $key => $row):
				$emply_id = $_POST['emply_id'];
				$emply_attendance = 0;
				if (isset($_POST['present-'.to_seo_url($row['emply_name']).'-'.$key.''])) {
					$emply_attendance += 1;
				} else if (isset($_POST['absent-'.to_seo_url($row['emply_name']).'-'.$key.''])) {
					$emply_attendance += 2;
				} else if (isset($_POST['leave-'.to_seo_url($row['emply_name']).'-'.$key.''])) {
					$emply_attendance += 3;
				} else {
					$emply_attendance += 2;
				}
				$values = array(
									'id_emply'			=>	cleanvars($emply_id[$key])
									,'id_dept'			=>	cleanvars($_POST['id_dept'])
									,'attendance'		=>	cleanvars($emply_attendance)
									,'yearmonth'		=>	date('Y-m-d '.date('H:i:s').'',strtotime($_POST['attendanceDate']))
									,'id_added'			=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
									,'date_added'		=>	date('Y-m-d H:i:s')
							); 
				$sqllms		=	$dblms->insert(EMPLOYEE_ATTENDANCE, $values);
			endforeach;
			if($sqllms) { 
				
				$latestID   =	$dblms->lastestid();

				sendRemark('Attendance Added ID:'.$latestID, '1');
				sessionMsg('Successfully', 'Record Successfully Added.', 'success');
				header("Location: employee_attendance.php", true, 301);
				exit();
			}
		}
	}

    // EDIT RECORD
	if(isset($_POST['submit_edit'])) {
		$condition = array(
								'select'       =>  'emply_id,emply_name'
								,'where'        =>  array(
																'is_deleted'       => 0
															,'emply_status'     => 1
															,'id_dept'          => cleanvars($_POST['id_dept'])
														)
								,'order_by'     =>  'emply_id ASC'
								,'return_type'  =>  'all'
		);
		$EMPLOYEES     = $dblms->getRows(EMPLOYEES, $condition);
		$id_array = explode(',',$_POST['attendance_id']);
		foreach ($EMPLOYEES as $key => $row):
			$emply_id = $_POST['emply_id'];
			$emply_attendance = 0;
			if (isset($_POST['present-'.to_seo_url($row['emply_name']).'-'.$key.''])) {
				$emply_attendance += 1;
			} else if (isset($_POST['absent-'.to_seo_url($row['emply_name']).'-'.$key.''])) {
				$emply_attendance += 2;
			} else if (isset($_POST['leave-'.to_seo_url($row['emply_name']).'-'.$key.''])) {
				$emply_attendance += 3;
			} else {
				$emply_attendance += 2;
			}
			$values = array(
								 'id_emply'			=>	cleanvars($emply_id[$key])
								,'id_dept'			=>	cleanvars($_POST['id_dept'])
								,'attendance'		=>	cleanvars($emply_attendance)
								,'yearmonth'		=>	date('Y-m-d '.date('H:i:s').'',strtotime($_POST['attendanceDate']))
								,'id_modify'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
								,'date_modify'		=>	date('Y-m-d H:i:s')
						); 
			$sqllms = $dblms->Update(EMPLOYEE_ATTENDANCE , $values , "WHERE attendance_id = '".cleanvars($id_array[$key])."'");
		endforeach;
		if($sqllms) { 

			$latestID = $_POST['attendance_id'];
			
			sendRemark('Attendance Updates ID:'.cleanvars($latestID), '2');
			sessionMsg('Successfully', 'Record Successfully Updated.', 'info');
			header("Location: employee_attendance.php", true, 301);
			exit();
		}

	}
?>