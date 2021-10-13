<?php

include ("includes/db.class.php");
include ("includes/functions.php");
session_start();
$id=$_SESSION["id"];
$topic=$_POST["topic"];
$title=$_POST["title"];
$content=$_POST["content"];


$sql = 'INSERT INTO denemeposts(user_id,title,topic,body) VALUES(:id,:title,:topic,:content)';


$statement = $pdo->prepare($sql);
$statement->execute([
	':id' => $id,
	':title' => $title,
	':content' => $content,
    ':topic' => $topic,


]);
header("location:posts.php");