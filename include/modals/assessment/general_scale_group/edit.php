<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'ggroup_status,ggroup_name,ggroup_min,ggroup_max,id_gscale'
                    ,'where'        =>  array(
                                                 'is_deleted'     => 0
                                                ,'ggroup_id'         => cleanvars($_GET['ggroup_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(GENERALSCALEGROUP , $condition);
$condition = array(
    'select'       =>  'gscale_id,gscale_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$count     = $dblms->getRows(GENERALSCALES, $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit General Scale</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="generalscalegroup.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="ggroup_id" value="'.cleanvars($_GET['ggroup_id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" name="ggroup_name" class="form-control" value="'.$row['ggroup_name'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Scale<span class="text-danger">*</span></label>
                        <select multiple class="form-control"  data-choices name="id_gscale" required="">
                            <option value=""> Choose one</option>';
                            foreach($count as $scale):
                                echo'<option value="'.$scale['gscale_id'].'" '.(in_array($scale['gscale_id'],$row['id_gscale']) ? 'selected' : '').'>'.$scale['gscale_name'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">MIN<span class="text-danger">*</span></label>
                        <input type="text" name="ggroup_min" class="form-control" value="'.$row['ggroup_min'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">MAX<span class="text-danger">*</span></label>
                        <input type="text" name="ggroup_max" class="form-control" value="'.$row['ggroup_max'].'" required="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="ggroup_status" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.(($row['ggroup_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit General Scale</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>