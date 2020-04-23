<?php
session_start();

$fullname = $_POST['fullname'] != "" ? $_POST['fullname'] : $errorCount++;
$date = $_POST['date'] != "" ? $_POST['date'] : $errorCount++; 
$time = $_POST['time'] != "" ? $_POST['time'] : $errorCount++;
$nature = $_POST['nature'] != "" ? $_POST['nature'] : $errorCount++;
$complaint = $_POST['complaint'] != "" ? $_POST['complaint'] : $errorCount++;
$interest = $_POST['interest'] != "" ? $_POST['interest'] : $errorCount++; 


$_SESSION['fullname'] = $fullname;
$_SESSION['date'] = $date;
$_SESSION['time'] = $time;
$_SESSION['complaint'] = $complaint;
$_SESSION['interest'] = $interest;
$userObject = [
    'id' => $newUserId,
    'fullname' => $fullname,
    'date' => $date,
    'time' => $time,
    'nature' => $nature,
    'complaint' => $complaint,
    'interest' => $interest
];

$fullname = $_POST['fullname'];
$_SESSION['fullname'] =$name;
 file_put_contents("db/messages/".$fullname . ".json", json_encode($userObject));

$_SESSION["mssg"] = "Your message has been received, we will get back to you shortly";
header("Location: dashboard.php");
die();
?>
