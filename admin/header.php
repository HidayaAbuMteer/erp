<!DOCTYPE html>
<html lang="ar">
<?php
gsite();// (احضار اعدادات الموقع)من مكتبة قمح
gadmin();//احضار الادمن

?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <base href="http://localhost/erp/admin/">
    <meta name="_csrf" content="<?php echo $csrf->header(); ?>">

    <title><?php echo $site['siteName'] ?></title>
    <meta content="<?php echo $site['description'] ?>" name="description">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.rtl.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style-rtl.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        @font-face {
            font-family: "Cairo";
            src: url('assets/fonts/Cairo-Light.ttf');
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Cairo", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    <script src="../js/sweetalert2.all.min.js"></script>
</head>

<body dir="rtl">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="../files/<?php echo $site['logo']; ?>" alt="">
                <span class="d-none d-lg-block"><?php echo $site['siteName']; ?></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $admin['username'] ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">


                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-gear"></i>
                                <span>حسابي</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="auth/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>الخروج</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index">
                    <i class="bi bi-grid"></i>
                    <span>لوحة التحكم</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <!-- Start Settings Nav -->
            <li class="nav-item">
                <a class="nav-link" href="options">
                    <i class="bi bi-gear"></i>
                    <span>إعدادات النظام</span>
                </a>
            </li>
            <!-- End Settings Nav -->

            <li class="nav-heading">الأعضاء</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>الموظفين</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="employees">
                            <i class="bi bi-circle"></i><span>جميع الموظفين</span>
                        </a>
                    </li>
                    <li>
                        <a href="employees/new">
                            <i class="bi bi-circle"></i><span>إضافة موظف</span>
                        </a>
                    </li>
                    <li>
                        <a href="employees/search">
                            <i class="bi bi-circle"></i><span>بحث الموظفين</span>
                        </a>
                    </li>
                    <li>
                        <a href="employees/logs">
                            <i class="bi bi-circle"></i><span>سجلات الموظفين</span>
                        </a>
                    </li>
                    <li>
                        <a href="employees/reports">
                            <i class="bi bi-circle"></i><span>التقارير اليومية</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-heading">التحكم</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-pencil-square"></i><span>الإدارة</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="admin-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>طلبات الاجازات والمغادرات</span>
                        </a>
                    </li>
                    <li>
                        <a href="punish">
                            <i class="bi bi-circle"></i><span>اعطاء عقوبة لموظف</span>
                        </a>
                    </li>
                    <li>
                        <a href="degree">
                            <i class="bi bi-circle"></i><span>منح شهادة لموظف</span>
                        </a>
                    </li>
                    <li>
                        <a href="rewards">
                            <i class="bi bi-circle"></i><span>منح حافز لموظف</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>موظف الشهر</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>تكليف موظف بمهمة</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-heading">المراسلات العامة</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#contacts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-chat-heart"></i><span>المراسلات</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="contacts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="acontact">
                            <i class="bi bi-circle"></i><span>طلبات مراسلة الإدارة </span>
                        </a>
                    </li>
                   
                </ul>
            </li><!-- End Components Nav -->




        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">