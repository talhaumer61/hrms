<?php 
include_once ('hrm/'.strstr(basename($_SERVER['REQUEST_URI']), '.php', true).'/query.php');
echo' 
<title>Employee Attendance - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Employee Attendance</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HRM</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Attendance</a></li>
                            <li class="breadcrumb-item active">Employee Attendance</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">';
                include_once ('hrm/'.strstr(basename($_SERVER['REQUEST_URI']), '.php', true).'/list.php');
                echo'
            </div>
        </div>
    </div>
</div>';
?>