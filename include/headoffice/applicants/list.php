<?php
$search_word = (isset($_POST['search']) ? $_POST['search_word'] : '');

$condition = array(
                     'select'       =>  'applicant_id,applicant_status,applicant_photo,applicant_refno,applicant_name,applicant_fatherhusband,applicant_phone,applicant_email,applicant_gender'
                    ,'where'        =>  array(
                                                'is_deleted'  => 0
                                            )
                    ,'search_by'    =>  'AND (applicant_name LIKE "%'.$search_word.'%")'
                    ,'order_by'     =>  'applicant_id ASC'
                    ,'return_type'  =>  'count'
);

$count     = $dblms->getRows(APPLICANTS, $condition);

$tables = array(
     'in_process'        => array( 'title' => 'In Process '.'(1)'      ) 
    ,'verification'      => array( 'title' => 'Verification '.'(1)'    ) 
    ,'secrunity'         => array( 'title' => 'Secrunity '.'(1)'       ) 
    ,'approval'          => array( 'title' => 'Approval '.'(1)'        ) 
    ,'sensaction'        => array( 'title' => 'Sensaction '.'(1)'      ) 
    ,'financing'         => array( 'title' => 'Financing '.'(1)'       ) 
    ,'disbursement'      => array( 'title' => 'Disbursement '.'(1)'    ) 
    ,'completed'         => array( 'title' => 'Completed '.'(1)'       ) 
    ,'rejected'          => array( 'title' => 'Rejected '.'(1)'        ) 
);

if (!empty($_POST['applicant_status'])) {
    $applicant_status       = $_POST['applicant_status'];
    $applicant_status_Sql   = " AND applicant_status = '$applicant_status'";
}
if (!empty($_POST['applicant_gender'])) {
    $applicant_gender       = $_POST['applicant_gender'];
    $applicant_gender_Sql   = " AND applicant_gender = '$applicant_gender'";
}
if (!empty($_POST['applicant_marital'])) {
    $applicant_marital       = $_POST['applicant_marital'];
    $applicant_marital_Sql   = " AND applicant_marital = '$applicant_marital'";
}
if (!empty($_POST['applicant_residence'])) {
    $applicant_residence       = $_POST['applicant_residence'];
    $applicant_residence_Sql   = " AND applicant_residence = '$applicant_residence'";
}
if (!empty($_POST['applicant_education'])) {
    $applicant_education       = $_POST['applicant_education'];
    $applicant_education_Sql   = " AND applicant_education = '$applicant_education'";
}
if (!empty($_POST['applicant_profession'])) {
    $applicant_profession       = $_POST['applicant_profession'];
    $applicant_profession_Sql   = " AND applicant_profession = '$applicant_profession'";
}
if (!empty($_POST['applicant_industry'])) {
    $applicant_industry       = $_POST['applicant_industry'];
    $applicant_industry_Sql   = " AND applicant_industry = '$applicant_industry'";
}
if (!empty($_POST['applicant_stage'])) {
    $applicant_stage       = $_POST['applicant_stage'];
    $applicant_stage_Sql   = " AND applicant_stage = '$applicant_stage'";
}

echo'
<div class="card mb-2">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>Products</h5>
            <div class="flex-shrink-0">
                <a href="?add" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom me-1"></i>Applicant</a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-primary" role="tablist">';
        foreach($tables as $Tkey => $Tval):
            echo'
            <li class="nav-item">
                <a href="?view='.$Tkey.'" class="nav-link '.(($Tkey == LMS_VIEW)? 'active': '').'">'.$Tval['title'].'</a>
            </li>';
        endforeach;
        echo'
    </ul>
</div>

