<?php 
include_once ('settings/grades/query.php');
echo' 
<title>Grades - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Grades</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                            <li class="breadcrumb-item active">Grades</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-lg-12">';
                include_once ('settings/grades/list.php');
                echo'
            </div>
        </div>
    </div>
</div>';
?>