<?php 
include_once ('hrm/employees/query.php');
echo' 
<title>Employees - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Employees</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">HRM</a></li>
                            <li class="breadcrumb-item active">Employees</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">';
                if (isset($_GET['add'])) {
                    include_once ('hrm/employees/add.php');
                } else if (!empty($_GET['id'])) {
                    include_once ('hrm/employees/edit.php');
                } else {
                    include_once ('hrm/employees/list.php');
                }
                echo'
            </div>
        </div>
    </div>
</div>
<script>
    

</script>';
?>