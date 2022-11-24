<!doctype html>
<html class="no-js" lang="">

<?php include 'includes/header.php' ?>
<style>
    .bg-success {
        background-color: rgb(120, 187, 123);
    }

    .bg-danger {
        background-color: rgb(227, 171, 154);
    }
</style>
<!-- Data Table JS============================================ -->
<link rel="stylesheet" href="../css/jquery.dataTables.min.css">

<body>
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="../img/logo/logo.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->

    <!-- Main Menu area start-->
    <!-- <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a data-toggle="tab" href="#Home"><i class="fa fa-home"></i> Home</a>
                        </li>
                         <li><a data-toggle="tab" href="#student"><i class="fa fa-graduation-cap"></i> Student</a>
                        </li>
                        <li><a data-toggle="tab" href="#department"><i class="fa fa-building"></i> Department</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#faculty"><i class="fa fa-users"></i> Faculty</a>
                        </li>
                       
                        <li><a data-toggle="tab" href="#face"><i class="fa fa-user-plus"></i> Face Enrollment </a>
                        </li>
                        <li><a data-toggle="tab" href="#report"><i class="fa fa-bar-chart"></i> Reports</a>
                        </li>
                        <li><a data-toggle="tab" href="#account"><i class="fa fa-user-secret"></i> Account</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        <div id="department" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="add-department.php">Add Department</a>
                                </li>
                                <li><a href="manage-department.php">Manage Department</a>
                                </li>
                            </ul>
                        </div>
                        <div id="event" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="add-event.php">Add Event</a>
                                </li>
                                <li><a href="manage-event.php">Manage Event</a>
                                </li>
                            </ul>
                        </div>
                        <div id="faculty" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="add-faculty.php">Add Faculty</a>
                                </li>
                                <li><a href="manage-faculty.php">Manage Faculty</a>
                                </li>
                                </li>
                            </ul>
                        </div>
                        <div id="student" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="add-student.php">Add Student</a>
                                </li>
                                <li><a href="manage-student.php">Manage Student</a>
                                </li>
                            </ul>
                        </div>
                        <div id="face" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="enroll.php">Enroll Face</a>
                                </li>
                            </ul>
                        </div>
                        <div id="report" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="reports.php">Attendance Report</a>
                                </li>
                            </ul>
                        </div>
                        <div id="account" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                                <li><a href="profile.php">Profile</a>
                                </li>
                                <li><a href="#">Account</a>
                                </li>
                                <li><a href="../">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php include('menu.php') ?>
    <!-- Main Menu area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2><i class="fa fa-users"></i> Faculty Lists</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Account Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>FCLTY-234-21</td>
                                        <td>Gloria Little</td>
                                        <td>Nursing</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-334-21</td>
                                        <td>Jennifer Chang</td>
                                        <td>Entrepreneurship</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-967-21</td>
                                        <td>Gavin Joyce</td>
                                        <td>Engineering</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-danger">inactive</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-334-21</td>
                                        <td>Angelica Ramos</td>
                                        <td>Nursing</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-121-21</td>
                                        <td>Doris Wilder</td>
                                        <td>Entrepreneurship</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-112-21</td>
                                        <td>Caesar Vance</td>
                                        <td>Engineering</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-847-21</td>
                                        <td>Yuri Berry</td>
                                        <td>Engineering</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-danger">inactive</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-367-21</td>
                                        <td>Jenette Caldwell</td>
                                        <td>Nursing</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FCLTY-567-21</td>
                                        <td>Dai Rios</td>
                                        <td>Nursing</td>
                                        <td>09878787876</td>
                                        <td>email@gmail.com</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID No.</th>
                                        <th>Full Name</th>
                                        <th>Department</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Account Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <?php include 'includes/footer.php' ?>
    <!-- Data Table JS============================================ -->
    <script src="../js/data-table/jquery.dataTables.min.js"></script>
    <script src="../js/data-table/data-table-act.js"></script>

</body>

</html>