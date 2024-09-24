<?php 
$rootDir='settings/';
include_once ($rootDir.moduleName().'/query.php');
echo' 
<title>'.moduleName().' - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">'.moduleName(false).'</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">More</li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                            <li class="breadcrumb-item"><a href="'.moduleName().'.php" class="text-primary">'.moduleName(false).'</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-lg-12">';
                if (isset($_GET['add'])) {
                    include_once ($rootDir.moduleName().'/add.php');
                } else if (!empty($_GET['id'])) {
                    include_once ($rootDir.moduleName().'/edit.php');
                } else {
                    include_once ($rootDir.moduleName().'/list.php');
                }
                echo'
            </div>
        </div>
    </div>
</div>';
?>
<script>
    CKEDITOR.replace("ckeditor");
</script>