<?php 
include("includes/db.class.php");
include("includes/functions.php");

//Edit page olacak postları yazan kişi silip güncelleyebilir
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/medium.css">
    <title>Document</title>
</head>
<body>
    
 <form action="deleteUser.php" method="POST">
                <div class="form-outline ">
                <h3>Silmek istediğiniz kullanıcı adı giriniz:</h3>
                <textarea class="form-control"  name="name" id="name" rows="3" ></textarea>
                <label class="form-label" for="textAreaExample" ></label>
                </div>
                <input style="font-size: 14px;background-color: rgba(25, 25, 25, 1);" type="submit" name="gonder" value="Delete" class="btn btn-dark border border-dark text-light rounded-pill" />
  </form>
</body>
</html>
