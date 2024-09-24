<?php 
include_once ('inventory/products/query.php');
echo' 
<title>Products - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Products</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">';
                if (isset($_GET['add'])) {
                    include_once ('inventory/products/add.php');
                } else if (!empty($_GET['id'])) {
                    include_once ('inventory/products/edit.php');
                } else {
                    include_once ('inventory/products/list.php');
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