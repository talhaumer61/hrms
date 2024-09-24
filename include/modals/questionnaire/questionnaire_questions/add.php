<?php
include "../../../dbsetting/lms_vars_config.php";
include "../../../dbsetting/classdbconection.php";
include "../../../functions/functions.php";
$dblms = new dblms();
$condition = array(
    'select'       =>  'question_id,question_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$get_questions     = $dblms->getRows(QUESTIONS, $condition);
$condition = array(
    'select'       =>  'questionnaire_id,questionnaire_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$get_questionnaires     = $dblms->getRows(QUESTIONNAIRES, $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).'</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form  autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Questionnaire<span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="id_questionnaire" required="">
                            <option value=""> Choose one</option>';
                            foreach($get_questionnaires as $questionnaire):
                                echo'<option value="'.$questionnaire['questionnaire_id'].'">'.$questionnaire['questionnaire_name'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Questions<span class="text-danger">*</span></label>
                        <select multiple class="form-control" data-choices name="id_questions[]" required="">
                            <option value=""> Choose one</option>';
                            foreach($get_questions as $question):
                                echo'<option value="'.$question['question_id'].'">'.$question['question_name'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>