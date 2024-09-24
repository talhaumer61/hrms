<?php
include "../dbsetting/lms_vars_config.php";
include "../dbsetting/classdbconection.php";
include "../functions/functions.php";
$dblms = new dblms();
if(!empty($_GET['username'])){
    $condition = array(
                         'select'       =>  'adm_username,adm_email'
                        ,'where'        =>  array(
                                                     'is_deleted'       => 0
                                                    ,'adm_username'     => cleanvars($_GET['username'])
                                                )
                        ,'return_type'  =>  'single'
                    );
    $get_username     = $dblms->getRows(ADMINS, $condition);
    if($get_username){
    echo "Username Already Exists.";
    }
}
if(!empty($_GET['email'])){
    $condition = array(
                         'select'        =>  'adm_email'
                        ,'where'        =>  array(
                                                'is_deleted'          => 0
                                                ,'adm_email '         => cleanvars($_GET['email'])
                                            )
                        ,'return_type'  =>  'single'
    );
    $get_email     = $dblms->getRows(ADMINS, $condition);
    if($get_email){
    echo "Email Already Exists.";
    }
}
?>