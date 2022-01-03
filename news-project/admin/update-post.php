<?php 
// session_start();
include "header.php"; 
require_once "config.php";
if ($_SESSION['role'] == 0) {
    header("location:post.php");
 }
 
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <?php
        $id = $_GET['id'];
        $q   = " SELECT p.`post_id`,p.`title`,p.`description`,p.`post_img`,p.`category`,c.`category_name` FROM `post` p 
         LEFT JOIN `category` c
         ON c.`category_id` = p.`category`
         LEFT JOIN `user` u
         ON p.`author` = u.`user_id` 
         WHERE post_id = $id";
        $res = mysqli_query($conn,$q);
        
        ?>
        <form action="save-updat-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <?php
            if ($res->num_rows) {
                while ($row = mysqli_fetch_assoc($res)) {    
        ?>
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $row['description']?>
                </textarea>
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
                    <?php
                    while ($rows = mysqli_fetch_assoc($res1)) {
                        if ($row['category'] == $rows['category_id']) {
                            $selected = "selected";
                        }else {
                            $selected = "";
                        }
                        ?>
                    <option <?php echo $selected ?> value="<?php echo $rows['category_id']?>"> <?php echo $rows['category_name']?></option>
                    <?php
                    }
                    ?>
                </select>
                <?php
            }
                ?>
            </div>
           
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['post_img']?>" height="150px">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
            <?php
            }
        }
        ?>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
