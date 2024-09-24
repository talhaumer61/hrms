<?php
$dblms = new dblms();
$condition = array(
    'select'       =>  'timezone_id,timezone_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$get_timezone     = $dblms->getRows(TIMEZONE, $condition);
$condition = array(
    'select'       =>  'currency_id,currency_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$get_currency     = $dblms->getRows(CURRENCY, $condition);
$condition = array(
    'select'       =>  'country_id,country_name'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
);
$get_country     = $dblms->getRows(COUNTRY, $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-content">
    <div class="modal-header bg-primary p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).'</h5>
    </div>
    <form action="'.moduleName().'.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="company_name" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Short Name <span class="text-danger">*</span></label>
                    <input type="text" name="company_shortname" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="company_status" required="">
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
                    <label class="form-label">Website<span class="text-danger">*</span></label>
                    <input type="text" name="company_website" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Address<span class="text-danger">*</span></label>
                    <input type="text" name="company_address" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">NTN<span class="text-danger">*</span></label>
                    <input type="text" name="company_ntn" class="form-control" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Timezone<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_timezone" required="">
                        <option value=""> Choose one</option>';
                        foreach($get_timezone as $timezone):
                            echo'<option value="'.$timezone['timezone_id'].'">'.$timezone['timezone_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Currency<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_currency" required="">
                        <option value=""> Choose one</option>';
                        foreach($get_currency as $currency):
                            echo'<option value="'.$currency['currency_id'].'">'.$currency['currency_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Country<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="id_country" required="">
                        <option value=""> Choose one</option>';
                        foreach($get_country as $country):
                            echo'<option value="'.$country['country_id'].'">'.$country['country_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Code<span class="text-danger">*</span></label>
                    <input type="text" name="company_code" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Logo<span class="text-danger">*</span></label>
                    <input type="file" name="company_logo" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Logo 2<span class="text-danger">*</span></label>
                    <input type="file" name="company_logo2" class="form-control" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Description</label>
                    <textarea type="text" name="company_description" id="ckeditor" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Add '.moduleName(false).'</button>
            </div>
        </div>
    </form>
</div>';
?>