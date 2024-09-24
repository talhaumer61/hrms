<?php
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
echo'
<div class="card">
	<div class="card-header bg-warning p-3">
		<h5 class="card-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Create Document</h5>
	</div>
	<form action="applicants.php?id='.cleanvars($_GET['id']).'" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
		<input type="hidden" name="applicant_id" value="'.cleanvars($_GET['id']).'"/>
		<div class="card-body">
			<div class="row">
				<div class="col mb-2">
					<label class="form-label">Product <span class="text-danger">*</span></label>
					<select class="form-control" data-choices name="id_product" id="id_product">
						<option value=""> Choose one</option>';
						foreach($APPLICANTS_PRODUCTS as $key => $val):
							echo'<option value="'.$val['id_product'].'">'.$val['product_name'].'</option>';
						endforeach;
						echo'
					</select>
				</div>
				<div class="col mb-2">
					<label class="form-label">Title <span class="text-danger" id="templateError">*</span></label>
					<select onchange="getdocumentTemplate(this.value);" class="form-control" data-choices name="documenttitle">
						<option value=""> Choose one</option>';
						foreach($DOCUMENT_TEMPLATE as $key => $val):
							echo'<option value="'.$val['template_name'].'">'.$val['template_name'].'</option>';
						endforeach;
						echo'
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col mb-2">
					<label class="form-label">Document Content <span class="text-danger">*</span></label>
					<textarea name="document_content" id="ckeditor" class="form-control" required=""></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<div class="hstack gap-2 justify-content-end">
				<a href="applicants.php?id='.cleanvars($_GET['id']).'" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
				<button type="submit" class="btn btn-warning btn-sm" name="submit_add_document_create"><i class="ri-add-circle-line align-bottom me-1"></i>Create Document</button>
			</div>
		</div>
	</form>
</div>';
?>
<script>
	function getdocumentTemplate(id_document){
		var id_product 		= $('#id_product').val();
		var templateError 	= $('#templateError');
		if (id_product != '') {
			templateError.html('');
			$.ajax({
				type				: "post",
				url					: "include/ajax/get_documentTemplate.php",
				data				: {
					'id_document' 	: id_document,
					'id_product' 	: id_product
				},
				success				: function (response) {
					CKEDITOR.instances['ckeditor'].setData(response);
				}
			});
		} else {
			templateError.html('* Please Select Product First');
		}
	}
</script>