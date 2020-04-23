<?php 
include_once('lib/header.php');
if(!isset($_SESSION['loggedIn'])){
        header("Location: login.php");
}
?>
<p>
<?php 
    if(isset($_SESSION['mssg']) && !empty ($_SESSION['mssg'])){
        echo"<span style='color:green'>" . $_SESSION['mssg'];
      
    }
?>
</p>

<div class="wrapper"> 
<h2>Dashboard</h2>


<div id="dashboard">
<h1>Good Day, <?php echo $_SESSION['fullname'] ?>, you are logged in as a (<?php echo $_SESSION['role'] ?>).
Your user ID is <?php echo $_SESSION['loggedIn'] ?>
</h1>
<p>
<?php
if(($_SESSION['role']== 'Member' )){
    echo "<h2>Would you like to schedule an appointment with our team of bloggers or access our paid sensitive news?</h2>";
   
?>
</p>
<h1>

<a href="memberdashboard.php">Schedule an appointment here</a>
 | 
<a href="">Access paid content</a>
</h1>
<?php }else{
           $allMessages = scandir("db/messages/");
           $count= count($allMessages);
           $countAllMessages =($count - 2);
     if($countAllMessages == 0){
         print_r("You have no messages or pending appointments today");
     }elseif($countAllMessages > 0){
         $session_error = "You have " . $countAllMessages . " " . "message";
           if($countAllMessages > 1){
               $session_error .= "s ";
           }
           $session_error .= "today!";
           $_SESSION["err"] = $session_error;
           echo $_SESSION["err"];
          
      
        ?>
     
           
           <h3><a href="bloggerdashboard.php">view messages</a></h3>
           <?php
            die();
            header("Location: dashboard.php");
     }
     };
    ?>

<br>


<?php
include_once('lib/footer.php');
?> 