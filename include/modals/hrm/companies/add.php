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
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="companies.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="company_name" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Short Name <span class="text-danger">*</span></label>
                        <input type="text" name="company_shortname" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="company_status" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'">'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Website<span class="text-danger">*</span></label>
                        <input type="text" name="company_website" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Address<span class="text-danger">*</span></label>
                        <input type="text" name="company_address" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">NTN<span class="text-danger">*</span></label>
                        <input type="text" name="company_ntn" class="form-control" required="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Code<span class="text-danger">*</span></label>
                        <input type="text" name="company_code" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Logo<span class="text-danger">*</span></label>
                        <input type="file" name="company_logo" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Logo 2<span class="text-danger">*</span></label>
                        <input type="file" name="company_logo2" class="form-control" required="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Description</label>
                        <textarea type="text" name="company_description" id="ckeditor" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add Company</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>
<script>
    CKEDITOR.replace("ckeditor");
</script>