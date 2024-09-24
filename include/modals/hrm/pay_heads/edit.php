<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'head_status,head_name,head_type,head_shortname'
                    ,'where'        =>  array(
                                                 'is_deleted'     => 0
                                                ,'head_id'         => cleanvars($_GET['head_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(SALARY_HEADS , $condition);

echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Designation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="pay_heads.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="head_id" value="'.cleanvars($_GET['head_id']).'"/>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="head_name" class="form-control" value="'.$row['head_name'].'" required="" />
                    </div>
                    <div class="col">
                        <label class="form-label">Short Name</label>
                        <input type="text" name="head_shortname" class="form-control" value="'.$row['head_shortname'].'" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label">Type <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="head_type" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_HeadType() as $key => $status):
                                echo'<option value="'.$key.'" '.(($row['head_type'] == $key)? 'selected': '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="head_status" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.(($row['head_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Designation</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>