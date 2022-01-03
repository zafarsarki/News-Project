<?php
   session_start(); 
   if (isset($_SESSION['username'])) {
       header("location:post.php");
   }

?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
    
    <?php
    require_once("config.php");

    if ($_POST['login']??null) {
        $user_name = mysqli_real_escape_string($conn,$_POST['username']);
        $user_pass = md5($_POST['password']);
        
        $q1 = "SELECT `user_id`,`username`,`role_type` FROM user WHERE `username` = '".$user_name."' AND `user_pass` = '".$user_pass."'";
        
        $res = mysqli_query($conn,$q1);

        if ($res->num_rows) {
            while ($rows = mysqli_fetch_assoc($res)) {
                session_start();
                $_SESSION['username']  = $rows['username'];
                $_SESSION['user_id']   = $rows['user_id'];
                $_SESSION['role']      = $rows['role_type'];
                
                header("location:post.php");
            }
        }
        else{
            echo "<div class='alert alert-danger'>Username/Password Incorrect</div>";
        }
    }
    
    ?>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                
                <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align: center; font-size:18px; color:<?php echo $_GET['color']??null?>;"><?php echo $_GET['msg']??null?></div>
                <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
