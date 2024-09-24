<?php
include "../../../dbsetting/lms_vars_config.php";
include "../../../dbsetting/classdbconection.php";
include "../../../functions/functions.php";
$dblms = new dblms();
include "../../../functions/login_func.php";
checkCpanelLMSALogin();
$condition = array(
                     'select'       =>  'fullname,photo,fathername,withrelation,cnic,phone,whatsapp,years_know,address,cnic_front,cnic_back'
                    ,'where'        =>  array(
                                                 'is_deleted'       => 0
                                                ,'id'               => cleanvars($_GET['guarantor_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$APPLICANTS_GUARANTORS = $dblms->getRows(APPLICANTS_GUARANTORS, $condition);
echo '
<div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Guarantor Detail</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-0 overflow-hidden">
    <div data-simplebar style="height: calc(100vh - 112px);">
        <div class="acitivity-timeline p-4">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="uploads/images/applicants/guarantors/'.$APPLICANTS_GUARANTORS['photo'].'" alt="photo" class="rounded-circle p-1" width="110">
                    <div class="mt-3">
                        <h4>'.$APPLICANTS_GUARANTORS['fullname'].'</h4>
                        <p class="text-center">s/o</p>
                        <h4>'.$APPLICANTS_GUARANTORS['fathername'].'</h4>
                        <p class="text-secondary mb-1">'.$APPLICANTS_GUARANTORS['withrelation'].'</p>
                    </div>
                </div>
                <hr class="my-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">CNIC</h6>
                        <span class="text-secondary">'.$APPLICANTS_GUARANTORS['cnic'].'</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Phone</h6>
                        <span class="text-secondary">'.$APPLICANTS_GUARANTORS['phone'].'</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Whatsapp</h6>
                        <span class="text-secondary">'.$APPLICANTS_GUARANTORS['whatsapp'].'</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0">Address</h6>
                        <span class="text-secondary">'.$APPLICANTS_GUARANTORS['address'].'</span>
                    </li>
                </ul>
                <div class="d-flex flex-column align-items-center">
                    <h6 class="mb-2">CNIC Front</h6>
                    <img src="uploads/images/applicants/guarantors/'.$APPLICANTS_GUARANTORS['cnic_front'].'" alt="cnic front" class="p-1 mb-3" width="200">
                    <h6 class="mb-2">CNIC Back</h6>
                    <img src="uploads/images/applicants/guarantors/'.$APPLICANTS_GUARANTORS['cnic_back'].'" alt="cnic back" class="p-1" width="200">
                </div>
            </div>
        </div>
    </div>
</div>';
?>