<!DOCTYPE html>
<html>
<style>
   canvas {
      position: absolute;
   }
</style>

<head>
   <title>Face-Recognition-Attendance-Monitoring-System</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="asset/css/style.css">
   <link rel="stylesheet" type="text/css" href="asset/css/style1.css">
   <!-- Data Table JS============================================ -->
   <link rel="stylesheet" href="css/jquery.dataTables.min.css">
   <style>
      .box {
         background: transparent;
         position: relative;
         width: auto;
      }

      .frame {
         position: absolute;
         top: 55%;
         left: 50%;
         transform: translate(-50%, -50%);
         border: 3px solid #e9e9e9;
         z-index: 3;
      }

      video {
         -webkit-transform: scaleX(1);
         transform: scaleX(1);
      }

      .camera {
         width: 500px;
         border-radius: 10px;
         border: 10px solid;
         border-style: outset;
         box-shadow: 0px 1px 2px #eee, 0px 2px 2px #e9e9e9, 0px 3px 2px #ccc, 0px 4px 2px #c9c9c9, 0px 5px 2px #bbb, 0px 6px 2px #b9b9b9, 0px 7px 2px #999, 0px 7px 2px rgba(0, 0, 0, 0.5), 0px 7px 2px rgba(0, 0, 0, 0.1), 0px 7px 2px rgba(0, 0, 0, 0.73), 0px 3px 5px rgba(0, 0, 0, 0.3), 0px 5px 10px rgba(0, 0, 0, 0.37), 0px 10px 10px rgba(0, 0, 0, 0.1), 0px 20px 20px rgba(0, 0, 0, 0.1);
      }

      table,
      td,
      th {
         border: 1px solid #ddd;
         text-align: left;
      }

      table {
         border-collapse: collapse;
         width: 100%;
      }

      thead {
         background-color: rgb(0, 197, 146);
      }

      th,
      td {
         padding: 3px;
         font-size: 18px;
         color: #001200;
      }
   </style>
   <script src="asset/js/modernizr.js"></script>
   <script src="asset/js/vue.min.js"></script>
</head>

<body>
   <div class="top-container">

      <div class="data">
      </div>
      <div class="data">
      </div>
      <div class="data">
      </div>
      <div class="data">
      </div>
      <div class="data">
         <a href="login.php"><i class="fa fa-user"></i> Login</a>
      </div>
   </div>
   <div class="time-container">
      <div class="display-time">
         <h1>Face Recognition Attendance Monitoring System</h1>
         <h4>Current Subject : <span style="text-transform:uppercase; color:black" id="curr_subject">Math 101 </span></h4>
         <p style=" font-size:12px" id='date_today'>date</p>
         <p style=" font-size:15px; color:black" id='time_now'>date</p>
         <br>
         <table id="data-table-basic" class="table table-border">
            <thead>
               <tr>
                  <th>Student Name</th>
                  <th>TimeIn</th>
               </tr>
            </thead>
            <tbody>

            </tbody>
         </table>
      </div>
   </div>
   <div class="container">
      <div class="img">

      </div>

      <div class="login-content">

         <div id="app" class="row box">
            <div class="col-md-4 col-md-offset-4">
               <ul style="list-style:none;display:none">
                  <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                  <li v-for="camera in cameras">
                     <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{
                        formatName(camera.name) }}</span>
                     <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                        <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{
                        formatName(camera.name) }}</a>
                     </span>
                  </li>
               </ul>
               <div class="clearfix"></div>
               <!-- form scan -->
               <form action="" method="POST" id="myForm">
                  <input style="display:none" type="text" name="qrcode" id="code" autofocus>
               </form>
            </div>
            <div class="col-xs-12 preview-container">
               <figure class="box frame" style="width:200px;height:200px"> </figure>
               <div id="faceapi-container" style="position: relative; display:flex;align-items:center; justify-content:center; flex-direction:row">
                  <video id="preview1" height="300" width="480" autoplay></video>
               </div>

            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </script>
   <script src="face-api.min.js"></script>
   <script src="js/jquery.min.js"></script>
   <!-- <script src="asset/js/instascan.min.js"></script>
   <script src="asset/js/main.js"></script> -->
   <!-- Data Table JS============================================ -->
   <script src="js/data-table/jquery.dataTables.min.js"></script>
   <script src="js/data-table/data-table-act.js"></script>
</body>

</html>

