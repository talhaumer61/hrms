<?php 
$dblms = new dblms();

$condition = array(
                     'select'       =>  'questionnaire_detail,questionnaire_status,questionnaire_name,id_type,questionnaire_time,questionnaire_sufflequestions,questionnaire_suffleoptions,questionnaire_score,questionnaire_count,id_company'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'questionnaire_id'         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(QUESTIONNAIRES, $condition);
$condition = array(
    'select'       =>  'type_id,type_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$get_type     = $dblms->getRows(QUESTIONNAIRESTYPE, $condition);
echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName().'</h5>
    </div>
    <form action="" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="questionnaire_id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="questionnaire_name" class="form-control" value="'.$row['questionnaire_name'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Type<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_type" required="">
                        <option value=""> Choose one</option>';
                        foreach($get_type as $type):
                            echo'<option value="'.$type['type_id'].'" '.($type['type_id']==$row['id_type'] ? 'selected' : '').'>'.$type['type_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Time<span class="text-danger">*</span></label>
                    <input type="text" name="questionnaire_time" class="form-control" value="'.$row['questionnaire_time'].'" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Question Shuffle <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="questionnaire_sufflequestions" required="">
                        <option value="" Choose one</option>';
                        foreach(get_shuffle() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Options Shuffle<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="questionnaire_suffleoptions" required="">
                        <option value=""Choose one</option>';
                        foreach(get_shuffle() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="questionnaire_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_multiple_status() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Score<span class="text-danger">*</span></label>
                    <input type="text" name="questionnaire_score" class="form-control" value="'.$row['questionnaire_score'].'">
                </div>
                <div class="col mb-2">
                    <label class="form-label">Count<span class="text-danger">*</span></label>
                    <input type="text" name="questionnaire_count" class="form-control" value="'.$row['questionnaire_count'].'">
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea type="text" name="questionnaire_detail" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['questionnaire_detail'])).'</textarea>
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
</div>';
?>