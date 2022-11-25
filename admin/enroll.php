<!doctype html>
<html class="no-js" lang="en">

<?php
include 'includes/header.php';
include '../dbcon.php';


if (count($_FILES) > 0) {
    $uploaddir = '../stud_images/';
    $uploadfile = $uploaddir . basename($_FILES['files']['name']);
    if (move_uploaded_file($_FILES['files']['tmp_name'], $uploadfile)) {
        $query = "Update student_info set pic='" . $uploadfile . "' where student_id = '" . $_POST['select'] . "'";
        if (mysqli_query($con, $query)) {
            echo "<script>
                alert('Success');
            </script>";
            header('Location: index.php', true);
        }
    } else {
        echo "<script>alert('Unable to process right now, Please refresh the page and try again!')</script>";
    }
}

?>
<script src="../asset/js/modernizr.js"></script>
<script src="../asset/js/vue.min.js"></script>
<script src="../face-api.min.js"></script>
<style>
    canvas {
        position: absolute;
    }
</style>

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
                <!-- <form> -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2><i class="fa fa-user"></i> Face Enrollment</h2>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Type</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="nk-int-st">
                                            <select class="form-control input-sm select2" data-live-search="true" id="student_id" name="select">
                                                <?php
                                                $query = mysqli_query($con, "SELECT si.*,c.*,si.id si_id FROM student_info si INNER JOIN course c ON c.id = si.course where pic = '' OR pic IS Null ORDER BY lastname ASC");
                                                while ($rows = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?php echo $rows['student_id'] ?>"><?php echo $rows['student_id'] . ' | ' . strtoupper($rows['firstname'] . ' ' . str_split($rows['middle_name'])[0] . '. ' . $rows['lastname']); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Scan Face</label>

                                        </div>
                                        <div class="col-lg-8">
                                            <div class="nk-int-st">

                                                <div class="col-xs-12 preview-container" id="faceapi-container" style="position: relative; display:flex;align-items:center; justify-content:center; flex-direction:row">
                                                    <video id="preview" class="camera" width="250" height="187.5"></video>

                                                </div>
                                                <input type="file" name="files">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-t-15">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <button class="btn btn-success notika-btn-success" onclick=" capturePhoto()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </form> -->
                <!-- Form Element area End-->

                <?php include 'includes/footer.php' ?>
                <script src="../asset/js/instascan.min.js"></script>
                <script src="../asset/js/main.js"></script>
                <script>
                    Promise.all([
                        faceapi.nets.tinyFaceDetector.loadFromUri('../models'),
                        faceapi.nets.faceLandmark68Net.loadFromUri('../models'),
                        faceapi.nets.faceRecognitionNet.loadFromUri('../models'),
                        faceapi.nets.ssdMobilenetv1.loadFromUri('../models')
                    ]);

                    let gdescriptor;
                    let frame = document.querySelector('#preview')
                    let faceapi_container = document.querySelector('#faceapi-container')

                    $(function() {
                        $('.select2').select2();
                    });

                    frame.addEventListener('play', async () => {
                        let canvas = faceapi.createCanvasFromMedia(frame);
                        let existing_canvas = faceapi_container.querySelector('canvas');
                        if (!existing_canvas || existing_canvas == null) {
                            faceapi_container.append(canvas)
                        }

                        const displaySize = {
                            width: frame.width,
                            height: frame.height
                        };
                        faceapi.matchDimensions(canvas, displaySize);
                        let intervaltime = setInterval(async () => {
                            let detections = await faceapi
                                .detectAllFaces(frame, new faceapi.TinyFaceDetectorOptions())
                                .withFaceLandmarks().withFaceDescriptors()
                            const resizedDetection = faceapi.resizeResults(
                                detections,
                                displaySize
                            );
                            canvas
                                .getContext('2d')
                                .clearRect(0, 0, canvas.width, canvas.height);
                            if (resizedDetection) {
                                if (resizedDetection[0].descriptor) {
                                    gdescriptor = resizedDetection[0].descriptor
                                }

                                faceapi.draw.drawFaceLandmarks(canvas, resizedDetection);
                            }
                        }, 2000)

                    })

                    async function capturePhoto() {
                        let stud_id = document.querySelector("#student_id").value
                        if (stud_id != '') {
                            let canvasElem = faceapi_container.querySelector('canvas')
                            canvasElem.getContext('2d').drawImage(frame, 0, 0, canvasElem.width, canvasElem.height);
                            let image_data_url = canvasElem.toDataURL('image/jpeg');
                            let files = document.querySelector("input")
                            canvasElem.toBlob((blob) => {
                                const file = new File([blob], `${document.querySelector("#student_id").value}.jpeg`);
                                const dT = new DataTransfer();
                                dT.items.add(file);
                                files.files = dT.files;

                            });


                            if (files.files.length > 0) {
                                let newForm = document.createElement("form");
                                document.body.append(newForm)

                                if (saveJSON()) {
                                    newForm.enctype = "multipart/form-data"
                                    newForm.method = 'POST'
                                    newForm.append(document.querySelector("input"))
                                    newForm.append(document.querySelector("#student_id"))
                                    newForm.submit()
                                } else {
                                    alert("Please try again")
                                }

                            }
                        } else {
                            alert("Please select a student")
                        }
                    }
                    async function saveJSON() {
                        const response = await fetch('enrollapi.php', {
                            method: 'POST',
                            headers: {
                                'Content-type': 'application/json'
                            },
                            body: JSON.stringify({
                                data: gdescriptor,
                                id: document.querySelector("#student_id").value,
                                action: 'saveImage'
                            })
                        })
                        const data = await response.json();
                        return data
                    }
                </script>
</body>

</html>