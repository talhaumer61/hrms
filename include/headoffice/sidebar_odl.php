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
                <li class="nav-item">
                    <a class="nav-link menu-link" href="dashboard.php">
                        <i class="bx bxs-dashboard"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>';
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '1', 'view' => '1'))){
                echo'
                <li class="nav-item">
                    <a class="nav-link menu-link" href="skills.php">
                        <i class="bx bx-buildings"></i> <span data-key="t-skills">Skills</span>
                    </a>
                </li>';
            }
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '2', 'view' => '1'))){
                echo'
                <li class="nav-item">
                    <a class="nav-link menu-link" href="faculties.php">
                        <i class="bx bx-buildings"></i> <span data-key="t-dashboards">Faculties</span>
                    </a>
                </li>';
            }
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '3', 'view' => '1'))){
                echo'
                <li class="nav-item">
                    <a class="nav-link menu-link" href="departments.php">
                        <i class="bx bx-buildings"></i> <span data-key="t-departments">Departments</span>
                    </a>
                </li>';
            }

            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '4', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '5', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '6', 'view' => '1'))){
                echo'
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProgram" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProgram">
                        <i class="bx bx-layer"></i> <span data-key="t-program">Program</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProgram">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '4', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="program_categories.php" class="nav-link" data-key="t-programcategories">Categories</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '5', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="programs.php" class="nav-link" data-key="t-programs"> Programs</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '6', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="admission_programs.php" class="nav-link" data-key="t-admissionprograms">Admissions</a></li>';
                        }
                        echo'
                        </ul>
                    </div>
                </li>';
            }
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '7', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '8', 'view' => '1'))){
                echo'
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCourse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCourse">
                        <i class="bx bx-layer"></i> <span data-key="t-course">Course</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCourse">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '7', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="course_categories.php" class="nav-link" data-key="t-coursecategories"> Categories</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '8', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="courses.php" class="nav-link" data-key="t-courses"> Courses</a></li>';
                        }
                        echo'
                        </ul>
                    </div>
                </li>';
            }
            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '9', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '10', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '11', 'view' => '1'))){
                echo'
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarEmployees" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarEmployees">
                        <i class="bx bx-user-circle"></i> <span data-key="t-employees">Employees</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarEmployees">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '9', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="designations.php" class="nav-link" data-key="t-designations"> Designations</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '10', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="employees.php" class="nav-link" data-key="t-employees">Employees</a></li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '11', 'view' => '1'))){
                            echo'
                            <li class="nav-item"><a href="teacherlogin.php" class="nav-link" data-key="t-teacherlogin"> Teacher Login</a></li>';
                        }
                        echo'
                        </ul>
                    </div>
                </li>';
            }

            if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '12', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '13', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '14', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '15', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '16', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '17', 'view' => '1'))){
                echo'
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarSettings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSettings">
                        <i class="bx bx-share-alt"></i> <span data-key="t-settings">Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarSettings">
                        <ul class="nav nav-sm flex-column">';
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '12', 'view' => '1'))){
                            echo'
                            <li class="nav-item">
                                <a href="currencies.php" class="nav-link" data-key="t-currencies"> Currencies </a>
                            </li>';
                        }
                        if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '13', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '14', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '15', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '16', 'view' => '1'))|| Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '17', 'view' => '1'))){
                            echo'
                            <li class="nav-item">
                                <a href="#sidebarArea" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarArea" data-key="t-asetting"> Area
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarArea">
                                    <ul class="nav nav-sm flex-column">';
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '13', 'view' => '1'))){
                                        echo'
                                        <li class="nav-item">
                                            <a href="regions.php" class="nav-link" data-key="t-regions">Regions</a>
                                        </li>';
                                    }
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '14', 'view' => '1'))){
                                        echo'
                                        <li class="nav-item">
                                            <a href="countries.php" class="nav-link" data-key="t-countries">Countries</a>
                                        </li>';
                                    }
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '15', 'view' => '1'))){
                                        echo'
                                        <li class="nav-item">
                                            <a href="states.php" class="nav-link" data-key="t-states">States</a>
                                        </li>';
                                    }
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '16', 'view' => '1'))){
                                        echo'
                                        <li class="nav-item">
                                            <a href="substates.php" class="nav-link" data-key="t-substates">Sub States</a>
                                        </li>';
                                    }
                                    if(($_SESSION['userlogininfo']['LOGINTYPE']  == 1) || Stdlib_Array::multiSearch($_SESSION['userroles'], array('right_name' => '17', 'view' => '1'))){
                                        echo'
                                        <li class="nav-item">
                                            <a href="cities.php" class="nav-link" data-key="t-cities">Cities</a>
                                        </li>';
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
            echo'
            </ul>
        </div>
    </div>
</div>';
?>