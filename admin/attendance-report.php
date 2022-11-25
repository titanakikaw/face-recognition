<!doctype html>
<html class="no-js" lang="">

<?php
include 'includes/header.php';
include '../dbcon.php';

$subject_id = "";
$subject_desc  = "";
$date = "";
if ($_POST['subject'] && $_POST['date']) {
   $querysub = mysqli_query($con, "SELECT * from subjects where id ='" . $_POST['subject'] . "'");
   $result = $querysub->fetch_all(MYSQLI_ASSOC);
   $subject_id = $result[0]['id'];
   $subject_desc = $result[0]['desc'];
   $date = $_POST['date'];
}

?>
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
   <?php include('menu.php') ?>
   <!-- Main Menu area End-->
   <!-- Data Table area Start-->
   <div class="data-table-area">
      <div class="container">
         <div class="row">
            <?php if (@$_GET['m'] != null) {
               // var_dump(base64_decode($_GET['m']));
               $text = explode('@', base64_decode($_GET['m']))[1];
               $design = explode('@', base64_decode($_GET['m']))[0];
            ?>
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <br />
                  <div class="alert alert-dismissible" style="background-color: <?php echo $design; ?>;color: white;font-weight: bolder">
                     <button type="button" class="close" data-dismiss="alert" style="color:white;opacity: inherit;" aria-hidden="true">&times;</button>
                     <h5>System Alert!</h5>
                     <?php echo $text; ?>
                  </div>
               </div>
            <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <form method="POST">
                  <div class="data-table-list">
                     <div class="basic-tb-hd">
                        <h2><i class="fa fa-user"></i> Attendance Report</h2>
                     </div>
                     <div class="row">
                        <div class="col-lg-3">
                           Date:
                           <select id="dteselect2" style="width: 100%;" name="date">
                              <?php
                              $query = mysqli_query($con, "SELECT DISTINCT(date) from attendance");
                              while ($rows = mysqli_fetch_array($query)) {
                                 $selected = "";
                                 if ($date == $rows['date']) {
                                    $selected  = "selected";
                                 }

                                 echo "
                                  <option value='" . $rows['date'] . "' " .  $selected . "> " . $rows['date'] . "</option>
                              ";
                              }
                              ?>
                           </select>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                           Subject:
                           <select id="subselect2" style="width: 100%;" name="subject">
                              <?php
                              $query = mysqli_query($con, "SELECT * from subjects");
                              while ($rows = mysqli_fetch_array($query)) {
                                 $selected = "";
                                 if ($rows['desc'] == $subject_desc) {
                                    $selected  = "selected";
                                 }
                                 echo "
                                  <option value='" . $rows['id'] . "' " . $selected . "> " . $rows['desc'] . "</option>
                              ";
                              }
                              ?>
                           </select>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                           Action<br>
                           <button>Submit</button>
                        </div>

                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="row" style="padding: 1rem 2rem">
            <div class="col-lg-6">
               <h4>Present</h4>
               <table border="1" style="width: 100%;">
                  <thead style="background-color: #00c292;">
                     <tr>
                        <th style="padding: 5px 10px">STUDENT</th>
                        <th style="padding: 5px 10px">TIME IN</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php

                     $query = mysqli_query($con, "SELECT CONCAT(b.lastname, ', ', b.firstname) as name,a.* from attendance a INNER JOIN student_info b on a.student = b.student_id where `date`='" . $date . "' AND subject = '" . $subject_desc . "'");
                     $ctr = 0;
                     while ($rows = mysqli_fetch_array($query)) {
                        $ctr += 1;
                        echo '<tr>
                                 <td style="padding: 5px 10px">' . $rows['name'] . '</td>
                                 <td style="padding: 5px 10px">' . $rows['time'] . '</td>
                              </tr>';
                     }
                     ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="2" style="padding: 5px 10px">Total number of students present: <?php echo $ctr; ?> </td>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <div class="col-lg-6">
               <h4>Absent</h4>
               <table border="1" style="width: 100%;">
                  <thead style="background-color: #cc4343; color: white">
                     <tr>
                        <td style="padding: 5px 10px">STUDENT</td>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $query = mysqli_query($con, "SELECT CONCAT(student_info.lastname, ' ,', student_info.firstname) as name,enrolled_subjects.* from enrolled_subjects  INNER JOIN student_info 
                     on enrolled_subjects.student_id = student_info.student_id
                     where NOT EXISTS 
                     (SELECT * from attendance INNER JOIN student_info 
                     on attendance.student = student_info.student_id 
                     where enrolled_subjects.student_id = student_info.id ) AND subject_id = '" . $subject_id . "'");
                     $ctr2 = 0;
                     while ($rows = mysqli_fetch_array($query)) {
                        $ctr2 += 1;
                        echo '<tr>
                                 <td style="padding: 5px 10px">' . $rows['name'] . '</td>
                              </tr>';
                     }
                     ?>
                  </tbody>
                  <tfoot>
                     <tr>
                        <td style="padding: 5px 10px">Total number of students absent: <?php echo $ctr2; ?></td>
                     </tr>

                  </tfoot>
               </table>
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
<script>
   $(document).ready(() => {
      $('#subselect2').select2()
      $('#dteselect2').select2()
      $('#preDatatable').Datatable()
   })
</script>