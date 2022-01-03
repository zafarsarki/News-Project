<?php
require_once "config.php";
if ($_POST['submit']??null) {
    $id    = mysqli_real_escape_string($conn,$_POST['post_id']);
    $title = mysqli_real_escape_string($conn,$_POST['post_title']);
    $desc  = mysqli_real_escape_string($conn,$_POST['postdesc']);
    $cat   = mysqli_real_escape_string($conn,$_POST['category']);
   //  $image = mysqli_real_escape_string($conn,$_POST['new-image']);
    
    $update = "UPDATE post SET `title` = '{$title}',`description` = '{$desc}',`category` = '{$cat}' WHERE `post_id` = {$id}";
    $res2 = mysqli_query($conn,$update);
    if ($res2) {
        header("location:post.php?msg=success");
    }
}

?>