<?php
include ("includes/db.class.php");
include ("includes/functions.php");
session_start();?>
<?php if ($_SESSION["role"]=="Admin" && "Moderator" && "Editor") :
    $id=$_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $name=$_SESSION["username"];
    
    $bla=$pdo->prepare("SELECT username, role FROM  denemeusers  WHERE username='$name'");
    $bla->execute();
    $result=$bla->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $res=$result[0]["role"];

        if ($res=="User") {
            echo "Bu işlemi yapma yetkiniz yoktur";
        }
        else {
            $test = $pdo->prepare("UPDATE denemeposts SET title = '$title',body='$content' WHERE id= '$id'");
            $test->execute();
            
            if ($test)
            {
                echo "Güncelleme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";?>
                <br>
                <a href="posts.php"> Gönderilerinize Geri Dönebilirsiniz</a><?php
            }
            else
            {
                echo "Hata";
            }
        }

    }
    else{
        echo "Post not found! Check again..";
    }



else:
    echo "You can not access this page!";
endif;
