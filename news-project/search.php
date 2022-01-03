<?php 
    include 'header.php';
    require_once "config.php";
  $search_term = $_GET['search']??null;
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading">Search : <?php echo $search_term; ?></h2>
        <?php
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
                  $q   = " SELECT * FROM `post` p 
                            LEFT JOIN `category` c
                            ON c.`category_id` = p.`category`
                            LEFT JOIN `user` u
                            ON p.`author` = u.`user_id`
                            WHERE p.`title` LIKE '%{$search_term}%'
                            OR  p.`description` LIKE '%{$search_term}%'
                            ORDER BY `post_id` DESC 
                            LIMIT $offset,$limit";
          
                  $res = mysqli_query($conn,$q);
                  if ($res->num_rows) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                ?>

                  <div class="post-content">
                    <div class="row">
                      <div class="col-md-4">
                          <a class="post-img" href="single.php?id=<?php echo $rows['post_id']?>">
                              <img src="admin/upload/<?php echo $rows['post_img']?>" />
                          </a>
                      </div>
                        <div class="col-md-8">
                          <div class="inner-content clearfix">
                                <h3><a href='single.php?id=<?php echo $rows['post_id']?>'><?php echo $rows['title']?></a>
                                </h3>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <a href='category.php?cid=<?php echo $rows['category']?>'><?php echo $rows['category_name']?></a>
                                    </span>
                                    <span>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <a href='author.php?search=<?php echo $rows['author']?>'><?php echo $rows['username']?></a>
                                    </span>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <?php echo $rows['post_date']?>
                                    </span>
                                </div>
                                <p class="description">
                                <?php echo substr($rows['description'],0,150)."..."?>
                                </p>
                                <a class='read-more pull-right' href='single.php?id=<?php echo $rows['post_id']?>'>read more</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <?php
                    }
                  }
                  else {
                    echo "<h2>Record not found..!</h2>";
                  }
                  ?>
                  
                  <?php
                  $pag_q = "SELECT * FROM `post` WHERE `title` LIKE '%{$search_term}%'";
                  $res1 = mysqli_query($conn,$pag_q);

                  if ($res1->num_rows) {
                     
                     $tot_rec   = mysqli_num_rows($res1);
                     $tot_pages = ceil($tot_rec/$limit);

                     echo " <ul class='pagination admin-pagination'>";
                     if ($page > 1) {
                       echo "<li><a href='search.php?search={$search_term}&page=".($page - 1)."'>Prev</a></li>";
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
                        echo "<li class='$active' style='$font'><a href='search.php?search={$search_term}&page=$i'> $i </a> </li>"; 
                      }
                      if ($tot_pages > $page) {
                        echo "<li><a href='search.php?search={$search_term}&page=".($page + 1)."'>Next</a></li>";
                      }
                      echo "</ul>";
                    }
                    ?>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
