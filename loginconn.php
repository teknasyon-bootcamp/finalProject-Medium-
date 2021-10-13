<?php

	include ("includes/db.class.php");
	
	if($_POST)
	{
		$email =$_POST["email"];
		$password =$_POST["pass"];

        $dbObj=new db();
		$query  = $dbObj->query("SELECT * FROM users WHERE user_email='$email' && user_password='$password'",PDO::FETCH_ASSOC);
		if ( $say = $query -> rowCount() ){

			if( $say > 0 ){
				session_start();
				$_SESSION['email']=$email;
				$_SESSION['pass']=$password;
				echo $email;
                die();
				print 'Hoş geldiniz '.$email;
				echo '
					<a href="logout.php">çıkış yap</a>
				';
				
			}else{
				echo "oturum açılmadı hata";
			}
		}else{
			echo "<h1>Kullanıcı adı veya şifre hatalı</h1>";

		}
	}else{
		echo " <h1> lütfen giriş yapın</h1>";
		echo '
			<form action="loginpage.php" method="post">
				<input type="text" name="name"/>
				<input type="password" name="pass"/>
				<input type="submit" />
			</form>
		';
	}
