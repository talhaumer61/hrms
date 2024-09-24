<?php 
$dblms = new dblms();

$condition = array(
    'select'       =>  'gscale_status,gscale_name,gscale_detail,id_company,gscale_total'
   ,'where'        =>  array(
                                'is_deleted'          => 0
                               ,'gscale_id'         => cleanvars($_GET['id'])
                           )
   ,'return_type'  =>  'single'
);
$row = $dblms->getRows(GENERALSCALES, $condition);
$condition = array(
    'select'       =>  'ggroup_name,ggroup_min,ggroup_max'
   ,'where'        =>  array(
                               'id_gscale'             => cleanvars($_GET['id'])
                           )
   ,'return_type'  =>  'all'
);
$gscalegroup = $dblms->getRows(GENERALSCALEGROUP, $condition);

echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit General Scale</h5>
    </div>
    <form action="'.moduleName().'.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="gscale_id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="gscale_name" class="form-control" value="'.$row['gscale_name'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Total<span class="text-danger">*</span></label>
                    <input type="text" name="gscale_total" class="form-control" value="'.$row['gscale_total'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="gscale_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['gscale_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <label class="form-label">What Will You Learn <span class="text-danger">*</span><button type="button" class="btn btn-primary btn-sm" id="ggroup_btn"><i class="ri-add-circle-line align-bottom"></i></button></label>
            <div id="ggroup" class="row2">';
            if($gscalegroup){
                foreach($gscalegroup as $value){
                    echo'
                    <div class="bg-light">
                        <button type="button" class="delete-button" disabled>X</button>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Group Name<span class="text-danger">*</span></label>
                                <input type="text" name="ggroup_name[]" class="form-control" value="'.$value['ggroup_name'].'" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Group MIN<span class="text-danger">*</span></label>
                                <input type="text" name="ggroup_min[]" class="form-control" value="'.$value['ggroup_min'].'" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Group MAX<span class="text-danger">*</span></label>
                                <input type="text" name="ggroup_max[]" class="form-control" value="'.$value['ggroup_max'].'" />
                            </div>
                        </div>
                    </div>
                    ';
                    }
            }
            else{
                echo'
                <div class="bg-light">
                    <button type="button" class="delete-button" disabled>X</button>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Group Name<span class="text-danger">*</span></label>
                                <input type="text" name="ggroup_name[]" class="form-control"  />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Group MIN<span class="text-danger">*</span></label>
                                <input type="text" name="ggroup_min[]" class="form-control"  />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Group MAX<span class="text-danger">*</span></label>
                                <input type="text" name="ggroup_max[]" class="form-control"  />
                            </div>
                        </div>
                </DIV>';
            } 
            echo '
            
            </div>
            <div id="targetDiv"></div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="gscale_detail" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['gscale_detail'])).'</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit General Scale</button>
            </div>
        </div>
    </form>
</div>';
?>