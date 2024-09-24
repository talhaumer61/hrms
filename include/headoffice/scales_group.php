<?php
$rootDir="assessment/scales_group/"; 
include_once ($rootDir.'query.php');
echo' 
<title>Scales Group - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Scales Group</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Assessment</a></li>>
                            <li class="breadcrumb-item active">Scales Group</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">';
                include_once ($rootDir.'list.php');
                echo'
            </div>
        </div>
    </div>
</div>';
?>