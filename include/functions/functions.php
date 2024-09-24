<?php
// LOGIN TYPES
function get_logintypes($id = '') {
	$listlogintypes = array (
								  '1'	=> 'headoffice'				
								, '2'	=> 'campus'					
								, '3'	=> 'teacher'				
								, '4'	=> 'parent'					
								, '5'	=> 'student'				
								, '6'	=> 'donor'					
								, '7'	=> 'coordinator'
							);
	if(!empty($id)){
		return $listlogintypes[$id];
	}else{
		return $listlogintypes;
	}
}
function get_punchtype($id = '') {
	$liststatus= array (
						  '1' => 'Check In' 
						, '2' => 'Check Out'
					   );
	if(!empty($id)){
		return $liststatus[$id];
	}
	return $liststatus;
}
// LOGIN FILE ACTION
function get_logfile($id = '') {

	$listlogfile = array (
							  '1' => 'Add'		 
							, '2' => 'Update'		 
							, '3' => 'Delete'		
							, '4' => 'Login'	
						 );
	if(!empty($id)){
		return $listlogfile[$id];
	}else{
		return $listlogfile;
	}
}

// ARRAY SEARCH
function arrayKeyValueSearch($array, $key, $value)
{
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subArray) {
            $results = array_merge($results, arrayKeyValueSearch($subArray, $key, $value));
        }
    }
    return $results;
}

// GET CURRENT URL
function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
 	return $pageURL;
}

// PARENT REGION
function get_parentregiontypes($id = '') {
	$listparentregiontypes = array (
										  '1'	=> 'Parent Region 1'
										, '2'	=> 'Parent Region 2'
										, '3'	=> 'Parent Region 3'
										, '4'	=> 'Parent Region 4'
										, '5'	=> 'Parent Region 5'
										, '6'	=> 'Parent Region 6'
										, '7'	=> 'Parent Region 7'
								   );
	if(!empty($id)){
		return $listparentregiontypes[$id];
	}else{
		return $listparentregiontypes;
	}
}


