<?php 
include_once('lib/header.php');
if(!isset($_SESSION['loggedIn'])){
       header("Location: login.php");
}
?>

<p>
<form method = "POST" action = "processmemberdashboard.php">
<p>
        <?php
            if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
               session_destroy();
                
            }
            ?>
    </p>
<p>
    <label>Full Name</label><br/>
        <input required type = "type" name="fullname" placeholder="Full-Name"/>
</p>   
<p>
    <label>Date of Appointment</label><br/>
        <input required type = "date" name="date"/>
</p>
    <p>
    <label>Time of Appointment</label><br/>
        <input required type = "time" name="time"/>
</p>
    <p>
    <label>Nature of Appointment</label><br/>
        <textarea required name="nature" rows="5" cols="30"></textarea>
    </p>
    <p>
    <label>Initial Complaint</label><br/>
    <textarea required name="complaint" rows="5" cols="30"></textarea>
    </p>
    <label>Department of interest</label><br/>
    <select required name="interest" >
        <option value="">Select one</option>
        <option
        >Local News</option>
        <option
        >International News</option>
        <option
        >Rumors and Gist</option>
        <option
        >The Fashion and music industry</option>
</select>
<p><button>Send</button></p>
</form>
</p>