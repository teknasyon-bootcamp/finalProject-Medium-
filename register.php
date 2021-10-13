
<?php
session_start();
require_once('includes/db.class.php');
include('includes/functions.php');



if(isset($_POST['submit']))
{
    if(isset($_POST['name'],$_POST['email'],$_POST['pass'],$_POST['rpass']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['rpass']))
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $pass = trim($_POST['pass']);
        $rpass = trim($_POST['rpass']);
        
        $options = array("cost"=>4);
        $hashPassword = password_hash($pass,PASSWORD_BCRYPT,$options);

        if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{   
            $sql = 'select * from denemeusers where email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);


            if($stmt->rowCount() == 0)
            {
                $test=usernameCheck($name);
                if ($test) {

                    $errors[]="'{$name}' already registered! <br>You so late for take :/"; 
                }
                else {
                    if ($pass!=$rpass) {
                        $errors[]="Your passwords do not match!";
                    }
                    else {
                        $sql = "insert into denemeusers (username, email, password) values(:name,:email,:pass)";
                
                        try{
                            $handle = $pdo->prepare($sql);
                            $params = [
                                ':name'=>$name,
                                ':email'=>$email,
                                ':pass'=>$hashPassword,
                            ];
                            
                            $handle->execute($params);
                            
                            $success = 'User has been created successfully';
                            
                        }
                        catch(PDOException $e){
                            $errors[] = $e->getMessage();
                        }
                    }
                }
 

            }
            else
            {
                $valNickname = $name;
                $valEmail = '';
                $valPassword = $pass;

                $errors[] = 'Email address already registered';
            }
        }
        else
        {
            $errors[] = "Email address is not valid";
        }
    }
    else
    {
        if(!isset($_POST['name']) || empty($_POST['name']))
        {
            $errors[] = ' Nickname is required';
        }
        else
        {
            $valNickname = $_POST['name'];
        }

        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $errors[] = 'Email is required';
        }
        else
        {
            $valEmail = $_POST['email'];
        }

        if(!isset($_POST['pass']) || empty($_POST['pass']))
        {
            $errors[] = 'Password is required';
        }
        else
        {
            $valPassword = $_POST['pass'];
        }
        
    }

}
?>


<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body class="bg-dark">

<div class="container h-100">
	<div class="row h-100 mt-5 justify-content-center align-items-center">
		<div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
			<h1 class="mx-auto w-25" >Register</h1>
			<?php 
				if(isset($errors) && count($errors) > 0)
				{
					foreach($errors as $error_msg)
					{
						echo '<div class="alert alert-danger text-center">'.$error_msg.'</div>';
					}
                }
                
                if(isset($success))
                {
                    
                    echo '<div class="alert alert-success">'.$success.'</div>';
                }
			?>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
					<label for="email">Nickname:</label>
					<input type="text" name="name" placeholder="Enter Nickname" class="form-control" value="<?php echo ($valNickname??'')?>">
				</div>


                <div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php echo ($valEmail??'')?>">
				</div>
                <div class="form-group">
					<label for="email">Password:</label>
					<input type="password" name="pass" placeholder="Enter Password" class="form-control" value="<?php echo ($valPassword??'')?>">
				</div>
				<div class="form-group">
				<label for="email">Repeat Password:</label>
					<input type="password" name="rpass" placeholder="Repeat Password" class="form-control" value="<?php echo ($valrPassword??'')?>">
				</div>

				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				<p class="pt-2"> Back to <a href="loginpage.php">Login</a></p>
				
			</form>
		</div>
	</div>
</div>
</body>
</html>