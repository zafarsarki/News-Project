<?php
session_start();
require_once("config.php");

if ($_SESSION['role'] == 0) {
    header("location:post.php");
 }

$id = $_GET['id'];

$q = "DELETE FROM `category` WHERE `category_id` = $id";

$res = mysqli_query($conn,$q);

if ($res) {
    header("location:category.php?msg=Record Deleted..!&color=red");
}

?>