<div class="card mb-5">
    <div class="card-body">
        <form action="?view='.LMS_VIEW.'" class="form-horizontal" id="form" enctype="multipart/form-data" method="POSt" autocomplete="off" accept-charset="utf-8">
            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select class="form-control" data-choices name="applicant_status">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($applicant_status == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Gender</label>
                    <select class="form-control" data-choices name="applicant_gender">
                        <option value=""> Choose one</option>';
                        foreach(get_gendertypes() as $key => $val):
                            echo'<option value="'.$key.'" '.(($applicant_gender == $key)? 'selected': '').'>'.$val.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Marital status</label>
                    <select class="form-control" data-choices name="applicant_marital">
                        <option value=""> Choose one</option>';
                        foreach(get_Marital() as $key => $val):
                            echo'<option value="'.$key.'" '.(($applicant_marital == $key)? 'selected': '').'>'.$val.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Residence status</label>
                    <select class="form-control" data-choices name="applicant_residence">
                        <option value=""> Choose one</option>';
                        foreach(get_residencestatustypes() as $key => $val):
                            echo'<option value="'.$key.'" '.(($applicant_residence == $key)? 'selected': '').'>'.$val.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Education</label>
                    <select class="form-control" data-choices name="applicant_education">
                        <option value=""> Choose one</option>';
                        foreach(get_educationtypes() as $key => $val):
                            echo'<option value="'.$key.'" '.(($applicant_education == $key)? 'selected': '').'>'.$val.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Profession</label>
                    <select class="form-control" data-choices name="applicant_profession">
                        <option value=""> Choose one</option>';
                        foreach(get_Profession() as $key => $val):
                            echo'<option value="'.$key.'" '.(($applicant_profession == $key)? 'selected': '').'>'.$val.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">
                    <label class="form-label">Type of industry</label>
                    <select class="form-control" data-choices name="applicant_industry">
                        <option value=""> Choose one</option>';
                        foreach(get_IndustryType() as $key => $val):
                            echo'<option value="'.$key.'" '.(($applicant_industry == $key)? 'selected': '').'>'.$val.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Stage</label>
                    <select class="form-control" data-choices name="applicant_stage">
                        <option value=""> Choose one</option>';
                        foreach(get_ApplicantStages() as $key => $val):
                            echo'<option value="'.$key.'" '.(($applicant_stage == $key)? 'selected': '').'>'.$val.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-8">
                    <label class="form-label">Search</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Applicant Name" name="search_word" value="'.$search_word.'">
                        <button type="submit" class="btn btn-primary btn-sm" name="search"><i class="ri-search-2-line"></i></button>
                    </div>
                </div>
            </div>
        </form>';
        if ($page == 0 || empty($page)) { $page = 1; }
        $prev        = $page - 1;
        $next        = $page + 1;
        $lastpage    = ceil($count / $Limit);   //lastpage = total pages // items per page, rounded up
        $lpm1        = $lastpage - 1;        
        $filters = 'search_word='.$search_word.'&search';

        $condition['search_by'] .= $applicant_gender_Sql.$applicant_marital.$applicant_residence.$applicant_education.$applicant_profession.$applicant_industry.$applicant_stage;
        $condition['order_by'] = "applicant_id ASC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type'] = 'all';

        $APPLICANTS     = $dblms->getRows(APPLICANTS, $condition);
        echo '
        <div class="tab-content text-muted">';       
            if ($APPLICANTS) {
                echo'
                <div class="table-responsive table-card">
                    <table class="table table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="40" class="text-center">Sr.</th>
                                <th>Name / Ref Number</th>
                                <th width="200">Father / Husband</th>
                                <th width="150">Phone</th>
                                <th width="150">Email</th>
                                <th width="70" class="text-center">Gender</th>
                                <th width="70" class="text-center">Stage</th>
                                <th width="70" class="text-center">Status</th>
                                <th width="100" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno = ($page == 1)? 0: ($page - 1) * $Limit;

                            foreach ($APPLICANTS as $row) {
                                $srno++;
                                echo '
                                <tr style="vertical-align: middle;">
                                    <td class="text-center">'.$srno.'</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm bg-light rounded p-1">
                                                    <img src="uploads/images/applicants/'.$row['applicant_photo'].'" class="img-fluid d-block" style="height=:100%;">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-14 mb-1">
                                                    <a href="apps-ecommerce-product-details.html" class="text-dark">'.$row['applicant_name'].'</a>
                                                </h5>
                                                <p class="text-muted mb-0"><span class="fw-medium">'.$row['applicant_refno'].'</span></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>'.$row['applicant_fatherhusband'].'</td>
                                    <td>'.$row['applicant_phone'].'</td>
                                    <td>'.$row['applicant_email'].'</td>
                                    <td class="text-center">'.get_gendertypes($row['applicant_gender']).'</td>
                                    <td class="text-center">'.get_status($row['applicant_status']).'</td>
                                    <td class="text-center">'.get_status($row['applicant_status']).'</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
                                                <li><a class="dropdown-item" href="?id='.$row['applicant_id'].'"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                                <li><a class="dropdown-item" onclick="confirm_modal(\'applicants.php?deleteid='.$row['applicant_id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>';
                            }
                            echo'
                        </tbody>
                    </table>';                
                    include_once('include/pagination.php');
                    echo'
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
    </div>
</div>';
?>