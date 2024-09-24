<?php 
$dblms = new dblms();

$condition = array(
                     'select'       =>  'scale_status,scale_name,scale_shortname,scale_detail,id_company,scale_value'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'scale_id'         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(EVALUATIONSSCALES, $condition);

echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName(false).'</h5>
    </div>
    <form action="'.moduleName().'.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="scale_id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="scale_name" class="form-control" value="'.$row['scale_name'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Short Name<span class="text-danger">*</span></label>
                    <input type="text" name="scale_shortname" class="form-control" value="'.$row['scale_shortname'].'" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Value<span class="text-danger">*</span></label>
                    <input type="text" name="scale_value" class="form-control" value="'.$row['scale_value'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="scale_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['scale_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="scale_detail" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['scale_detail'])).'</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName(false).'</button>
            </div>
        </div>
    </form>
</div>';
?>