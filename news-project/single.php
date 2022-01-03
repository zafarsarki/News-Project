<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <?php
                            require_once "config.php";
                            $id = $_GET['id'];

                            $q   = " SELECT * FROM `post` p 
                            LEFT JOIN `category` c
                            ON c.`category_id` = p.`category`
                            LEFT JOIN `user` u
                            ON p.`author` = u.`user_id`
                            WHERE `post_id` = $id";
          
                  $res = mysqli_query($conn,$q);
                  if ($res->num_rows) {
                    $rows = mysqli_fetch_assoc($res)
                        ?>
                        <div class="post-content single-post">
                            <h3><?php echo $rows['title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $rows['category_name']?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $rows['author']?>'><?php echo $rows['username']?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $rows['post_date']?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $rows['post_img']?>" alt=""/>
                            <p class="description">
                            <?php echo $rows['description']?>
                            </p>
                        </div>
                        <?php
                            
                        }
                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
