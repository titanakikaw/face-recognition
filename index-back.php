<?php
include 'dbcon.php';


if ($_POST['action'] == 'getsubjects') {
    $query = mysqli_query($con, "SELECT * from subjects");
    $rows = $query->fetch_all(MYSQLI_ASSOC);
    echo json_encode($rows);
}
if ($_POST['action'] == 'getstudimages') {
    // $query = "SELECT pic from student_info a 
    // inner join enrolled_subjects b on a.id = b.student_id
    // inner join subjects c on b.subject_id = c.id where c.desc = '" . $_POST['desc'] . "'";
    $query = "SELECT pic from student_info a 
    inner join enrolled_subjects b on a.id = b.student_id
    inner join subjects c on b.subject_id = c.id where c.desc = 'subject description'";
    $query2 = mysqli_query($con, $query);
    $rows = $query2->fetch_all(MYSQLI_ASSOC);
    echo json_encode($rows);
}
if ($_POST['action'] == 'saveattendance') {
    $time = date("h:i:sa");
    $date = date("Y/m/d");
    $subject = $_POST['subject'];
    $student = $_POST['student_id'];
    if ($subject != '' && $student != '') {
        $query_check = mysqli_query($con, "SELECT * from attendance where `subject` = '" . $subject . "' AND student = '" . $student . "' AND date = '" . $date . "'");
        if ($query_check->num_rows <= 0) {
            $query = "INSERT INTO attendance (`time`, `date`, `subject`,student) VALUES ('$time', '$date', '$subject', '$student')";
            if (mysqli_query($con, $query)) {
            }
        }
    }
}
if ($_POST['action'] == 'gettimein') {

    $subject = $_POST['subject'];
    $date = date("Y/m/d");

    if ($subject != '') {
        $query = "SELECT * from attendance where `subject` = '" . $subject . "' AND date = '" . $date . "'";
        $stmt = mysqli_query($con, $query);
        $rows = $stmt->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}

if ($_POST['action'] == 'getstudents') {

    $subject = $_POST['subject'];
    $query = "SELECT c.student_id from enrolled_subjects a 
    inner join subjects b on a.subject_id = b.id
    inner join student_info c on a.student_id = c.id 
    where b.desc = 'MATH 101'";
    // -- where b.desc = '" . $subject . "'";
    $stmt = mysqli_query($con, $query);
    $rows = $stmt->fetch_all(MYSQLI_ASSOC);

    echo json_encode($rows);
}
