<?php 
$dblms = new dblms();

$condition = array(
                     'select'       =>  'type_status,type_name,id_company,type_detail'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'type_id'         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(QUESTIONNAIRESTYPE, $condition);

echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName().'</h5>
    </div>
    <form action="" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="type_id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="type_name" class="form-control" value="'.$row['type_name'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="type_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['type_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea type="text" name="type_detail" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['type_detail'])).'</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit</button>
            </div>
        </div>
    </form>
</div>';
?>