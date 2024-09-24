<?php 
require_once("../../../dbsetting/lms_vars_config.php");
require_once("../../../dbsetting/classdbconection.php");
require_once("../../../functions/functions.php");
$dblms = new dblms();
// EMPLOYEE ATTENDANCE
$condition = array(
                     'select'       =>  'ea.attendance_id,ea.id_emply,ea.id_dept,ea.yearmonth,ea.attendance,d.dept_id,d.dept_name'
                    ,'join'         =>  'LEFT JOIN '.DEPARTMENTS.' d ON d.dept_id = ea.id_dept'
                    ,'where'        =>  array(
                                                 'ea.is_deleted'        => 0
                                                ,'ea.attendance_id'     => cleanvars($_GET['attendance_id'])
                                            )
                    ,'return_type'  =>  'single'
);
$EMPLOYEE_ATTENDANCE     = $dblms->getRows(EMPLOYEE_ATTENDANCE.' ea', $condition);


echo'
<script src="assets/js/app.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        get_markAttendance('.$EMPLOYEE_ATTENDANCE['id_dept'].');   
    });
</script>
<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header bg-info p-3">
            <h5 class="modal-title" id="exampleModalLabel"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Attendance</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
        </div>
        <form action="employee_attendance.php" autocomplete="off" class="form-validate"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="attendance_id" value="'.cleanvars($_GET['attendance_id']).'"/>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="attendanceDate" id="attendanceDate" value="'.date('d M, Y',strtotime($EMPLOYEE_ATTENDANCE['yearmonth'])).'" readonly="">
                    </div>
                    <div class="col" id="attendance_Dept">
                        <label class="form-label">Department <span class="text-danger" id="errorMsg">*</span></label>
                        <input type="text" class="form-control" value="'.$EMPLOYEE_ATTENDANCE['dept_name'].'" readonly="">
                        <input type="hidden" name="id_dept" id="attendanceDept" value="'.$EMPLOYEE_ATTENDANCE['dept_id'].'">
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
                    <button type="submit" class="btn btn-info btn-sm" name="submit_edit"><i class="ri-edit-circle-line align-bottom me-1"></i>Edit Attendance</button>
                </div>
            </div>
        </form>
    </div>
</div>';
?>
<script>
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