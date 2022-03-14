<?php
session_start();
require_once "partial/db.php";

$id=$_POST['id'] ?? null;

if(!$id){
    header('Location:jobIndex.php');
    exit();
}



$statement = $pdo->prepare('DELETE FROM posts WHERE id = :id');
$statement ->bindValue(':id',$id);
$statement ->execute();
$_SESSION['status']="Post deleted successfylly";
header('Location:jobIndex.php');

?>