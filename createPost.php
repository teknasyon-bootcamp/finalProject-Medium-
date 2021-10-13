<?php 
include ("includes/db.class.php");
include ("includes/functions.php");
session_start();

if ($_SESSION["role"]=="User"):?>
    <h2>Editör olmadan yazamazsınız! Editör pozisyonu için başvurmak isterseniz<br>"editorolmakistiyorum@gmail.com" a 
    kullanıcı adı ve portfolyonuz ile başvuru maili gönderiniz... :)
</h2>
<a href="userpage.php">Anasayfaya dönebilirsiniz..</a>
<?php else:?>
    <h3>POST EKLE</h3>
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
    <form action="createProcessPost.php" method="POST">

    <h3>TITLE</h3>
    <div class="form-outline ">
    <textarea class="form-control"  name="title" placeholder="Başlığı yazınız" id="title" rows="3"></textarea>
    <label class="form-label" for="textAreaExample"></label>
    </div>
    <h3>TOPIC</h3>
    <div class="form-outline ">
    <textarea class="form-control"  name="topic" placeholder="Konu başlığını yazınız" id="topic" rows="3"></textarea>
    <label class="form-label" for="textAreaExample"></label>
    </div>

    <h3>CONTENT</h3>
    <div class="form-outline ">
    <textarea class="form-control"  name="content" placeholder="İçeriği yazınız" id="content" rows="15"></textarea>
    <label class="form-label" for="textAreaExample"></label>
    </div>
    <input style="font-size: 14px;background-color: rgba(25, 25, 25, 1);" type="submit" name="gonder" value="Post" class="btn btn-dark border border-dark text-light rounded-pill" />
    <!-- sayfa oluşturacağız form sayfası -->
    </form>
    </body>
    </html>



<?php endif;?>
