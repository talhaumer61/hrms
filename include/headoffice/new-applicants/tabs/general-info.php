<?php
echo '
<div class="tab-pane fade" id="general-info" role="tabpanel">
	<form action="applicants.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
		<div class="card">
			<div class="card-body">
				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Basic Information
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Status <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="applicant_status" required="">
								<option value=""> Choose one</option>';
								foreach(get_status() as $key => $status):
									echo'<option value="'.$key.'" '.(($row['applicant_status'] == $key)? 'selected': '').'>'.$status.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label">Referral</label>
							<select class="form-control" data-choices name="id_referral">
								<option value=""> Choose one</option>';
								foreach(get_Referral() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['id_referral'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Reference Number</label>
							<input type="tect" class="form-control" name="applicant_refno" value="'.$row['applicant_refno'].'" readonly />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Name</label>
							<input type="tect" class="form-control" name="applicant_name" value="'.$row['applicant_name'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Gender <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="applicant_gender" required="">
								<option value=""> Choose one</option>';
								foreach(get_gendertypes() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['applicant_gender'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Father/Husband Name <span class="text-danger">*</span></label>
							<input type="tect" class="form-control" name="applicant_fatherhusband" value="'.$row['applicant_fatherhusband'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">CNIC <span class="text-danger">*</span></label>
							<input type="tect" class="form-control" name="applicant_cnic" required="" value="'.$row['applicant_cnic'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Date of birth <span class="text-danger">*</span></label>
							<input type="text" name="applicant_dob" id="applicant_dob" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" value="'.date('d M, Y',strtotime($row['applicant_refno'])).'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Marital status <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="applicant_marital" required="">
								<option value=""> Choose one</option>';
								foreach(get_Marital() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['applicant_marital'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
					</div>
				</div>
				

				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Education Information
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Education</label>
							<select class="form-control" data-choices name="applicant_education">
								<option value=""> Choose one</option>';
								foreach(get_educationtypes() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['applicant_education'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Current education institute</label>
							<input type="text" class="form-control" name="applicant_currentinstitute" value="'.$row['applicant_currentinstitute'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Education verification</label>
							<input type="file" class="form-control" name="applicant_educationverify" value="'.$row['applicant_educationverify'].'" />
						</div>
					</div>
				</div>

				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Residential Information
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Phone <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_phone" required="" value="'.$row['applicant_phone'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Whatsapp <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_whatsapp" required="" value="'.$row['applicant_whatsapp'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Email </label>
							<input type="text" class="form-control" name="applicant_email" value="'.$row['name'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Current residential address <span class="text-danger">*</span></label>
							<textarea class="form-control" name="applicant_currentaddress" required="">'.$row['applicant_currentaddress'].'</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Permanent residential address <span class="text-danger">*</span></label>
							<textarea class="form-control" name="applicant_permanentaddres" required="">'.$row['applicant_permanentaddres'].'</textarea>
						</div>
					</div>
				</div>

				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Household Information
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Residence status <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="applicant_residence" required="">
								<option value=""> Choose one</option>';
								foreach(get_residencestatustypes() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['applicant_residence'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Residing duration <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_residingduration" required="" value="'.$row['applicant_residingduration'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">No of dependents <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_dependents" required="" value="'.$row['applicant_dependents'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">No of family members <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_familymembers" required="" value="'.$row['applicant_familymembers'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">No of earners in family <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_familyearners" required="" value="'.$row['applicant_familyearners'].'" />
						</div>
					</div>
				</div>

				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Job Information
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Profession <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="applicant_profession" required="">
								<option value=""> Choose one</option>';
								foreach(get_Profession() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['applicant_profession'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Profession name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_professionanme" required="" value="'.$row['applicant_professionanme'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Type of industry <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="applicant_industry" required="">
								<option value=""> Choose one</option>';
								foreach(get_IndustryType() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['applicant_industry'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Date of joining</label>
							<input type="text" name="applicant_doj" id="applicant_doj" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required value="'.date('d M, Y',strtotime($row['applicant_doj'])).'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Office phone <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_officephone" required="" value="'.$row['applicant_officephone'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Office email</label>
							<input type="text" class="form-control" name="applicant_officeemail" value="'.$row['applicant_officeemail'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Experience <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_experience" required="" value="'.$row['applicant_experience'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Office address <span class="text-danger">*</span></label>
							<textarea class="form-control" name="applicant_officeaddress" required="">'.$row['applicant_officeaddress'].'</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Proof of profession  <span class="text-danger">*</span></label>
							<div class="input-group mb-2">
								<span class="input-group-text">Currently</span>
								<div class="form-control d-flex h-auto">
									<span class="text-break" style="flex-grow:1;min-width:0">
										<a href="uploads/images/applicants/'.$row['applicant_professionproof'].'">'.$row['applicant_professionproof'].'</a>
									</span>
									
								</div>
							</div>
							<input type="file" class="form-control" name="applicant_professionproof" />
						</div>
					</div>
				</div>

				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Dependent Income
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Monthly income <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_monthlyincome" required="" value="'.$row['applicant_monthlyincome'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Annual income <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_annualicome" required="" value="'.$row['applicant_annualicome'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Previous loan <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_previousloan" required="" value="'.$row['applicant_previousloan'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Monthly other income <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_otherincome" required="" value="'.$row['applicant_otherincome'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Monthly expense <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="applicant_monthlyexpense" required="" value="'.$row['applicant_monthlyexpense'].'" />
						</div>
					</div>
				</div>

				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Remarks
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Remarks</label>
							<textarea class="form-control" name="applicant_remarks" id="ckeditor">'.$row['applicant_remarks'].'</textarea>
						</div>
					</div>
				</div>

				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Documents
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">CNIC Photo Front <span class="text-danger">*</span></label>
							<div class="input-group mb-2">
								<span class="input-group-text">Currently</span>
								<div class="form-control d-flex h-auto">
									<span class="text-break" style="flex-grow:1;min-width:0"><a href="uploads/images/applicants/'.$row['applicant_cnicfront'].'">'.$row['applicant_cnicfront'].'</a></span>
								</div>
							</div>
							<input type="file" class="form-control" name="applicant_cnicfront" accept="image/png, image/jpeg, image/jpeg" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">CNIC Photo Back <span class="text-danger">*</span></label>
							<div class="input-group mb-2">
								<span class="input-group-text">Currently</span>
								<div class="form-control d-flex h-auto">
									<span class="text-break" style="flex-grow:1;min-width:0"><a href="uploads/images/applicants/'.$row['applicant_cnicback'].'">'.$row['applicant_cnicback'].'</a></span>
								</div>
							</div>
							<input type="file" class="form-control" name="applicant_cnicback" accept="image/png, image/jpeg, image/jpeg" />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Recent Photograph of Applicant <span class="text-danger">*</span></label>
							<div class="input-group mb-2">
								<span class="input-group-text">Currently</span>
								<div class="form-control d-flex h-auto">
									<span class="text-break" style="flex-grow:1;min-width:0"><a href="uploads/images/applicants/'.$row['applicant_photo'].'">'.$row['applicant_photo'].'</a></span>
								</div>
							</div>
							<input type="file" class="form-control" name="applicant_photo" accept="image/png, image/jpeg, image/jpeg" />
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-end gap-2 mt-4">
					<a href="" target="_blank" class="btn btn-info right">
						<i class=" ri-printer-line me-1"></i> Print
					</a>
					<button type="submit" class="btn btn-primary right" name="submit_edit">
						<i class="ri-save-2-line me-1"></i> Save
					</button>
				</div>
			</div>
		</div>
	</form>
</div>';
?>