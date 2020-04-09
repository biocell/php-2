<?php 
include_once('lib/header.php');

if(!isset($_SESSION['loggedIn'])){
    header("Location: login .php");
}
?>
<h3>Dashboard</h3>
Good Day, <?php echo $_SESSION['fullname'] ?>, you are logged in as a (<?php echo $_SESSION['role'] ?>).
Your user ID is <?php echo $_SESSION['loggedIn'] ?>
<?php
include_once('lib/footer.php');
?> 