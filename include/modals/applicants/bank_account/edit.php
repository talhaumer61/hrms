<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'id_bank,branchname,account_type,account_title,account_no,account_openingdate'
                    ,'where'        =>  array(
                                                 'is_deleted'       => 0
                                                ,'id'               => cleanvars($_GET['bank_account_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$APPLICANTS_BANK_ACCOUNTS = $dblms->getRows(APPLICANTS_BANK_ACCOUNTS , $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Bank Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="applicants.php?id='.cleanvars($_GET['id']).'" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="applicant_id" value="'.cleanvars($_GET['applicant_id']).'"/>
            <input type="hidden" name="bank_account_id" value="'.cleanvars($_GET['bank_account_id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Bank name <span class="text-danger">*</span></label>
                        <input type="text" name="id_bank" class="form-control" required value="'.$APPLICANTS_BANK_ACCOUNTS['id_bank'].'" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Branch <span class="text-danger">*</span></label>
                        <input type="text" name="branchname" class="form-control" required value="'.$APPLICANTS_BANK_ACCOUNTS['branchname'].'" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Account type <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="account_type" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_BankType() as $key => $val):
                                echo'<option value="'.$key.'" '.(($APPLICANTS_BANK_ACCOUNTS['account_type'] == $key)? 'selected': '').'>'.$val.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Account title <span class="text-danger">*</span></label>
                        <input type="text" name="account_title" class="form-control" required value="'.$APPLICANTS_BANK_ACCOUNTS['account_title'].'" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Account number <span class="text-danger">*</span></label>
                        <input type="text" name="account_no" class="form-control" required value="'.$APPLICANTS_BANK_ACCOUNTS['account_no'].'" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Statement Date <span class="text-danger">*</span></label>
                        <input type="text" name="account_openingdate" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" value="'.date('d M, Y',strtotime($APPLICANTS_BANK_ACCOUNTS['account_openingdate'])).'" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit_bank_account"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Bank Account</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>