<script>
   Promise.all([
      faceapi.nets.tinyFaceDetector.loadFromUri('models'),
      faceapi.nets.faceLandmark68Net.loadFromUri('models'),
      faceapi.nets.faceRecognitionNet.loadFromUri('models'),
      faceapi.nets.ssdMobilenetv1.loadFromUri('models')
   ]);
   let frame = document.querySelector('#preview1')
   let faceapi_container = document.querySelector('#faceapi-container')
   let images_names = [];
   let date = new Date();
   let schedules = [];
   let studid = [];
   let streaming;
   setInterval(myTimer, 60000);


   let datatable = $('#data-table-basic').DataTable({
      ordering: false,
      searching: false,
      pageLength: 8,
      bLengthChange: false,
      "ajax": {
         "url": "index-back.php",
         "contentType": "application/x-www-form-urlencoded",
         "type": "post",
         "data": {
            "subject": $('#curr_subject')[0].innerText,
            "action": "gettimein"
         },
         "success": (response) => {
            if (response.length != 0) {
               response.forEach((data) => {
                  datatable.row.add([
                     data['name'],
                     data['time']
                  ]).draw(false)
               })

            }
         },
         "error": (err) => {
            console.log(err)
         }
      }
   });



   function myTimer() {
      const date = new Date();
      document.getElementById("time_now").innerHTML = date.toLocaleTimeString([], {
         timeStyle: 'short'
      });
      if (schedules.length != 0) {
         schedules.forEach(sched => {
            if (date.toLocaleTimeString('en-GB') >= sched.time_from.toString() & date.toLocaleTimeString('en-GB') <= sched.time_to.toString()) {
               $('#curr_subject').text(sched.code)
               if ($('#curr_subject')[0].innerText != sched.code.toUpperCase()) {
                  location.reload();
               }
            }
         })
      }
   }

   navigator.getUserMedia = (
      navigator.getUserMedia ||
      navigator.webkitGetUserMedia ||
      navigator.mozGetUserMedia ||
      navigator.msGetUserMedia
   );

   if (typeof navigator.mediaDevices.getUserMedia === 'undefined') {
      streaming = navigator.getUserMedia({
         video: true
      }, (stream) => frame.srcObject = stream, console.log('error'));
   } else {
      streaming = navigator.mediaDevices.getUserMedia({
         video: true
      }).then((stream) => frame.srcObject = stream).catch(err => console.log(err));
   }

   frame.addEventListener('play', async () => {
      const labeledFaceDescriptors = await readJSONFiles()
      const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)

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
         const results = resizedDetection.map(d => faceMatcher.findBestMatch(d.descriptor))
         canvas
            .getContext('2d')
            .clearRect(0, 0, canvas.width, canvas.height);
         results.forEach((result, i) => {
            const box = resizedDetection[i].detection.box
            const drawBox = new faceapi.draw.DrawBox(box, {
               label: result.toString()
            })
            drawBox.draw(canvas)
            if (result._label != 'unknown') {
               if (saveAttendance(result._label)) {
                  $('#data-table-basic').DataTable().ajax.reload();
               }
            }

         })
      }, 2000)
   })

   function fetch_image() {
      const URL = window.location.href + 'stud_images/';
      return Promise.all(
         images_names.map(async name => {
            // const img = await faceapi.fetchImage(URL + name + '.jpeg')
            const img = await faceapi.fetchImage(`stud_images/1234.jpeg`)
            const detections = await faceapi
               .detectSingleFace(img)
               .withFaceLandmarks()
               .withFaceDescriptor();
         })
      )
   }

   async function saveAttendance(studentId) {
      const response = await fetch('index-back.php', {
         method: 'POST',
         headers: {
            'Content-type': 'application/x-www-form-urlencoded'
         },
         body: `action=saveattendance&subject=${$('#curr_subject')[0].innerText}&student_id=${studentId}`
      })
      const data = await response.json();
   }

   async function fetchImages() {
      const response = await fetch('index-back.php', {
         method: 'POST',
         headers: {
            'Content-type': 'application/x-www-form-urlencoded'
         },
         body: 'action=getstudimages' + `&desc=${$('#curr_subject')[0].innerText}`
      })
      const datas = await response.json();
      datas.forEach(data => {
         let {
            pic
         } = data
         images_names.push(pic.replace('../stud_images/', '').replace('.jpeg', ''))
      })
   }

   async function getschedule() {
      const response = await fetch('index-back.php', {
         method: 'POST',
         headers: {
            'Content-type': 'application/x-www-form-urlencoded'
         },
         body: 'action=getsubjects'
      })
      const datas = await response.json();
      if (datas) {
         datas.forEach(data => {
            schedules.push(data)
         });
      }
   }

   async function readJSONFiles() {
      return Promise.all(
         studid.map(async student => {
            const descriptors = [];
            let URI = `jsonStudent/${student}.json`;
            const response = await fetch(URI)
            const data = await response.json();
            descriptors.push(new Float32Array(data))
            return new faceapi.LabeledFaceDescriptors(student, descriptors)
         })
      )
   }

   async function gettimein() {
      const response = await fetch("", {
         method: 'POST',
         headers: {
            'Content-type': 'application/x-www-form-urlencoded'
         },
         body: `action=gettimein&subject=${$('#curr_subject')[0].innerText}`
      })
      const data = await response.json();
      console.log(data)
   }

   async function getStudents() {
      const response = await fetch("index-back.php", {
         method: "POST",
         headers: {
            'Content-type': 'application/x-www-form-urlencoded'
         },
         body: `action=getstudents&subject=${$('#curr_subject')[0].innerText}`
      })
      const data = await response.json();
      data.forEach(id => {
         studid.push(id.student_id)
         // console.log(id.student_id)
      })
   }

   $(document).ready(() => {
      var objToday = new Date(),
         weekday = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
         dayOfWeek = weekday[objToday.getDay()],
         domEnder = function() {
            var a = objToday;
            if (/1/.test(parseInt((a + "").charAt(0)))) return "th";
            a = parseInt((a + "").charAt(1));
            return 1 == a ? "st" : 2 == a ? "nd" : 3 == a ? "rd" : "th"
         }(),
         dayOfMonth = today + (objToday.getDate() < 10) ? '0' + objToday.getDate() + domEnder : objToday.getDate() + domEnder,
         months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
         curMonth = months[objToday.getMonth()],
         curYear = objToday.getFullYear();
      var today = dayOfWeek + " " + dayOfMonth + " of " + curMonth + ", " + curYear;
      $('#date_today').text(today)
      getschedule();
      myTimer();
      getStudents();
   })
</script>