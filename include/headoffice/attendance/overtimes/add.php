<?php

$condition5 = array(
    'select'       =>  'location_id,location_name'
   ,'where'        =>  array( 'is_deleted' => 0 )
   ,'return_type'  =>  'all'
);
$LOCATIONS     = $dblms->getRows(LOCATION, $condition5);
$condition6 = array(
    'select'       => 'branch_id,branch_name'
   ,'where'        =>  array('is_deleted'  => 0)
   ,'return_type'  =>  'all'
);
$BRANCHES     = $dblms->getRows(BRANCHES, $condition6);
$emplyCondition = array(
    'select'       =>  'emply_id,emply_name'
   ,'where'        =>  array( 
                                'is_deleted' => 0 
                                ,'emply_status' => 1 
                                ,'id_company' => cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID']) 
                            )
   ,'return_type'  =>  'all'
);
$employees     = $dblms->getRows(EMPLOYEE, $emplyCondition);
$designationCondition = array(
    'select'       =>  'designation_id,designation_name'
   ,'where'        =>  array( 
                                'is_deleted' => 0 
                                ,'designation_status' => 1 
                                ,'id_company' => cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID']) 
                            )
   ,'return_type'  =>  'all'
);
$designations     = $dblms->getRows(DESIGNATIONS, $designationCondition);
$deptCondition = array(
    'select'       =>  'dept_id,dept_name'
   ,'where'        =>  array( 
                                'is_deleted' => 0 
                                ,'dept_status' => 1 
                                ,'id_company' => cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID']) 
                            )
   ,'return_type'  =>  'all'
);
$departments     = $dblms->getRows(DEPARTMENTS, $deptCondition);

echo'
<div class="card">
    <div class="modal-header bg-primary p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).'</h5>
    </div>
    <form autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="card-body mb-2">
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="status" required>
                        <option value=""> Choose one</option>';
                        foreach(get_attendancestatus() as $key => $status){
                           echo' <option value="'.$key.'">'.$status.'</option>';
                        }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label" >Employee ID <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_emply" required>
                        <option value=""> Choose one</option>';
                        foreach($employees as $emply){
                           echo' <option value="'.$emply['emply_id'].'"> '.$emply['emply_name'].'</option>';
                        }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Approved Duration <span class="text-danger">*</span></label>
                    <input class="form-control" type="time" name="approved_duration" required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_designation" required>
                        <option value=""> Choose one</option>';
                        foreach($designations as $designation){
                        echo' <option value="'.$designation['designation_id'].'"> '.$designation['designation_name'].'</option>';
                        }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Location <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_location" required="required">
                    <option value=""> Choose one</option>';
                    foreach($LOCATIONS 	as $type) {
                        echo'<option value="'.$type['location_id'].'">'.$type['location_name'].'</option>';
                    }
                    echo'
                </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Branch <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_branch" required="required">
                        <option value=""> Choose one</option>';
                        foreach($BRANCHES	as $type) {
                            echo'<option value="'.$type['branch_id'].'">'.$type['branch_name'].'</option>';
                        }
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Shift <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_shift" required="required">
                        <option value=""> Choose one</option>';
                        foreach(get_shift() as $key => $shift){
                           echo' <option value="'.$key.'"> '.$shift.'</option>';
                        }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Dated <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="dated" required="required">
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Shift Start Time <span class="text-danger">*</span></label>
                    <input class="form-control" type="time" name="shiftstarttime" required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Department <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_dept" required="required">
                        <option value=""> Choose one</option>';
                        foreach($departments as $department){
                        echo' <option value="'.$department['dept_id'].'"> '.$department['dept_name'].'</option>';
                        }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Timestart <span class="text-danger">*</span></label>
                    <input class="form-control" type="time" name="timestart" required="required">
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Timeend <span class="text-danger">*</span></label>
                    <input class="form-control" type="time" required="required" name="timeend" data-provider="timepickr" data-min-time="Min.Time" data-max-time="Max.Time">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <label class="form-label">Details <span class="text-danger">*</span></label>
                    <textarea name="detail" id="ckeditor" class="form-control" required="required"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-2">
                    <label class="form-label">Duration <span class="text-danger">*</span></label>
                    <input class="form-control" type="time" name="duration" required="required">
                </div>
                <div class="col-6 mb-2">
                    <label class="form-label">Shift End Time <span class="text-danger">*</span></label>
                    <input class="form-control" type="time" name="shiftendtime" required="required">
                </div>
            </div>  
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end mt-3">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).' </button>
            </div>
        </div>
    </form>
</div>';
?>
