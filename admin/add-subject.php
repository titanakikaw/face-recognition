<!doctype html>
<html class="no-js" lang="en">

<?php
include 'includes/header.php';
include '../dbcon.php';


if (isset($_POST['submit'])) {
    $code = $_POST['code'];
    $description = $_POST['description'];
    $time_from = $_POST['time_from'];
    $time_to = $_POST['time_to'];

    $query = "INSERT INTO subjects ( code, `desc`, time_from, time_to) VALUES('$code', '$description','$time_from', '$time_to')";
    if (mysqli_query($con, $query)) {
        $message = base64_encode('green@Subject information successfully added.');
        echo '<script>window.location.href = "add-subject.php?m=' . $message . '"</script>';
    } else {
        $message = base64_encode('red@There\'s an error in adding the subject information.');
        echo '<script>window.location.href = "add-subject.php?m=' . $message . '"</script>';
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
    <?php include('menu.php') ?>
    <!-- Main Menu area End-->

    <!-- Form Element area Start-->
    <div class="form-element-area">
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
                <form action="" method="post">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap">
                            <div class="cmp-tb-hd cmp-int-hd">
                                <h2>Subject Information</h2>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Subject Code</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" placeholder="Subject" name="code" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Description</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" name="description" class="form-control input-sm" placeholder="Subject Description" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Time From:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="time" name="time_from" class="form-control input-sm" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Time To:</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="time" name="time_to" class="form-control input-sm" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <button name="submit" type="submit" class="btn btn-success col-lg-4 col-md-3 col-sm-3 col-xs-12">Submit</button>
                                    </div>
                                </div>

                            </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Form Element area End-->

    <?php include 'includes/footer.php' ?>
    <!-- datapicker JS
		============================================ -->
    <script src="../js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../js/datapicker/datepicker-active.js"></script>
</body>

</html>