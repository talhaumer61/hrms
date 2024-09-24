<?php
echo'
<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- Plugins css -->
        <link href="assets/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
        <!-- jsvectormap css -->
        <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
        <!--Swiper slider css-->
        <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
        <!-- swiper css -->
        <link rel="stylesheet" href="assets/libs/swiper/swiper-bundle.min.css">
        <!-- dropzone css -->
        <link rel="stylesheet" href="assets/libs/dropzone/dropzone.css" type="text/css" />
        <!-- Filepond css -->
        <link rel="stylesheet" href="assets/libs/filepond/filepond.min.css" type="text/css" />
        <link rel="stylesheet" href="assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
        <!-- Layout config Js -->
        <script src="assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- gridjs css -->
        <link rel="stylesheet" href="assets/libs/gridjs/theme/mermaid.min.css">
        <!-- SWEETALERT JS/CSS -->
        <link rel="stylesheet" href="assets/sweetalert/sweetalert_custom.css">
        <script src="assets/sweetalert/sweetalert.min.js"></script>
        <!-- CKEDITOR -->
        <script src="assets/ckeditor/ckeditor.js"></script> 
        <!-- JQUERY -->
        <script src="assets/js/jquery.js"></script>        
        
        <style>
        .text-right{
            text-align: right;
        }
        </style>        
    </head>
    <body>
        <div class="dropzone" hidden></div>
        <ul class="list-unstyled mb-0" id="dropzone-preview" hidden><li class="mt-2" id="dropzone-preview-list"></li></ul>
        <!-- <input type="file" name="product_photo[]" class="filepond filepond-input-multiple" multiple data-allow-reorder="true" data-max-file-size="2MB" data-max-files="5" accept="image/png, image/jpg, image/jpeg"> -->
        <div id="layout-wrapper">';
            include_once "include/sessionMsg.php"; 
            include_once "include/".get_logintypes($_SESSION['userlogininfo']['LOGINAFOR'])."/topbar.php";  
            include_once "include/".get_logintypes($_SESSION['userlogininfo']['LOGINAFOR'])."/sidebar.php";

			$sqlstring	= "";
			$adjacents	= 3;
			if(!($Limit)) 	{ $Limit = 20; } 
			if($page)		{ $start = ($page - 1) * $Limit; } else {	$start = 0;	}

            echo'
            <div class="main-content">';
?>