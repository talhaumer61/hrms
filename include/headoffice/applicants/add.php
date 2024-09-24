<?php
$condition = array(
                         'select'       =>  'applicant_id'
                        ,'where'        =>  array( 'is_deleted' => 0 )
                        ,'return_type'  =>  'count'
                    );
$APPLICANTS     = $dblms->getRows(APPLICANTS, $condition);

$tables = array(
    'Basic Information', 
    'Education Information', 
    'Residential Information', 
    'Household Information', 
    'Job Information',
    'Dependent Income',
    'Remarks',
    'Documents' 
);
echo'
    <div class="card">
        <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-primary mb-3" role="tablist">';
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
                                <label class="form-label">Referral</label>
                                <select class="form-control" data-choices name="id_referral">
                                    <option value=""> Choose one</option>';
                                    foreach(get_Referral() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Reference Number</label>
                                <input type="tect" class="form-control" name="applicant_refno" value="AMCL-'.$APPLICANTS.'" readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Name</label>
                                <input type="tect" class="form-control" name="applicant_name" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="applicant_gender" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_gendertypes() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Father/Husband Name <span class="text-danger">*</span></label>
                                <input type="tect" class="form-control" name="applicant_fatherhusband" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">CNIC <span class="text-danger">*</span></label>
                                <input type="tect" class="form-control" name="applicant_cnic" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Date of birth <span class="text-danger">*</span></label>
                                <input type="text" name="applicant_dob" id="applicant_dob" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Marital status <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="applicant_marital" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_Marital() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-1" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Education</label>
                                <select class="form-control" data-choices name="applicant_education">
                                    <option value=""> Choose one</option>';
                                    foreach(get_educationtypes() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Current education institute</label>
                                <input type="text" class="form-control" name="applicant_currentinstitute" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Education verification</label>
                                <input type="file" class="form-control" name="applicant_educationverify" />
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-2" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_phone" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Whatsapp <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_whatsapp" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Email </label>
                                <input type="text" class="form-control" name="applicant_email" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Current residential address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="applicant_currentaddress" required=""></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Permanent residential address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="applicant_permanentaddres" required=""></textarea>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-3" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Residence status <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="applicant_residence" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_residencestatustypes() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Residing duration <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_residingduration" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">No of dependents <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_dependents" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">No of family members <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_familymembers" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">No of earners in family <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_familyearners" required="" />
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-4" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Profession <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="applicant_profession" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_Profession() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Profession name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_professionanme" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Type of industry <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="applicant_industry" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_IndustryType() as $key => $val):
                                        echo'<option value="'.$key.'">'.$val.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Date of joining</label>
                                <input type="text" name="applicant_doj" id="applicant_doj" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Office phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_officephone" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Office email</label>
                                <input type="text" class="form-control" name="applicant_officeemail" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Experience <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_experience" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Office address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="applicant_officeaddress" required=""></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Proof of profession  <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="applicant_professionproof" required="" />
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-5" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Monthly income <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_monthlyincome" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Annual income <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_annualicome" required="" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Previous loan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_previousloan" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Monthly other income <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_otherincome" required="" />
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Monthly expense <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="applicant_monthlyexpense" required="" />
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-6" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Remarks</label>
                                <textarea class="form-control" name="applicant_remarks" id="ckeditor"></textarea>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-7" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">CNIC Photo Front <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="applicant_cnicfront" accept="image/png, image/jpeg, image/jpeg" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">CNIC Photo Back <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="applicant_cnicback" accept="image/png, image/jpeg, image/jpeg" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Recent Photograph of Applicant <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="applicant_photo" accept="image/png, image/jpeg, image/jpeg" required />
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="applicants.php.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add Applicant</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>';
?>