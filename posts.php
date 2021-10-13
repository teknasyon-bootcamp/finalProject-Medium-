<?php 
include("includes/db.class.php");
include("includes/functions.php");

//Edit page olacak postları yazan kişi silip güncelleyebilir
session_start();
if ($_SESSION["role"]=="Admin"&&"Editor"&&"Moderator"):?>

<!doctype html>
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

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello <?php echo $_SESSION["username"]?></h1>
    <h3>GÖNDERİLERİNİZ</h3>
    <?php
    $posts=GetPostsByUser($_SESSION["id"])?>

    <?php if ($posts):?>
            <?php foreach($posts as $post):?>
                <div class="border-bottom-dark">
            <form action="editPost.php" method="POST">
                <div class="form-outline ">
                <textarea class="form-control"  name="id" id="id" rows="3" ><?php echo $post["id"]?></textarea>
                <label class="form-label" for="textAreaExample" ></label>

                <h3>TITLE</h3>
                <textarea class="form-control"  name="title" id="title" rows="3" ><?php echo $post["title"]?></textarea>
                <label class="form-label" for="textAreaExample" ></label>
                </div>
                <h3>CONTENT</h3>
                <div class="form-outline ">
                <textarea class="form-control"  name="content" id="content" rows="15"><?php echo $post["body"]?></textarea>
                <label class="form-label" for="textAreaExample"></label>
                </div>
                <input style="font-size: 14px;background-color: rgba(25, 25, 25, 1);" type="submit" name="gonder" value="Update" class="btn btn-dark border border-dark text-light rounded-pill" />
            <!-- sayfa oluşturacağız form sayfası -->
         </form>
         <form action="deletePost.php" method="POST">
                <div class="form-outline ">
                <textarea class="form-control"  name="id" id="id" rows="3" ><?php echo $post["id"]?></textarea>
                <label class="form-label" for="textAreaExample" ></label>
                </div>
                <input style="font-size: 14px;background-color: rgba(25, 25, 25, 1);" type="submit" name="gonder" value="Delete" class="btn btn-dark border border-dark text-light rounded-pill" />
            <!-- sayfa oluşturacağız form sayfası -->
         </form>



        </div>

            <!-- sql yazavcğız -->
            <?php endforeach;?>
    <?php else: ?>
        <h3>Böyle bi şey yok</h3>
    <?php endif ?>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

<?php else: ?>
    <h2>Editör olmadan yazamazsınız! Editör pozisyonu için başvurmak isterseniz<br>"editorolmakistiyorum@gmail.com" a 
    kullanıcı adı ve portfolyonuz ile başvuru maili gönderiniz... :)
</h2>
<a href="userpage.php">Anasayfaya dönebilirsiniz..</a>
<?php endif?>
    <script src="js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
    