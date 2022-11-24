<!doctype html>
<html class="no-js" lang="">

<?php 
    include 'includes/header.php';
    include '../dbcon.php';
?>
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
    <?php include('menu.php')?>
    <!-- Main Menu area End-->
    <!-- Data Table area Start-->
    <div class="data-table-area">
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2><i class="fa fa-user"></i> Student Lists</h2>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Number</th>
                                        <th>Full Name</th>
                                        <th>Course</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Year & Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = mysqli_query($con, "SELECT * FROM student_info si INNER JOIN course c ON c.id = si.course ORDER BY lastname ASC");
                                    while($rows = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['student_id']?></td>
                                        <td><?php echo strtoupper($rows['firstname'].' '.str_split($rows['middle_name'])[0].'. '.$rows['lastname']);?></td>
                                        <td><?php echo $rows['course_abbr']?></td>
                                        <td><?php echo $rows['contact']?></td>
                                        <td><?php echo $rows['email_add']?></td>
                                        <td><?php echo $rows['year_section']?></td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-edit"></i> edit</a>
                                            <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#delete"><i
                                                    class="fa fa-trash"></i> delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
<?php include 'includes/footer.php'?>
<!-- Data Table JS============================================ -->
<script src="../js/data-table/jquery.dataTables.min.js"></script>
<script src="../js/data-table/data-table-act.js"></script>

</body>

</html>