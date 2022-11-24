<!doctype html>
<html class="no-js" lang="en">

<?php 
    include 'includes/header.php';
    include '../dbcon.php';

    if(isset($_POST['submit'])){
        $stud_id = $_POST['stud_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middle_name = $_POST['middle_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $year_section = $_POST['year_section'];
        $contact = $_POST['contact'];

        $query = "INSERT INTO student_info (id, student_id, firstname, lastname, middle_name, email_add, gender, course, contact, year_section) VALUES(null,'$stud_id','$firstname','$lastname','$middle_name','$email','$gender','$course','$contact','$year_section')";
        // var_dump(mysqli_connect($con,$query));exit;
        if(mysqli_query($con,$query)){
            $message = base64_encode('green@Student information successfully added.');
            echo '<script>window.location.href = "add-student.php?m='.$message.'"</script>';
        } else {
            $message = base64_encode('red@There\'s an error in adding the student information.');
            echo '<script>window.location.href = "add-student.php?m='.$message.'"</script>';
        }
    }

?>
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
                        <a href="#"><img src="../img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Main Menu area start-->
    <?php include('menu.php')?>
    <!-- Main Menu area End-->
    
    <!-- Form Element area Start-->
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <?php if(@$_GET['m'] != null){
                    // var_dump(base64_decode($_GET['m']));
                    $text = explode('@',base64_decode($_GET['m']))[1];
                    $design = explode('@',base64_decode($_GET['m']))[0];
                ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br/>
                    <div class="alert alert-dismissible" style="background-color: <?php echo $design;?>;color: white;font-weight: bolder">
                      <button type="button" class="close" data-dismiss="alert" style="color:white;opacity: inherit;" aria-hidden="true">&times;</button>
                      <h5>System Alert!</h5>
                      <?php echo $text;?>
                    </div>
                </div>
                <?php }?>
                <form action="" method="post">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap">
                            <div class="cmp-tb-hd cmp-int-hd">
                                <h2>Student Information</h2>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Student ID No.</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" placeholder="ex. 1810100-1" name="stud_id" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">First Name</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" name="firstname" class="form-control input-sm" placeholder="First Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Last Name</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" name="lastname" class="form-control input-sm" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Middle Name</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" name="middle_name" class="form-control input-sm" placeholder="Middle Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Email Address</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="email" name="email" class="form-control input-sm" placeholder ="john@gmail.com" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Gender</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="nk-int-st">
                                            <select name="gender" class="form-control input-sm" data-live-search="true">
    											<option>Male</option>
    											<option>Female</option>
    										</select>
                                        </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="hrzn-fm">Course</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="nk-int-st">
                                            <select name="course" class="form-control input-sm" data-live-search="true"required>
                                                <option value="" selected disabled="disabled">Course</option>
    											<option value="1">BSIT</option>
    											<option value="2">BSMB</option>
                                                <option value="3">BSFI</option>
                                                <option value="4">BSA</option>
    											<option value="5">BAT</option>
    										</select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Contact Number</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="nk-int-st">
                                            <input name="contact" type="text" class="form-control input-sm" placeholder="09*********" maxlength="11" required>
                                        </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <label class="hrzn-fm">Year & Section</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="nk-int-st">
                                            <input type="text" name="year_section" class="form-control input-sm" placeholder ="ex. 1-A" required>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <button name="submit" type="submit" class="btn btn-success col-lg-4 col-md-3 col-sm-3 col-xs-12">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <!-- Form Element area End-->
   
<?php include 'includes/footer.php'?>
    <!-- datapicker JS
		============================================ -->
    <script src="../js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../js/datapicker/datepicker-active.js"></script>
</body>

</html>