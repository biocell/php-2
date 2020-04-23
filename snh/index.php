
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


<div class="wrapper"> 
<h1>
    Bringing the latest news to  the masses</h1>
    <p>Have you heard about the latest happenings?</p>
    <p>Want to contribute?</p>
</div>
    <?php
include_once('lib/footer.php');
?>