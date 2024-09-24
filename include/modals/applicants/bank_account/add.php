<?php
include "../../../dbsetting/lms_vars_config.php";
include "../../../dbsetting/classdbconection.php";
include "../../../functions/functions.php";
$dblms = new dblms();
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add Bank Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="applicants.php?id='.cleanvars($_GET['id']).'" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="applicant_id" value="'.cleanvars($_GET['id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Bank name <span class="text-danger">*</span></label>
                        <input type="text" name="id_bank" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Branch <span class="text-danger">*</span></label>
                        <input type="text" name="branchname" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Account type <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="account_type">
                            <option value=""> Choose one</option>';
                            foreach(get_BankType() as $key => $val):
                                echo'<option value="'.$key.'">'.$val.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Account title <span class="text-danger">*</span></label>
                        <input type="text" name="account_title" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Account number <span class="text-danger">*</span></label>
                        <input type="text" name="account_no" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Statement Date <span class="text-danger">*</span></label>
                        <input type="text" name="account_openingdate" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add_bank_account"><i class="ri-add-circle-line align-bottom me-1"></i>Add Bank Account</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>