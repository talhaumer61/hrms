<?php
$search_word = (isset($_GET['search']) ? $_GET['search_word'] : '');
$condition = array(
    'select'       =>  'a.id, a.status, a.id_emply, a.id_dept, a.id_designation, a.id_location, a.id_branch, a.id_shift, a.shiftstarttime, a.shiftendtime, a.dated, a.timestart, a.timeend, a.duration, a.approved_duration, l.location_name, b.branch_name',
    'join'        => 'LEFT JOIN '.LOCATION.' l ON l.location_id = a.id_location '.
                     'LEFT JOIN '.BRANCHES.' b ON b.branch_id = a.id_branch',
    'where'       =>  array(
                        'a.is_deleted'    => 0,
                        'a.id_company'   => cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
                    ),
    'search_by'    => 'AND (approved_duration LIKE "%'.$search_word.'%" OR duration LIKE "%'.$search_word.'%" )',
    'order_by'     =>  'a.id DESC',
    'return_type'  =>  'count'
);

$count     = $dblms->getRows(OVERTIMES.' a', $condition);
echo'
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>'.moduleName(false).'</h5>
            <div class="flex-shrink-0">
                <a href="?add" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom me-1"></i>'.moduleName(false).'</a>
            </div>
        </div>
    </div>
    <div class="card-body">        
        <div class="row justify-content-end">
            <div class="col-3">
                <form class="form-horizontal" id="form" enctype="multipart/form-data" method="get" autocomplete="off" accept-charset="utf-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search_word" value="'.$search_word.'">
                        <button type="submit" class="btn btn-primary btn-sm" name="search"><i class="ri-search-2-line"></i></button>
                    </div>
                </form>
            </div>
        </div>';       
        if ($page == 0 || empty($page)) { $page = 1; }
        $prev       = $page - 1;
        $next       = $page + 1;
        $lastpage   = ceil($count / $Limit);   //lastpage = total pages // items per page, rounded up
        $lpm1       = $lastpage - 1;        
        $filters    = 'search_word='.$search_word.'&search';

        $condition['order_by']      = "a.id DESC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type']   = 'all';

        $relation = $dblms->getRows(OVERTIMES.' a', $condition);
        if ($relation) {
            echo'
            <div class="table-responsive table-card">
                <table class="table table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40" class="text-center">Sr.</th>
                            <th>Employee ID</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Location</th>
                            <th>Branch</th>
                            <th>Shift</th>
                            <th>Dated</th>
                            <th>Shift-Start Time</th>
                            <th>Shift-End Time</th>
                            <th>Timestart</th>
                            <th>Timeend</th>
                            <th>Duration</th>
                            <th>Approved Duration</th>
                            <th width="70" class="text-center">Status</th>
                            <th width="100" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $srno = ($page == 1 ? 0 : ($page - 1) * $Limit);
                        foreach ($relation as $row) {
                            $srno++;
                            echo '
                            <tr style="vertical-align: middle;">
                                <td class="text-center">'.$srno.'</td>
                                <td>'.$row['id_emply'].'</td>
                                <td>'.$row['id_dept'].'</td>
                                <td>'.$row['id_designation'].'</td>
                                <td>'.$row['location_name'].'</td>
                                <td>'.$row['branch_name'].'</td>
                                <td>'.get_shift($row['id_shift']).'</td>
                                <td>'.$row['dated'].'</td>
                                <td>'.$row['shiftstarttime'].'</td>
                                <td>'.$row['shiftendtime'].'</td>
                                <td>'.$row['timestart'].'</td>
                                <td>'.$row['timeend'].'</td>
                                <td>'.$row['duration'].'</td>
                                <td>'.$row['approved_duration'].'</td>
                                <td class="text-center">'.get_attendancestatus($row['status']).'</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
                                            <li><a href="?id='.$row['id'].'" class="dropdown-item"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li><a class="dropdown-item" onclick="confirm_modal(\''.moduleName().'.php?deleteid='.$row['id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
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
</div>';
?>