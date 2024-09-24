<?php
echo '
<div class="tab-pane fade" id="bank-accounts" role="tabpanel">
	<div class="card">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h5 class="card-title mb-0 flex-grow-1">Bank Accounts</h5>
				<button class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/applicants/bank_account/add.php?id='.cleanvars($_GET['id']).'\');"><i class="ri-add-circle-line align-bottom me-1"></i>Bank Account</butt>
			</div>
		</div>';       
		if ($APPLICANTS_BANK_ACCOUNTS) {
			echo'
			<div class="card-body">
				<div class="table-responsive table-card">
					<table class="table mb-0">
						<thead class="table-light">
							<tr>
								<th class="text-center" width="70">Sr</th>
								<th>Account title</th>
								<th width="250">Account number</th>
								<th width="250">Bank name</th>
								<th width="250">Branch</th>
								<th class="text-center" width="150">Statement Date</th>
								<th class="text-center" width="150">Account type</th>
								<th class="text-center" width="70">Action</th>
							</tr>
						</thead>
						<tbody>';
							$sr = 0;
							foreach($APPLICANTS_BANK_ACCOUNTS as $key => $val):
								$sr++;
								echo '
								<tr>
									<td class="text-center">'.$sr.'</td>
									<td>'.$val['account_title'].'</td>
									<td>'.$val['account_no'].'</td>
									<td>'.$val['id_bank'].'</td>
									<td>'.$val['branchname'].'</td>
									<td class="text-center">'.date('d M, Y',strtotime($val['account_openingdate'])).'</td>
									<td class="text-center">'.get_BankType($val['account_type']).'</td>
									<td class="text-center">
										<div class="dropdown text-end">
											<button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
											<ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
												<li><button class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/applicants/bank_account/edit.php?applicant_id='.$_GET['id'].'&bank_account_id='.$val['id'].'\');"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
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