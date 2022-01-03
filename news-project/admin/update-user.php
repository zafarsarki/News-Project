<?php
    include "header.php"; 
    require_once("config.php");
    // session_start();
    if ($_SESSION['role'] == 0) {
        header("location:post.php");
     }

    if ($_POST['submit']??null) {

        $id    = mysqli_real_escape_string($conn,$_GET['id']);
        $fname = mysqli_real_escape_string($conn,$_POST['f_name']);
        $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
        $user  = mysqli_real_escape_string($conn,$_POST['username']);
        // $pass = mysqli_real_escape_string($conn,md5($_POST['password']));
        $role  = mysqli_real_escape_string($conn,$_POST['role']);

        $q_update = "UPDATE `user` SET first_name = '".$fname."',last_name = '".$lname."',username = '".$user."',role_type = '".$role."' WHERE user_id = $id";
        
        $res1 = mysqli_query($conn,$q_update);
        if ($res1) {
            header("location:users.php?msg=Record updated successfully..!&color=green");
        }

    }



    $id = $_GET['id'];
    
    $q = "SELECT * FROM `user` WHERE `user_id` = $id";
    $res = mysqli_query($conn,$q);
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="" method ="POST">
                <?php 
                  if ($res->num_rows) {
                      while ($row = mysqli_fetch_assoc($res)) {
                ?>
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>">
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role_type']; ?>">
                            <?php 
                                if ($row['role_type']) {
                                    echo "<option value='1' selected>Admin</option>";
                                    echo "<option value='0'>normal User</option>";
                                }
                                else{
                                    echo "<option value='0' selected>normal User</option>";
                                    echo "<option value='1'>Admin</option>";
                                }
                            ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                      <?php }} ?>
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
