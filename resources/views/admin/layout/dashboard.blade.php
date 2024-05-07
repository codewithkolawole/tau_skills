<!doctype html>
<html lang="en" data-layout="vertical" data-layout-style="default" data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-width="fluid"  data-preloader="disable">
<?php 
    $admin = Auth::guard('admin')->user();
    $name = $admin->name;
?>

<head>

    <meta charset="utf-8" />
    <title>Admin Dashboard | {{ env('APP_NAME') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ env('APP_NAME') }} Dashboard" name="description" />
    <meta content="olanrewaju kolawole(codewithkolawole)" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

    <!-- Layout config Js -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>

<body>
    @include('sweetalert::alert')
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="{{ env('WEBSITE_URL') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="200">
                                </span>
                            </a>

                            <a href="{{ env('WEBSITE_URL') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="200">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger shadow-none" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <i class='bx bx-bell fs-22'></i>
                                <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <span class="badge badge-soft-light fs-13"> 4 New</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab" aria-selected="false">
                                                    Messages
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="tab-content position-relative" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                        <div data-simplebar style="max-height: 300px;" class="pe-2">

                                            <a href="#"> 
                                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                    <div class="d-flex">
                                                        <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                        <div class="flex-1">
                                                            <a href="#!" class="stretched-link">
                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kolawole</h6>
                                                            </a>
                                                            <div class="fs-13 text-muted">
                                                                <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                                    graph 🔔.</p>
                                                            </div>
                                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                            <div class="my-3 text-center view-all">
                                                <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                                    All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/user-dummy-img.jpg')}}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ $admin->name }}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ $admin->role }}</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ $admin->name }}!</h6>
                                <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                                <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                                <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-soft-success text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="{{ url('/admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">@csrf</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{url('admin/home')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="200">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{ url('admin/home') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ !empty($pageGlobalData->setting) ? asset($pageGlobalData->setting->logo) : null }}" alt="" width="200">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ url('/admin/home') }}">
                                <i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-admin">Administrator Settings</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#admin" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                                <i class="mdi mdi-account-box-multiple"></i> <span data-key="t-forms">Admins</span>
                            </a>
                            <div class="collapse menu-dropdown" id="admin">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ url('admin/admins') }}" data-key="t-profile">Admins</a>
                                    </li>   
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-communications">Communications</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#communications" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                                <i class="mdi mdi-broadcast"></i> <span data-key="t-communications">Communications</span>
                            </a>
                            <div class="collapse menu-dropdown" id="communications">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ url('admin/messageStudent') }}" data-key="t-profile">Message Student/Parent</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ url('admin/messageAllStudent') }}" data-key="t-profile">Message All Student</a>
                                    </li> 

                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{ url('admin/messageAllParent') }}" data-key="t-profile">Message All Parent</a>
                                    </li> 
                                </ul>
        
                            </div>
                        </li>
                       
                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-portal">Portal Settings</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#appSetting" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="mdi mdi-application-settings"></i> <span data-key="t-portal">General App Setting</span>
                            </a>
                            <div class="collapse menu-dropdown" id="appSetting">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{url('/admin/setting')}}" class="nav-link" data-key="t-calendar">App Settings </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/admin/sessionSetup')}}" class="nav-link" data-key="t-calendar">Academic Session Setup </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/courseRegMgt') }}" class="nav-link">Course Reg. Mgt</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/examDocketMgt') }}" class="nav-link">Exam Docket Mgt</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/admin/programmeCategory')}}" class="nav-link" data-key="t-chat">Programme Category </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/admin/academicLevel')}}" class="nav-link" data-key="t-chat">Academic Levels </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/admin/approvalLevel')}}" class="nav-link" data-key="t-chat">Memo Approval Levels </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('/admin/resultApprovalStatus')}}" class="nav-link" data-key="t-chat">Result Approval Status </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-admission">Admission</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#admission" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="admission">
                                <i class="mdi mdi-account-box-multiple"></i> <span data-key="t-admission">Admission</span>
                            </a>
                            <div class="collapse menu-dropdown" id="admission">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/applicants') }}" class="nav-link">Applicants</a>
                                    </li>
            
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/students') }}" class="nav-link">Students</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ url('/admin/matriculants') }}" class="nav-link">Matriculating List</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Bursary Menu -->


                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-academics">Academics</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#academicSettings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="academicSettings">
                                <i class="mdi mdi-view-carousel-outline"></i> <span data-key="t-academics">Academics</span>
                            </a>
                            <div class="collapse menu-dropdown" id="academicSettings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/faculties') }}" class="nav-link">Faculties</a>
                                    </li>
                                    @if(env('POPULATE_DATA'))
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/populateFaculty') }}" class="nav-link">Populate Faculty</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-courses">Course Management</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#courseMgt" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="courseMgt">
                                <i class="mdi mdi-bookshelf"></i> <span data-key="t-courses">Course Management</span>
                            </a>
                            <div class="collapse menu-dropdown" id="courseMgt">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/departmentForCourses') }}" class="nav-link">All Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/studentCourses') }}" class="nav-link">Student Courses</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('/admin/courseAllocation') }}" class="nav-link">Course-to-Staff Allocation</a>
                                    </li> --}}
                                    @if(env('POPULATE_DATA'))
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/populateCourse') }}" class="nav-link">Populate Course</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-result">Result Management</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#resultMgt" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="resultMgt">
                                <i class="mdi mdi-credit-card-search-outline"></i> <span data-key="t-result">Result Management</span>
                            </a>
                            <div class="collapse menu-dropdown" id="resultMgt">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/getStudentResults') }}" class="nav-link">Students Results</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-student">Student Management</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#studentMgt" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="studentMgt">
                                <i class="mdi mdi-account-tie"></i> <span data-key="t-student">Students</span>
                            </a>
                            <div class="collapse menu-dropdown" id="studentMgt">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/campusCapacity') }}" class="nav-link">Campus Capacity</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/allStudents') }}" class="nav-link">All Student</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/massPromotion') }}" class="nav-link">Promote Student</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/changeProgramme') }}" class="nav-link">Change Programme</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/studentResult') }}" class="nav-link">Student Result</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/demoteStudent') }}" class="nav-link">Demote Student</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/demoteStudentRecord') }}" class="nav-link">Demoted Student Record</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/courseRegistrations') }}" class="nav-link">Course Registrations</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-student">Student Care</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#studentCare" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="studentCare">
                                <i class="mdi mdi-account-heart"></i> <span data-key="t-student">Student Care</span> <span class="badge badge-pill bg-danger" data-key="t-hot">{{ !empty($pageGlobalData->exitApplicationCount) ? $pageGlobalData->exitApplicationCount : 0 }}</span>
                            </a>
                            <div class="collapse menu-dropdown" id="studentCare">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/studentExits') }}" class="nav-link">Student Exit <span class="badge badge-pill bg-danger" data-key="t-hot">{{ !empty($pageGlobalData->exitApplicationCount) ? $pageGlobalData->exitApplicationCount : 0 }}</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/studentHostelMgt') }}" class="nav-link">Student Hostel Mgt</a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-staff">Staff Management</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#staffMgt" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="staffMgt">
                                <i class="mdi mdi-account-supervisor-circle-outline"></i> <span data-key="t-staff">Staff Management</span>
                            </a>
                            <div class="collapse menu-dropdown" id="staffMgt">
                                <ul class="nav nav-sm flex-column">
                                    @if(env('POPULATE_DATA'))
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/populateStaff') }}" class="nav-link">Populate Staff</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="#staffApplicants" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Staff Applicants (Coming Soon)
                                        </a>
                                        <div class="collapse menu-dropdown" id="staffApplicants">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="#l" class="nav-link" data-key="t-basic"> Staff Applications(coming soon) </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link" data-key="t-cover"> Role Applications(coming soon) </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#staffs" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="staffs" data-key="t-staffs"> Staff
                                        </a>
                                        <div class="collapse menu-dropdown" id="staffs">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="{{ url('/admin/staff') }}" class="nav-link" data-key="t-basic"> All Staff </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{('/admin/staffRoles')}}" class="nav-link" data-key="t-cover"> Staff Roles </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-Partner">Partners(Marketers)</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#Partner" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Partner">
                                <i class="mdi mdi-account-network"></i> <span data-key="t-Partner">Partner Management</span>
                            </a>
                            <div class="collapse menu-dropdown" id="Partner">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/partners') }}" class="nav-link"> Partners </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{('/admin/partnerApproval')}}" class="nav-link"> Partner Approval </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{('/admin/partnerWithdrawal')}}" class="nav-link">Partner Profit Withdrawal </a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Partner Menu -->


                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-bursary">Bursary</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#bursary" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="bursary">
                                <i class="mdi mdi-bank-transfer"></i> <span data-key="t-bursary">Bursary</span>
                            </a>
                            <div class="collapse menu-dropdown" id="bursary">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('/admin/payments') }}" class="nav-link"> Bills </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{('/admin/transactions')}}" class="nav-link"> Transactions </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{('/admin/chargeStudent')}}" class="nav-link">Payment/Charge </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{('/admin/transactionReport')}}" class="nav-link"> Transaction Report </a>
                                    </li>
                                </ul>
                            </div>
                        </li> <!-- end Bursary Menu -->


                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages"></span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-power"></i> <span data-key="t-logout">Logout</span>
                            </a>
                        </li> <!-- end Logout Menu -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <h4 class="fs-16 mb-1"><span id="greeting">Hello</span>, {{ $name }}!</h4>
                   @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © {{ env('APP_NAME') }}.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by TAU ICT
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    {{-- <script src="{{asset('assets/js/plugins.js')}}"></script> --}}
    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <!-- App js -->
    <script src="{{asset('assets/js/app.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function handleFacultyChange(event) {
        const selectedFaculty = event.target.value;
        const departmentSelect = $('#department');

        if(selectedFaculty != ''){
            axios.get("{{ url('/admin/getDepartments') }}/"+selectedFaculty)
            .then(function (response) {
                departmentSelect.empty().append($('<option>', {
                    value: '',
                    text: '--Select--'
                }));
                $.each(response.data, function (index, department) {
                    departmentSelect.append($('<option>', {
                        value: department.id,
                        text: department.name
                    }));
                });
            })
            .catch(function (error) {
                console.error("Error fetching departments:", error);
            });
        }else{
            
        }
    }

    function handleDepartmentChange(event) {
        const selectedDepartment = event.target.value;
        const programmeSelect = $('#programme');

        if(selectedDepartment != ''){
            axios.get("{{ url('/admin/getProgrammes') }}/"+selectedDepartment)
            .then(function (response) {

                programmeSelect.empty().append($('<option>', {
                    value: '',
                    text: '--Select--'
                }));
                $.each(response.data, function (index, programme) {
                    programmeSelect.append($('<option>', {
                        value: programme.id,
                        text: programme.name
                    }));
                });
            })
            .catch(function (error) {
                console.error("Error fetching departments:", error);
            });
        }else{
            
        }
    }
</script>
<script>
    // Get the current time
    var currentTime = new Date();
    var currentHour = currentTime.getHours();

    // Define the greeting messages
    var morningGreeting = "Good morning";
    var afternoonGreeting = "Good afternoon";
    var eveningGreeting = "Good evening";

    // Get the DOM element to display the greeting
    var greetingElement = document.getElementById("greeting");

    // Determine the appropriate greeting based on the time of day
    var greeting;
    if (currentHour >= 0 && currentHour < 12) {
        greeting = morningGreeting;
    } else if (currentHour >= 12 && currentHour < 18) {
        greeting = afternoonGreeting;
    } else {
        greeting = eveningGreeting;
    }

    // Display the greeting
    greetingElement.innerHTML = greeting;
</script>
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#selectWithSearch').select2();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#buttons-datatables1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#buttons-datatables2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#buttons-datatables3').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#buttons-datatables4').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#buttons-datatables5').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#buttons-datatables6').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#buttons-datatables7').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<script>
    $(document).ready(function() {
      $("#submit-button").click(function() {
        // Disable the button
        $(this.form).submit();

        $(this).prop("disabled", true);
    
        // Remove the text
        $(this).text("");
    
        // Replace the text with a spinner
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
      });
    });
</script>
</body>

</html>