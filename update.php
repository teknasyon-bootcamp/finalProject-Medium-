<?php
include ("includes/db.class.php");
include ("includes/functions.php");
session_start();?>
<?php if ($_SESSION["role"]=="Admin" && "Moderator") :

    $role = $_POST["role"];
    $name = $_POST["name"];
    
    $bla=$pdo->prepare("SELECT username, role FROM  denemeusers  WHERE username='$name'");
    $bla->execute();
    $result=$bla->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $res=$result[0]["role"];

        if ($res=="Admin") {
            echo "Bu işlemi yapma yetkiniz yoktur";
        }
        else {
            $test = $pdo->prepare("UPDATE denemeusers SET role = '$role' WHERE username= '$name'");
            $test->execute();
            
            if ($test)
            {
                echo "Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";?>
                <a href="adminpanel.php">Admin Panele Dön</a><?php
            }
            else
            {
                echo "Hata";
            }
        }

    }
    else{
        echo "Username not found! Check again..";
    }



else:
    echo "You can not access this page!";
endif;
