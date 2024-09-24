<?php
echo '
<div class="tab-pane fade" id="guarantors" role="tabpanel">
	<div class="card">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h5 class="card-title mb-0 flex-grow-1">Guarantors</h5>
				<button class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/applicants/guarantor/add.php?id='.cleanvars($_GET['id']).'\');"><i class="ri-add-circle-line align-bottom me-1"></i>Guarantor</butt>
			</div>
		</div>';       
		if ($APPLICANTS_BANK_ACCOUNTS) {
			echo'
			<div class="card-body">
				<div class="row">';
					foreach($APPLICANTS_GUARANTORS as $key => $val):
						echo '
						<div class="col-md-4">
							<div class="card card-body">
								<div class="d-flex mb-4 align-items-center">
									<div class="flex-shrink-0">
										<img src="uploads/images/applicants/guarantors/'.$val['photo'].'" alt="" class="avatar-sm rounded-circle">
									</div>
									<div class="flex-grow-1 ms-2">
										<h5 class="card-title mb-1">'.$val['fullname'].'</h5>
										<p class="text-muted mb-0">'.$val['withrelation'].'</p>
									</div>
									<div class="dropdown text-end">
										<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
										<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
											<li><a class="dropdown-item" onclick="showAjaxModalView(\'include/modals/applicants/guarantor/view.php?guarantor_id='.$val['id'].'\');" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
											<li><button class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/applicants/guarantor/edit.php?applicant_id='.$_GET['id'].'&guarantor_id='.$val['id'].'\');"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
											<li><a class="dropdown-item" onclick="confirm_modal(\'applicants.php?guarantorDeletedId='.$val['id'].'&applicant_id='.$val['id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<span class=""><i class="ri-bank-card-2-line"></i>     : '.$val['cnic'].'</span><br>
										<span class=""><i class="ri-user-location-line"></i>   : '.$val['address'].'</span>
									</div>
									<div class="col">
										<span class=""><i class="ri-whatsapp-line"></i>        : '.$val['whatsapp'].'</span><br>
										<span class=""><i class="ri-smartphone-line"></i>      : '.$val['phone'].'</span>
									</div>
								</div>
							</div>
						</div>';
					endforeach;
					echo '
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