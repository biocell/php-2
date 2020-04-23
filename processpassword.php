<?php session_start();

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$_SESSION['email'] = $email;

if($errorCount >0){
    $session_error = "You have " . $errorCount . " error"; 
        
    if($errorCount > 1) {
        $session_error .= "s";
    }

    $session_error .= " in your submission";
    $_SESSION["error"] = $session_error; 
    
    header("Location: password.php ");

}else{

    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers);

    for($counter = 0 ; $counter < $countAllUsers ; $counter++){

        $currentUser = $allUsers[$counter];
        
        if($currentUser == $email . ".json"){
    
            $token = "hskdfhwdkcjk";

            $subject = "Password Reset Request";
            $message = "A password reset has been initiated from your account,
             please visit : localhost/snh/reset.php. Otherwise ignore this message.";
            $headers = "From: no-reply@snh.org" . "\r\n" .
            "CC: biocell@snh.org";
            
            file_put_contents("db/tokens/" . $email . ".json", json_encode(['token' =>$token]));
           
            $try = mail($email,$subject,$message,$headers);
    
            if ($try){
                $_SESSION["message"] =  "Password reset has been sent to your email: " . $email;
                header("Location: login.php");
            }else{
                $_SESSION["error"] = "Something went wrong, we could not send an email to: " . $email;
                header("Location: password.php");
            }
        die();
        }
    }
    $_SESSION["error"] = "Email not registered with us ERR: " . $email;
    header("Location: password.php");
}