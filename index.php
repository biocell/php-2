
<?php
include_once('lib/header.php');
?>
<p>
    <?php 
    if(isset($_SESSION['message']) && !empty ($_SESSION['message'])){
        echo"<span style='color:green'>" . $_SESSION['message'];
        session_destroy();
    }
?>
    Bringing the latest news to  the masses<br/><hr/>
    <p>Have you heard about the latest happenings?</p>
    <p>Want to contribute?
    
    <?php
include_once('lib/footer.php');
?>