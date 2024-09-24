<?php 
$condition = array(
    'select'       =>  'id,status, id_emply, id_dept, id_designation, id_location, id_branch, id_shift, approved_duration, detail, shiftstarttime, shiftendtime, dated, timestart, timeend, duration'
    ,'where'        =>  array(
                               'is_deleted'  => 0,
                               'id' => cleanvars($_GET['id'])
                           )
   ,'return_type'  =>  'single'
);
$value = $dblms->getRows(OVERTIMES, $condition);

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
echo'
    <div class="card mb-5">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName(false).'</h5>
        </div>
        <form autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="id" value="'.$_GET['id'].'"/>
            <div class="card-body mb-2">
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Status </label>
                    <select class="form-control" data-choices name="status" >
                        <option value=""> Choose one</option>';
                        foreach(get_attendancestatus() as $key => $status) {
                            if($value['status'] == $key){
                               echo'<option value="'.$key.'" selected>'.$status.'</option>';
                            } else {
                               echo'<option value="'.$key.'">'.$status.'</option>';
                            }
                         }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                        <label class="form-label" >Employee ID <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="id_emply" required>
                            <option value=""> Choose one</option>';
                            foreach($employees as $emply){
                            echo' <option value="'.$emply['emply_id'].'" '.($emply['emply_id'] == $value['id_emply']? 'selected':'').'> '.$emply['emply_name'].'</option>';
                            }
                            echo'
                        </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Approved Duration </label>
                    <input class="form-control" type="time" name="approved_duration" value="'.$value['approved_duration'].'" >
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_designation" required>
                        <option value=""> Choose one</option>';
                        foreach($designations as $designation){
                        echo' <option value="'.$designation['designation_id'].'" '.($designation['designation_id'] == $value['id_designation']?'selected':'').'> '.$designation['designation_name'].'</option>';
                        }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Location </label>
                    <select class="form-control" data-choices name="id_location" >
                    <option value=""> Choose one</option>';
                    foreach($LOCATIONS as $location ) {
                        if($value['id_location'] == $location['location_id']){
                            echo'<option value="'.$location['location_id'].'" selected>'.$location['location_name'].'</option>';
                        } else {
                            echo'<option value="'.$location['location_id'].'">'.$location['location_name'].'</option>';
                        }
                     }
                    echo'
                </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Branch </label>
                    <select class="form-control" data-choices name="id_branch" >
                        <option value=""> Choose one</option>';
                        foreach($BRANCHES as $branch ) {
                            if($value['id_branch'] == $branch['branch_id']){
                                echo'<option value="'.$branch['branch_id'].'" selected>'.$branch['branch_name'].'</option>';
                            } else {
                                echo'<option value="'.$branch['branch_id'].'">'.$branch['branch_name'].'</option>';
                            }
                         }
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Shift </label>
                    <select class="form-control" data-choices name="id_shift" >
                        <option value=""> Choose one</option>';
                        foreach(get_shift() as $key => $status) {
                            if($value['id_shift'] == $key){
                               echo'<option value="'.$key.'" selected>'.$status.'</option>';
                            } else {
                               echo'<option value="'.$key.'">'.$status.'</option>';
                            }
                         }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Dated </label>
                    <input class="form-control" type="date" name="dated" value="'.$value['dated'].'" >
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Shift Start Time </label>
                    <input class="form-control" type="time" name="shiftstarttime" value="'.$value['shiftstarttime'].'" >
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-2">
                    <label class="form-label">Department <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_dept" required="required">
                        <option value=""> Choose one</option>';
                        foreach($departments as $department){
                        echo' <option value="'.$department['dept_id'].'" '.($department['dept_id'] == $value['id_dept'] ? 'selected':'').'> '.$department['dept_name'].'</option>';
                        }
                        echo'
                    </select>
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Timestart </label>
                    <input class="form-control" type="time" name="timestart" value="'.$value['timestart'].'" >
                </div>
                <div class="col-4 mb-2">
                    <label class="form-label">Timeend </label>
                    <input class="form-control" type="time"  name="timeend" value="'.$value['timeend'].'"data-provider="timepickr" data-min-time="Min.Time" data-max-time="Max.Time">
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <label class="form-label">Details </label>
                    <textarea name="detail" id="ckeditor" class="form-control" >'.$value['detail'].'</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-2">
                    <label class="form-label">Duration </label>
                    <input class="form-control" type="time" name="duration" value="'.$value['duration'].'" >
                </div>
                <div class="col-6 mb-2">
                    <label class="form-label">Shift End Time </label>
                    <input class="form-control" type="time" name="shiftendtime" value="'.$value['shiftendtime'].'" >
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