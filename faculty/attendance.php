<!doctype html>
<html class="no-js" lang="">

<?php include 'includes/header.php'?>
<style>
    .bg-success{
        background-color:rgb(120,187,123);
    }
    .bg-danger{
        background-color:rgb(227,171,154);
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
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a data-toggle="tab" href="#Home"><i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#attendance"><i class="fa fa-calendar"></i> Attendance</a>
                        </li>
                        <li><a data-toggle="tab" href="#account"><i class="fa fa-user"></i> Account</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="index.php">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        <div id="attendance" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="attendance.php">Check Attendance</a>
                                </li>
                                <li><a href="attendance.php">Manage Attendance</a>
                                </li>
                            </ul>
                        </div>
                        <div id="account" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="profile.php">Profile</a>
                                </li>
                                <li><a href="../">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2><i class="fa fa-calendar"></i> Event Lists</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Event 1</td>
                                        <td>Dec 04, 2021</td>
                                        <td><span class="badge nk-green">present</span></td>
                                    </tr>
                                    <tr>
                                        <td>Event 2</td>
                                        <td>Dec 05, 2021</td>
                                        <td><span class="badge nk-green">present</span></td>
                                    </tr>
                                    <tr>
                                        <td>Event 3</td>
                                        <td>Dec 06, 2021</td>
                                        <td><span class="badge nk-green">present</span></td>
                                    </tr>
                                    <tr>
                                        <td>Event 4</td>
                                        <td>Dec 07, 2021</td>
                                        <td><span class="badge nk-pink">absent</span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'?>
<!-- Data Table JS============================================ -->
<script src="../js/data-table/jquery.dataTables.min.js"></script>
<script src="../js/data-table/data-table-act.js"></script>

</body>

</html>