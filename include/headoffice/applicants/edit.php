<?php 
// APPLICANTS
$condition = array(
                     'select'       =>  'a.*,ak.*'
                    ,'join'         =>  'LEFT JOIN '.APPLICANTS_KYC.' ak ON ak.id_applicant = a.applicant_id'
                    ,'where'        =>  array(
                                                 'a.is_deleted'         => 0
                                                ,'a.applicant_id'       => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(APPLICANTS.' a', $condition);

// APPLICANTS GUARANTORS
$condition = array(
                     'select'       =>  'id,fullname,photo,fathername,withrelation,cnic,phone,whatsapp,years_know,address'
                    ,'where'        =>  array(
                                                 'is_deleted'      => 0
                                                ,'id_applicant'    => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'all'
);
$APPLICANTS_GUARANTORS = $dblms->getRows(APPLICANTS_GUARANTORS, $condition);

// APPLICANTS BANK ACCOUNTS
$condition = array(
                     'select'       =>  'id,id_bank,branchname,account_type,account_title,account_no,account_openingdate'
                    ,'where'        =>  array(
                                                 'is_deleted'      => 0
                                                ,'id_applicant'    => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'all'
);
$APPLICANTS_BANK_ACCOUNTS = $dblms->getRows(APPLICANTS_BANK_ACCOUNTS, $condition);

// APPLICANTS PRODUCTS
$condition = array(
                     'select'       =>  'ap.id,ap.status,ap.id_applicant,ap.id_product,ap.financing_amount,ap.security_amount,ap.tenure,ap.rent_presentage,ap.rent_withouttax,ap.down_amount,ap.installment_startdate,ap.emi_amount,ap.id_financingmode,ap.due_dateeverymonth,p.product_name,p.product_id'
                    ,'join'         =>  'LEFT JOIN '.PRODUCTS.' p ON p.product_id = ap.id_product'
                    ,'where'        =>  array(
                                                 'ap.is_deleted'      => 0
                                                ,'ap.id_applicant'    => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'all'
);
$APPLICANTS_PRODUCTS = $dblms->getRows(APPLICANTS_PRODUCTS.' ap', $condition);

// APPLICANTS DOCUMENTS
$condition = array(
                     'select'       =>  'id,status,documenttitle,documentfile,document_content,document_date'
                    ,'where'        =>  array(
                                                 'is_deleted'      => 0
                                                ,'id_applicant'    => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'all'
);
$APPLICANTS_DOCUMENTS = $dblms->getRows(APPLICANTS_DOCUMENTS, $condition);

$tables = array(
    'Basic Information', 
    'Education Information', 
    'Residential Information', 
    'Household Information', 
    'Job Information',
    'Dependent Income',
    'Remarks',
    'Documents' 
);
$ProfileTabs = array(
     'Overview' 
    ,'General Info' 
    ,'Guarantors'
    ,'Bank Accounts'
    ,'Products'
    ,'KYC'
    ,'Documents'
    ,'Challans'
    ,'Documents Checklist'
    ,'Download Center'
    ,'Account Settings'
);
echo '
<div class="profile-foreground position-relative mx-n4">
    <div class="profile-wid-bg bg-dark">
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="uploads/images/applicants/clients/'.$row['applicant_photo'].'" alt="user-img" class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1">'.$row['applicant_name'].'</h3>
                <span class="badge bg-light text-dark mt-1 mb-2">'.$row['applicant_refno'].'</span>
                <span class="badge bg-light text-dark mt-1 mb-2">'.get_ApplicantStages($row['id_stage']).'</span>
                <div class="hstack text-white-50 gap-1">
                    <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i> '.$row['applicant_currentaddress'].'</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="col-lg-12">
        <div class="d-flex">
            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">';
                foreach($ProfileTabs as $Pkey => $Pval):
                    echo '
                    <li class="nav-item">
                        <a class="nav-link fs-14 '.(($Pkey == 0)? 'active': '').'" data-bs-toggle="tab" href="#'.to_seo_url($Pval).'" role="tab">
                            <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">'.$Pval.'</span>
                        </a>
                    </li>';
                endforeach;
                echo '
            </ul>
        </div>
        <div class="tab-content pt-4 text-muted">
            <div class="step-arrow-nav">
                <ul class="nav nav-pills custom-nav nav-justified" role="tablist">';
                    foreach(get_ApplicantStages() as $Tkey => $Tval):
                        echo'
                        <li class="nav-item" role="presentation">
                            <button class="nav-link '.(($Tkey == $row['id_stage'])? 'bg-success text-white': '').'">'.$Tval.'</button>
                        </li>';
                    endforeach;
                    echo'
                </ul>
            </div>';
            foreach($ProfileTabs as $Pkey => $Pval):
                include("tabs/".to_seo_url($Pval).".php");
            endforeach;
            echo '
        </div>
    </div>
</div>';
?>