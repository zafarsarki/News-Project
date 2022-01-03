<?php
    require_once "config.php";
    $page = basename($_SERVER['PHP_SELF']);

    switch ($page) {
        case 'single.php':
            $page_id   = $_GET['id']??null;
            $sql_title = "SELECT * FROM post WHERE post_id = $page_id";
            $sql_res   = mysqli_query($conn,$sql_title);
            $row_title = mysqli_fetch_assoc($sql_res);
            $title     = $row_title['title'];
            break;
        case 'category.php':
            $page_id   = $_GET['cid']??null;
            $sql_title = "SELECT * FROM category WHERE category_id = $page_id";
            $sql_res   = mysqli_query($conn,$sql_title);
            $row_title = mysqli_fetch_assoc($sql_res);
            $title     = $row_title['category_name'];
            break;
        case 'author.php':
            $page_id   = $_GET['aid']??null;
            $sql_title = "SELECT * FROM user WHERE `user_id` = $page_id";
            $sql_res   = mysqli_query($conn,$sql_title);
            $row_title = mysqli_fetch_assoc($sql_res);
            $title     = $row_title['first_name'];
            break;
        case 'search.php':
            $title   = $_GET['search']??null;
            break;        
        default:
            $title = "News Site"; 
            break;
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class=" col-md-offset-4 col-md-4">
                    <a href="index.php" id="logo"><img src="images/news.jpg"></a>
                </div>
                <!-- /LOGO -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="menu-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                require_once "config.php";
                $q = "SELECT * FROM `category` WHERE `post` != 0";
                $res = mysqli_query($conn,$q);
                $cid = $_GET['cid']??null;
                if ($res->num_rows) {
                    echo "<ul class='menu'>";
                    echo "<li><a href='index.php'>HOME</a></li>";
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $active = null;
                        if ($rows['category_id'] == $cid) {
                            $active = "active";
                        }else{
                            $active = "";
                        }
                ?>

                    <li><a class="<?php echo $active?>"
                            href='category.php?cid=<?php echo $rows['category_id'] ?>'><?php echo $rows['category_name'] ?></a>
                    </li>
                    <?php
                    }
                    echo "</ul>";
                }
                ?>

                    <!-- <li><a href='category.php'>JAVASCRIPT</a></li>
                    <li><a href='category.php'>CSS</a></li>
                    <li><a href='category.php'>HTML</a></li> -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->