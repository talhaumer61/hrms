<?php
include "../../../dbsetting/lms_vars_config.php";
include "../../../dbsetting/classdbconection.php";
include "../../../functions/functions.php";
$dblms = new dblms();
// EMPLOYEES
$condition = array(
                     'select'       =>  'emply_id,emply_name'
                    ,'where'        =>  array(
                                                 'emply_status'     => 1
                                                ,'is_deleted'       => 0
                                            )
                    ,'order_by'     =>  'emply_id ASC'
                    ,'return_type'  =>  'all'
);
$EMPLOYEES     = $dblms->getRows(EMPLOYEES, $condition);
// SALARY HEADS
$condition = array(
                     'select'       =>  'head_id,head_name,head_shortname'
                    ,'where'        =>  array(
                                                 'head_status'     => 1
                                                ,'is_deleted'       => 0
                                            )
                    ,'order_by'     =>  'head_id ASC'
                    ,'return_type'  =>  'all'
);
$SALARY_HEADS     = $dblms->getRows(SALARY_HEADS, $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add Pay Settings</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="pay_settings.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label">Employees <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="id_emply" required="">
                            <option value=""> Choose one</option>';
                            foreach($EMPLOYEES as $key => $val):
                                echo'<option value="'.$val['emply_id'].'">'.ucwords(strtolower($val['emply_name'])).'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">Pay Head <span class="text-danger">*</span></label>
                    </div>
                    <div class="col">
                        <label class="form-label">Amount <span class="text-danger">*</span></label>
                    </div>
                </div>';
                foreach($SALARY_HEADS as $key => $val):
                    echo'
                    <div class="row mb-2">
                        <div class="col">
                            <input type="text" class="form-control" value="'.ucwords(strtolower($val['head_name'])).' ('.strtoupper($val['head_shortname']).')" required="" readonly="" />
                            <input type="hidden" name="id_head[]" value="'.$val['head_id'].'" required="" readonly="" />
                        </div>
                        <div class="col">
                            <input type="number" name="head_value[]" class="form-control" required="" placeholder="$0.00" />
                        </div>
                    </div>';
                endforeach;
                echo'
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add Pay Settings</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>