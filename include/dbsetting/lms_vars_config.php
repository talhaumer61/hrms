<?php
error_reporting(0);
ob_start();
ob_clean();
date_default_timezone_set("Asia/Karachi");
// DATABASE NAME
define('LMS_HOSTNAME'			    , 'localhost');
define('LMS_NAME'				    , 'gptech_hrms');
define('LMS_USERNAME'			    , 'root');
define('LMS_USERPASS'			    , '');
// DATABASE TABLES VARIABLES
define('ADMIN_ROLES'			    , 'hrms_admins_roles');
define('ADMINS'					    , 'hrms_admins');
define('LOGS'					    , 'hrms_logfile');
define('LOGIN_HISTORY'			    , 'hrms_login_history');

define('GRADES'			            , 'hrms_grades');
define('COMPANIES'			        , 'hrms_companies');
define('DEPARTMENTS'			    , 'hrms_departments');
define('DESIGNATIONS'			    , 'hrms_designations');
define('DTYPE'			            , 'hrms_settings_documenttype');
define('LANGUAGE'			        , 'hrms_settings_languages');
define('OCCTYPE'			        , 'hrms_settings_occupationtypes');
define('QUESCATEGORY'			    , 'hrms_questionscategory');
define('OFFICIALDUTY'			    , 'hrms_officialduty');
define('BREAKTYPES'			        , 'hrms_breaktypes');
define('QUESTIONS'			        , 'hrms_questions');
define('SCALES'			            , 'hrms_scales');
define('GENERALSCALES'			    , 'hrms_generalscales');
define('GENERALSCALEGROUP'			, 'hrms_generalscalegroup');
define('EVALUATIONSSCALES'			, 'hrms_evaluationsscales');
define('SCALESGROUP'			    , 'hrms_scalesgroup');
define('QUESTIONNAIREQUESTIONS'		, 'hrms_questionnairequestions');
define('QUESTIONNAIRESTYPE'			, 'hrms_questionnairestype');
define('QUESTIONNAIRES'			    , 'hrms_questionnaires');
define('OPTIONS'			        , 'hrms_quesestionsoption');
define('TIMEZONE'			        , 'hrms_settings_timezone');
define('CURRENCY'			        , 'hrms_settings_currencies');
define('COUNTRY'			        , 'hrms_settings_countries');
define('ATTENDANCES'			    , 'hrms_attendances');
define('EMPLOYEE'			        , 'hrms_employee');
define('TIMESLOTS'			        , 'hrms_timeslots');
define('LOCATION'			        , 'hrms_locations');
define('BRANCHES'			        , 'hrms_branches');
define('ATTENDANCEREQUESTS'			, 'hrms_attendancerequests');
define('OVERTIMES'			        , 'hrms_overtimes');
define('ROLES'			            , 'hrms_roles');
// CONTROL VARIABLES
$control 		                    = (isset($_REQUEST['control']) && $_REQUEST['control'] != '') ? $_REQUEST['control'] : '';
$zone 	 		                    = (isset($_REQUEST['zone']) && $_REQUEST['zone'] != '') ? $_REQUEST['zone'] : '';
$ip	  			                    = (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] != '') ? $_SERVER['REMOTE_ADDR'] : '';
$do	  			                    = (isset($_REQUEST['do']) && $_REQUEST['do'] != '') ? $_REQUEST['do'] : '';
$view 			                    = (isset($_REQUEST['view']) && $_REQUEST['view'] != '') ? $_REQUEST['view'] : '';
$page			                    = (isset($_REQUEST['page']) && $_REQUEST['page'] != '') ? $_REQUEST['page'] : '';
$current_page	                    = (isset($_REQUEST['page']) && $_REQUEST['page'] != '') ? $_REQUEST['page'] : 1;
$Limit			                    = (isset($_REQUEST['Limit']) && $_REQUEST['Limit'] != '') ? $_REQUEST['Limit'] : '';
// MAIN REQUIRED VARIABLE
define('TITLE_HEADER'		        , 'Human Resource Management System');
define("SITE_NAME"			        , "Human Resource Management System");
define("SITE_PHONE"			        , "+00 00 00 00 00");
define("SITE_WHATSAPP"		        , "+00 000 000 0000");
define("SITE_EMAIL"			        , "hrms@gmail.com");
define("SITE_ADDRESS"		        , "Signature plaza Civil defense road near bikes market, Township Lahore.");
define("SITE_BIO"			        , "Empowering society, reducing dependency & improving lives");
define("SITE_URL"	    	        , "http://localhost/gpt/portal.odl.edu.pk/");
define('LMS_IP'				        , $ip);
define('LMS_DO'				        , $do);
define('LMS_EPOCH'			        , date("U"));
define('LMS_VIEW'			        , $view);
define("COPY_RIGHTS"		        , "Green Professional Technologies");
define("COPY_RIGHTS_ORG"	        , "Copyright &copy; ".date("Y")." - All Rights Reserved.");
define("COPY_RIGHTS_URL"	        , "https://gptech.pk/");
?>