<?php
$id_dept            = (!empty($_GET['id_dept']) ? $_GET['id_dept'] : '');
$id_deptSql         = (!empty($id_dept) ? ' AND ea.id_dept = '.cleanvars($id_dept).'': '');
$search_date        = (!empty($_GET['search_date']) ? $_GET['search_date']: '');
$search_dateSql     = (!empty($search_date) ? ' AND ea.yearmonth LIKE \'%'.date('Y-m-d',strtotime($search_date)).'%\'': '');
// DEPARTMENTS
$condition = array(
                     'select'       =>  'dept_id,dept_name'
                    ,'where'        =>  array(
                                                'is_deleted'  => 0
                                            )
                    ,'order_by'     =>  'dept_id ASC'
                    ,'return_type'  =>  'all'
);
$DEPARTMENTS     = $dblms->getRows(DEPARTMENTS, $condition);
// EMPLOYEE ATTENDANCE
$condition = array(
                     'select'       =>  'ea.attendance_id,ea.id_emply,ea.id_dept,ea.yearmonth,ea.attendance,COUNT(ea.id_emply) emply_count,d.dept_name 
                                        ,COUNT(CASE WHEN ea.attendance = 1 THEN 1 ELSE NULL END) AS emply_present
                                        ,COUNT(CASE WHEN ea.attendance = 2 THEN 1 ELSE NULL END) AS emply_absent
                                        ,COUNT(CASE WHEN ea.attendance = 3 THEN 1 ELSE NULL END) AS emply_leave
                                        ,GROUP_CONCAT(ea.attendance_id) id_comma'
                    ,'join'         =>  'LEFT JOIN '.DEPARTMENTS.' d ON d.dept_id = ea.id_dept'
                    ,'where'        =>  array(
                                                'ea.is_deleted'  => 0
                                            )
                    ,'search_by'    =>  "$id_deptSql $search_dateSql"
                    ,'group_by'     =>  'ea.yearmonth'
                    ,'return_type'  =>  'count'
);

$count     = $dblms->getRows(EMPLOYEE_ATTENDANCE.' ea', $condition);
echo'
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>Employee Attendance List</h5>
            <div class="flex-shrink-0">
                <button class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/hrm/employee_attendance/add.php\');"><i class="ri-add-circle-line align-bottom me-1"></i>Mark Attendance</button>
            </div>
        </div>
    </div>
    <div class="card-body">        
        <form action="" class="form-horizontal" id="form" enctype="multipart/form-data" method="get" autocomplete="off" accept-charset="utf-8">
            <div class="row justify-content-end mb-3">
                <div class="col-2">
                    <select class="form-control" data-choices name="id_dept">
                        <option value=""> Choose one</option>';
                        foreach($DEPARTMENTS as $key => $val):
                            echo'<option value="'.$val['dept_id'].'" '.(($id_dept == $val['dept_id'])? 'selected': '').'>'.$val['dept_name'].'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
                <div class="col-2">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_date"  data-provider="flatpickr" data-date-format="d m, Y" value="'.((!empty($search_date))? date('d M, Y',strtotime($search_date)): '').'">        
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
        $filters = 'id_dept='.$id_dept.'&search_date='.$search_date.'';

        $condition['order_by'] = "ea.attendance_id ASC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type'] = 'all';

        $regions     = $dblms->getRows(EMPLOYEE_ATTENDANCE.' ea', $condition);
        if ($regions) {
            echo'
            <div class="table-responsive table-card">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40" class="text-center">Sr.</th>
                            <th>Date</th>
                            <th>Department</th>
                            <th width="120" class="text-center">Employees</th>
                            <th width="120" class="text-center">Total Present</th>
                            <th width="120" class="text-center">Total Absent</th>
                            <th width="120" class="text-center">Total Leave</th>
                            <th width="100" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $srno = ($page == 1)? 0: (($page - 1) * $Limit);
                        foreach ($regions as $row) {
                            $srno++;
                            echo '
                            <tr style="vertical-align: middle;">
                                <td class="text-center">'.$srno.'</td>
                                <td>'.date('d m, Y',strtotime($row['yearmonth'])).'</td>
                                <td>'.$row['dept_name'].'</td>
                                <td class="text-center"><span class="badge badge-soft-info">'.$row['emply_count'].'</span></td>
                                <td class="text-center"><span class="badge badge-soft-primary">'.$row['emply_present'].'</span></td>
                                <td class="text-center"><span class="badge badge-soft-danger">'.$row['emply_absent'].'</span></td>
                                <td class="text-center"><span class="badge badge-soft-warning">'.$row['emply_leave'].'</span></td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
                                            <li><a class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/hrm/employee_attendance/edit.php?attendance_id='.$row['id_comma'].'\');"><i class="ri-edit-circle-line align-bottom me-2 text-muted"></i> Edit</a></li>
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