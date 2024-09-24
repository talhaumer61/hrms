<?php
echo'
<script src="assets/js/app.js"></script>
<div class="modal-content">
    <div class="modal-header bg-primary p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).'</h5>
    </div>
    <form autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="modal-body">
            <div class="row">
                
                <div class="col mb-2">
                    <label class="form-label">Employee Name<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_employ" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_id_employe() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Start Time <span class="text-danger">*</span></label>
                    <input type="text" name="timestart" class="form-control" data-provider="timepickr" data-time-basic="true" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">End Time<span class="text-danger">*</span></label>
                    <input type="text" name="timeend" class="form-control" data-provider="timepickr" data-time-basic="true" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Reason</label>
                    <textarea type="text" name="reasons" id="ckeditor" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).'</button>
            </div>
        </div>
    </form>
</div>';
?>