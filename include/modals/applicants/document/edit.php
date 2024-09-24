<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();
// DOCUMENT TEMPLATE
$condition = array(
                     'select'       =>  'template_id,template_name'
                    ,'where'        =>  array(
                                                 'template_status'  => 1
                                                ,'is_deleted'       => 0
                                            )
                    ,'order_by'     =>  'template_id ASC'
                    ,'return_type'  =>  'all'
);
$DOCUMENT_TEMPLATE     = $dblms->getRows(DOCUMENT_TEMPLATE, $condition);

// APPLICANTS PRODUCTS
$condition = array(
                     'select'       =>  'ap.id_product,ip.product_name'
                    ,'join'         =>  'INNER JOIN '.PRODUCTS.' ip ON ip.product_id = ap.id_product'
                    ,'where'        =>  array(
                                                 'ap.is_deleted' => 0
                                                ,'id_applicant'    => cleanvars($_GET['id'])
                                            )
                    ,'order_by'     =>  'ap.id_product ASC'
                    ,'return_type'  =>  'all'
);
$APPLICANTS_PRODUCTS     = $dblms->getRows(APPLICANTS_PRODUCTS.' ap', $condition);
// APPLICANTS DOCUMENTS
$condition = array(
	'select'       =>  'id,status,id_product,documenttitle,documentfile,document_content,document_date'
   ,'where'        =>  array(
								'is_deleted'      	=> 0
							   ,'id_applicant'    	=> cleanvars($_GET['id'])
							   ,'id'    			=> cleanvars($_GET['document_id'])
						   )
   ,'return_type'  =>  'single'
);
$APPLICANTS_DOCUMENTS = $dblms->getRows(APPLICANTS_DOCUMENTS, $condition);
echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Document</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="applicants.php?id='.cleanvars($_GET['id']).'" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="applicant_id" value="'.cleanvars($_GET['applicant_id']).'"/>
            <input type="hidden" name="document_id" value="'.cleanvars($_GET['document_id']).'"/>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">Product <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="id_product">
                            <option value=""> Choose one</option>';
                            foreach($APPLICANTS_PRODUCTS as $key => $val):
                                echo'<option value="'.$val['id_product'].'" '.(($APPLICANTS_DOCUMENTS['id_product'] == $val['id_product'])? 'selected': '').'>'.$val['product_name'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="documenttitle">
                            <option value=""> Choose one</option>';
                            foreach($DOCUMENT_TEMPLATE as $key => $val):
                                echo'<option value="'.$val['template_name'].'" '.(($APPLICANTS_DOCUMENTS['documenttitle'] == $val['template_name'])? 'selected': '').'>'.$val['template_name'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-2">
                        <label class="form-label">File <span class="text-danger">*</span></label>
                        <input type="file" name="documentfile" class="form-control" required />
                    </div>
                    <div class="col mb-2">
                        <label class="form-label">Document Date <span class="text-danger">*</span></label>
                        <input type="text" name="document_date" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required="" value="'.date(',d M, Y',strtotime($APPLICANTS_DOCUMENTS['document_date'])).'" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit_bank_account"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Document</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>