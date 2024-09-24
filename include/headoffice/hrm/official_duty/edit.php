<?php 
$dblms = new dblms();

$condition = array(
                     'select'       =>  'status,id_employ,dated,reasons,id_company,id_shift,timestart,timeend'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'id'         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(OFFICIALDUTY, $condition);

echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName(false).'</h5>
    </div>
    <form action="'.moduleName().'.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Employ Name<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_employ" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_id_employe() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['id_employ'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($row['status'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Start Time <span class="text-danger">*</span></label>
                    <input type="text" name="timestart" value="'.$row['timestart'].'" class="form-control" data-provider="timepickr" data-time-basic="true" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">End Time<span class="text-danger">*</span></label>
                    <input type="text" name="timeend" value="'.$row['timeend'].'" class="form-control" data-provider="timepickr" data-time-basic="true" required="" />
                </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Description</label>
                        <textarea type="text" name="reasons" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['reasons'])).'</textarea>
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