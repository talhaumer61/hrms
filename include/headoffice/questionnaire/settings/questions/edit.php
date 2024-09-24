<?php 
$dblms = new dblms();

$condition = array(
                     'select'       =>  'question_status,question_name,question_detail,question_type,question_level,question_attachment,id_scale,id_company'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'question_id '         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(QUESTIONS, $condition);
if($row['question_type'] == "1"){
    $optioncondition = array(
            'select'       =>  'option_id, option_name, option_istrue'
        ,'where'        =>  array(
                                    'id_question '         => cleanvars($_GET['id'])
                                )
        ,'return_type'  =>  'all'
    );
    $options = $dblms->getRows(OPTIONS, $optioncondition);
}

$condition = array(
    'select'       =>  'scale_id ,scale_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
    ,'return_type'  =>  'all'
);
$count     = $dblms->getRows(SCALES, $condition);
echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName(false).'</h5>
    </div>
    <form action="" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="question_id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" name="question_name" class="form-control" value="'.$row['question_name'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Type<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="question_type" required="" id="select_type">
                        <option value=""> Choose one</option>';
                        foreach(get_ques_type() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['question_type'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="row" id="mcqs-options">
                    <label class="form-label">Options<span class="text-danger">*</span></label>
                    <!-- Your radio input options for MCQS here -->';
                    if($row['question_type'] == "1"){
                        foreach($options as $i => $value):
                            echo' <div class="col mb-2">
                                    <div class="p-2 d-flex">
                                    <input type="hidden" name="option_id[]" value="'.$value['option_id'].'">
                                        <input type="text" class="form-control" name="mcqs_option[]" value="'.$value['option_name'].'" /> 
                                        <input class="mx-2" type="radio" name="mcqs_option_s" value="'.$i.'" id="" '.($value['option_istrue']=="1" ? 'checked':'').'>
                                    </div>
                                    </div>
                            ';
                        endforeach;
                    }
                echo '
            </div>
                <div class="col mb-2">
                    <label class="form-label">Level<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="question_level" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_ques_level() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['question_level'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="question_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['question_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Attachment<span class="text-danger">*</span></label>
                    <input type="file" name="question_attachment" value="'.$row['question_attachment'].'" class="form-control" >
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Scale<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_scale" required="">
                        <option value=""> Choose one</option>';
                        foreach($count as $scale):
                            echo'<option value="'.$scale['scale_id'].'" '.($scale['scale_id']==$row['id_scale'] ? 'selected' : '').'>'.$scale['scale_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="question_detail" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['question_detail'])).'</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit</button>
            </div>
        </div>
    </form>
</div>
'.$row['question_type'].'
<script>
$(document).ready(function() {
    ';
    if(!($row['question_type'] == "1")){
    echo '
    $("#mcqs-options").hide()
    console.log("fuck you")
    ';
    }
    echo '
    $("#select_type").on("change", function() {
        var selectedValue = $(this).val();
        var mcqsOptions = $("#mcqs-options");

        if (selectedValue === "1") {
            mcqsOptions.show();
        } else {
            mcqsOptions.hide();
        }
    });
});
</script>';
?>