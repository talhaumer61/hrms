<?php
echo '
<div class="tab-pane '.(($tab_active == 5)? 'active': '').'" id="kyc" role="tabpanel">
	<form action="applicants.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
		<input type="hidden" name="applicant_id" value="'.$_GET['id'].'" />
		<input type="hidden" name="kyc_id" value="'.$row['kyc_id'].'" />
		<div class="card">
			<div class="card-body">
				<div class="card-header bg-light mb-3">
					<h4 class="text-center">
						Know Your Customer Form
					</h4>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Reference Number #</label>
							<input type="tect" class="form-control" value="'.$row['applicant_refno'].'" readonly />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Applicant name</label>
							<input type="text" class="form-control" name="name" value="'.$row['applicant_name'].'" readonly />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Father/Husband name</label>
							<input type="text" class="form-control" name="father_husband_name" value="'.$row['applicant_fatherhusband'].'" readonly />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Mother Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="mother_name" value="'.$row['mother_name'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Address</label>
							<textarea type="tect" class="form-control" name="current_residential_address" readonly >'.$row['applicant_currentaddress'].'</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label mb-0">Contact</label>
							<input type="tect" class="form-control" cname="phone" value="'.$row['applicant_phone'].'" readonly />
						</div>
						<div class="col mb-2">
							<label class="form-label mb-0">Type of account <span class="text-danger">*</span></label>
							<input type="tect" class="form-control" name="type_of_account" value="'.$row['type_of_account'].'" required />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Residence status <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="residence_status" required="">
								<option value=""> Choose one</option>';
								foreach(get_residencestatus() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['residence_status'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label">Tax Status <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="tax_status" required="">
								<option value=""> Choose one</option>';
								foreach(get_TaxStatus() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['tax_status'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Source of Income <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="source_of_income" required="">
								<option value=""> Choose one</option>';
								foreach(get_SourceofIncome() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['source_of_income'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label">Profession <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="profession" required="">
								<option value=""> Choose one</option>';
								foreach(get_Profession() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['profession'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label">Other Profession <span class="text-danger">*</span></label>
							<input type="tect" class="form-control" name="other_profession" value="'.$row['other_profession'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Profession name</label>
							<input type="tect" class="form-control" name="profession_name" value="'.$row['profession_name'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Investment income</label>
							<input type="tect" class="form-control" name="investment_income" value="'.$row['investment_income'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Purpose nature of business</label>
							<input type="tect" class="form-control" name="purpose_nature_of_business" value="'.$row['purpose_nature_of_business'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Expected monthly turnover</label>
							<input type="tect" class="form-control" name="expected_monthly_turnover" value="'.$row['expected_monthly_turnover'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">No of transactions <span class="text-danger">*</span></label>
							<input type="tect" class="form-control" name="no_of_transactions" value="'.$row['no_of_transactions'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Delivery channels <span class="text-danger">*</span></label>
							<input type="tect" class="form-control" name="delivery_channels" value="'.$row['delivery_channels'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Verification document type</label>
							<select class="form-control" data-choices name="verification_document_type" required="">
								<option value=""> Choose one</option>';
								foreach(get_Verificationdocumenttype() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['verification_document_type'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label">Verification document number</label>
							<input type="tect" class="form-control" name="verification_document_number" value="'.$row['verification_document_number'].'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Verification document issue date <span class="text-danger">*</span></label>
							<input type="text" name="verification_document_issue_date" id="verification_document_issue_date" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" value="'.((!empty($row['verification_document_issue_date']))? date('d M, Y',strtotime($row['verification_document_issue_date'])): '').'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Verification document expiry date* <span class="text-danger">*</span></label>
							<input type="text" name="verification_document_expiry_date" id="verification_document_expiry_date" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" value="'.((!empty($row['verification_document_expiry_date']))? date('d M, Y',strtotime($row['verification_document_expiry_date'])): '').'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Verification document date of birth <span class="text-danger">*</span></label>
							<input type="text" name="verification_document_date_of_birth" id="verification_document_date_of_birth" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" value="'.((!empty($row['verification_document_date_of_birth']))? date('d M, Y',strtotime($row['verification_document_date_of_birth'])): '').'" />
						</div>
						<div class="col mb-2">
							<label class="form-label">Verification document place of birth <span class="text-danger">*</span></label>
							<input type="tect" class="form-control" name="verification_document_place_of_birth" value="'.$row['verification_document_place_of_birth'].'" />
						</div>
					</div>
					<div class="row">
						<div class="col mb-2">
							<label class="form-label">Are you a domestic or foreign PEP? <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="self_pep" required="">
								<option value=""> Choose one</option>';
								foreach(get_DomesticorForeign() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['self_pep'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
						<div class="col mb-2">
							<label class="form-label">Are you a family member domestic or foreign PEP? <span class="text-danger">*</span></label>
							<select class="form-control" data-choices name="family_pep" required="">
								<option value=""> Choose one</option>';
								foreach(get_DomesticorForeign() as $key => $val):
									echo'<option value="'.$key.'" '.(($row['family_pep'] == $key)? 'selected': '').'>'.$val.'</option>';
								endforeach;
								echo'
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-end gap-2 mt-4">
					<a href="" target="_blank" class="btn btn-info right">
						<i class=" ri-printer-line me-1"></i> Print
					</a>
					<button type="submit" class="btn btn-primary right" name="submit_kyc_edit">
						<i class="ri-save-2-line me-1"></i> Save
					</button>
				</div>
			</div>
		</div>
	</form>
</div>';
?>