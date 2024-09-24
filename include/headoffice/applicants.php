<?php 
include_once ('applicants/query.php');
echo' 
<title>Applicants - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Applicants</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Applicants</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">';
                if (isset($_GET['add'])) {
                    include_once ('applicants/add.php');
                } else if (!empty($_GET['id']) && isset($_GET['create'])) {
                    include_once ('applicants/tabs/documents/create.php');
                } else if (!empty($_GET['id']) && !empty($_GET['document_id'])) {
                    include_once ('applicants/tabs/documents/create_edit.php');
                } else if (!empty($_GET['id']) && !isset($_GET['create'])) {
                    include_once ('applicants/edit.php');
                } else {
                    include_once ('applicants/list.php');
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