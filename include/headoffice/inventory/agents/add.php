<?php
echo'
    <div class="card">
        <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-primary mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-justified-agent" role="tab" aria-selected="false"> Agent Information </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-bank" role="tab" aria-selected="false"> Bank Information </a>
            </li>
        </ul>
        <form action="agents.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="nav-border-justified-agent" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Name <span class="text-danger">*</span></label>
                                <input type="text" name="agent_name" id="agent_name" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="agent_phone" id="agent_phone" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Email <span class="text-danger">*</span></label>
                                <input type="text" name="agent_email" id="agent_email" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="agent_status" required>
                                    <option value=""> Choose one</option>';
                                    foreach(get_status() as $key => $status):
                                        echo'<option value="'.$key.'">'.$status.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Address <span class="text-danger">*</span></label>
                                <textarea name="agent_address" id="agent_address" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="vendors.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-bank" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Account Title <span class="text-danger">*</span></label>
                                <input type="text" name="agent_account_title" id="agent_account_title" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Account Number <span class="text-danger">*</span></label>
                                <input type="text" name="agent_account_number" id="agent_account_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">CNIC Number <span class="text-danger">*</span></label>
                                <input type="text" name="agent_cnic_number" id="agent_cnic_number" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Bank Name <span class="text-danger">*</span></label>
                                <input type="text" name="agent_bank_name" id="agent_bank_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Branch Code <span class="text-danger">*</span></label>
                                <input type="text" name="agent_branch_code" id="agent_branch_code" class="form-control" required>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="agents.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add Agent</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>';
?>