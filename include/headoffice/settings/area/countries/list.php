<?php
$search_word = (isset($_GET['search']) ? $_GET['search_word'] : '');

$condition = array ( 
                          'select' 	=> 'c.country_id,c.country_status,c.country_name,c.country_isodigit,c.country_iso3digit,c.country_code,c.country_timezone,c.country_latitude,c.country_longitude,c.id_currency,c.id_region, reg.region_id, reg.region_name, cur.currency_id, cur.currency_name'
                        , 'join' 	=> "INNER JOIN ".CURRENCIES." cur ON cur.currency_id = c.id_currency
                                        INNER JOIN ".REGIONS." reg ON reg.region_id = c.id_region"
                        ,'where' 	=> array( 
                                            'c.is_deleted' 	=> 0 
                                        ) 
                        ,'search_by'    =>  'AND (reg.region_name LIKE "%'.$search_word.'%" OR c.country_name LIKE "%'.$search_word.'%")'
                        ,'order_by' 	=> 'c.country_id ASC'
                        ,'return_type' 	=> 'count' 
                    ); 
$count 	= $dblms->getRows(COUNTRIES.' c', $condition);
echo'
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>Country List</h5>
            <div class="flex-shrink-0">
                <a class="btn btn-primary btn-sm" onclick="showAjaxModalZoom(\'include/modals/countries/add.php?ordering='.get_ordering(COUNTRIES).'\');"><i class="ri-add-circle-line align-bottom me-1"></i>Country</a>
            </div>
        </div>
    </div>
    <div class="card-body">        
        <div class="row justify-content-end">
            <div class="col-3">
                <form action="countries.php" class="form-horizontal" id="form" enctype="multipart/form-data" method="get" autocomplete="off" accept-charset="utf-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Country Name" name="search_word" value="'.$search_word.'">
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

        $condition['order_by'] = "c.country_id ASC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type'] = 'all';

        $countries     = $dblms->getRows(COUNTRIES.' c', $condition);
        if ($countries) {
            echo'
            <div class="table-responsive table-card">
                <table class="table table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40" class="text-center">Sr.</th>
                            <th>Name</th>
                            <th width="70" class="text-center">Calling Code</th>
                            <th width="70" class="text-center">ISO (2 Digit)</th>
                            <th width="70" class="text-center">ISO (3 Digit)</th>
                            <th width="70" class="text-center">Latitude</th>
                            <th width="70" class="text-center">Longitude</th>
                            <th width="70" class="text-center">Timezone</th>
                            <th width="70" class="text-center">Currency</th>
                            <th width="70" class="text-center">Region</th>
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

                        foreach ($countries as $row) {
                            $srno++;
                            echo '
                            <tr style="vertical-align: middle;">
                                <td class="text-center">'.$srno.'</td>
                                <td>'.$row['country_name'].'</td>
                                <td class="text-center">'.$row['country_code'].'</td>
                                <td class="text-center">'.$row['country_isodigit'].'</td>
                                <td class="text-center">'.$row['country_iso3digit'].'</td>
                                <td class="text-center">'.$row['country_latitude'].'</td>
                                <td class="text-center">'.$row['country_longitude'].'</td>
                                <td class="text-center">'.get_timezonetypes($row['id_timezone']).'</td>
                                <td class="text-center">'.$row['currency_name'].'</td>
                                <td class="text-center">'.$row['region_name'].'</td>
                                <td class="text-center">'.get_status($row['country_status']).'</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
                                            <li><a class="dropdown-item" onclick="showAjaxModalZoom(\'include/modals/countries/edit.php?country_id='.$row['country_id'].'\');"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li><a class="dropdown-item" onclick="confirm_modal(\'countries.php?deleteid='.$row['country_id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
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