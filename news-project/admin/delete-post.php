<?php
session_start();
require_once("config.php");


$id = $_GET['id'];
$cat_id = $_GET['cat_id'];

$q1 = "SELECT * FROM `post` WHERE `post_id` = $id";
$result = mysqli_query($conn,$q1);
$row = mysqli_fetch_assoc($result);
unlink("upload/".$row['post_img']);


$q = "DELETE FROM `post` WHERE `post_id` = $id;";
$q .= "UPDATE category SET post = post - 1 WHERE category_id = $cat_id";

$res = mysqli_multi_query($conn,$q);

if ($res) {
    header("location:post.php?msg=Record Deleted..!&color=red");
}

?>