<?php require "views/_header.php"; ?>
<!--TOPBAR-->
<?php require "views/_topbar.php"; ?>
<!--NAVBAR-->
<?php require "views/_navbar.php" ?>

<?php require_once('classes/class.blogs.php');

$blogs = new Blogs();
$userName = $_SESSION["username"];
$myBlogs = $blogs->getBlogByUsername($userName);
?>



<div class="container jc-center">
  <div class="container dir-col ai-center">

    <!--  CONTENT -->
    <div class="container dir-col">
      <h1>Yazılarım:</h1>
      <hr>
      <?php foreach ($myBlogs as $item) : ?>
        <div class="container w-wrap">
          <div class="container dir-col card1 ma4">
            <div class="container  dir-col ">
              <h4><?php echo $item["blog_title"]; ?></h4>
              <hr>
              <p class="container w-wrap pa1 p1 "><?php echo $item["blog_content"]; ?></p>
              <br>
              <hr>
              <p><?php echo $item["blog_user"]; ?></p>
              <div class="container jc-evenly ma1">
                <button class="material-symbols-outlined thumb_up pa1">
                  thumb_up
                </button>
                <button class="material-symbols-outlined thumb_down pa1">
                  thumb_down
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!--  FOOTER  -->
<?php require "views/_footer.php"; ?>
<?php

?>