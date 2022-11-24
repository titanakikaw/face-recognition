<!doctype html>
<html class="no-js" lang="en">

<?php include 'includes/header.php'?>
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="../css/datapicker/datepicker3.css">
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
                        <li><a data-toggle="tab" href="#student"><i class="fa fa-graduation-cap"></i> Student</a>
                        </li>
                        <li><a data-toggle="tab" href="#department"><i class="fa fa-building"></i> Department</a>
                        </li>
                        <li><a data-toggle="tab" href="#faculty"><i class="fa fa-users"></i> Faculty</a>
                        </li>
                        
                        <li><a data-toggle="tab" href="#face"><i class="fa fa-user-plus"></i> Face Enrollment </a>
                        </li>
                        <li class="active"><a data-toggle="tab" href="#report"><i class="fa fa-bar-chart"></i> Reports</a>
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
                        <div id="faculty" class="tab-pane notika-tab-menu-bg animated flipInX">
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
                        <div id="report" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="reports.php">Attendance Report</a>
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

    <!-- Form Element area Start-->
    <div class="form-element-area">
        <div class="container">
            
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Attendance Reports</h2>
                        </div>
                        <div class="row">
                  <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <table class="table table-bordered mytable">
                              <thead>
                                 <td>
                                    <h6>Event Name</h6>
                                 </td>
                                 <td>
                                    <h6>Present</h6>
                                 </td>
                                 <td>
                                    <h6>Absent</h6>
                                 </td>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Event 1</td>
                                    <td>85</td>
                                    <td>15</td>
                                 </tr>
                                 <tr>
                                    <td>Event 2</td>
                                    <td>90</td>
                                    <td>10</td>
                                 </tr>
                                 <tr>
                                    <td>Event 3</td>
                                    <td>60</td>
                                    <td>40</td>
                                 </tr>
                                 <tr>
                                    <td>Event 4</td>
                                    <td>50</td>
                                    <td>50</td>
                                 </tr>
                                 <tr>
                                    <td>Event 5</td>
                                    <td>75</td>
                                    <td>25</td>
                                 </tr>
                                 <tr>
                                    <td>Event 6</td>
                                    <td>85</td>
                                    <td>15</td>
                                 </tr>
                                 <tr>
                                    <td>Event 7</td>
                                    <td>90</td>
                                    <td>10</td>
                                 </tr>
                                 <tr>
                                    <td>Event 8</td>
                                    <td>85</td>
                                    <td>15</td>
                                 </tr>
                                 <tr>
                                    <td>Event 9</td>
                                    <td>85</td>
                                    <td>15</td>
                                 </tr>
                                 <tr>
                                    <td>Event 10</td>
                                    <td>85</td>
                                    <td>15</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                     <div class="card">
                        <div class="card-body">
                           <canvas id="bargraph" height="230"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Element area End-->
   
<?php include 'includes/footer.php'?>
<script src="../js/chart.js"></script>
   <script>
      document.addEventListener("DOMContentLoaded", function () {
         // Bar Chart
         var barChartData = {
            labels: ["Event 1","Event 2","Event 3","Event 4","Event 5","Event 6","Event 7","Event 8","Event 9","Event 10"],
            datasets: [{
               label: 'Total Present',
               backgroundColor: 'rgb(79,129,189)',
               borderColor: 'rgba(0, 158, 251, 1)',
               borderWidth: 1,
               data: [85,90,60,50,75,85,75,50,60,90]
            },{
               label: 'Total Absent',
               backgroundColor: 'rgb(123,233,234)',
               borderColor: 'rgba(0, 158, 251, 1)',
               borderWidth: 1,
               data: [15,10,40,50,25,15,25,50,40,10]
            }]
         };

         var ctx = document.getElementById('bargraph').getContext('2d');
         window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
               responsive: true,
               legend: {
                  display: true,
               }
            }
         });

      });
   </script>
</body>

</html>