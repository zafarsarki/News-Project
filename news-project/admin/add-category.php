<?php 
    // session_start();
    include "header.php";  
    require_once("config.php");
    if ($_SESSION['role'] == 0) {
        header("location:post.php");
     }

    if ($_POST['save']??null) {
        $cat_name =  mysqli_real_escape_string($conn,$_POST['cat']);
        $query = "INSERT INTO `category` (`category_name`) VALUES ('".$cat_name."')";
        $res = mysqli_query($conn,$query);
        if ($res) {
            header("location:category.php?msg=Category Inserted..!&color=green");
        }
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
