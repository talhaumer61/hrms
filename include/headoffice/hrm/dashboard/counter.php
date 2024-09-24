<?php
echo'

<!-- Short Cuts -->
<div class="row mb-2">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="step-arrow-nav">
                    <ul class="nav nav-pills custom-nav nav-justified bg-white" role="tablist">';
                        foreach(get_HrmEvents() as $key => $val):
                            echo '
                            <li class="nav-item me-1 mb-1 mt-1" role="presentation">
                                <button class="nav-link bg-soft-info"><h4 class="mb-sm-0">'.$val.'</h4></button>
                            </li>';
                        endforeach;
                        echo '
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Counter -->
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h2 class="font-weight-normal text-primary" data-plugin="counterup">11</h2>
                    <h5>Total Employees</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h2 class="font-weight-normal text-primary" id="time">5:14:49 PM</h2>
                    <h5>'.date('d-M-Y, D').'</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report -->
<div class="row mb-3">
    <!-- Monthly Attendance Report -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="card-box">
                    <h4 class="header-title mb-3 mt-0">
                        Monthly Attendance Report of '.date('Y').'
                    </h4>
                    <canvas id="monthlyAttendanceReportOfCurrentYear" data-url="/monthly-attendance-report-of-current-year/" style="display: block; box-sizing: border-box; height: 397px; width: 794px;" width="794" height="397"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Year Attendance Report -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="card-box">
                    <h4 class="header-title mb-3 mt-0">
                        Attendance Report of Past 5 YEARS
                    </h4>
                    <canvas id="monthlyAttendanceReportOfCurrentYear" data-url="/monthly-attendance-report-of-current-year/" style="display: block; box-sizing: border-box; height: 397px; width: 794px;" width="794" height="397"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report -->
<div class="row mb-3">
    <!-- Attendance Report -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="card-box">
                    <h4 class="header-title mb-3 mt-0">
                        Monthly Attendance Report of 2023
                    </h4>
                    <canvas id="monthlyAttendanceReportOfCurrentYear" data-url="/monthly-attendance-report-of-current-year/" style="display: block; box-sizing: border-box; height: 397px; width: 794px;" width="794" height="397"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Employees by Gender -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-box">
                    <h4 class="header-title mb-3 mt-0">
                        Attendance Report of Past 5 YEARS
                    </h4>
                    <canvas id="monthlyAttendanceReportOfCurrentYear" data-url="/monthly-attendance-report-of-current-year/" style="display: block; box-sizing: border-box; height: 397px; width: 794px;" width="794" height="397"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report -->
<div class="row mb-3">
    <!-- Monthly Attendance Report -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="card-box">
                    <h4 class="header-title mb-3 mt-0">
                        Employees Count By Departments
                    </h4>
                    <canvas id="monthlyAttendanceReportOfCurrentYear" data-url="/monthly-attendance-report-of-current-year/" style="display: block; box-sizing: border-box; height: 397px; width: 794px;" width="794" height="397"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Year Attendance Report -->
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="card-box">
                    <h4 class="header-title mb-3 mt-0">
                        Employees List
                    </h4>
                    <canvas id="monthlyAttendanceReportOfCurrentYear" data-url="/monthly-attendance-report-of-current-year/" style="display: block; box-sizing: border-box; height: 397px; width: 794px;" width="794" height="397"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>';
?>