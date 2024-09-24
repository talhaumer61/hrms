<?php
echo '
<div class="tab-pane fade" id="download-center" role="tabpanel">
	<div class="card">';       
		if ($row) {
			echo'
			<div class="card-body">
				<div class="p-3  bg-primary  text-light mb-3 rounded" role="alert">
					Forward For Processing
				</div>
				<div class="table-responsive table-card">
					<table class="table mb-0">
						<thead class="table-light">
							<tr>
								<th>File Name</th>
								<th class="text-center" width="70">Action</th>
							</tr>
						</thead>
						<tbody>';
							if (!empty($row['applicant_id'])) {
								echo '
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar-sm">
												<div class="avatar-title bg-soft-primary text-primary rounded fs-20">
													<a href="application_form_print_page.php?id='.cleanvars($_GET['id']).'" target="_blank"><i class="ri-chat-download-fill"></i></a>
												</div>
											</div>
											<div class="ms-3 flex-grow-1">
												<a href="application_form_print_page.php?id='.cleanvars($_GET['id']).'" target="_blank">Application Form</a>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="dropdown text-end">
											<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
											<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
												<li><a href="application_form_print_page.php?id='.cleanvars($_GET['id']).'" target="_blank" class="dropdown-item"><i class="ri-chat-download-fill align-bottom me-2 text-muted"></i> Download</a></li>
											</ul>
										</div>
									</td>
								</tr>';
							}
							if (!empty($row['kyc_id'])) {
								echo '
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar-sm">
												<div class="avatar-title bg-soft-primary text-primary rounded fs-20">
													<a href="applicant_kyc_print_page.php?id='.cleanvars($_GET['id']).'" target="_blank"><i class="ri-chat-download-fill"></i></a>
												</div>
											</div>
											<div class="ms-3 flex-grow-1">
												<a href="applicant_kyc_print_page.php?id='.cleanvars($_GET['id']).'" target="_blank">Applicant KYC</a>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="dropdown text-end">
											<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
											<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
												<li><a href="applicant_kyc_print_page.php?id='.cleanvars($_GET['id']).'" target="_blank" class="dropdown-item"><i class="ri-chat-download-fill align-bottom me-2 text-muted"></i> Download</a></li>
											</ul>
										</div>
									</td>
								</tr>';
							}
							if (!empty($row['applicant_professionproof'])) {
								echo '
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar-sm">
												<div class="avatar-title bg-soft-primary text-primary rounded fs-20">
													<a href="uploads/images/applicants/documents/'.$row['applicant_professionproof'].'" target="_blank"><i class="ri-chat-download-fill"></i></a>
												</div>
											</div>
											<div class="ms-3 flex-grow-1">
												<a href="uploads/images/applicants/documents/'.$row['applicant_professionproof'].'" target="_blank">Proof of Profession</a>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="dropdown text-end">
											<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
											<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
												<li><a href="uploads/images/applicants/documents/'.$row['applicant_professionproof'].'" class="dropdown-item"><i class="ri-chat-download-fill align-bottom me-2 text-muted"></i> Download</a></li>
											</ul>
										</div>
									</td>
								</tr>';
							}
							if ($APPLICANTS_PRODUCTS) {
								foreach($APPLICANTS_PRODUCTS as $key => $val):
								echo '
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar-sm">
												<div class="avatar-title bg-soft-primary text-primary rounded fs-20">
													<a href="applicant_repayment_schedule_print_page.php?id='.cleanvars($_GET['id']).'&product_id='.$val['product_id'].'" target="_blank"><i class="ri-chat-download-fill"></i></a>
												</div>
											</div>
											<div class="ms-3 flex-grow-1">
												<a href="applicant_repayment_schedule_print_page.php?id='.cleanvars($_GET['id']).'&product_id='.$val['product_id'].'" target="_blank">Repayment Schedule of ('.strtoupper($val['product_name']).')</a>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="dropdown text-end">
											<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
											<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
												<li><a href="applicant_repayment_schedule_print_page.php?id='.cleanvars($_GET['id']).'&product_id='.$val['product_id'].'" target="_blank" class="dropdown-item"><i class="ri-chat-download-fill align-bottom me-2 text-muted"></i> Download</a></li>
											</ul>
										</div>
									</td>
								</tr>';
								endforeach;
							}
							if ($APPLICANTS_DOCUMENTS) {
								foreach($APPLICANTS_DOCUMENTS as $key => $val):
								echo '
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar-sm">
												<div class="avatar-title bg-soft-primary text-primary rounded fs-20">
													<a href="applicant_document_print_page.php?id='.cleanvars($_GET['id']).'&document_id='.$val['id'].'" target="_blank"><i class="ri-chat-download-fill"></i></a>
												</div>
											</div>
											<div class="ms-3 flex-grow-1">
												<a href="applicant_document_print_page.php?id='.cleanvars($_GET['id']).'&document_id='.$val['id'].'" target="_blank">'.$val['documenttitle'].'</a>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="dropdown text-end">
											<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
											<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
												<li><a href="applicant_document_print_page.php?id='.cleanvars($_GET['id']).'&document_id='.$val['id'].'" target="_blank" class="dropdown-item"><i class="ri-chat-download-fill align-bottom me-2 text-muted"></i> Download</a></li>
											</ul>
										</div>
									</td>
								</tr>';
								endforeach;
							}
							echo '
						</tbody>
					</table>
				</div>
			</div>';
		} else {
			echo'
			<div class="noresult" style="display: block">
				<div class="text-center">
					<lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
					</lord-icon>
					<h5 class="mt-2">Sorry! No Record Found</h5>
					<!--<p class="text-muted">We\'ve searched more than 150+ Orders We did not find any orders for you search.</p>-->
				</div>
			</div>';
		}
		echo'
	</div>
</div>';
?>