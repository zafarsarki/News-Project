<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        
        <?php
            require_once "config.php";

            $q   = " SELECT * FROM `post` p 
                      LEFT JOIN `category` c
                      ON c.`category_id` = p.`category`
                      ORDER BY `post_id` DESC 
                      limit 3";
    
            $res = mysqli_query($conn,$q);
            if ($res->num_rows) {
              while ($rows = mysqli_fetch_assoc($res)) {
        ?>

        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?php echo $rows['post_id']?>">
                <img src="admin/upload/<?php echo $rows['post_img']?>" />
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo $rows['post_id']?>"><?php echo $rows['title']?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?cid=<?php echo $rows['category']?>'><?php echo $rows['category_name']?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $rows['post_date']?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo $rows['post_id']?>">read more</a>
            </div>
        </div>
    <?php
              }
            }
    ?>
    <!-- /recent posts box -->
</div>
