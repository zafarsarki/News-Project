<?php 
      // session_start();
      include "header.php"; 
      require_once("config.php");

      if (!isset($_SESSION['username'])) {
         header("location:index.php?msg=Please login first..!&color=red");
      }
      if ($_SESSION['role'] == 0) {
         header("location:post.php");
      }
?>

<div id="admin-content">
<div class="container">
   <div class="row">
      <div class="col-md-4">
            <h1 class="admin-heading">All Categories</h1>
      </div>
      <div class="col-md-5">
      <p style="color:<?php echo $_GET['color']??null?>; font-size:18px; text-align:center;"><?php echo $_GET['msg']??null ?></p>
      </div>
      <div class="col-md-3">
            <a class="add-new" href="add-category.php">add category</a>
      </div>
      <div class="col-md-12">
            <table class="content-table">
               <thead>
                  <th>S.No.</th>
                  <th>Category Name</th>
                  <th>No. of Posts</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </thead>
               <tbody>
                  <?php
                  $limit  = 3;
                  if ($_GET['page']??null) {
                     $page = $_GET['page'];
                  }else{
                     $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                  
                  $q      = " SELECT * FROM `category` ORDER BY category_id DESC LIMIT $offset,$limit";
                  $res    = mysqli_query($conn,$q);

                  if ($res->num_rows) {
                     while ($rows = mysqli_fetch_assoc($res)) {
                  ?>
                  <tr></tr>
                  <tr>
                        <td class='id'><?php echo $rows['category_id']?></td>
                        <td><?php echo $rows['category_name'] ?></td>
                        <td><?php echo $rows['post'] ?></td>
                        <td class='edit'><a href='update-category.php?id=<?php echo $rows['category_id']?>'><i class='fa fa-edit'></i></a></td>
                        <td class='delete'><a href='delete-cat.php?id=<?php echo $rows['category_id']?>'><i class='fa fa-trash-o'></i></a></td>
                  </tr>
                  <?php
                     }
                  }
                  echo " </tbody>
                        </table>";

                  $q1 = "SELECT * FROM `category`";
                  $res1 = mysqli_query($conn,$q1);

                  if ($res1->num_rows) {
                     
                     $tot_rec   = mysqli_num_rows($res1);
                     $tot_pages = ceil($tot_rec/$limit);

                     echo "<ul class='pagination admin-pagination'>"; 
                     if ($page > 1) {
                        echo "<li><a href='category.php?page=".($page - 1)."'>Prev</a></li>";  
                     }
                     for ($i=1; $i <= $tot_pages ; $i++) { 
                        $border=null;
                        $font=null;
                        if ($page == $i) {
                           $active = "active";
                           $font = "font-size:19px;";  
                        }
                        else{
                           $active = "";
                           $font = "";
                        }
                        echo "<li class='$active' style='$font'><a href='category.php?page=$i'>$i</a></li>"; 
                     }
                     if ($tot_pages > $page) {
                        echo "<li><a href='category.php?page=".($page + 1)."'>Next</a></li>";  
                     }
                     echo "</ul>";

                  }

                  ?>
                  
              
            
               <!-- <li class="active"><a>1</a></li>
              
               <li><a>3</a></li> -->
            
      </div>
   </div>
</div>
</div>
<?php include "footer.php"; ?>
