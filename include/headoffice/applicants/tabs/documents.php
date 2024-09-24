<?php
echo '
<div class="tab-pane fade" id="documents" role="tabpanel">
	<div class="card">
		<div class="card-header">
			<div class="d-flex gap-2 align-items-center">
				<h5 class="card-title mb-0 flex-grow-1">Documents</h5>
				<a href="applicants.php?id='.cleanvars($_GET['id']).'&create" class="btn btn-warning btn-sm"><i class="ri-file-edit-line me-1"></i>Create Document</a>
				<button class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/applicants/document/add.php?&id='.cleanvars($_GET['id']).'\');"><i class="ri-add-circle-line align-bottom me-1"></i>Document</butt>
			</div>
		</div>';       
		if ($APPLICANTS_DOCUMENTS) {
			echo'
			<div class="card-body">
				<div class="table-responsive table-card">
					<table class="table mb-0">
						<thead class="table-light">
							<tr>
								<th>File Name</th>
								<th width="350">Product</th>
								<th class="text-center" width="150">Date</th>
								<th class="text-center" width="70">Action</th>
							</tr>
						</thead>
						<tbody>';
							foreach($APPLICANTS_DOCUMENTS as $key => $val):
								echo '
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar-sm">
												<div class="avatar-title bg-soft-primary text-primary rounded fs-20">';
													if (!empty($val['document_content'])){
														echo '
														<i class="ri-edit-box-fill" onclick="showAjaxModalZoom(\'include/modals/applicants/document/edit.php?applicant_id='.$_GET['id'].'&document_id='.$val['id'].'\');"></i>';
													} else {
														echo '
														<a href="uploads/images/applicants/documents/'.$val['documentfile'].'" target="_blank"><i class="ri-chat-download-fill"></i></a>';
													}
													echo '
												</div>
											</div>
											<div class="ms-3 flex-grow-1">';
												if (!empty($val['document_content'])){
													echo '
													<a href="#">'.$val['documenttitle'].'</a>';
												} else {
													echo '
													<a href="uploads/images/applicants/documents/'.$val['documentfile'].'" target="_blank">'.$val['documenttitle'].'</a>';
												}
												echo '
											</div>
										</div>
									</td>
									<td>'.$val['branchname'].'</td>
									<td class="text-center">'.date('d M, Y',strtotime($val['account_openingdate'])).'</td>
									<td class="text-center">
										<div class="dropdown text-end">
											<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
											<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">';
												if (!empty($val['document_content'])){
													echo '
													<li><a href="applicants.php?id='.$_GET['id'].'&document_id='.$val['id'].'" class="dropdown-item"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit Content</a></li>';
												} else {
													echo '
													<!--
													<li><button class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/applicants/document/edit.php?applicant_id='.$_GET['id'].'&document_id='.$val['id'].'\');"><i class="ri-download-fill align-bottom me-2 text-muted"></i> Update Document</button></li>
													-->';
												}
												echo '
												<li><a class="dropdown-item" onclick="confirm_modal(\'applicants.php?bankAccountDeletedId='.$val['id'].'&applicant_id='.$_GET['id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>';
							endforeach;
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