<?php 
$dblms = new dblms();

$condition = array(
                     'select'       =>  'btype_status,btype_name,btype_detail,btype_code'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'btype_id '         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(BREAKTYPES, $condition);

echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName(false).'</h5>
    </div>
    <form action="'.moduleName().'.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="btype_id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="btype_name" class="form-control" value="'.$row['btype_name'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Code<span class="text-danger">*</span></label>
                    <input type="text" name="btype_code" class="form-control" value="'.$row['btype_code'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="btype_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['btype_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="btype_detail" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['btype_detail'])).'</textarea>
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