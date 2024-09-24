<?php 
include_once ('settings/area/substates/query.php');
echo' 
<title>Substates - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Substates</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Area</a></li>
                            <li class="breadcrumb-item active">Substates</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">';
                include_once ('settings/area/substates/list.php');
                echo'
            </div>
        </div>
    </div>
</div>
<script>
    function getState(val) {
        $.ajax({
            type: "POST",
            url: "include/ajax/get_states.php",
            data: "id_country=" + val,
            success: function(data) {
                $("#state").html(data);
            }
        });
    }
</script>';
?>

