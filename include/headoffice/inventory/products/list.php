<?php
$search_word = (isset($_GET['search']) ? $_GET['search_word'] : '');
$condition = array(
                     'select'       =>  'p.product_id,p.product_status,p.product_code,p.product_name,p.product_brand,p.product_model,p.product_photo,p.product_quantity,c.cat_name'
                    ,'join'         =>  'INNER JOIN '.PRODUCTS_CATEGORY.' c ON c.cat_id = p.id_cat'
                    ,'where'        =>  array(
                                                'p.is_deleted'  => 0
                                            )
                    ,'search_by'    =>  'AND (p.product_name LIKE "%'.$search_word.'%")'
                    ,'order_by'     =>  'p.product_id ASC'
                    ,'return_type'  =>  'count'
);
$count     = $dblms->getRows(PRODUCTS.' p', $condition);
echo'
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1"><i class="ri-file-paper-2-fill align-bottom me-1"></i>Products</h5>
            <div class="flex-shrink-0">
                <a href="?add" class="btn btn-primary btn-sm"><i class="ri-add-circle-line align-bottom me-1"></i>Product</a>
            </div>
        </div>
    </div>
    <div class="card-body">        
        <div class="row justify-content-end">
            <div class="col-3">
                <form action="products.php" class="form-horizontal" id="form" enctype="multipart/form-data" method="get" autocomplete="off" accept-charset="utf-8">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Product Name" name="search_word" value="'.$search_word.'">
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

        $condition['order_by'] = "p.product_id ASC LIMIT " . ($page - 1) * $Limit . ",$Limit";
        $condition['return_type'] = 'all';

        $regions     = $dblms->getRows(PRODUCTS.' p', $condition);
        if ($regions) {
            echo'
            <div class="table-responsive table-card">
                <table class="table table-nowrap mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="40" class="text-center">Sr.</th>
                            <th>Name / Model / Brand</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th width="70" class="text-center">Status</th>
                            <th width="100" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                        $srno = ($page == 1)? 0: ($page - 1) * $Limit;

                        foreach ($regions as $row) {
                            $srno++;
                            echo '
                            <tr style="vertical-align: middle;">
                                <td class="text-center">'.$srno.'</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded p-1">
                                                <img src="uploads/images/inventory/product/'.$row['product_photo'].'" class="img-fluid d-block" style="height=:100%;">
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-14 mb-1">
                                                <a href="apps-ecommerce-product-details.html" class="text-dark">'.$row['product_name'].'</a>
                                            </h5>
                                            <p class="text-muted mb-0"><span class="fw-medium">'.$row['product_model'].' / '.$row['product_brand'].'</span></p>
                                        </div>
                                    </div>
                                </td>
                                <td>'.$row['product_code'].'</td>
                                <td>'.$row['cat_name'].'</td>
                                <td>'.$row['product_prince'].'</td>
                                <td class="text-center">'.get_status($row['product_status']).'</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="cursor: pointer;">
                                            <li><a class="dropdown-item" href="?id='.$row['product_id'].'"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li><a class="dropdown-item" onclick="confirm_modal(\'products.php?deleteid='.$row['product_id'].'\');"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
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