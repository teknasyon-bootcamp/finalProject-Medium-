<?php
include ("includes/db.class.php");
include ("includes/functions.php");
session_start();?>
<?php if ($_SESSION["role"]=="Admin" && "Moderator") :

    $name = $_POST["name"];

    
    $sql = "DELETE FROM denemeusers
        WHERE username = '$name'";

    $test = $pdo->prepare($sql);
    $test->execute();
    echo "Silme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";?>
    <br>
    <a href="adminpanel.php"> Admin panele geri dönebilirsiniz</a><?php

        



else:
    echo "You can not access this page!";
endif;
