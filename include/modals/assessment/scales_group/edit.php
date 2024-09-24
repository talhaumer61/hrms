<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();

$condition = array(
                     'select'       =>  'scalegroup_status,scalegroup_name,id_scale,scalegroup_mins,scalegroup_maxs,scalegroup_color'
                    ,'where'        =>  array(
                                                 'is_deleted'     => 0
                                                ,'scalegroup_id'         => cleanvars($_GET['scalegroup_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(SCALESGROUP , $condition);

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
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit General Scale</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="scalegroup_id" value="'.cleanvars($_GET['scalegroup_id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Name<span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_name" class="form-control" value="'.$row['scalegroup_name'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Scale<span class="text-danger">*</span></label>
                        <select class="form-control"  data-choices name="id_scale" required="">
                            <option value=""> Choose one</option>';
                            foreach($count as $key => $val){
                                echo'<option value="'.$val['scale_id'].'" '.(($val['scale_id'] == $row['id_scale'])? 'selected': '').'>'.$val['scale_name'].'</option>';
                            }
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">MIN<span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_mins" class="form-control" value="'.$row['scalegroup_mins'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">MAX<span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_maxs" class="form-control" value="'.$row['scalegroup_maxs'].'" required="" />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Color<span class="text-danger">*</span></label>
                        <input type="text" name="scalegroup_color" class="form-control" value="'.$row['scalegroup_color'].'" required="" />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="scalegroup_status" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.(($row['scalegroup_status'] == $key)? 'selected': '').'>'.$status.'</option>';
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