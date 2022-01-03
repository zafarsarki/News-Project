<?php 
// session_start();
include "header.php"; 
require_once("config.php");
if ($_SESSION['role'] == 0) {
   header("location:post.php");
}

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

$q   = " SELECT * FROM `user` 
         ORDER BY `user_id` DESC 
         LIMIT $offset,$limit";
         
$res = mysqli_query($conn,$q);

?>
<div id="admin-content">
      <div class="container">
         <div class="row">
            <div class="col-md-3">
                  <h1 class="admin-heading">All Users</h1>
            </div>
               <div class="col-md-7" style="margin: 10px 0;">
                  <p style="color:<?php echo $_GET['color']??null?>; font-size:18px; text-align:center;"><?php echo $_GET['msg']??null ?></p>
               </div>
            <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12">
                  <table class="content-table">
                     <thead>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </thead>
                     <tbody>

                  <?php
                  if ($res->num_rows) {
                        while ($rows = mysqli_fetch_assoc($res)) {
                  ?>
                     <tr>
                              <td class='id'><?php echo $rows['user_id']?></td>
                              <td><?php echo $rows['first_name']." ".$rows['last_name']?></td>
                              <td><?php echo $rows['username']?></td>
                              <td>
                              <?php 
                                    if ($rows['role_type'] == 1) {
                                       echo "Admin";
                                    }
                                    elseif($rows['role_type'] == 0){
                                       echo "User";
                                    }
                              ?>
                              </td>
                              <td class='edit'>
                                 <a href='update-user.php?id=<?php echo $rows["user_id"]?>'><i class='fa fa-edit'></i></a>
                              </td>
                              <td class='delete'>
                                 <a href='delete-user.php?id=<?php echo $rows["user_id"]?>'><i class='fa fa-trash-o'></i></a>
                              </td>
                        </tr>
                        
                        <?php
                        }
                  }
                  echo "</tbody>
                        </table>";

                  $pag_q = "SELECT * FROM `user`";
                  $res1 = mysqli_query($conn,$pag_q);

                  if ($res1->num_rows) {
                     
                     $tot_rec   = mysqli_num_rows($res1);
                     $tot_pages = ceil($tot_rec/$limit);

                     echo " <ul class='pagination admin-pagination'>";
                     if ($page > 1) {
                        echo "<li><a href='users.php?page=".($page - 1)."'>Prev</a></li>";
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
                        echo "<li class='$active' style='$font'><a href='users.php?page=$i'> $i </a> </li>"; 
                     }
                     if ($tot_pages > $page) {
                        echo "<li><a href='users.php?page=".($page + 1)."'>Next</a></li>";
                     }
                     echo "</ul>";
                  }
                        ?>
            </div>
         </div>
      </div>
</div>
<?php include "header.php"; ?>
