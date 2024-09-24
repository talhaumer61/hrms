<?php
echo'
<script src="assets/js/app.js"></script>
<div class="modal-content">
    <div class="modal-header bg-primary p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add General Scale</h5>
    </div>
    <form action="" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name<span class="text-danger">*</span></label>
                    <input type="text" name="gscale_name" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Total<span class="text-danger">*</span></label>
                    <input type="text" name="gscale_total" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="gscale_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'">'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <label class="form-label">What Will You Learn <span class="text-danger">*</span><button type="button" class="btn btn-primary btn-sm" id="ggroup_btn"><i class="ri-add-circle-line align-bottom"></i></button></label>
                <div class="row2 bg-light" id="ggroup">
                    <button type="button" class="delete-button" disabled>X</button>
                    <div class="row">
                        <div class="col mb-2">
                            <label class="form-label">Group Name<span class="text-danger">*</span></label>
                            <input type="text" name="ggroup_name[]" class="form-control" />
                        </div>
                        <div class="col mb-2">
                            <label class="form-label">Group MIN<span class="text-danger">*</span></label>
                            <input type="text" name="ggroup_min[]" class="form-control" />
                        </div>
                        <div class="col mb-2">
                            <label class="form-label">Group MAX<span class="text-danger">*</span></label>
                            <input type="text" name="ggroup_max[]" class="form-control" />
                        </div>
                    </div>
                </div>
                <div id="targetDiv"></div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Detail</label>
                    <textarea type="text" name="gscale_detail" id="ckeditor" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add General Scale</button>
            </div>
        </div>
    </form>
</div>';
?>