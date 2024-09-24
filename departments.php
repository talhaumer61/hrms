<?php
include "include/dbsetting/lms_vars_config.php";
include "include/dbsetting/classdbconection.php";
include "include/functions/functions.php";
$dblms = new dblms();
include "include/functions/login_func.php";
checkCpanelLMSALogin();
include("include/header.php");
include("include/".get_logintypes($_SESSION['userlogininfo']['LOGINAFOR'])."/".strstr(basename($_SERVER['REQUEST_URI']), '.php', true).".php");
include("include/footer.php");
?>