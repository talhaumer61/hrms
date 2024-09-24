<?php
echo'
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/brand/logo.png" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="assets/images/brand/logo.png" alt="" height="40">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/brand/logo.png" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="assets/images/brand/logo.png" alt="" height="40">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                
                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="dashboard.php"><i class="bx bxs-dashboard"></i>Dashboard</a>
                </li>
                
                <!-- PROFILE -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="profile.php"><i class="bx bx-user"></i>Profile</a>
                </li>';
            // Self-Servies
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '10', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '11', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '12', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '13', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '14', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '15', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '16', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '17', 'view' => '1'))){
                echo'
                <!-- SELF SERVICES -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-profile-line"></i>Self Services</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '10', 'view' => '1'))){
                           echo 
                           '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>My Probation</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '14', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>My Leaves</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '12', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#S"><i class="bx bx-radio-circle"></i>Profile</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '13', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Roster</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '11', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Time Sheet</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '15', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Calendar</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '16', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Chart</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '17', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Payslips</a></li>';
                        }
                            echo'
                        </ul>
                    </div>
                </li>';
            }
            // Organization
            if( ($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '9', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '18', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '19', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '20', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '21', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '22', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '23', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '24', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '25', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '26', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '27', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '28', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '29', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '30', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '31', 'view' => '1')) ){
                echo'
                <!-- ORGANIZATION -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-buildings"></i>Organization</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '9', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href=""><i class="bx bx-radio-circle"></i>Org Chart</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '18', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="companies.php"><i class="bx bx-radio-circle"></i>Companies</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '19', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href=""><i class="bx bx-radio-circle"></i>Location</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '20', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="branches.php"><i class="bx bx-radio-circle"></i>Branches</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '21', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="departments.php"><i class="bx bx-radio-circle"></i>Departments</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '22', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="grades.php"><i class="bx bx-radio-circle"></i>Grades</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '23', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="designations.php"><i class="bx bx-radio-circle"></i>Designations</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '24', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="jobtitles.php"><i class="bx bx-radio-circle"></i>Job Title</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '25', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="groups.php"><i class="bx bx-radio-circle"></i>Groups</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '26', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="gradelevels.php"><i class="bx bx-radio-circle"></i>Grade Levels</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '27', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="skills.php"><i class="bx bx-radio-circle"></i>Skills</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '28', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="religions.php"><i class="bx bx-radio-circle"></i>Religions</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '29', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="relationships.php"><i class="bx bx-radio-circle"></i>Relation Ship</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '30', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="hotelbookings.php"><i class="bx bx-radio-circle"></i>Hotel Bookings</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '31', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="questionnaire_instrucations.php"><i class="bx bx-radio-circle"></i>Questionnaire Instrucations</a></li>';
                        }
                        echo'  
                        </ul>
                    </div>
                </li>';
            }
            // Employee
            if( ($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '32', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '33', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '34', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '35', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '36', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '37', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '38', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '39', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '40', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '41', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '42', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '43', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '44', 'view' => '1')) ){
                echo'
                <!-- EMPLOYEES -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-team-line"></i>Employee</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '32', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Company Employee</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '33', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Cretate Employee</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '34', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Employeements</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '35', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Addresses</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '36', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>My Checklist</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '37', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Assets</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '38', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Certifications</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '39', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Contacts</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '40', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Experiences</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '41', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Qualifications</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '42', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Relatives</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '43', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Banks</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '44', 'view' => '1'))){
                            echo 
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Salaries</a></li>';
                        }
                            echo'
                        </ul>
                    </div>
                </li>';
            }
            // ASSESSMENTS
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '83', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '84', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '85', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '86', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '87', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '88', 'view' => '1')) ){
                echo'
                <!-- ASSESSMENTS -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-file"></i>Assesment</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '83', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '84', 'view' => '1')) ){
                            echo'
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Probationers</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">';
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '83', 'view' => '1'))){
                                        echo
                                        '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Probation</a></li>';
                                    }
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '84', 'view' => '1'))){
                                        echo
                                        '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Evaluation</a></li>';
                                    }   
                                    echo'    
                                    </ul>
                                </div>
                            </li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '85', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '86', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '87', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '88', 'view' => '1')) ){
                            echo'
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">';
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '85', 'view' => '1'))){
                                        echo
                                        '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Configurations</a></li>';
                                    }
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '86', 'view' => '1'))){
                                        echo
                                        '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Evaluation Scales</a></li>';
                                    }   
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '87', 'view' => '1'))){
                                        echo
                                        '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>General Scales</a></li>';
                                    }
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '88', 'view' => '1'))){
                                        echo
                                        '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Professional Attributes</a></li>';
                                    }
                                    echo'    
                                    </ul>
                                </div>
                            </li>';
                        }
                            echo'
                        </ul>
                    </div>
                </li>';
            }
            // Roster
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '8', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '45', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '46', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '47', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '48', 'view' => '1')) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '49', 'view' => '1')) ){
                echo'
                <!-- ROSTER -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-file"></i>Roster</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '8', 'view' => '1'))){
                            echo
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>My Roster</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '45', 'view' => '1'))){
                            echo
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>My Subordinate Roster</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '46', 'view' => '1'))){
                            echo
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Company Roster</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '47', 'view' => '1'))){
                            echo
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Time Slots</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '48', 'view' => '1'))){
                            echo
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Rest Days</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '49', 'view' => '1'))){
                            echo
                            '<li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Holiday</a></li>';
                        }
                
                echo'    
                        </ul>
                    </div>
                </li>';
            }
                echo'
                <!-- TIME OFF -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-time"></i>Time Off</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Leave</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">                                        
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approvals</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Subordinate Leaves</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Company Leaves</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Cancel Approvals</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link menu-link collapsed"><i class="bx bx-radio-circle"></i>Balance Adjustments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Relaxation</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">                                        
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Requests</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approvals</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Company Relaxations</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Cancel Approvals</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                    </ul>
                                </div>
                            </li>                            
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">                                        
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Leave Types</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Configurations</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- EXPENSES -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-exchange-dollar-line"></i>Expenses</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">                        
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Requests</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Approvals</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Company Expenses</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Cancel Approvals</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Delegates</a></li>                         
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">                                        
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Types</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- ATTENDANCE -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-line-chart-line"></i>Attendance</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">                        
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>My Time Sheet</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Subordinate Time Sheet</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Company Time Sheet</a></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Overtime</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approvals</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="overtimes.php"><i class="bx bxs-chevrons-right"></i>Company Overtime</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Attendance Request</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="attendance_requests.php"><i class="bx bxs-chevrons-right"></i>Requests</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approvals</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Company Requests</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>WFH</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Requests</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approvals</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Company Requests</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Subordinate Requests</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Cancel Approvals</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="attendances.php"><i class="bx bx-radio-circle"></i>Attendance Logs</a></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Reports</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">                                        
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Daily Reports</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Attendance Calendar</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Attendance Summary</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Configurations</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Break Types</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- POLICY -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-file"></i>Policy</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Attendance Policy Planner</a></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Attendance Policies</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Absent</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Missing</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Late Arrival</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Early Left</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Short Duration</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Relaxation</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Leave</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Overtime</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>CPL</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>Request Policy Planner</a></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Request Policies</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Travel Policies</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Encashment Types</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Dedication Types</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- TRAVELS -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bxs-plane-take-off"></i>Travel</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Official Duty</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Request</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approval</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Company ODS</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Cancel Approval</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Travel</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Request</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approval</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Cancel Approval</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Company Travels</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Travel Modes</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Travel Types</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Stay Types</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- TRANSFER & PROMOTION -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-trending-up"></i>Transfer & Promotion</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Transfers</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approval</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Subordinate Transfers</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Compnay Transfers</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Cancel Approval</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Promotions</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Approval</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Subordinate Promotions</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Compnay Promotions</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Cancel Promotions</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Delegates</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- EOE SERVICES -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-user-unfollow-line"></i>EOE Services</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>End of Employements</a></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Reasons</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Checklist</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- QUESTIONNAIRE -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-question-line"></i>Questionnaire</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="questionnaires.php"><i class="bx bx-radio-circle"></i>Questionnaires</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="questionnaire_questions.php"><i class="bx bx-radio-circle"></i>Questionnaire Questions</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="questionnaires_type.php"><i class="bx bx-radio-circle"></i>Questionnaire Type</a></li>
                            <li class="nav-item">
                                <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-radio-circle"></i>Settings</a>
                                <div class="collapse menu-dropdown">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bxs-chevrons-right"></i>Questionnaires Instructions</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="questions.php"><i class="bx bxs-chevrons-right"></i>Questions</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="scale.php"><i class="bx bxs-chevrons-right"></i>Scale</a></li>
                                        <li class="nav-item"><a class="nav-link menu-link collapsed" href="questions_category.php"><i class="bx bxs-chevrons-right"></i>Questions Categories</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- ADVANCED CONFIGURATIONS -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-network-chart"></i>Advanced Configurations</a>
                </li>

                <!-- INTEGRATIONS -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bx-network-chart"></i>Integrations</a>
                </li>

                <!-- MASTER -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-settings-line"></i>Master</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>System Master</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="#"><i class="bx bx-radio-circle"></i>General Master</a></li>
                        </ul>
                    </div>
                </li>
                
                <!-- DOCUMENTS - MY DOCUMENTS -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="bx bxs-file-doc"></i>Documents - My Documents</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="document_type.php"><i class="ri-route-line"></i>Document Type</a></li>
                        </ul>
                    </div>
                </li>

                <!-- SETTINGS -->
                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" data-bs-toggle="collapse" role="button"><i class="ri-settings-5-line"></i>Settings</a>
                    <div class="collapse menu-dropdown">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="language.php"><i class="ri-route-line"></i>Language</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="area.php"><i class="ri-route-line"></i>Area</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="cities.php"><i class="ri-road-map-line"></i>Cities</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="countries.php"><i class="ri-globe-line"></i>Countries</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="currencies.php"><i class="ri-currency-line"></i>Currencies</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="location.php"><i class="ri-map-pin-line"></i>Location</a></li>
                            <li class="nav-item"><a class="nav-link menu-link collapsed" href="states.php"><i class="ri-pin-distance-line"></i>States</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>';
?>