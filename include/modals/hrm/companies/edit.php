<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'company_status,company_name,company_shortname,company_description,company_website,company_address,company_code'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'company_id'         => cleanvars($_GET['company_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(COMPANIES, $condition);

echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Company</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="companies.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="company_id" value="'.cleanvars($_GET['company_id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="company_name" class="form-control" value="'.$row['company_name'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Short Name<span class="text-danger">*</span></label>
                        <input type="text" name="company_shortname" class="form-control" value="'.$row['company_shortname'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="company_status" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.(($row['company_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Code<span class="text-danger">*</span></label>
                        <input type="text" name="company_code" class="form-control" value="'.$row['company_code'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Website<span class="text-danger">*</span></label>
                        <input type="text" name="company_website" class="form-control" value="'.$row['company_website'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Address<span class="text-danger">*</span></label>
                        <input type="text" name="company_address" class="form-control" value="'.$row['company_address'].'" required="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Description</label>
                        <textarea type="text" name="company_description" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['company_description'])).'</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Company</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>
<script>
    CKEDITOR.replace("ckeditor");
</script>