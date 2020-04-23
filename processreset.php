<?php session_start();


$errorCount = 0;
if(!$_SESSION['loggedIn']){

    $token = $_POST['token'] != "" ? $_POST['token'] : $errorCount++; 
}

$email = $_POST['email'] != "" ? $_POST['email'] : $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] : $errorCount++;

$_SESSION['token'] = $token;
$_SESSION['email'] = $email;

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error"; 
        
    if($errorCount > 1) {
        $session_error .= "s";
    }
    $session_error .= " in your submission";
    $_SESSION['error'] = $session_error; 
    header("Location: reset.php ");
}else{

    $allUserTokens = scandir("db/tokens/");
    $countAllUserTokens = count($allUserTokens);
    
    for($counter = 0 ; $counter < $countAllUserTokens ; $counter++){
     
        $currentTokenFile = $allUserTokens[$counter];
        
        if($currentTokenFile == $email . ".json"){
          
            $tokenContent = file_get_contents("db/tokens/".$currentTokenFile);
          
            $tokenObject = json_decode($tokenContent);
            $tokenFromDB = $tokenObject->token;
            
           
            if($tokenFromDB == $token){

                $allUsers = scandir("db/users/");
                $countAllUsers = count($allUsers);
            
                for ($counter = 0; $counter < $countAllUsers ; $counter++) {
                    
                    $currentUser = $allUsers[$counter];
                    
                    if($currentUser == $email . ".json"){
                       $userString = file_get_contents("db/users/".$currentUser);
                       
                       $userObject = json_decode($userString);
                       
                       $userObject -> password = password_hash($password, PASSWORD_DEFAULT);
                       
                       unlink("db/users".currentUser);
                       
                       file_put_contents("db/users/". $emai . ".json", json_encode($userObject));
                       
                       $_SESSION["message"] = "Password Reset Succesful, you can now login";
                          
                       $subject = "Password Reset Succesful";
                       $message = "Your account on biocellblog has been updated,please visit snh.org and reset your password immediately";
                       $headers = "From: no-reply@snh.org" . "\r\n" .
                       "CC: biocell@snh.org";
                       
                       
                      
                       $try = mail($email,$subject,$message,$headers);
                       header("Location: login.php");
                       die();
                       }
                    }
                }
        }
    }
    $_SESSION["error"] = "Password Reset Failed, token/email invalid or expired";
         header("Location: reset.php");

}

?>