<?php
echo '
<div class="tab-pane active" id="overview" role="tabpanel">
	<div class="row">
		<div class="col-xxl-3">
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="card-title">Information</h5>
					<div class="table-responsive">
						<table class="table table-borderless mb-0">
							<tbody>
								<tr>
									<th class="ps-0" scope="row">Full Name :</th>
									<td class="text-muted">'.$row['applicant_name'].'</td>
								</tr>
								<tr>
									<th class="ps-0" scope="row">Mobile :</th>
									<td class="text-muted">'.$row['applicant_phone'].'</td>
								</tr>
								<tr>
									<th class="ps-0" scope="row">E-mail :</th>
									<td class="text-muted">'.$row['applicant_email'].'</td>
								</tr>
								<tr>
									<th class="ps-0" scope="row">Location :</th>
									<td class="text-muted">'.$row['applicant_currentaddress'].'</td>
								</tr>
								<tr>
									<th class="ps-0" scope="row">Date Added</th>
									<td class="text-muted">'.date('d M Y',strtotime($row['date_added'])).'</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="card-title">Guarantors</h5>';
					foreach($APPLICANTS_GUARANTORS as $key => $val):
						echo '
						<div class="d-flex align-items-center py-3">
							<div class="avatar-xs flex-shrink-0 me-3">
								<img src="uploads/images/applicants/guarantors/'.$val['photo'].'" class="img-fluid rounded-circle">
							</div>
							<div class="flex-grow-1">
								<h5 class="fs-13 mb-1">'.$val['fullname'].'</h5>
								<p class="fs-13 text-muted mb-0">'.$val['withrelation'].'</p>
							</div>
							<div class="dropdown text-end">
								<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
								<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
									<li><a class="dropdown-item" onclick="showAjaxModalView(\'include/modals/applicants/guarantor/view.php?guarantor_id='.$val['id'].'\');" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
									<li><button class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/applicants/guarantor/edit.php?applicant_id='.$_GET['id'].'&guarantor_id='.$val['id'].'\');"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
									<li><a class="dropdown-item" onclick="confirm_modal(\'applicants.php?guarantorDeletedId'.$val['id'].'&applicant_id='.$_GET['id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
								</ul>
							</div>
						</div>';
					endforeach;
					echo '
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="card-title">Bank Accounts</h5>
					<div class="table-responsive">
						'.((!empty($row['applicant_remarks']))? html_entity_decode(html_entity_decode($row['applicant_remarks'])): '<center><h3>No record found</h3></center>').'
					</div>
				</div>
			</div>
			<div class="card mb-4">
				<div class="card-body">
					<h5 class="card-title">Remarks</h5>
					<div class="table-responsive">
						'.((!empty($row['applicant_remarks']))? html_entity_decode(html_entity_decode($row['applicant_remarks'])): '<center><h3>No record found</h3></center>').'
					</div>
				</div>
			</div>
		</div>
		<div class="col-xxl-9">
			<div class="card crm-widget mb-4">
				<div class="card-body p-0">
					<div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 g-0">
						<div class="col">
							<div class="py-4 px-3">
								<h5 class="text-muted text-uppercase fs-13">
									Total Products
								</h5>
								<div class="d-flex align-items-center">
									<div class="flex-shrink-0">
										<i class="ri-shopping-cart-2-line display-6 text-muted"></i>
									</div>
									<div class="flex-grow-1 ms-3">
										<h2 class="mb-0">
											<span class="counter-value">
												1
											</span>
										</h2>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="mt-3 mt-md-0 py-4 px-3">
								<h5 class="text-muted text-uppercase fs-13">
									Total Payable Amount
								</h5>
								<div class="d-flex align-items-center">
									<div class="flex-shrink-0">
										<i class="ri-exchange-dollar-line display-6 text-muted"></i>
									</div>
									<div class="flex-grow-1 ms-3">
										<h2 class="mb-0">
											Rs<span class="counter-value" data-target="157900">
												
												157900
											</span>
										</h2>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="mt-3 mt-lg-0 py-4 px-3">
								<h5 class="text-muted text-uppercase fs-13">
									Total Paid Amount
								</h5>
								<div class="d-flex align-items-center">
									<div class="flex-shrink-0">
										<i class="ri-check-double-fill display-6 text-muted"></i>
									</div>
									<div class="flex-grow-1 ms-3">
										<h2 class="mb-0">
											Rs<span class="counter-value" data-target="0">
											</span>
											
											0
										</h2>
									</div>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="mt-3 mt-md-0 py-4 px-3">
								<h5 class="text-muted text-uppercase fs-13">
									Total Pending Amount
								</h5>
								<div class="d-flex align-items-center">
									<div class="flex-shrink-0">
										<i class="ri-secure-payment-fill display-6 text-muted"></i>
									</div>
									<div class="flex-grow-1 ms-3">
										<h2 class="mb-0">
											Rs<span class="counter-value">
												
												0
											</span>
										</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Projects</h5>
							<div class="swiper project-swiper mt-n4">
								<div class="d-flex justify-content-end gap-2 mb-2">
									<div class="slider-button-prev">
										<div class="avatar-title fs-18 rounded px-1">
											<i class="ri-arrow-left-s-line"></i>
										</div>
									</div>
									<div class="slider-button-next">
										<div class="avatar-title fs-18 rounded px-1">
											<i class="ri-arrow-right-s-line"></i>
										</div>
									</div>
								</div>
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="card profile-project-card shadow-none profile-project-success mb-0">
											<div class="card-body p-4">
												<div class="d-flex">
													<div class="flex-grow-1 text-muted overflow-hidden">
														<h5 class="fs-14 text-truncate mb-1">
															<a href="#" class="text-dark">ABC
																Project Customization</a>
														</h5>
														<p class="text-muted text-truncate mb-0">
															Last Update : <span class="fw-semibold text-dark">4
																hr Ago</span></p>
													</div>
													<div class="flex-shrink-0 ms-2">
														<div class="badge badge-soft-warning fs-10">
															Inprogress</div>
													</div>
												</div>
												<div class="d-flex mt-4">
													<div class="flex-grow-1">
														<div class="d-flex align-items-center gap-2">
															<div>
																<h5 class="fs-12 text-muted mb-0">
																	Members :</h5>
															</div>
															<div class="avatar-group">
																<div class="avatar-group-item">
																	<div class="avatar-xs">
																		<img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid" />
																	</div>
																</div>
																<div class="avatar-group-item">
																	<div class="avatar-xs">
																		<img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle img-fluid" />
																	</div>
																</div>
																<div class="avatar-group-item">
																	<div class="avatar-xs">
																		<div class="avatar-title rounded-circle bg-light text-primary">
																			A
																		</div>
																	</div>
																</div>
																<div class="avatar-group-item">
																	<div class="avatar-xs">
																		<img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle img-fluid" />
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- end card body -->
										</div>
										<!-- end card -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Challans</h5>
							<div class="table-responsive">
								<table class="table table-borderless align-middle mb-0">
									<thead class="table-light">
										<tr>
											<th scope="col">Product</th>
											<th scope="col">Challan No</th>
											<th scope="col">Total</th>
											<th scope="col">Outstanding Amount</th>
											<th scope="col">Due Date</th>
											<th scope="col">Status</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="d-flex align-items-center">
													<div class="avatar-sm">
														<div class="avatar-title bg-soft-primary text-primary rounded fs-20">
															<i class="ri-file-zip-fill"></i>
														</div>
													</div>
													<div class="ms-3 flex-grow-1">
														<h6 class="fs-14 mb-0"><a href="javascript:void(0)" class="text-body">Artboard-documents.zip</a>
														</h6>
													</div>
												</div>
											</td>
											<td>Zip File</td>
											<td>4.57 MB</td>
											<td>12 Dec 2021</td>
											<td>12 Dec 2021</td>
											<td>12 Dec 2021</td>
											<td>
												<div class="dropdown">
													<a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
														<i class="ri-equalizer-fill"></i>
													</a>
													<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
														<li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a>
														</li>
														<li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a>
														</li>
														<li class="dropdown-divider"></li>
														<li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a>
														</li>
													</ul>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h4 class="card-title mb-0  me-2">Application History</h4>
					<div class="horizontal-timeline my-3">
						<div class="swiper timelineSlider">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="card pt-2 border-0 item-box text-center">
										<div class="timeline-content p-3 rounded">
											<div>
												<p class="text-muted fw-medium mb-0">December, 2020</p>
												<h6 class="mb-0">Plateform Development</h6>
											</div>
										</div>
										<div class="time"><span class="badge bg-success">10 : 35 PM</span></div>
									</div>
								</div>
							</div>
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>';
?>