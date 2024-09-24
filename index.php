<?php
include "include/dbsetting/lms_vars_config.php";
include "include/dbsetting/classdbconection.php";
$dblms = new dblms();
include "include/functions/login_func.php";
checkCpanelLMSALogin();
// unset($_SESSION['userlogininfo']);
if(isset($_SESSION['userlogininfo']['LOGINIDA'])) {
  header("Location: dashboard.php");	
} else { 
  header("Location: login.php");
}
?>
    