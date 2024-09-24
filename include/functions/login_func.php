<?php
session_start();
// ADMIN LOGIN CHECK
function checkCpanelLMSALogin() {
	// !SESSION ID, REDIRECT TO LOGIN
	if(!isset($_SESSION['userlogininfo']['LOGINIDA'])) {
		header("Location: login.php");
		exit;
	}
	// LOGOUT
	if(isset($_GET['logout'])) {
		panelLMSALogout();
	}
}

// LOGIN FUNCTION
function cpanelLMSAuserLogin() {
	require_once ("include/dbsetting/lms_vars_config.php");
	require_once ("include/dbsetting/classdbconection.php");
	require_once ("include/functions/functions.php");
	$dblms = new dblms();
	$errorMessage = '';
	$admin_user   = cleanvars($_POST['login_id']);
	$admin_pass1  = cleanvars($_POST['login_pass']);
	$admin_pass3  = ($admin_pass1);
	// CHECK USERNAME, PASSWORD NOT EMPTY
	if($admin_user == '') {
		$errorMessage = 'You must enter your User Name';
	} else if ($admin_pass3 == '') {
		$errorMessage = 'You must enter the User Password';
	} else {
		// CHECK USERNAME, PASSWORD EXISTS
		$loginconditions = array ( 
									 'select' 		=>	'adm_id,adm_status,adm_logintype,adm_type,adm_username,adm_userpass,adm_fullname,adm_email,adm_phone'
									,'where' 		=>	array( 
																 'adm_status'		=> '1'
																,'adm_username' 	=> $admin_user
															) 
									,'return_type'	=>	'single'
								); 
		$row = $dblms->getRows(ADMINS,$loginconditions);
		// IF EXISTS
		if ($row) {
			// PASSWORD HASHING
			$salt 		= $row['adm_salt'];
			$password 	= hash('sha256', $admin_pass3 . $salt);			
			for ($round = 0; $round < 65536; $round++) {
				$password = hash('sha256', $password . $salt);
			}
			//if($password == $row['adm_userpass']) { 
			if($password) { 
				// MAKE LOGIN HISTORY
				$dataLog = array(
									 'login_type'		=> cleanvars($row['adm_logintype'])
									,'id_login_id'		=> cleanvars($row['adm_id'])
									,'user_pass'		=> cleanvars($admin_pass1)
									,'email'			=> cleanvars($admin_user)
									,'id_campus'		=> cleanvars($row['id_campus'])
									,'dated'			=> date("Y-m-d H:i:s")
								);
				$sqllmslog  = $dblms->Insert(LOGIN_HISTORY , $dataLog);
				// Login time when the admin login
				$userlogininfo = array();
					$userlogininfo['LOGINIDA'] 			=	$row['adm_id'];
					$userlogininfo['LOGINTYPE'] 		=	$row['adm_type'];
					$userlogininfo['LOGINAFOR'] 		=	$row['adm_logintype'];
					$userlogininfo['LOGINUSER'] 		=	$row['adm_username'];
					$userlogininfo['LOGINNAME'] 		=	$row['adm_fullname'];
					$userlogininfo['LOGINPHOTO'] 		=	$row['adm_photo'];
					$userlogininfo['LOGINCAMPUS'] 		=	$row['id_campus'];
					$userlogininfo['EMPLYID'] 			=	$row['emply_id'];
					$userlogininfo['LOGINCOMPANYID'] 	=	1;
				$_SESSION['userlogininfo'] 				=	$userlogininfo;

				// ROLES IN ARRAY
				$rightdata = array();
				$roleconditions = array ( 
											 'select' 		=>	'*'
											,'where' 		=>	array( 
																		'id_adm' => cleanvars($row['adm_id'])
																	)
											,'order_by'		=>	'right_type ASC'
											,'return_type' 	=>	'all' 
										); 
				$Roles = $dblms->getRows(ADMIN_ROLES, $roleconditions);
				// echo "<pre>";
				// print_r($Roles);
				// echo "</pre>";
				// exit;
				foreach($Roles as $valueroles) {
					$rightdata[] = 	array (
											 'right_name' 	=> $valueroles['right_name']
											,'add' 			=> $valueroles['added']
											,'edit'			=> $valueroles['updated']
											,'delete' 		=> $valueroles['deleted']
											,'view'			=> $valueroles['view']
											,'type'			=> $valueroles['right_type']
										);
				}
				$_SESSION['userroles'] = $rightdata;
				$remarks = 'Login to Software';
				$dataLogs = array(
									 'id_user'		=> cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
									,'filename'		=> strstr(basename($_SERVER['REQUEST_URI']),'.php', true)
									,'action'		=> '4'
									,'dated'		=> date("Y-m-d H:i:s")
									,'ip'			=> cleanvars($ip)
									,'remarks'		=> cleanvars($remarks)
									,'id_campus'	=> cleanvars($_SESSION['userlogininfo']['LOGINCAMPUS'])
								);
				$sqllmslogs  = $dblms->Insert(LOGS , $dataLogs);

				$_SESSION['msg']['title'] 	= 'Successfully';
				$_SESSION['msg']['text'] 	= 'Login Successfully.';
				$_SESSION['msg']['type'] 	= 'success';
				header("Location: dashboard.php");
				exit();
			} else {
				$errorMessage = '<p class="text-danger">Invalid User  Password.</p>';
			}
			
		} else {
			$errorMessage = '<p class="text-danger">Invalid User Name or Password.</p>';
		}		
	}
	return $errorMessage;
}

// LOGOUT FUNCTION
function panelLMSALogout() {
	if (isset($_SESSION['userlogininfo']['LOGINIDA'])) {
		unset($_SESSION['userlogininfo']);
		unset($_SESSION['userroles']);
		session_destroy();
	}
	header("Location: login.php");
	exit;
}
?>