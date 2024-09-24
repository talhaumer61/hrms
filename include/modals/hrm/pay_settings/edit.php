<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'ps.payset_id,ps.payset_status,ps.id_emply,ps.id_head,ps.head_value,e.emply_name,e.emply_grosssalary,sh.head_name,sh.head_type,sh.head_shortname,dp.dept_name'
                    ,'join'         =>  '
                                            LEFT JOIN '.EMPLOYEES.' e       ON e.emply_id   = ps.id_emply
                                            LEFT JOIN '.SALARY_HEADS.' sh   ON sh.head_id   = ps.id_head
                                            LEFT JOIN '.DEPARTMENTS.' dp    ON dp.dept_id = e.id_dept
                                        '
                    ,'where'        =>  array(
                                                 'ps.is_deleted'    => 0
                                                ,'ps.id_emply'      => cleanvars($_GET['id_emply'])
                                            )
                    ,'search_by'    =>  'AND ps.payset_id IN ('.cleanvars($_GET['payset_id']).')'
                    ,'group_by'     =>  'ps.payset_id'
                    ,'order_by'     =>  'ps.payset_id ASC'
                    ,'return_type'  =>  'all'
);
$PAY_VALUES_EMPLY     = $dblms->getRows(PAY_SETTINGS.' ps', $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Designation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="pay_settings.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="id_emply" value="'.cleanvars($_GET['id_emply']).'"/>
            <input type="hidden" name="payset_id" value="'.cleanvars($_GET['payset_id']).'"/>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label">Department <span class="text-danger">*</span></label>
                        <input class="form-control" name="" value="'.ucwords(strtolower($PAY_VALUES_EMPLY[0]['dept_name'])).'" required="" readonly="" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label">Employees <span class="text-danger">*</span></label>
                        <input class="form-control" name="" value="'.ucwords(strtolower($PAY_VALUES_EMPLY[0]['emply_name'])).'" required="" readonly="" />
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
                foreach($PAY_VALUES_EMPLY as $key => $val):
                    echo'
                    <div class="row mb-2">
                        <div class="col">
                            <input type="text" class="form-control" value="'.ucwords(strtolower($val['head_name'])).' ('.strtoupper($val['head_shortname']).')" required="" readonly="" />
                            <input type="hidden" name="id_head[]" value="'.$val['id_head'].'" required="" readonly="" />
                        </div>
                        <div class="col">
                            <input type="number" name="head_value[]" class="form-control" required="" value="'.(($val['id_head'] == $PAY_VALUES_EMPLY[$key]['id_head'])? $PAY_VALUES_EMPLY[$key]['head_value']: '').'" placeholder="$0.00" />
                        </div>
                    </div>';
                endforeach;
                echo'
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