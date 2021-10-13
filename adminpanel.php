<?php
    include("includes/db.class.php");
    include("includes/functions.php");
    session_start();


?>
<?php
        if ($_SESSION["role"]!="Admin" && $_SESSION["role"]!="Moderator"):
            echo "You can not access this page!";
        else:?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <?php include("theme/header-scripts.php")  ?>

            <title>ADMIN PANEL</title>
        </head>
        <body>
        <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
            
            
            <div class="container-fluid my-3 ">

                <h3>"<?php echo $_SESSION["username"]?>" Welcome to Admin Panel!</h3>
                <span ><a  href="logout.php">Logout</a></span>
        
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nickname</th>
                            <th>Email</th>
                            <th>Roles</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $allUsers=allUsers();

                            foreach ($allUsers as $user ) :
                                echo'
                                    <tr>
                                        <td>
                                            '.$user['id'].'
                                        </td>
                                        <td>
                                            '.$user['username'].'

                                        </td>
                                        <td>
                                            '.$user['email'].'

                                        </td>
                                        <td>
                                        '.$user['role'].'

                                        </td>

                                        

                                    </tr>
                                ';
                            endforeach;
                            
                        ?>
                    </tbody>
                </table>
            </div>

                <?php include("theme/footer-scripts.php") ?>
            <div class="header">
	</div>

        </body>
        </html>

        <?php endif ?>
                
