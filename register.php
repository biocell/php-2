<?php include_once('lib/header.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    header("Location: dashboard.php");
}


?>

<h3>Register</h3>
<p><strong>Welcome! Please register to access all our posts</strong></p>

<form method="POST" action="processregister.php">
    <p>
        <?php
            if (isset($_SESSION['error']) && !empty($_SESSION['error'])){
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
               session_destroy();
                
            }
            ?>
    </p>
<p>
    <label>First Name</label><br/>
        <input 
        <?php
        if(isset($_SESSION['first_name'])){
            echo "value=" . $_SESSION['first_name']; 
        }
        ?>
       
        type="text" name="first_name" placeholder="First Name" />
</p>
<p>
    <label>Last Name</label><br/>
        <input 
        <?php
        if(isset($_SESSION['last_name'])){
            echo "value=" . $_SESSION['last_name']; 
        }
        ?>
        type="text" name="last_name" placeholder="Last Name" />
</p>
<p>
    <label>Email</label><br/>
        <input 
        <?php
        if(isset($_SESSION['email'])){
            echo "value=" . $_SESSION['email']; 
        }
        ?>
        type="text" name="email" placeholder="Email" />
</p>
<p>
    <label>Password</label><br/>
        <input 
        
        type="password" name="password" placeholder="Password" />
</p>

<p>
    <label>Sex</label><br/>
    <select name="sex" >
        <option value="">Select one</option>
        <option
        <?php
        if(isset($_SESSION['sex']) && ($_SESSION['sex']== 'Male')){
            echo "selected";  
        }
        ?>>Male</option>
        <option
        <?php
        if(isset($_SESSION['sex']) && ($_SESSION['sex']== 'Female')){
            echo "selected";  
        }
        ?>>Female</option>
</select>
    
</p>
<p>
    <label>Designation</label><br/>
    <select name="designation" >
        <option value="">Select one</option>
        <option
        <?php
        if(isset($_SESSION['designation']) && ($_SESSION['designation']== 'Blogger')){
            echo "selected";  
        }
        ?>>Blogger</option>
        <option
        <?php
        if(isset($_SESSION['designation']) && ($_SESSION['designation']== 'Member')){
            echo "selected";  
        }
        ?>>Member</option>
</select>
    
</p>
<p><button>Register</button></p>

</form>

<?php
include_once('lib/footer.php');
?>