<?php
include "include/dbsetting/lms_vars_config.php";
include "include/dbsetting/classdbconection.php";
include "include/functions/functions.php";
$dblms = new dblms();
include "include/functions/login_func.php";
checkCpanelLMSALogin();
// echo "<script >".$_SESSION['userlogininfo']['LOGINAFOR']."</script>";
include("include/header.php");
include("include/".get_logintypes($_SESSION['userlogininfo']['LOGINAFOR'])."/dashboard.php");
include("include/footer.php");
?>