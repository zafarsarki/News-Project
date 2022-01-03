<?php 
    // session_start();
    include "header.php"; 
    require_once("config.php");
    if ($_SESSION['role'] == 0) {
        header("location:post.php");
     }

    if ($_POST['save']??null) {

        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $user = mysqli_real_escape_string($conn,$_POST['user']);
        $pass = mysqli_real_escape_string($conn,md5($_POST['password']));
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        
        $q = "SELECT username FROM `user` WHERE username = '".$user."'";
        $result = mysqli_query($conn,$q);

        if ($result->num_rows > 0 ) {
            echo "<p style = 'color:red; text-align:center;'>This User Name Already Exist...</p>";
        }
        else{
            $query = "INSERT INTO `user`(first_name,last_name,username,user_pass,role_type ) VALUES ('".$fname."','".$lname."','".$user."','".$pass."','".$role."')";
            $res = mysqli_query($conn,$query);
            if ($res) {
                header("location:users.php?msg=User Added Successfully..!&color=green");
            }
        }

        
    }


?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="" method = "POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
