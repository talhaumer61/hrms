<?php
$search_word    = '';
$search_query   = '';
$filters        = 'search';

if (!empty($_GET['search_word'])) {
    $search_word     = $_GET['search_word'];
    $search_query   .= " AND (scalegroup_name LIKE '%".$search_word."%' OR scalegroup_mins LIKE '%".$search_word."%')";
    $filters        .= '&search_word='.$search_word.'';
}
$condition = array(
                     'select'       =>  'scalegroup_id,scalegroup_status,scalegroup_name,id_scale,scalegroup_mins,scalegroup_maxs,scalegroup_color,id_company'
                    ,'where'        =>  array(
                                                'is_deleted'  => 0
                                            )
                    ,'search_by'    =>  'AND (scalegroup_name LIKE "%'.$search_word.'%")'
                    ,'order_by'     =>  'scalegroup_id DESC'
                    ,'return_type'  =>  'count'
);
$count     = $dblms->getRows(SCALESGROUP, $condition);
echo'
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>Scales Groups</h5>
            <div class="flex-shrink-0">
            <button class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/assessment/scales_group/add.php\');"><i class="ri-add-circle-line align-bottom me-1"></i>Scales Group</button>
            </div>
        </div>
    </div>
    <div class="card-body">        
        <div class="row justify-content-end">
            <div class="col-3">
                <form action="" class="form-horizontal" id="form" enctype="multipart/form-data" method="get" autocomplete="off" accept-charset="utf-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search..." name="search_word" value="'.$search_word.'">
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

        $condition['order_by'] = "scalegroup_id DESC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type'] = 'all';
        $regions     = $dblms->getRows(SCALESGROUP, $condition);
        if ($regions) {
            echo'
            <div class="table-responsive table-card">
                <table class="table table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40" class="text-center">Sr.</th>
                            <th>Name</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th>Color</th>
                            <th>Scale ID</th>
                            <th width="70" class="text-center">Status</th>
                            <th width="100" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                        if ($page == 1) {
                            $srno = 0;
                        } else {
                            $srno = ($page - 1) * $Limit;
                        }

                        foreach ($regions as $row) {
                            $srno++;
                            echo '
                            <tr style="vertical-align: middle;">
                                <td class="text-center">'.$srno.'</td>
                                <td>'.$row['scalegroup_name'].'</td>
                                <td>'.$row['scalegroup_mins'].'</td>
                                <td>'.$row['scalegroup_maxs'].'</td>
                                <td>'.$row['scalegroup_color'].'</td>
                                <td>'.$row['id_scale'].'</td>
                                <td class="text-center">'.get_status($row['scalegroup_status']).'</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
                                            <li><a class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/assessment/scales_group/edit.php?scalegroup_id='.$row['scalegroup_id'].'\');"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li><a class="dropdown-item" onclick="confirm_modal(\'scales_group.php?deleteid='.$row['scalegroup_id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
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