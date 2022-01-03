<?php
session_start();
require_once("config.php");

if ($_SESSION['role'] == 0) {
    header("location:post.php");
 }

$id = $_GET['id'];

$q = "DELETE FROM `user` WHERE `user_id` = $id";

$res = mysqli_query($conn,$q);

if ($res) {
    header("location:users.php?msg=Record Deleted..!&color=red");
}

?>