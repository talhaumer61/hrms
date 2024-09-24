<?php
$search_word = (isset($_GET['search']) ? $_GET['search_word'] : '');
$condition = array(
                     'select'       =>  'ps.payset_id, GROUP_CONCAT(ps.payset_id) payset_ids,ps.payset_status,ps.id_emply,ps.id_head,ps.head_value
                                        ,SUM(CASE WHEN sh.head_type = 2 THEN ps.head_value ELSE NULL END) AS sumDeducation
                                        ,e.emply_name,e.emply_grosssalary,dp.dept_name,ds.designation_name'
                    ,'join'         =>  '
                                            LEFT JOIN '.EMPLOYEES.' e       ON e.emply_id = ps.id_emply
                                            LEFT JOIN '.DEPARTMENTS.' dp    ON dp.dept_id = e.id_dept
                                            LEFT JOIN '.DESIGNATIONS.' ds   ON ds.designation_id = e.id_designation
                                            LEFT JOIN '.SALARY_HEADS.' sh   ON sh.head_id = ps.id_head
                                        '
                    ,'where'        =>  array(
                                                'ps.is_deleted'  => 0
                                            )
                    ,'search_by'    =>  'AND (e.emply_name LIKE "%'.$search_word.'%")'
                    ,'group_by'     =>  'e.emply_name ASC'
                    ,'order_by'     =>  'ps.payset_id ASC'
                    ,'return_type'  =>  'count'
);
$count     = $dblms->getRows(PAY_SETTINGS.' ps', $condition);
echo'
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>Pay Settings List</h5>
            <div class="flex-shrink-0">
                <button class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/hrm/pay_settings/add.php\');"><i class="ri-add-circle-line align-bottom me-1"></i>Pay Setting</button>
            </div>
        </div>
    </div>
    <div class="card-body">        
        <div class="row justify-content-end">
            <div class="col-3">
                <form action="" class="form-horizontal" id="form" enctype="multipart/form-data" method="get" autocomplete="off" accept-charset="utf-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Pay Setting Name" name="search_word" value="'.$search_word.'">
                        <button type="submit" class="btn btn-primary btn-sm" name="search"><i class="ri-search-2-line"></i></button>
                    </div>
                </form>
            </div>
        </div>';       
        if ($page == 0 || empty($page)) { $page = 1; }
        $prev        = $page - 1;
        $next        = $page + 1;
        $lastpage    = ceil($count / $Limit);   //lastpage = total pages // items per page, rounded up
        $lpm1        = $lastpage - 1;        
        $filters = 'search_word='.$search_word.'&search';

        $condition['order_by'] = "ps.payset_id ASC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type'] = 'all';

        $regions     = $dblms->getRows(PAY_SETTINGS.' ps', $condition);
        if ($regions) {
            echo'
            <div class="table-responsive table-card">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40" class="text-center">Sr.</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th width="100" class="text-center">Gross Salary</th>
                            <th width="100" class="text-center">Deduction</th>
                            <th width="100" class="text-center">Net Salary</th>
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
                                <td>'.$row['emply_name'].'</td>
                                <td>'.$row['dept_name'].'</td>
                                <td>'.$row['designation_name'].'</td>
                                <td class="text-right" title="Rs '.$row['emply_grosssalary'].'.00">Rs '.$row['emply_grosssalary'].'.00</td>
                                <td class="text-right" title="Rs '.$row['sumDeducation'].'.00">Rs '.$row['sumDeducation'].'.00</td>
                                <td class="text-right" title="Rs '.($row['emply_grosssalary'] - $row['sumDeducation']).'.00">Rs '.($row['emply_grosssalary'] - $row['sumDeducation']).'.00</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
                                            <li><a class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/hrm/pay_settings/view.php?payset_id='.$row['payset_ids'].'\');"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                            <li><a class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/hrm/pay_settings/edit.php?payset_id='.$row['payset_ids'].'&id_emply='.$row['id_emply'].'\');"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
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