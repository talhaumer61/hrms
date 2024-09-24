<?php
include "../../../dbsetting/lms_vars_config.php";
include "../../../dbsetting/classdbconection.php";
include "../../../functions/functions.php";
$dblms = new dblms();

$condition = array(
                     'select'       =>  'dept_id,dept_name'
                    ,'where'        =>  array(
                                                'is_deleted'  => 0
                                            )
                    ,'order_by'     =>  'dept_id ASC'
                    ,'return_type'  =>  'all'
);
$DEPARTMENTS     = $dblms->getRows(DEPARTMENTS, $condition);

echo'
<script src="assets/js/app.js"></script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-primary p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-add-circle-line align-bottom me-1"></i>Mark Attendance</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="employee_attendance.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="attendanceDate" id="attendanceDate" data-provider="flatpickr" data-date-format="d M, Y">
                    </div>
                    <div class="col" id="attendance_Dept">
                        <label class="form-label">Department <span class="text-danger" id="errorMsg">*</span></label>
                        <select class="form-control" data-choices name="id_dept" onchange="get_markAttendance(this.value);" required="">
                            <option value=""> Choose one</option>';
                            foreach($DEPARTMENTS as $key => $val):
                                echo'<option value="'.$val['dept_id'].'">'.$val['dept_name'].'</option>';
                            endforeach;
                            echo'
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <div id="emply_Data"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="ri-close-circle-line align-bottom me-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" name="submit_add"><i class="ri-add-circle-line align-bottom me-1"></i>Mark Attendance</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>
<script>
    var attendanceDate = $("#attendanceDate");
    var errorMsg = $("#errorMsg");
    function get_markAttendance(attendanceDept){
        if (attendanceDate.val() != '') {
            errorMsg.html("*");
            $.ajax({
                type: "POST",
                url: "include/ajax/get_employee_attendance.php",
                data: {
                    "attendanceDept" : attendanceDept,
                    "attendanceDate" : attendanceDate.val()
                },
                success: function (response) {
                    console.log(response);
                    $("#emply_Data").html(response);
                    
                }
            });
        } else {
            errorMsg.html("* Please Select Date First");
        }
    }
</script>