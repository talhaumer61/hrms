<?php 
$dblms = new dblms();
$condition = array(
                     'select'       =>  'adm_id,adm_fullname,adm_username,adm_email,adm_phone,adm_userpass,adm_type,adm_status'
                    ,'where'        =>  array(
                                                 'is_deleted'          => 0
                                                ,'adm_id'         => cleanvars($_GET['id'])
                                            )
                    ,'return_type'  =>  'single'
);
$row = $dblms->getRows(ADMINS, $condition);
$condition = array(
    'select'       =>  'role_id,role_name,role_type,id_type'
   ,'where'        =>  array(
                               'is_deleted'  => 0
                           )
    ,'search_by'    => " group by role_type"
);
$get_role     = $dblms->getRows(ROLES, $condition);
echo'
<script src="assets/js/app.js"></script>

<div class="modal-content">
    <div class="modal-header bg-info p-3">
        <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit '.moduleName(false).'</h5>
    </div>
    <form action="" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" name="adm_id" value="'.cleanvars($_GET['id']).'"/>
        <div class="modal-body">
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Full Name<span class="text-danger">*</span></label>
                    <input type="text" name="adm_fullname" class="form-control" value="'.$row['adm_fullname'].'" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label" >Username<span class="text-danger">*</span><span class="text-danger" id="addhere"></span></label>
                    <input type="text" name="adm_username" id="adm_username" value="'.$row['adm_username'].'" class="form-control" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Email<span class="text-danger">*</span><span class="text-danger" id="addhere2"></span></label>
                    <input type="text" name="adm_email" id="adm_email" value="'.$row['adm_email'].'" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Phone<span class="text-danger">*</span></label>
                    <input type="text" name="adm_phone" value="'.$row['adm_phone'].'" class="form-control" required="" />
                </div>
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label class="form-label">Password<span class="text-danger">*</span></label>
                    <input type="text" name="adm_userpass" value="'.$row['adm_userpass'].'" class="form-control" required="" />
                </div>
                <div class="col mb-2">
                    <label class="form-label">Type<span class="text-danger">*</span></label>
                        <select class="form-control" data-choices name="adm_type" required="">
                            <option value=""> Choose one</option>';
                            foreach(get_admtypes() as $key => $status):
                                echo'<option value="'.$key.'" '.($row['adm_type']==$key?"selected":"").'>'.$status.'</option>';
                            endforeach;
                            echo'
                        </select>
                </div>
                <div class="col mb-2">
                    <label class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-control" data-choices name="adm_status" required="">
                        <option value=""> Choose one</option>';
                        foreach(get_status() as $key => $status):
                            echo'<option value="'.$key.'" '.($row['adm_status']==$key?"selected":"").'>'.$status.'</option>';
                        endforeach;
                        echo'
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="d-flex">    
                        <input class="form-check-input code-switcher slave-checkbox main" type="checkbox" id="selectAll">
                        <label for="default" class="form-label px-1">Select All</label>
                    </div>
                </div>
            </div>    ';
            $condPer = array(
                'select'       =>  'added,updated,deleted,view'
                ,'where'        =>  array(
                                             'id_adm'              => cleanvars($_GET['id'])
                                        )
                ,'return_type'  =>  'single'
            );
            $uniIndex = 0;
            foreach ($get_role as $key => $value) {
                
                $condition = array(
                    'select'       =>  'role_name,role_id'
                   ,'where'        =>  array(
                                                'is_deleted'               => 0
                                               ,'role_type'                => cleanvars($value['role_type'])
                                           )
                   ,'return_type'  =>  'all'
                );
                $row = $dblms->getRows(ROLES, $condition);

                $condPer['where']['right_type'] = cleanvars($value['role_type']);
                $condPer['return_type'] = 'count';
                $roleCount = $dblms->getRows(ADMIN_ROLES, $condPer);
            echo '<div class="card my-4 all">
                    <div class="card-header alert-dark d-flex">
                        <input class="form-check-input code-switcher master-checkbox type" type="checkbox" id="default-'.$key.'" '.(($roleCount)? 'checked': '').' >
                        <label for="default" class="form-label mx-2">'.get_roletypes($value['role_type']).'</label>
                    </div>
                    <div class="card-body border">
                        <div class="row">';
                        foreach ($row as $inkey => $invalue){
                            $condPer['return_type'] = 'single';
                            $condPer['where']['right_name'] = cleanvars($invalue['role_id']);
                            $role = $dblms->getRows(ADMIN_ROLES, $condPer);
                            $uniIndex++;
                                echo'
                                <div class="col">
                                    <div class="d-flex">    
                                        <input class="form-check-input code-switcher slave-checkbox main checkSection-'.$key.'" '.((($role['added']==1) || ($role['updated']==1) || ($role['deleted']==1) || ($role['view']==1))? 'checked': '').'  type="checkbox" id="indefault-'.$key.$inkey.'">
                                        <label for="default" name="" class="form-label mx-2">'.$invalue['role_name'].'</label>
                                        <input type="hidden" name="right_name[]" value="'.$invalue['role_id'].'">
                                        <input type="hidden" name="right_type[]" value="'.$value['role_type'].'">
                                    </div>
                                    <div class="col-3 mb-2 d-flex  ">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input checkSection-'.$key.' incheckSection-'.$key.$inkey.'" '.(($role['added']==1)? 'checked': '').'  name="added['.$uniIndex.']" type="checkbox" value="1">
                                            <label class="form-check-label mx-1"  for="formCheck1"> Add</label>
                                        </div>
                                        <div class="form-check mb-2 mx-1">
                                            <input class="form-check-input checkSection-'.$key.' incheckSection-'.$key.$inkey.'" '.(($role['updated']==1)? 'checked': '').' name="updated['.$uniIndex.']" type="checkbox" value="1">
                                            <label class="form-check-label mx-1"  for="formCheck1">Edit</label>
                                        </div>
                                        <div class="form-check mb-2 mx-1">
                                            <input class="form-check-input checkSection-'.$key.' incheckSection-'.$key.$inkey.'" '.(($role['deleted']==1)? 'checked': '').' name="deleted['.$uniIndex.']" type="checkbox" value="1">
                                            <label class="form-check-label mx-1"  for="formCheck1">Delete</label>
                                        </div>
                                        <div class="form-check mb-2 mx-1">
                                            <input class="form-check-input checkSection-'.$key.' incheckSection-'.$key.$inkey.'" '.(($role['view']==1)? 'checked': '').' name="view['.$uniIndex.']"  type="checkbox" value="1">
                                            <label class="form-check-label mx-1"  for="formCheck1"> View </label>
                                        </div>
                                    </div>
                                </div>
                                    <script>
                                            $("#indefault-'.$key.$inkey.'").on("click",function(){
                                                    $(".incheckSection-'.$key.$inkey.'").prop("checked", this.checked);
                                            });
                                            $("#default-'.$key.'").on("click",function(){
                                                $(".checkSection-'.$key.'").prop("checked", this.checked);
                                                
                                            });
                                            
                                    </script>
                                    ';
                                    unset($condPer['where']['right_name']);
                            }
                    echo'
                        </div>
                    </div>
                </div>';           
            }
        echo '</div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a href="'.moduleName().'.php" class="btn btn-danger btn-sm"><i class="ri-close-circle-line align-bottom me-1"></i>Close</a>
                <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit</button>
            </div>
        </div>
    </form>
</div>';
echo'
<script>
    $(document).ready(function () {
        // When a checkbox with class "type" is checked, check all checkboxes with class "main" in the same section
        $("#selectAll").on("click", function () {
            $(".all").find(":checkbox").prop("checked", this.checked);
        });
        $("#adm_username").keyup(function () {
            $.ajax({
                url: "include/ajax/admin_check.php", 
                type: "GET",
                data : {username : this.value},
                success: function(response) {
                    // Update the response div with the result
                    $("#addhere").html(response);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status, error);
                }
            });
        });
        $("#adm_email").keyup(function () {
            $.ajax({
                url: "include/ajax/admin_check.php", 
                type: "GET",
                data : {email : this.value},
                success: function(response) {
                    // Update the response div with the result
                    $("#addhere2").html(response);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + status, error);
                }
            });
        });
    });
</script>
';

?>