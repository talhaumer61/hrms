<?php 
$condition = array(
                     'select'       =>  'vendor_status,vendor_name,vendor_phone,vendor_email,vendor_address,vendor_contactperson,vendor_contactemail,vendor_contactphone,vendor_contactwhatsapp,vendor_accountno,vendor_accounttitle,vendor_bank,vendor_bankcode,vendor_cnic,vendor_bankaddress'
                    ,'where'        =>  array(
                                                 'is_deleted'     => 0
                                                ,'vendor_id'  => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(VENDORS, $condition);
echo'
    <div class="card">
        <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-info mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-justified-vendor" role="tab" aria-selected="false"> Vendor Information </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-contact" role="tab" aria-selected="false"> Contact Person </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-bank" role="tab" aria-selected="false"> Bank Account </a>
            </li>
        </ul>
        <form action="vendors.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="vendor_id" value="'.$_GET['id'].'"/>
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="nav-border-justified-vendor" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Name <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_name" id="vendor_name" value="'.$row['vendor_name'].'" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_phone" id="vendor_phone" value="'.$row['vendor_phone'].'" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Email <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_email" id="vendor_email" value="'.$row['vendor_email'].'" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="vendor_status" required>
                                    <option value=""> Choose one</option>';
                                    foreach(get_status() as $key => $status):
                                        echo'<option value="'.$key.'" '.(($row['vendor_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Address <span class="text-danger">*</span></label>
                                <textarea name="vendor_address" id="vendor_address" class="form-control" required>'.$row['vendor_address'].'</textarea>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="vendors.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-contact" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Name <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_contactperson" id="vendor_contactperson" value="'.$row['vendor_contactperson'].'" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_contactphone" id="vendor_contactphone" value="'.$row['vendor_contactphone'].'" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Whats App <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_contactwhatsapp" id="vendor_contactwhatsapp" value="'.$row['vendor_contactwhatsapp'].'" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Email <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_contactemail" id="vendor_contactemail" value="'.$row['vendor_contactemail'].'" class="form-control" required>
                            </div>
                        </div>s
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="vendors.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-bank" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Account Title <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_accounttitle" id="vendor_accounttitle" value="'.$row['vendor_accounttitle'].'" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Account Number <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_accountno" id="vendor_accountno" value="'.$row['vendor_accountno'].'" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">CNIC Number <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_cnic" id="vendor_cnic" value="'.$row['vendor_cnic'].'" class="form-control" required>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Bank Name <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_bank" id="vendor_bank" value="'.$row['vendor_bank'].'" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Branch Code <span class="text-danger">*</span></label>
                                <input type="text" name="vendor_bankcode" id="vendor_bankcode" value="'.$row['vendor_bankcode'].'" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Address <span class="text-danger">*</span></label>
                                <textarea name="vendor_bankaddress" id="vendor_bankaddress" class="form-control" required>'.$row['vendor_bankaddress'].'</textarea>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="vendors.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Vendor</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>';
?>