<?php
$search_word        = (!empty($_POST['search'])              ? $_POST['search_word']         : '');
$emply_status   = (!empty($_POST['emply_status'])    ? ' AND emply_status = '.cleanvars($_POST['emply_status']).''    : '');
$dept_id            = (!empty($_POST['dept_id'])             ? ' AND id_dept = '.cleanvars($_POST['dept_id']).''             : '');
$designation_id     = (!empty($_POST['designation_id'])      ? ' AND designation_id = '.cleanvars($_POST['designation_id']).''      : '');
// EMPLOYEES
$condition = array(
                     'select'       =>  'emply_id,emply_status,emply_no,emply_name,emply_father,emply_gender,emply_cnic,emply_cell,emply_email'
                    ,'where'        =>  array(
                                                'is_deleted'  => 0
                                            )
                    ,'search_by'    =>  'AND (emply_name LIKE "%'.$search_word.'%") '.$emply_status.' '.$dept_id.' '.$designation_id.'  '
                    ,'order_by'     =>  'emply_id ASC'
                    ,'return_type'  =>  'count'
);
$count     = $dblms->getRows(EMPLOYEES, $condition);
// DEPARTMENTS
$filters = array(
                         'select'       =>  'dept_id,dept_name'
                        ,'where'        =>  array(
                                                    'is_deleted'  => 0
                                                )
                        ,'order_by'     =>  'dept_id ASC'
                        ,'return_type'  =>  'all'
);
$DEPARTMENTS     = $dblms->getRows(DEPARTMENTS, $filters);

echo '<pre>';
print_r($dblms->getTableIdName(DEPARTMENTS));
echo '</pre>';
exit;
// DEPARTMENTS
$filters = array(
                         'select'       =>  'designation_id,designation_name'
                        ,'where'        =>  array(
                                                    'is_deleted'  => 0
                                                )
                        ,'order_by'     =>  'designation_id ASC'
                        ,'return_type'  =>  'all'
);
$DESIGNATIONS     = $dblms->getRows(DESIGNATIONS, $filters);

echo'
<div class="card mb-2">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>Employees</h5>
            <div class="flex-shrink-0">
                <a href="?add" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom me-1"></i>Applicant</a>
            </div>
        </div>
    </div>
</div>
<div class="card mb-5">
    <div class="card-body">
        <form action="employees.php" class="form-horizontal" id="form" enctype="multipart/form-data" method="POST" autocomplete="off" accept-charset="utf-8">
            <div class="row mb-2">
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select class="form-control" data-choices name="emply_status">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.(($_POST['emply_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Department</label>
                    <select class="form-control" data-choices name="dept_id">
                        <option value=""> Choose one</option>';
                        foreach($DEPARTMENTS as $key => $val):
                            echo'<option value="'.$val['dept_id'].'" '.(($_POST['dept_id'] == $val['dept_id'])? 'selected': '').'>'.$val['dept_id'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Designation</label>
                    <select class="form-control" data-choices name="designation_id">
                        <option value=""> Choose one</option>';
                        foreach($DESIGNATIONS as $key => $val):
                            echo'<option value="'.$val['designation_id'].'" '.(($_POST['designation_id'] == $val['designation_id'])? 'selected': '').'>'.$val['designation_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Search</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Employe Name" name="search_word" value="'.$search_word.'">
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

        // $condition['search_by'] .= $applicant_gender_Sql.$applicant_marital.$applicant_residence.$applicant_education.$applicant_profession.$applicant_industry.$applicant_stage;
        $condition['order_by'] = "emply_id ASC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type'] = 'all';

        $EMPLOYEES     = $dblms->getRows(EMPLOYEES, $condition);
        echo '
        <div class="tab-content text-muted">';       
            if ($EMPLOYEES) {
                echo'
                <div class="table-responsive table-card">
                    <table class="table table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="40" class="text-center">Sr.</th>
                                <th>Name</th>
                                <th width="200">Father Name</th>
                                <th width="150">CNIC</th>
                                <th width="150">Phone</th>
                                <th width="150">Email</th>
                                <th width="70" class="text-center">Gender</th>
                                <th width="70" class="text-center">Status</th>
                                <th width="100" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>';
                            $srno = ($page == 1)? 0: ($page - 1) * $Limit;

                            foreach ($EMPLOYEES as $row) {
                                $srno++;
                                echo '
                                <tr style="vertical-align: middle;">
                                    <td class="text-center">'.$srno.'</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <h5 class="fs-14 mb-1">
                                                    <a href="apps-ecommerce-product-details.html" class="text-dark">'.$row['emply_name'].'</a>
                                                </h5>
                                                <p class="text-muted mb-0"><span class="fw-medium">Code: '.$row['emply_no'].'</span></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>'.$row['emply_father'].'</td>
                                    <td>'.$row['emply_cnic'].'</td>
                                    <td>'.$row['emply_cell'].'</td>
                                    <td>'.$row['emply_email'].'</td>
                                    <td class="text-center">'.get_gendertypes($row['emply_gender']).'</td>
                                    <td class="text-center">'.get_status($row['emply_status']).'</td>
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