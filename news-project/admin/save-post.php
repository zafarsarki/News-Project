<?php
session_start();
require_once "config.php";

if (isset($_FILES['fileToUpload'])) {

    $errors    = array();
    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp  = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];

    // ####### Explode function check the dot (.) in image name and end function will pick the last string after the dot (.) ... In short we are using explode and end fun to find file extension ########
    $exp_file_name = explode(".",$file_name);
    $last_str = end($exp_file_name);
    $lowcase_ext = strtolower($last_str);
    $extensions  = array("jpg","jpeg","png");

    #### Only that file will be acceptable which have the extension same like given array.
    if (in_array($lowcase_ext,$extensions) == false) {
        $errors[] = "Not Allowed. Please choose JPG/PNG file..!";
    }
    if ($file_size > 2097152) {
        $errors[] = "The file size must be of 2MB.";
    }

    if (empty($errors)) {
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else {
        print_r($errors);
        die;
    }
}

$title    = mysqli_real_escape_string($conn,$_POST['post_title']??null);
$desc     = mysqli_real_escape_string($conn,$_POST['postdesc']??null);
$category = mysqli_real_escape_string($conn,$_POST['category']??null);
$date     = date("d M, Y H:i:s");
$author   = $_SESSION['user_id'];
$title    = mysqli_real_escape_string($conn,$_POST['post_title']??null);

$insert_q = "INSERT INTO `post` (`title`,`description`,`category`,`post_date`,`author`,`post_img`) VALUES ('{$title}','{$desc}','{$category}','{$date}',{$author},'{$file_name}');";
$insert_q .= "UPDATE `category` SET post = post + 1 WHERE category_id = {$category}";
$result   = mysqli_multi_query($conn,$insert_q) OR DIE (mysqli_error($conn));

if ($result) {
    header("location:add-post.php?msg=Post added successfully..!");
}else {
    echo "<div class='alert alert-danger'>Query Failed</div>";
}

?>