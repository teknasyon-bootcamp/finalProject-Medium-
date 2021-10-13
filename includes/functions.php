<?php
    function allUsers(){
        include('db.class.php');
        $bla=$pdo->prepare("SELECT id,username, email , role FROM denemeusers ");
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        echo"<pre>";
        return ($result);
    }
    function allPosts(){
        include('db.class.php');
        $bla=$pdo->prepare("SELECT id, user_id,title,topic,views,body,created_at,updated_at FROM denemeposts  ");
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        echo"<pre>";
        return ($result);    
    }
    function listPostsIndex($post_id){
        include('db.class.php');
        $bla=$pdo->prepare("SELECT user_id FROM denemeposts ORDER BY id DESC LIMIT 6 ");
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            $test=$result[$post_id]["user_id"];
            $bal =$pdo->prepare("SELECT username FROM denemeusers WHERE id=$test") ;
            $bal->execute();
            $res=$bal->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }else {
            return null;
        }
    }

    function getUserIdByPostId($post_id){
        include('db.class.php');
        $bla =$pdo->prepare("SELECT user_id FROM denemeposts WHERE id=$post_id") ;
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            // return username
            $test=$result[0]["user_id"];
            $bal =$pdo->prepare("SELECT username FROM denemeusers WHERE id=$test") ;
            $bal->execute();
            $res=$bal->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        } else {
            return null;
        }
        
    }

    function getAuthor($post_id){
        include('db.class.php');
        $dene=getUserIdByPostId($post_id);
        $dn=$dene[0]["username"];
        return $dn;
    }
    function getUserImageByPostId($post_id){
        include('db.class.php');
        $bla =$pdo->prepare("SELECT user_id FROM denemeposts WHERE id=$post_id") ;
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            // return username
            $test=$result[0]["user_id"];
            $bal =$pdo->prepare("SELECT image FROM denemeusers WHERE id=$test") ;
            $bal->execute();
            $res=$bal->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        } else {
            return null;
        }
        
    }
    function getAuthorImage($post_id){
        include('db.class.php');
        $dene=getUserImageByPostId($post_id);
        $dn=$dene[0]["image"];
        return $dn;
    }

    function usernameCheck($username) {
        include("db.class.php");
        $ustmt = $pdo->prepare("SELECT username FROM denemeusers WHERE username = :name");
        $ustmt->bindParam(':name', $username);
        $ustmt->execute();
        if($ustmt->rowCount() > 0){
            return $ustmt;
        } 
        $pdo = null;    
    }

    function randomAllPosts(){
        include('db.class.php');
        $bla=$pdo->prepare("SELECT id, user_id,title,topic,views,body,created_at,updated_at FROM denemeposts ORDER BY RAND() ");
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        echo"<pre>";
        return ($result);    
    }


    function GetPostsByUser($id){
        include('db.class.php');
        $bla=$pdo->prepare("SELECT id, user_id,title,topic,views,body,created_at,updated_at FROM denemeposts WHERE user_id=$id ");
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        echo"<pre>";
        return ($result);    
    }
    
    function GetPostIdByPost($id){
        include('db.class.php');
        $bla=$pdo->prepare("SELECT id, user_id,title,topic,views,image,body,created_at,updated_at FROM denemeposts WHERE user_id=$id ");
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        echo"<pre>";
        return ($result);    
    }

        
    function GetDetailsPost($id){
        include('db.class.php');
        $bla=$pdo->prepare("SELECT id, title,topic,body FROM denemeposts WHERE id=$id ");
        $bla->execute();
        $result=$bla->fetchAll(PDO::FETCH_ASSOC);
        echo"<pre>";
        return ($result);    
    }



    

