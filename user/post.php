<?php 
require("../require/database_connection.php"); 
$query = "SELECT * FROM post WHERE post_status = 'Active' ORDER BY post_id DESC LIMIT 5";
$result = mysqli_query($connection, $query);      
?>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<style>
    #headline {
        color: white;
        padding: 50px;
    }
    .more-text {
        display: none;
    }
</style>
<!-- POST SECTION START HERE -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center text-uppercase shadow" id="headline">Recent Posts</h1>
        </div>
        <?php 
        if ($result->num_rows > 0){
            while($post = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-sm-4">
                    <form action="post_comment_process.php" method="POST">
                        <div class="card mb-3">
                            <img src="../Images/post_images/<?= $post['featured_image']; ?>" class="card-img-top" alt="Post on loading...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $post['post_title']; ?></h5>
                                <p class="card-text">
                                    <?= substr($post['post_description'], 0, 100); ?>
                                    <span class="dots">...</span>
                                    <span class="more-text"><?= substr($post['post_description'], 100); ?></span>
                                </p>
                                <a href="javascript:void(0);" class="read-more">Read More</a>
                                <p class="card-text"><small class="text-body-secondary"><?= $post['created_at']; ?></small></p>
                                <label>Comment</label><textarea name="comment" class="form-control"></textarea>
                                <button type="submit" name="send_comment" class="btn btn-primary d-block w-100">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php 
            }
        }
        ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 mt-5">
            <a href="#" class="btn btn-light p-3 text-primary d-grid">Show All Posts</a>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function()
    {
      var readMoreLinks = document.querySelectorAll(".read-more");

      readMoreLinks.forEach(function(link)
      {
        link.addEventListener("click", function()
        {
          var cardBody = link.parentElement;
          var dots = cardBody.querySelector(".dots");
          var moreText = cardBody.querySelector(".more-text");

          if (dots.style.display === "none")
          {
            dots.style.display = "inline";
            link.textContent = "Read More";
            moreText.style.display = "none";
        }
        else
        {
            dots.style.display = "none";
            link.textContent = "Read Less";
            moreText.style.display = "inline";
        }
    });
    });
  });
</script>
<!-- POST SECTION END HERE -->