function get_id_employe($id = '') {
	$liststatus= array (
						  '1' => 'Ali' 
						, '2' => 'Hassan' 
						, '3' => 'Umair'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									  '1' => 'Ali' 
									, '2' => 'Hassan' 
									, '3' => 'Umair'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
function get_ques_type($id = '') {
	$liststatus= array (
						  '1' => 'MCQ' 
						, '2' => 'Descriptive' 
						, '3' => 'Scaled'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
						  '1' => 'MCQ' 
						, '2' => 'Descriptive' 
						, '3' => 'Scaled'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
function get_ques_level($id = '') {
	$liststatus= array (
						  '1' => 'Basic' 
						, '2' => 'Intermediate' 
						, '3' => 'High'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
						  '1' => 'Basic' 
						, '2' => 'Intermediate' 
						, '3' => 'High'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
function get_ques_option($id = '') {
	$liststatus= array (
						  '1' => 'Option 1' 
						, '2' => 'Option 2' 
						, '3' => 'Option 3' 
						, '4' => 'Option 4'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
							'1' => 'Option 1' 
						, '2' => 'Option 2' 
						, '3' => 'Option 3' 
						, '4' => 'Option 4'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
// STATUS (ACTIVE & INACTIVE)
function get_status($id = '') {
	$liststatus= array (
						  '1' => 'Active' 
						, '2' => 'Inactive'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									  '1' => '<span class="badge badge-soft-primary">Active</span>' 
									, '2' => '<span class="badge badge-soft-warning">Inactive</span>'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
function get_shuffle($id = '') {
	$liststatus= array (
						  '1' => 'Yes' 
						, '2' => 'No'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									  '1' => '<span class="badge badge-soft-success">Yes</span>' 
									, '2' => '<span class="badge badge-soft-danger">No</span>'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
function get_multiple_status($id = '') {
	$liststatus= array (
						  '1' => 'Pending' 
						, '2' => 'Approved' 
						, '3' => 'Rejected'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									  '1' => '<span class="badge badge-soft-warning">Pending</span>' 
									, '2' => '<span class="badge badge-soft-success">Approved</span>' 
									, '3' => '<span class="badge badge-soft-danger">Rejected</span>'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
function get_stages($id = '') {
	$liststatus= array (
							 '1' => 'Stage 1' 
							,'2' => 'Stage 2'
							,'3' => 'Stage 3'
					   );
	if(!empty($id)){
		$liststatuslabel= array (
									 '1' => '<span class="badge badge-soft-primary">Stage 1</span>' 
									,'2' => '<span class="badge badge-soft-warning">Stage 2</span>'
									,'3' => '<span class="badge badge-soft-info">Stage 3</span>'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}


// CURRENCY POSITION
function get_currency_postition($id = '') {
	$list_currency_postitions= array (
										  '1' => 'Before'
										, '2' => 'After'
									);
	if(!empty($id)){
		$currencyPostionLabel= array (
										  '1' => '<span class="badge badge-soft-primary">Before</span>' 
										, '2' => '<span class="badge badge-soft-warning">After</span>'
									); 
		return $currencyPostionLabel[$id];
	}else{
		return $list_currency_postitions;
	}
}

// IS PUBLISH
function get_is_publish($id = '') {
	$list_is_publish= array (
										  '1' => 'Yes'
										, '2' => 'No'
									);
	if(!empty($id)){
		$is_publish_label= array (
									 '1' => '<span class="badge badge-soft-primary">Yes</span>' 
									,'2' => '<span class="badge badge-soft-warning">No</span>'
								); 
		return $is_publish_label[$id];
	}else{
		return $list_is_publish;
	}
}

// TIMEZONES
function get_timezonetypes($id = '') {
	$listtimezonetypes = array (
									 '1'	=> 'Asia'
									,'2'	=> 'USA'
									,'3'	=> 'UK'
								);
	if(!empty($id)){
		return $listtimezonetypes[$id];
	}else{
		return  $listtimezonetypes;
	}
}

// GENDERS
function get_gendertypes($id = '') {
	$gendertypes = array (
							 '1'	=> 'Male'
							,'2'	=> 'Female'
							,'3'	=> 'Others'
						);
	if(!empty($id)){
		$gendertypes= array (
										  '1' => '<span class="badge badge-soft-primary">Male</span>' 
										, '2' => '<span class="badge badge-soft-info">Female</span>'
										, '3' => '<span class="badge badge-soft-warning">Others</span>'
									); 
		return $gendertypes[$id];
	}else{
		return $gendertypes;
	}
}

// YES NO
function get_YesNoStatus($id = '') {
	$yesNoStatus = array (
					'1'	=> 'Yes'
					,'2'	=> 'NO'
						 );
	if(!empty($id)){
		return $yesNoStatus[$id];
	}else{
		return $yesNoStatus;
	}
}

// DONATION TYPES
function get_DonationTypes($id = '') {
	$donationTypes = array (
								 '1'	=> 'Package'
								,'2'	=> 'Cause'
							);
	if(!empty($id)){
		return $donationTypes[$id];
	}else{
		return $donationTypes;
	}
}

// DONATION TYPES
function get_DurationTypes($id = '') {
	$durationTypes = array (
								 '1'	=> 'Day'
								,'2'	=> 'Month'
								,'3'	=> 'Year'
							);
	if(!empty($id)){
		return $durationTypes[$id];
	}else{
		return $durationTypes;
	}
}
// FILE TYPE
function get_FileTypes($id = '') {
	$fileTypes = array (
							 '1'	=> 'Image'
							,'2'	=> 'Video'
						 );
	if(!empty($id)){
		return $fileTypes[$id];
	}else{
		return $fileTypes;
	}
}



//--------------- Status ------------------
$admstatus = array (
						array('status_id'=>1, 'status_name'=>'Active'), 
						array('status_id'=>2, 'status_name'=>'Inactive')
				   );
$ad_status = array (
						array('status_id'=>1, 'status_name'=>'Active'), 
						array('status_id'=>2, 'status_name'=>'Inactive')
				   );

function get_admstatus($id) {
	$listadmstatus= array (
							'1' => '<span class="badge bg-success">Active</span>', 
							'2' => '<span class="label label-danger" id="bns-status-badge">Inactive</span>'
						  );
	return $listadmstatus[$id];
}




//Application Status 
$applicationstatus = array (
								array('id'=>1,  'name'=>'Approved'),
								array('id'=>2,  'name'=>'Not Approved'),
								array('id'=>3,  'name'=>'Pending')
							);
//Get Application Status
function get_applicationstatus($id) {
	$listapplicationstatus = array (
										'1'	=> '<span class="badge bg-success">Approved</span>',
										'2'	=> '<span class="badge bg-danger">Not Approved</span>',
										'3'	=> '<span class="badge bg-warning">Pending</span>'
								   );
	return $listapplicationstatus[$id];
}

//--------------- Salutation ------------------
$salutationtypes = array (
	array('id'=>1, 'name'=>'Mr.'),
	array('id'=>2, 'name'=>'Mrs.'),
	array('id'=>3, 'name'=>'Other')
);

function get_salutationtypes($id) {
	$listsalutationtypes = array (
		'1'	=> 'Mr.',
		'2'	=> 'Mrs.',
		'3'	=> 'Other'
	);
	return $listsalutationtypes[$id];
}


//--------------- Marital Status ------------------
$maritalstatustypes = array (
	array('id'=>1, 'name'=>'Single'),
	array('id'=>2, 'name'=>'Married'),
	array('id'=>3, 'name'=>'Widowed'),
	array('id'=>4, 'name'=>'Divorced')
);

function get_maritalstatustypes($id = '') {
	$listmaritalstatustypes = array (
		'1'	=> 'Single',
		'2'	=> 'Married',
		'3'	=> 'Widowed',
		'4'	=> 'Divorced'
	);
	return ((!empty($id))? $listmaritalstatustypes[$id]: $listmaritalstatustypes);
}

//--------------- Education ------------------
$educationtypes = array (
	array('id'=>1, 'name'=>'Below Matric'),
	array('id'=>2, 'name'=>'Matric'),
	array('id'=>3, 'name'=>'Intermediate'),
	array('id'=>4, 'name'=>'Graduation'),
	array('id'=>5, 'name'=>'Master'),
	array('id'=>6, 'name'=>'Phd')
);

function get_educationtypes($id = '') {
	$listeducationtypes = array (
		'1'	=> 'Below Matric',
		'2'	=> 'Matric',
		'3'	=> 'Intermediate',
		'4'	=> 'Graduation',
		'5'	=> 'Master',
		'6'	=> 'Phd'
	);
	return (!empty($id))? $listeducationtypes[$id]: $listeducationtypes;
}

//--------------- Job Status ------------------
$jobstatustypes = array (
	array('id'=>1, 'name'=>'Employed'),
	array('id'=>2, 'name'=>'Un Employed'),
	array('id'=>3, 'name'=>'Personal Business')
);

function get_jobstatustypes($id) {
	$listjobstatustypes = array (
		'1'	=> 'Employed',
		'2'	=> 'Un Employed',
		'3'	=> 'Personal Business'
	);
	return $listjobstatustypes[$id];
}

//--------------- Residence Status ------------------
$residencestatustypes = array (
	array('id'=>1, 'name'=>'Owned'),
	array('id'=>2, 'name'=>'Rented'),
	array('id'=>3, 'name'=>'Company Awarded')
);

function get_residencestatustypes($id = '') {
	$listresidencestatustypes = array (
		'1'	=> 'Owned',
		'2'	=> 'Rented',
		'3'	=> 'Company Awarded'
	);
	return (!empty($id))? $listresidencestatustypes[$id]: $listresidencestatustypes;
}


//--------------- Organization Types ------------------
$organizationtypes = array (
	array('id'=>1, 'name'=>'Private Ltd.'),
	array('id'=>2, 'name'=>'Govt. Employee')
);

function get_organizationtypes($id) {
	$listorganizationtypes = array (
		'1'	=> 'Private Ltd.',
		'2'	=> 'Govt. Employee'
	);
	return $listorganizationtypes[$id];
}

//--------------- Years of known ------------------
$knownyears = array (
						array('id'=>0, 'name'=>'Less Than Year'),
						array('id'=>1, 'name'=>'1 Year'),
						array('id'=>2, 'name'=>'2 Years'),
						array('id'=>3, 'name'=>'3 Years'),
						array('id'=>4, 'name'=>'4 Years'),
						array('id'=>5, 'name'=>'5 Years'),
						array('id'=>6, 'name'=>'6 Years'),
						array('id'=>7, 'name'=>'7 Years'),
						array('id'=>8, 'name'=>'8 Years'),
						array('id'=>9, 'name'=>'9 Years'),
						array('id'=>10, 'name'=>'10 Years'),
						array('id'=>11, 'name'=>'11 Years'),
						array('id'=>12, 'name'=>'12 Years'),
						array('id'=>13, 'name'=>'13 Years'),
						array('id'=>14, 'name'=>'14 Years'),
						array('id'=>15, 'name'=>'15 Years'),
						array('id'=>16, 'name'=>'16 Years'),
						array('id'=>17, 'name'=>'17 Years'),
						array('id'=>18, 'name'=>'18 Years'),
						array('id'=>19, 'name'=>'19 Years'),
						array('id'=>20, 'name'=>'20 Years'),
						array('id'=>21, 'name'=>'More Than 20 Years'),
					);

function get_knownyears($id) {
	$listknownyears = array (
								'0'		=> 'Less Than Year',
								'1'		=> '1 Year',
								'2'		=> '2 Years',
								'3'		=> '3 Years',
								'4'		=> '4 Years',
								'5'		=> '5 Years',
								'6'		=> '6 Years',
								'7'		=> '7 Years',
								'8'		=> '8 Years',
								'9'		=> '9 Years',
								'10'	=> '10 Years',
								'11'	=> '11 Years',
								'12'	=> '12 Years',
								'13'	=> '13 Years',
								'14'	=> '14 Years',
								'15'	=> '15 Years',
								'16'	=> '16 Years',
								'17'	=> '17 Years',
								'18'	=> '18 Years',
								'19'	=> '19 Years',
								'20'	=> '20 Years',
								'21'	=> 'More Than 20 Years'
							);
							return $listknownyears[$id];
}



//--------------- Payments Status ------------------
$payments = array (
						array('id'=>1, 'name'=>'Paid')		, 
						array('id'=>2, 'name'=>'Pending')	, 
						array('id'=>3, 'name'=>'Unpaid')
				   );

function get_payments($id) {
	$listpayments = array (
							'1' => '<span class="badge bg-success">Paid</span>'		, 
							'2' => '<span class="badge bg-warning">Pending</span>'	,
							'3' => '<span class="badge bg-danger">Unpaid</span>'
						  );
	return $listpayments[$id];
}


//--------------- Admins Rights ----------
$admtypes = array (
	array('id'=>1, 'name'=>'Super Admin'),
	array('id'=>2, 'name'=>'Administrator'),
	array('id'=>3, 'name'=>'Simple')
   );

function get_admtypes($id='') {
$listadmrights = array (
			'1'	=> 'Super Admin',
			'2'	=> 'Administrator',
			'3'	=> 'Simple'
			);
			return ((!empty($id))?$listadmrights[$id]:$listadmrights);
}
//--------------- Item Types ----------
$itemtype = array (
					array('id'=>1, 'name'=>'Book')		,
					array('id'=>2, 'name'=>'Work Book')	,
					array('id'=>3, 'name'=>'Note Book')	,
					array('id'=>4, 'name'=>'Uniforms')
				   );

function get_itemtypes($id) {
	$listitem = array (
							'1'	=> 'Book'		,
							'2'	=> 'Work Book'	,
							'3'	=> 'Note Book'	,
							'4'	=> 'Uniforms'
							);
	return $listitem[$id];
}



//--------------- Ordders Status ----------
$orders = array (
					array('id'=>1, 'name'=>'Save & Hold')		,
					array('id'=>2, 'name'=>'Pending')			,
					array('id'=>3, 'name'=>'In-Progress')		,
					array('id'=>4, 'name'=>'Dispatched')		,
					array('id'=>5, 'name'=>'Cancel')
				   );

function get_orders($id) {
	$listorders = array (
							'1'	=> '<span class="label bg-warning-dark" id="bns-status-badge"> Save & Hold</span>'	,
							'2'	=> '<span class="label bg-orange" id="bns-status-badge">Pending</span>'				,
							'3'	=> '<span class="label bg-info-dark" id="bns-status-badge">In-Progress</span>'		,
							'4'	=> '<span class="label bg-success-dark" id="bns-status-badge">Dispatched</span>'	,
							'5'	=> '<span class="label bg-danger" id="bns-status-badge">Cancel</span>'
							);
	return $listorders[$id];
}



//--------------- Ordders Status ----------
$saletypes = array (
					array('id'=>1, 'name'=>'Pending')			,
					array('id'=>2, 'name'=>'Save & Hold')		,
					array('id'=>3, 'name'=>'Confirmed')			,
					array('id'=>4, 'name'=>'Dispatched')		,
					array('id'=>5, 'name'=>'Completed')			,
					array('id'=>6, 'name'=>'Cancel')
				   );

function get_saletypes($id) {
	$list = array (
							'1'	=> '<span class="label label-warning" id="bns-status-badge">Pending</span>'		,
							'2'	=> '<span class="label label-danger" id="bns-status-badge">Save & Hold</span>'	,
							'3'	=> '<span class="label label-success" id="bns-status-badge">Confirmed</span>' 	,
							'4'	=> '<span class="label label-info" id="bns-status-badge">Dispatched</span>'		,
							'5'	=> '<span class="label bg-primary-dark" id="bns-status-badge">Completed</span>'	,
							'6'	=> '<span class="label label-danger" id="bns-status-badge">Cancel</span>'
				);
	return $list[$id];
}


//--------------- Ordders Item Status ----------
$ordersitem = array (
					array('id'=>1, 'name'=>'Dispatched')		,
					array('id'=>2, 'name'=>'Pending')			,
					array('id'=>3, 'name'=>'Cancel')
				   );

function get_ordersitem($id) {
	$listordersitem = array (
							'1'	=> 'Dispatched'				,
							'2'	=> 'Pending'				,
							'3'	=> 'Cancel'		
							);
	return $listordersitem[$id];
}

//--------------- Status Yes No ----------
$statusyesno = array (
						array('id'=>1, 'name'=>'Yes') 
						,array('id'=>2, 'name'=>'No')
				   );

function get_statusyesno($id) {
	
	$liststatusyesno = array (
								'1'	=> 'Yes',	'2'	=> 'No'
							 );
	return $liststatusyesno[$id];
}

//--------------- CHALLAN HEADS ----------
$challanHeads = array (
						array('id'=>1, 'name'=>'Security Amount / Down Payment')
						,array('id'=>2, 'name'=>'Principal Amount')
						,array('id'=>3, 'name'=>'Service Charges')
						,array('id'=>4, 'name'=>'Late Payment Charges')
						,array('id'=>5, 'name'=>'Application Charges')
						,array('id'=>6, 'name'=>'Processing Fee')
						,array('id'=>7, 'name'=>'Registeration Charges')
						,array('id'=>8, 'name'=>'Legal & Professional Charges')
						,array('id'=>9, 'name'=>'Other Charges')
					  );

function get_challanHead($id) {
	$challanHeads = array (
							'1'		=> 'Security Amount / Down Payment'
							,'2'	=> 'Principal Amount'
							,'3'	=> 'Service Charges'		
							,'4'	=> 'Late Payment Charges'		
							,'5'	=> 'Application Charges'		
							,'6'	=> 'Processing Fee'		
							,'7'	=> 'Registeration Charges'		
							,'8'	=> 'Legal & Professional Charges'		
							,'9'	=> 'Other Charges'		
						  );
	return $challanHeads[$id];
}

//--------------- Months Keywords ----------
$monthTypes = array (
						array('id'=>'01', 'name'=>'January'),
						array('id'=>'02', 'name'=>'February'),
						array('id'=>'03', 'name'=>'March'),
						array('id'=>'04', 'name'=>'April'),
						array('id'=>'05', 'name'=>'May'),
						array('id'=>'06', 'name'=>'June'),
						array('id'=>'07', 'name'=>'July'),
						array('id'=>'08', 'name'=>'August'),
						array('id'=>'09', 'name'=>'September'),
						array('id'=>'10', 'name'=>'October'),
						array('id'=>'11', 'name'=>'November'),
						array('id'=>'12', 'name'=>'December'),
					);
//--------------- Get Month ----------

function cleanvars($str){ 
	$str = trim($str);
	return is_array($str) ? array_map('cleanvars', $str) : str_replace("\\", "\\\\", htmlspecialchars((stripslashes($str)), ENT_QUOTES)); 
}

function to_seo_url($str){
	// if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
	// $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
    $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
    $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
    $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
    $str = trim($str, '-');
	$str = strtolower($str);
    return $str;
}

// roletypes
$roletypes = array (
						array('id'=>1,  	'name'=>'Skills')				, 
						array('id'=>2,  	'name'=>'Faculties')			,
						array('id'=>3,  	'name'=>'Departments')			,
						array('id'=>4,  	'name'=>'Program')				,
						array('id'=>5,  	'name'=>'Course')				,
						array('id'=>6,  	'name'=>'Employees')			,
						array('id'=>7,  	'name'=>'Settings')						
						
				   );

function get_roletypes($id='') {

	$listroletypes = array (
							'1'  	=> 'Skills'							,
							'2'  	=> 'Faculties'						,
							'3'  	=> 'Departments'					,
							'4'  	=> 'Program'						,
							'5'  	=> 'Course'							,
							'6' 	=> 'Employees'						,
							'7' 	=> 'Settings'						
						);
	return ((!empty($id))?$listroletypes[$id]:$listroletypes);

}

$rolefor = array (
	array('id'=>1,  'name'=>'Head Office')	,
	array('id'=>2,  'name'=>'Company')		,
	array('id'=>3,  'name'=>'Both')		
);
function get_rolefor($id='') {
	$role = array (
							'1'		=> 'Head Office'	,
							'2'		=> 'Company'			,
							'3'		=> 'Both'		
							);
	return ((!empty($id))?$role[$id]:$role);
}
$admtype = array (
	array('id'=>1,  'name'=>'Super Admin')	,
	array('id'=>2,  'name'=>'Head Office')		,
	array('id'=>3,  'name'=>'Both')		
);
function get_admtype($id='') {
	$role = array (
							'1'		=> 'Super Admin'	,
							'2'		=> 'Head Office'			,
							'3'		=> 'Both'		
							);
	return ((!empty($id))?$role[$id]:$role);
}


function nice_number($n) {
	// first strip any formatting;
	$n = (0+str_replace(",", "", $n));

	// is this a number?
	if (!is_numeric($n)) return false;

	// now filter it;
	if ($n > 1000000000000) return round(($n/1000000000000), 4).' T';
	elseif ($n > 1000000000) return round(($n/1000000000), 4).' B';
	elseif ($n > 1000000) return round(($n/1000000), 4).' M';
	elseif ($n > 1000) return round(($n/1000), 4).' K';

	return number_format($n);
}

//Rupees in Word
function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

//Time Format
function get_hours_range( $start = 0, $end = 86400, $step = 1800, $format = 'g:i a' ) {
        $times = array();
        foreach ( range( $start, $end, $step ) as $timestamp ) {
                $hour_mins = gmdate( 'H:i', $timestamp );
                if ( ! empty( $format ) )
                        $times[$hour_mins] = gmdate( $format, $timestamp );
                else $times[$hour_mins] = $hour_mins;
        }
        return $times;
}

function searchArrayKeyVal($sKey, $id, $array) {
	foreach ($array as $key => $val) {
		if ($val[$sKey] == $id) {
			return $key;
		}
	}
	return null;
}

function welcome($H){
 
   if($H < 12){
 
     return "Good Morning";
 
   }elseif($H > 11 && $H < 18){
 
     return "Good Afternoon";
 
   }elseif($H > 17){
 
     return "Good Evening";
 
   }
 
}
// SEND REMARKS
function sendRemark($remarks = "", $action = "", $id_record = "") {
	if (!empty($remarks) && !empty($action) && !empty($id_record)) {
		require_once("include/dbsetting/lms_vars_config.php");
		require_once("include/dbsetting/classdbconection.php");
		$dblms = new dblms();

		$values = array (
							 'id_user'		=>	cleanvars($_SESSION['userlogininfo']['LOGINIDA'])
							,'id_record'	=>	cleanvars($id_record)
							,'filename'		=>	strstr(basename($_SERVER['REQUEST_URI']), '.php', true)
							,'action'		=>	cleanvars($action)
							,'dated'		=>	date('Y-m-d G:i:s')
							,'ip'			=>	cleanvars(LMS_IP)
							,'remarks'		=>	cleanvars($remarks)
							,'id_company'	=>	cleanvars($_SESSION['userlogininfo']['LOGINCOMPANYID'])
						);
		$sqlRemarks = $dblms->insert(LOGS, $values);
		if ($sqlRemarks) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
// SESSION MESSAGE
function sessionMsg($title = "", $msg = "", $color = "") {
	if (!empty($title) && !empty($msg)&& !empty($color)){
		$_SESSION['msg']['title'] 	= ''.$title.'';
		$_SESSION['msg']['text'] 	= ''.$msg.'';
		$_SESSION['msg']['type'] 	= ''.$color.'';
		if (!empty($_SESSION['msg']['title']) && !empty($_SESSION['msg']['text'])&& !empty($_SESSION['msg']['type'])){
			return true;
		}else{
			return false;
		}	
	}else{
		return false;
	}
}
// COURSE LEVEL
function get_course_level($id = '') {
	$course_level = array (
						 '1' => 'Beginner'
						,'2' => 'Intermediate'
						,'3' => 'Upper-Intermediate'
						,'4' => 'Advanced'
						,'5' => 'Mastery'
					  );
	if(!empty($id)){
		return $course_level[$id];
	}else{
		return $course_level;
	}
}
// COURSE TYPE
function get_curs_type($id = '') {
	$curs_type = array (
							 '1'	=> 'Required'
							,'2'	=> 'Elective'
							,'3'	=> 'General'
						);
	if(!empty($id)){
		return $curs_type[$id];
	}else{
		return $curs_type;
	}
}
// COURSE DOMAIN
function get_curs_domain($id = '') {
	$curs_domain = array (
							 '1'	=> 'Arts & Humanities'
							,'2'	=> 'Expository Writing'
							,'3'	=> 'Natural Sciences'
							,'4'	=> 'Quantitative Reasoning'
							,'5'	=> 'Social Sciences'
							,'6'	=> 'Civilizational'
						);
	if(!empty($id)){
		return $curs_domain[$id];
	}else{
		return $curs_domain;
	}
}
// ORDERING
function get_ordering($dbName  = '') {
	if (!empty($dbName)) {
		require_once("include/dbsetting/lms_vars_config.php");
		require_once("include/dbsetting/classdbconection.php");
		$dblms = new dblms();
		$colName        = $dblms->querylms("SELECT COLUMN_NAME
											FROM INFORMATION_SCHEMA.COLUMNS
											WHERE TABLE_NAME = '".$dbName."'");
		$colName        = mysqli_fetch_array($colName)[0];

		$conOrdering = array ( 
								  'select'      => $colName
								, 'where'		=> array( 'id_campus' => cleanvars($_SESSION['userlogininfo']['LOGINCAMPUS']) )
								, 'order_by' 	=> ''.$colName.' DESC'
								, 'return_type' => 'single'
							); 
		$Ordering  = $dblms->getRows($dbName,$conOrdering);
		$number = (!empty($Ordering))?($Ordering[$colName]+1):1;
		return $number;
	} else {
		return false;
	}
}
function get_study_mode($id = '') {
	$modes= array (
						  '1' => 'Office'
						, '2' => 'Online'
						, '3' => 'Both'
					);
	return ((!empty($id))? $modes[$id]: $modes);
}
function moduleName($flag = true) {
	$fileName = strstr(basename($_SERVER['REQUEST_URI']), '.php', true);

	if ($flag) {
		return strtolower($fileName);
	} else {
		$fileName = str_replace('_',' ',$fileName);
		$fileName = str_replace('-',' ',$fileName);
		return ucwords(strtolower($fileName));
	}
}
//--------------- Employee Types ------------------
$emplytypes = array (
	array('id'=>1, 'name'=>'Teaching'), 
	array('id'=>2, 'name'=>'Non-Teaching')
);

function get_emplytypes($id = '') {
	$listemplytypes = array (
								'1' => 'Teaching', 
								'2' => 'Non-Teaching'
							);
	return ((!empty($id))? $listemplytypes[$id]: $listemplytypes);
}

//--------------- visiting ------------------
$visiting = array (
	array('id'=>1, 'name'=>'Permanent'), 
	array('id'=>2, 'name'=>'Visiting')
);
// COURSE RESOURCES
function get_CourseResources($id = '') {
	$CourseResources= array (
								 '1' 	=> 'Lecture Slides'
								,'2' 	=> 'Lesson Video'
								,'3' 	=> 'Google Drive Link'
								,'4' 	=> 'Web Links'
								,'5' 	=> 'General Downloads'
							);
	if(!empty($id)){
		$CourseResources= array (
									 '1' => '<span class="badge badge-soft-primary">Lecture Slides</span>'
									,'2' => '<span class="badge badge-soft-warning">Lesson Video</span>'
									,'3' => '<span class="badge badge-soft-info">Google Drive Link</span>'
									,'4' => '<span class="badge badge-soft-success">Web Links</span>'
									,'5' => '<span class="badge badge-soft-dark">General Downloads</span>'
								); 
		return $CourseResources[$id];
	}else{
		return $CourseResources;
	}
}
// OPEN WITH
$fileopenwith = array('Adobe Acrobat Reader', 'MS Excel', 'MS Paint', 'MS Powerpoint', 'MS Word', 'WinRAR', 'WinZip');

function formatSizeUnits($bytes) {
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
		$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	} else {
		$bytes = '0 bytes';
	}
return $bytes;
}

function get_visiting($id = '') {
	$lisvisiting = array (
							'1' => 'Permanent', 
							'2' => 'Visiting'
						);
	return ((!empty($id))? $lisvisiting[$id]: $lisvisiting);
}
function get_edulevel($id = '') {
	$listedulevel = array (
								'1' => 'Undergraduate'	, 
								'2' => 'Graduate'		,
								'3' => 'MS/M.Phil'		,
								'4' => 'Ph.D'		
							);
	return ((!empty($id))? $listedulevel[$id]: $listedulevel);
}
function get_bloodgroup($id = '') {
	$listbloodgroup = array (
								 'A+'	=> 'A+'
								,'A-'	=> 'A-'
								,'B+'	=> 'B+'
								,'B-'	=> 'B-'	
								,'O+'	=> 'O+'
								,'O-'	=> 'O-'
								,'AB+'	=> 'AB+'
								,'AB-'	=> 'AB-'		
							);
	return ((!empty($id))? $listbloodgroup[$id]: $listbloodgroup);
}
function get_religion($id = '') {
	$religion = array (
								 'Muslim'		=> 'Muslim'
								,'Christian'	=> 'Christian'
								,'Hindu'		=> 'Hindu'
								,'Sikh'			=> 'Sikh'
								,'Buddhist'		=> 'Buddhist'
								,'Jewish'		=> 'Jewish'
								,'Parsi'		=> 'Parsi'
								,'Other'		=> 'Other'
								,'Non-Mulsim'	=> 'Non-Mulsim'
							);
	return ((!empty($id))? $religion[$id]: $religion);
}
function get_LessonWeeks($id = '') {
	$week = array();
	for ($i=1;$i<=50;$i++):
		$week[$i] = 'Week: '.$i;
	endfor;
	return ((!empty($id))? $week[$id]: $week);
}
function get_LessonLectures($id = '') {
	$lectures = array();
	for ($i=1;$i<=30;$i++):
		$lectures[$i] = 'Lecture: '.$i;
	endfor;
	return ((!empty($id))? $lectures[$id]: $lectures);
}
function get_QnsLevel($id = '') {
	$religion = array 	(
							 '1'	=> 'Easy Level'
							,'2'	=> 'Medium Level'
							,'3'	=> 'High Level'
						);
	return ((!empty($id))? $religion[$id]: $religion);
}
function get_QnsType($id = '') {
	$religion = array 	(
							 '1'	=> 'Short Question'
							,'2'	=> 'Long Question'
							,'3'	=> 'Multiple Choice'
						);
	return ((!empty($id))? $religion[$id]: $religion);
}
function get_Referral($id = '') {
	$list_Referral= array (
										  '1' => 'Social Media Customer'
										, '2' => 'Amjid Ali'
										, '3' => 'Zahid Siddique'
										, '4' => 'Muhammad Usman Tariq'
										, '5' => 'Muhammad Zubair'
										, '6' => 'Khawaja Sheraz'
									);
	if(!empty($id)){
		$list_Referral= array (
										  '1' => '<span class="badge badge-soft-primary">Social Media Customer</span>' 
										, '2' => '<span class="badge badge-soft-info">Amjid Ali</span>'
										, '3' => '<span class="badge badge-soft-warning">Zahid Siddique</span>'
										, '4' => '<span class="badge badge-soft-danger">Muhammad Usman Tariq</span>'
										, '5' => '<span class="badge badge-soft-dark">Muhammad Zubair</span>'
										, '6' => '<span class="badge badge-soft-soft">Khawaja Sheraz</span>'
									); 
		return $list_Referral[$id];
	}else{
		return $list_Referral;
	}
}
function get_Marital($id = '') {
	$list_get_Marital= array (
										  '1' => 'Married'
										, '2' => 'Widowed'
										, '3' => 'Separated'
										, '4' => 'Divorced'
										, '5' => 'Single'
									);
	if(!empty($id)){
		$list_get_Marital= array (
										  '1' => '<span class="badge badge-soft-primary">Married</span>' 
										, '2' => '<span class="badge badge-soft-info">Widowed</span>'
										, '3' => '<span class="badge badge-soft-warning">Separated</span>'
										, '4' => '<span class="badge badge-soft-danger">Divorced</span>'
										, '5' => '<span class="badge badge-soft-dark">Single</span>'
									); 
		return $list_get_Marital[$id];
	}else{
		return $list_get_Marital;
	}
}
function get_IndustryType($id = '') {
	$list_IndustryType= array (
										  '1' => 'Government'
										, '2' => 'Private'
									);
	if(!empty($id)){
		$list_IndustryType= array (
										  '1' => '<span class="badge badge-soft-primary">Government</span>' 
										, '2' => '<span class="badge badge-soft-info">Private</span>'
									); 
		return $list_IndustryType[$id];
	}else{
		return $list_IndustryType;
	}
}
function get_Profession($id = '') {
	$list_Profession= array (
										  '1' => 'Self Employed'
										, '2' => 'Salaried'
										, '3' => 'Student'
										, '4' => 'Other'
									);
	if(!empty($id)){
		$list_Profession= array (
										  '1' => '<span class="badge badge-soft-primary">Self Employed</span>' 
										, '2' => '<span class="badge badge-soft-info">Salaried</span>'
										, '3' => '<span class="badge badge-soft-warning">Student</span>'
										, '4' => '<span class="badge badge-soft-danger">Other</span>'
									); 
		return $list_Profession[$id];
	}else{
		return $list_Profession;
	}
}
function get_ApplicantStages($id = '') {
	$list_Stages = array (
										  '1' => 'In Process'
										, '2' => 'Verification'
										, '3' => 'Secrunity'
										, '4' => 'Approval'
										, '5' => 'Sensaction'
										, '6' => 'Financing'
										, '7' => 'Disbursement'
										, '8' => 'Completed'
										, '9' => 'Rejected'
									);
	if(!empty($id)){
		return $list_Stages[$id];
	}else{
		return $list_Stages;
	}
}

function get_BankType($id = '') {
	$list_BankType= array (
										  '1' => 'Current'
										, '2' => 'Saving'
										, '3' => 'Money Market Account'
										, '4' => 'Certification of Deposit'
									);
	if(!empty($id)){
		$list_BankType= array (
										  '1' => '<span class="badge badge-soft-primary">Current</span>' 
										, '2' => '<span class="badge badge-soft-info">Saving/span>'
										, '3' => '<span class="badge badge-soft-warning">Money Market Account</span>'
										, '4' => '<span class="badge badge-soft-danger">Certification of Deposit</span>'
									); 
		return $list_BankType[$id];
	}else{
		return $list_BankType;
	}
}
function get_residencestatus($id = '') {
	$residencestatus = array (
		'1'	=> 'Resident',
		'2'	=> 'Non-Resident'
	);
	return (!empty($id))? $residencestatus[$id]: $residencestatus;
}
function get_TaxStatus($id = '') {
	$TaxStatus = array (
		'1'	=> 'Filer',
		'2'	=> 'Non-Filer',
		'3'	=> 'Facta',
		'4'	=> 'CRS',
		'5'	=> 'None'
	);
	return (!empty($id))? $TaxStatus[$id]: $TaxStatus;
}
function get_SourceofIncome($id = '') {
	$SourceofIncome = array (
		'1'	=> 'Self',
		'2'	=> 'Dependent'
	);
	return (!empty($id))? $SourceofIncome[$id]: $SourceofIncome;
}
function get_DomesticorForeign($id = '') {
	$DomesticorForeign = array (
		'1'	=> 'Foreign',
		'2'	=> 'Domestic',
		'3'	=> 'Neither'
	);
	return (!empty($id))? $DomesticorForeign[$id]: $DomesticorForeign;
}

function get_attendancestatus($id = '') {
	$liststatus= array (
						  '1' => 'Active' 
						, '2' => 'Inactive'
						, '3' => 'present'
						, '4' => 'missing'
						, '5' => 'day off'
						, '6' => 'officail duty'
						, '7' => 'leave'
						, '8' => 'travel'
						, '9' => 'relaxation'
						, '10' => 'absent'
						, '11' => 'early left'
						, '12' => 'late arrival'
						, '13' => 'short duration'
					   );
	if(!empty($id)){
		$liststatuslabel= array( '1' => '<span class="badge badge-soft-primary">Active</span>'
								,'2' => '<span class="badge badge-soft-warning">Inactive</span>'
								,'3' => '<span class="badge badge-soft-info">present</span>'
								,'4' => '<span class="badge badge-soft-danger">missing</span>'
								,'5' => '<span class="badge badge-soft-success">day off</span>'
								,'6' => '<span class="badge badge-soft-dark">officail duty</span>'
								,'7' => '<span class="badge badge-soft-secondary">leave</span>'
								,'8' => '<span class="badge badge-soft-info">travel</span>'
								,'9' => '<span class="badge badge-soft-success">relaxation</span>'
								,'10' => '<span class="badge badge-soft-danger">absent</span>'
								,'11' => '<span class="badge badge-soft-warning">early left</span>'
								,'12' => '<span class="badge badge-soft-danger">late arrival</span>'
								,'13' => '<span class="badge badge-soft-warning">short duration</span>'
								); 
		return $liststatuslabel[$id];
	}
	return $liststatus;
}
function get_emp($id = '') {
	$emp= array (
						  '1' => 'E1' 
						, '2' => 'E2'
					   );
	if(!empty($id)){
		$emplabel= array (
			'1' => '<span class="badge bg-success">E1</span>'		, 
			'2' => '<span class="badge bg-warning">E2</span>'	
		); 
		return $emplabel[$id];
	}
	return $emp;
}

function get_designation($id = '') {
	$desig= array (
						  '1' => 'Designation1' 
					   );
	if(!empty($id)){
		$desiglabel= array (
			'1' => '<span class="badge bg-success">Designation1</span>'		
		); 
		return $desiglabel[$id];
	}
	return $desig;
}
function get_shift($id = '') {
	$shift= array (
						  '1' => 'shift1'
					   );
	if(!empty($id)){
		$shiftlabel= array (
			'1' => '<span class="badge bg-success">shift1</span>'		
		); 
		return $shiftlabel[$id];
	}
	return $shift;
}
function get_Verificationdocumenttype($id = '') {
	$Verificationdocumenttype = array (
		'1'	=> 'CNIC',
		'2'	=> 'NICOP / POC',
		'3'	=> 'Passport'
	);
	return (!empty($id))? $Verificationdocumenttype[$id]: $Verificationdocumenttype;
}
function get_HrmEvents($id = '') {
	$HrmEvents = array (
		'1'	=> 'Dashboard',
		'2'	=> 'Employees',
		'3'	=> 'Pay List',
		'4'	=> 'Generate Pay',
		'5'	=> 'Attendance',
		'6'	=> 'Mark Attendance'
	);
	return (!empty($id))? $HrmEvents[$id]: $HrmEvents;
}
function get_logintype($id = '') {
	$listlogintypes = array (
								  '1'	=> 'headoffice'				
							);
	if(!empty($id)){
		return $listlogintypes[$id];
	}else{
		return $listlogintypes;
	}
}
function get_PaymentMode($id = '') {
	$PaymentMode = array (
		'1'	=> 'Bank',
		'2'	=> 'Cash'
	);
	return (!empty($id))? $PaymentMode[$id]: $PaymentMode;
}
function get_HeadType($id = '') {
	$HeadType= array (
						  '1' => 'Allowance' 
						, '2' => 'Deducation'
					   );
	if(!empty($id)){
		$HeadType= array (
									  '1' => '<span class="badge badge-soft-dark">Allowance</span>' 
									, '2' => '<span class="badge badge-soft-danger">Deducation</span>'
								); 
		return $HeadType[$id];
	}
	return $HeadType;
}
function get_Month($id = '') {
	$Month= array (
						  '1' 	=> 'January' 
						, '2' 	=> 'Feburary'
						, '3' 	=> 'March'
						, '4' 	=> 'April'
						, '5' 	=> 'May'
						, '6' 	=> 'June'
						, '7' 	=> 'July'
						, '8' 	=> 'August'
						, '9' 	=> 'September'
						, '10' 	=> 'October'
						, '11' 	=> 'November'
						, '12' 	=> 'December'
					   );
	if(!empty($id)){
		return $Month[$id];
	}
	return $Month;
}
?>