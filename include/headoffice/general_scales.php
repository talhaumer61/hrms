<?php 
$rootDir="assessment/settings/";
include_once ($rootDir.moduleName().'/query.php');
echo' 
<title>'.moduleName(false).' - '.TITLE_HEADER.'</title>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">'.moduleName(false).'</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Assessment</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                            <li class="breadcrumb-item"><a href="'.moduleName().'.php" class="text-primary">'.moduleName(false).'</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
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
    document.addEventListener("DOMContentLoaded", function() {
    var deleteButtons = document.querySelectorAll(".delete-button");
    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var index = parseInt(button.getAttribute("data-index"));
            var row = button.closest(".row2");
            row.remove();
        });
    });
});
    
document.getElementById("ggroup_btn").addEventListener("click", function() {
    // alert("he");
    event.preventDefault();
    // Create clone
    var what_you_work_div = document.getElementById("ggroup");
    var clonedDiv = what_you_work_div.cloneNode(true);

    // Reset input values in the cloned div
    var clonedInput = clonedDiv.querySelector("input[name=\'ggroup_name[]']").value='';
    var clonedInput = clonedDiv.querySelector("input[name=\'ggroup_min[]']").value='';
    var clonedInput = clonedDiv.querySelector("input[name=\'ggroup_max[]']").value='';

    // Add delete button to the cloned div
    var deleteButton = clonedDiv.querySelector(".delete-button");
    deleteButton.style.display = "inline-block"; // Show delete button
    deleteButton.disabled = false; // Enable the delete button
    deleteButton.addEventListener("click", function() {
        clonedDiv.remove(); // Remove the cloned div when delete button is clicked
    });

    var targetDiv = document.getElementById('targetDiv');
    targetDiv.appendChild(clonedDiv);
});

</script>