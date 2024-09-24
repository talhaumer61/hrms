<?php 
$condition = array(
                     'select'       =>  'template_status,template_name,template_contents'
                    ,'where'        =>  array(
                                                 'is_deleted'     => 0
                                                ,'template_id'  => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(DOCUMENT_TEMPLATE, $condition);
echo'
    <div class="card">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Template</h5>
        </div>
        <form action="document_template.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="template_id" value="'.$_GET['id'].'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 mb-2">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="template_name" value="'.$row['template_name'].'" placeholder="Enter Name" required>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="template_status" required>
                            <option value=""> Choose one</option>';
                            foreach(get_status() as $key => $status):
                                echo'<option value="'.$key.'" '.(($row['template_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col mb-2">
                        <label class="form-label">Content <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="template_contents" id="ckeditor">'.html_entity_decode(html_entity_decode($row['template_contents'])).'</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <a href="document_template.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Template</button>
                </div>
            </div>
        </form>
    </div>';
?>