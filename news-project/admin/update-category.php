<?php 
// session_start();
    include "header.php";
    require_once("config.php");

    if ($_SESSION['role'] == 0) {
        header("location:post.php");
     }
    
    $id = $_GET['id']??null;
    $q_select = "SELECT * FROM `category` WHERE `category_id` = $id";
    $res = mysqli_query($conn,$q_select);
    
    if ($_POST['sumbit']??null) {
        $cat = $_POST['cat_name'];
        $q_update = "UPDATE `category` SET `category_name` = '".$cat."' WHERE `category_id` = $id";
        $res = mysqli_query($conn,$q_update);
        if ($res) {
            header("location:category.php?msg=Record Updated Successfully..!&color=green");
        }
    }
    
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="" method ="POST">
                  <?php
                  if ($res->num_rows) {
                    $rows = mysqli_fetch_assoc($res);
                  ?>
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $rows['category_id']?>" >
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $rows['category_name']?>" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                      <?php
                         }
                      ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
