<?php 
include "header.php"; 
require_once "config.php";

if (!isset($_SESSION['username'])) {
    header("location:index.php?msg=Please login first..!&color=red");
} 

$limit  = 3;
$page   = $_GET['page']??null;
$offset = null;

if ($page == 0) {
   $page++;
   $offset = ($page - 1) * $limit;
}
else{
   $offset = ($page - 1) * $limit;
}
if ($_SESSION['role'] == 1 && !($_SESSION['username'] == 'maqoo' || $_SESSION['username'] == 'manzoor')) {
    $q   = " SELECT * FROM `post` p 
         LEFT JOIN `category` c
         ON c.`category_id` = p.`category`
         LEFT JOIN `user` u
         ON p.`author` = u.`user_id`
         ORDER BY `post_id` DESC 
         LIMIT $offset,$limit";
}
elseif(($_SESSION['role'] == 1) && ($_SESSION['username'] == 'maqoo' || $_SESSION['username'] == 'manzoor')) {
    $q   = " SELECT * FROM `post` p 
         LEFT JOIN `category` c
         ON c.`category_id` = p.`category`
         LEFT JOIN `user` u
         ON p.`author` = u.`user_id`
         WHERE p.`author` = {$_SESSION['user_id']}
         ORDER BY `post_id` DESC 
         LIMIT $offset,$limit";
}

         
         
$res = mysqli_query($conn,$q);



?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php
                  if ($res->num_rows) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                  ?>
                          <tr>
                              <td class='id'><?php echo $rows['post_id']?></td>
                              <td><?php echo $rows['title']?></td>
                              <td><?php echo $rows['category_name']?></td>
                              <td><?php echo $rows['post_date']?></td>
                              <td><?php echo $rows['first_name']?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $rows['post_id']?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $rows['post_id']?>&cat_id=<?php echo $rows['category_id']?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php 
                          }
                        }
                        ?>
                          
                      </tbody>
                  </table>
                  <?php
                  $pag_q = "SELECT * FROM `post`";
                  $res1 = mysqli_query($conn,$pag_q);

                  if ($res1->num_rows) {
                     
                     $tot_rec   = mysqli_num_rows($res1);
                     $tot_pages = ceil($tot_rec/$limit);

                     echo " <ul class='pagination admin-pagination'>";
                     if ($page > 1) {
                        echo "<li><a href='post.php?page=".($page - 1)."'>Prev</a></li>";
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
                        echo "<li class='$active' style='$font'><a href='post.php?page=$i'> $i </a> </li>"; 
                     }
                     if ($tot_pages > $page) {
                        echo "<li><a href='post.php?page=".($page + 1)."'>Next</a></li>";
                     }
                     echo "</ul>";
                  }
                        ?>
                  
                  <!-- <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul> -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
