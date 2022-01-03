<?php 
//  session_start();
include "header.php";
require_once "config.php";

if ($_SESSION['role'] == 0) {
    header("location:post.php");
 }
?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12" style="text-align:center;">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
        <div class="row">
            <div class="col-md-12" style="text-align:center;color:green; font-size:18px;">
                <?php echo $_GET['msg']??null?>
            </div>
        </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="save-post.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <?php
                        $q1 = "SELECT * FROM `category`";
                        $res1 = mysqli_query($conn,$q1);    
                      ?>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <?php
                            if ($res1->num_rows) {
                                
                          ?>
                          <select name="category" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                              <?php
                              while ($rows = mysqli_fetch_assoc($res1)) {
                              ?>
                              <option value="<?php echo $rows['category_id']?>"> <?php echo $rows['category_name']?></option>
                              <?php
                              }
                              ?>
                          </select>
                          <?php
                        }
                          ?>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required accept="image/*">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
