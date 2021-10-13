<?php
include ("includes/db.class.php");
include ("includes/functions.php");
session_start();?>
<?php if ($_SESSION["role"]=="Admin" && "Moderator" && "Editor") :
    $id=$_POST["id"];
    $sql = "DELETE FROM denemeposts
        WHERE id = '$id'";

    $test = $pdo->prepare($sql);
    $test->execute();
    echo "Silme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";?>
    <br>
    <a href="posts.php"> Gönderilerinize Geri Dönebilirsiniz</a><?php

        

 


else:
    echo "You can not access this page!";
endif;
