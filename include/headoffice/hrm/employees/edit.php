<?php

// DEPARTMENTS
$filters = array(
                         'select'       =>  'dept_id,dept_name'
                        ,'where'        =>  array(
                                                    'is_deleted'  => 0
                                                )
                        ,'order_by'     =>  'dept_id ASC'
                        ,'return_type'  =>  'all'
);
$DEPARTMENTS     = $dblms->getRows(DEPARTMENTS, $filters);
// DEPARTMENTS
$filters = array(
                         'select'       =>  'designation_id,designation_name'
                        ,'where'        =>  array(
                                                    'is_deleted'  => 0
                                                )
                        ,'order_by'     =>  'designation_id ASC'
                        ,'return_type'  =>  'all'
);
$DESIGNATIONS     = $dblms->getRows(DESIGNATIONS, $filters);

$tables = array(
    'Personal Information', 
    'Payment Information', 
    'Salary Information'
);
$inputs = array(
    'Arrear', 
    'Basic Pay', 
    'Bonus', 
    'Flat Charges', 
    'Income Tax'
);
echo'
    <div class="card">
        <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-info mb-3" role="tablist">';
            foreach($tables as $Tkey => $Tval):
                echo'
                <li class="nav-item">
                    <a class="nav-link '.(($Tkey == 0)? 'active': '').'" data-bs-toggle="tab" href="#nav-border-justified-'.$Tkey.'" role="tab" aria-selected="false">'.$Tval.'</a>
                </li>';
            endforeach;
            echo'
        </ul>
        <form action="applicants.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="nav-border-justified-0" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="applicant_status" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_status() as $key => $status):
                                        echo'<option value="'.$key.'">'.$status.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Office <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="id_referral" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_logintype() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Name <span class="text-danger">*</span></label>
                                <input type="tect" class="form-control" name="applicant_refno" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Father Number <span class="text-danger">*</span></label>
                                <input type="tect" class="form-control" name="applicant_refno" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Appointment Date <span class="text-danger">*</span></label>
                                <input type="text" name="applicant_dob" id="applicant_dob" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Date of birth <span class="text-danger">*</span></label>
                                <input type="text" name="applicant_dob" id="applicant_dob" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="id_referral" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_gendertypes() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Father Number <span class="text-danger">*</span></label>
                                <input type="tect" class="form-control" name="applicant_refno" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Father Number <span class="text-danger">*</span></label>
                                <input type="tect" class="form-control" name="applicant_refno" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Father Number <span class="text-danger">*</span></label>
                                <input type="tect" class="form-control" name="applicant_refno" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="dept_id">
                                    <option value=""> Choose one</option>';
                                    foreach($DEPARTMENTS as $key => $val):
                                        echo'<option value="'.$val['dept_id'].'" '.(($dept_id == $val['dept_id'])? 'selected': '').'>'.$val['dept_id'].'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Designation <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="designation_id">
                                    <option value=""> Choose one</option>';
                                    foreach($DESIGNATIONS as $key => $val):
                                        echo'<option value="'.$val['designation_id'].'" '.(($designation_id == $val['designation_id'])? 'selected': '').'>'.$val['designation_name'].'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button class="btn btn-info btn-sm" name="submit_edit_employee"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Employee</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-1" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Payment Mode <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="applicant_education">
                                    <option value=""> Choose one</option>';
                                    foreach(get_PaymentMode() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Bank Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_currentinstitute" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Bank Account Number  <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_educationverify" />
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button class="btn btn-info btn-sm" name="submit_edit_employee"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Employee</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-2" role="tabpanel">
                        <div class="row">';
                            foreach($inputs as $Ikey => $Ival):
                                echo'
                                <div class="col mb-2">
                                    <input class="form-control" value="'.$Ival.'" readonly="" />
                                </div>
                                <div class="col mb-2">
                                    <input type="text" class="form-control" name="" placeholder="Rs: 0.00" />
                                </div>
                                '.((($Ikey%2) == 1)? '</div><div class="row">': '').'';
                            endforeach;
                            echo'
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button class="btn btn-info btn-sm" name="submit_edit_employee"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Employee</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>';
?>