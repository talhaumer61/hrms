<?php
include "../../../dbsetting/lms_vars_config.php";
include "../../../dbsetting/classdbconection.php";
include "../../../functions/functions.php";
$dblms = new dblms();
$condition = array(
    'select'       =>  'scale_id,scale_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$count     = $dblms->getRows(SCALES, $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add Scales Group</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_name" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Scale<span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="id_scale" required="">
                            <option value=""> Choose one</option>';
                            foreach($count as $row):
                                echo'<option value="'.$row['scale_id'].'">'.$row['scale_name'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">MIN<span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_mins" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">MAX<span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_maxs" class="form-control" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Color<span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_color" class="form-control" required="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="scalegroup_status" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'">'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add Scales Group</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>
<script>
    CKEDITOR.replace("ckeditor");
</script>