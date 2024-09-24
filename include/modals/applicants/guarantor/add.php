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
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add Guarantor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="applicants.php?id='.cleanvars($_GET['id']).'" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="applicant_id" value="'.cleanvars($_GET['id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="fullname" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Father Name <span class="text-danger">*</span></label>
                        <input type="text" name="fathername" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Relation <span class="text-danger">*</span></label>
                        <input type="text" name="withrelation" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">CNIC <span class="text-danger">*</span></label>
                        <input type="text" name="cnic" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Whatsapp <span class="text-danger">*</span></label>
                        <input type="text" name="whatsapp" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Year Knows <span class="text-danger">*</span></label>
                        <input type="text" name="years_know" class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea type="text" name="address" class="form-control" required=""></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Photo <span class="text-danger">*</span></label>
                        <input type="file" name="photo" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">CNIC Front <span class="text-danger">*</span></label>
                        <input type="file" name="cnic_front" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">CNIC Back <span class="text-danger">*</span></label>
                        <input type="file" name="cnic_back" class="form-control" required />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add_guarantor"><i class="ri-add-circle-line align-bottom me-1"></i>Add Guarantor</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>