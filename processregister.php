<?php
session_start();
$errorCount = 0;

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] : $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] : $errorCount++; 
$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;
$sex = $_POST['sex'] != "" ? $_POST['sex'] : $errorCount++;
$designation = $_POST['designation'] != "" ? $_POST['designation'] : $errorCount++; 


$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['sex'] = $sex;
$_SESSION['designation'] = $designation;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error"; 
        
    if($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .= " in your submission";
    $_SESSION['error'] = $session_error; 
    header("Location: register.php ");
}else{
$allUsers = scandir("db/users/");
$countAllUsers = count($allUsers);
$newUserId = ($countAllUsers -1);

 $userObject = [
     'id' => $newUserId,
     'first_name' => $first_name,
     'last_name' => $last_name,
     'email' => $email,
     'password' => password_hash($password, PASSWORD_DEFAULT),
     'sex' => $sex,
     'designation' => $designation
 ];

 for($counter = 0 ; $counter < $countAllUsers ; $counter++){
     $currentUser = $allUsers[$counter];
     if($currentUser == $email . ".json"){
      $_SESSION["error"] = "Registeration failed, A user with this email already exists";
      header("Location: register.php");
      die();   
     }
 }
 file_put_contents("db/users/".$email . ".json", json_encode($userObject));

$_SESSION["message"] = "Registration Succesful";
header("Location: login.php");
}


