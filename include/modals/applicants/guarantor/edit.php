<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'fullname,fathername,withrelation,cnic,phone,whatsapp,years_know,address'
                    ,'where'        =>  array(
                                                 'is_deleted'     => 0
                                                ,'id'         => cleanvars($_GET['guarantor_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(APPLICANTS_GUARANTORS , $condition);

echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Guarantor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="applicants.php?id='.cleanvars($_GET['id']).'" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="applicant_id" value="'.cleanvars($_GET['applicant_id']).'"/>
            <input type="hidden" name="guarantor_id" value="'.cleanvars($_GET['guarantor_id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="fullname" class="form-control" required value="'.$row['fullname'].'" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Father Name <span class="text-danger">*</span></label>
                        <input type="text" name="fathername" class="form-control" required value="'.$row['fathername'].'" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Relation <span class="text-danger">*</span></label>
                        <input type="text" name="withrelation" class="form-control" required value="'.$row['withrelation'].'" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">CNIC <span class="text-danger">*</span></label>
                        <input type="text" name="cnic" class="form-control" required value="'.$row['cnic'].'" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" required value="'.$row['phone'].'" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Whatsapp <span class="text-danger">*</span></label>
                        <input type="text" name="whatsapp" class="form-control" required value="'.$row['whatsapp'].'" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Year Knows <span class="text-danger">*</span></label>
                        <input type="text" name="years_know" class="form-control" required value="'.$row['years_know'].'" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea type="text" name="address" class="form-control" required >'.$row['address'].'</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">CNIC Front</label>
                        <input type="file" name="cnic_front" class="form-control" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">CNIC Back</label>
                        <input type="file" name="cnic_back" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit_guarantor"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Guarantor</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>