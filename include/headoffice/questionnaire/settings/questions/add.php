<?php
$dblms = new dblms();
$condition = array(
    'select'       =>  'scale_id ,scale_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$count     = $dblms->getRows(SCALES, $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-content">
    <div class="modal-header bg-primary p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).'</h5>
    </div>
    <form action="" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="question_name" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Type<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="question_type" required="" id="select_type">
                        <option value=""> Choose one</option>';
                        foreach(get_ques_type() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                
            </div>
            <div class="row" id="mcqs-options">
                    <label class="form-label">Options<span class="text-danger">*</span></label>
                    <!-- Your radio input options for MCQS here -->';
                    for($i = 0 ; $i < 4 ; $i++):
                        echo' <div class="col mb-2">
                                  <div class="p-2 d-flex">
                                    <input type="text" class="form-control" name="mcqs_option[]" /> 
                                    <input class="mx-2" type="radio" name="mcqs_option_s" value="'.$i.'" id="">
                                  </div>
                                </div>
                        ';
                    endfor;
                echo '
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Level<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="question_level" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_ques_level() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="question_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Attachment<span class="text-danger">*</span></label>
                    <input type="file" name="question_attachment" class="form-control" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Scale<span class="text-danger">*</span></label>
                    <select multiple class="form-control" data-choices name="id_scale" required="">
                        <option value=""> Choose one</option>';
                        foreach($count as $row):
                            echo'<option value="'.$row['scale_id'].'">'.$row['scale_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea type="text" name="question_detail" id="ckeditor" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add</button>
            </div>
        </div>
    </form>
</div>';
?>
<script>

$(document).ready(function() {
    $('#mcqs-options').hide()
    $("#select_type").on("change", function() {
        var selectedValue = $(this).val();
        var mcqsOptions = $("#mcqs-options");

        if (selectedValue === "1") {
            mcqsOptions.show();
        } else {
            mcqsOptions.hide();
        }
    });
    $('input[type="radio"][name="mcqs_option[]"]').on('click', function() {
        // Set the value of selected_option to the value of the clicked radio button
        console.log($(this).val());
        $('#selected_option').val($(this).val());
    });
});
</script>





