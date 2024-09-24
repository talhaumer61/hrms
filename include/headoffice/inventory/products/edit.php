<?php 
$condition = array(
                     'select'       =>  'product_status,product_code,product_name,product_brand,product_model,product_details,product_photo,product_quantity,product_price,id_vendor,id_cat'
                    ,'where'        =>  array(
                                                 'is_deleted'       => 0
                                                ,'product_id'         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(PRODUCTS, $condition);
$condition = array(
                         'select'       =>  'cat_id,cat_name'
                        ,'where'        =>  array(
                                                     'is_deleted'  => 0
                                                    ,'cat_status'  => 1
                                                )
                        ,'order_by'     =>  'cat_id ASC'
                        ,'return_type'  =>  'all'
                    );
$PRODUCTS_CATEGORY     = $dblms->getRows(PRODUCTS_CATEGORY, $condition);
$condition = array(
                         'select'       =>  'vendor_id,vendor_name'
                        ,'where'        =>  array(
                                                     'is_deleted'  => 0
                                                    ,'vendor_status'  => 1
                                                )
                        ,'order_by'     =>  'vendor_id ASC'
                        ,'return_type'  =>  'all'
                    );
$VENDORS     = $dblms->getRows(VENDORS, $condition);
echo'
    <div class="card">
        <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-info mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-justified-Pictures" role="tab" aria-selected="false"> Product Pictures </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-Product" role="tab" aria-selected="false"> Product Information </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-Category" role="tab" aria-selected="false"> Category Information </a>
            </li>
        </ul>
        <form action="products.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="product_id" value="'.$_GET['id'].'"/>
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="nav-border-justified-Pictures" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Pictures</label>
                                <input type="file" class="form-control" name="product_photo" accept="image/png, image/jpeg, image/jpeg" />
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="uploads/images/inventory/product/'.$row['product_photo'].'" class="img-fluid d-block" style="height=:100%;">
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="products.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Product</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-Product" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Code <span class="text-danger">*</span></label>
                                <input type="text" name="product_code" id="product_code" value="'.$row['product_code'].'" class="form-control" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Name <span class="text-danger">*</span></label>
                                <input type="text" name="product_name" id="product_name" value="'.$row['product_name'].'" class="form-control" required="">
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Brand <span class="text-danger">*</span></label>
                                <input type="text" name="product_brand" id="product_brand" value="'.$row['product_brand'].'" class="form-control" required="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Model <span class="text-danger">*</span></label>
                                <input type="text" name="product_model" id="product_model" value="'.$row['product_model'].'" class="form-control" required="">
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="product_status" required="">
                                    <option value=""> Choose one</option>';
                                    foreach(get_status() as $key => $status):
                                        echo'<option value="'.$key.'" '.(($row['product_status'] == $key)? 'selected': '').'>'.$status.'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="products.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Product</button>
                        </div>
                    </div>
                    <div class="tab-pane" id="nav-border-justified-Category" role="tabpanel">
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Quantity </label>
                                <input type="text" name="product_quantity" id="product_quantity" value="'.$row['product_quantity'].'" class="form-control">
                            </div>
                            <div class="col mb-2">
                                <label class="form-label mb-0">Price </label>
                                <input type="number" name="product_price" id="product_price" value="'.$row['product_price'].'" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="id_cat" required="">
                                    <option value=""> Choose one</option>';
                                    foreach($PRODUCTS_CATEGORY as $key => $val):
                                        echo'<option value="'.$val['cat_id'].'" '.(($row['id_cat'] == $val['cat_id'])? 'selected': '').'>'.$val['cat_name'].'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                            <div class="col mb-2">
                                <label class="form-label">Vendor <span class="text-danger">*</span></label>
                                <select class="form-control" data-choices name="id_vendor" required="">
                                    <option value=""> Choose one</option>';
                                    foreach($VENDORS as $key => $val):
                                        echo'<option value="'.$val['vendor_id'].'" '.(($row['id_vendor'] == $val['vendor_id'])? 'selected': '').'>'.$val['vendor_name'].'</option>';
                                    endforeach;
                                    echo'
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label class="form-label mb-0">Description</label>
                                <textarea name="product_details" id="ckeditor" class="form-control">'.html_entity_decode(html_entity_decode($row['product_details'])).'</textarea>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end pt-3">
                            <a href="products.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Cancel</a>
                            <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Product</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>';
?>