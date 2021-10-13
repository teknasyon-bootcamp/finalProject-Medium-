<?php 
    session_start();
  
    if(!$_SESSION['id']){
        header('location:loginpage.php');
        
    }
 
?>
 
<p>Welcome <?php echo ucfirst($_SESSION['username']); ?></p>
<a href="logout.php">Logout</a>