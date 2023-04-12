<?php
require_once('./classes/class.blogs.php');
require_once('./classes/class.sessions.php');
$blogs = new Blogs();
$result = $blogs->getAllBlogs();

$userName = " ";
$userID = " ";

if (isset($_SESSION) and !empty($_SESSION["username"])) {
  $userName = $_SESSION["username"];
  $userID = $_SESSION["id"];
}
if (isset($_POST["submit"])) {
  $blogs = new Blogs();
  $title = $_POST["title"];
  $blog = strip_tags($_POST["blog"]);
  $controlContent = $blogs->controlContent($title, $blog);
  if ($controlContent["state"] == 1) {

    $blogs->addBlog($title, $blog, $userName);
  } else {
    echo $controlContent["message"];
  }
}
?>
<div class="div-content max container dir-col ma2 pa2">
  <?php foreach ($result as $item) : ?>
    <!--Cards-->
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

  <hr>
  <!--Crerate Blogs-->
  <?php if (isset($_SESSION) and !empty($_SESSION["username"])) : ?>
    <div class="container">
      <form action="#" method="POST">
        <div class="container dir-col">
          <div class="">
            <label for="title">Başlık:</label>
            <input type="text" name="title" placeholder="...">
          </div>
          <div>
            <label for="">Açıklama:</label>
            <textarea name="blog" id="" cols="30" rows="10"></textarea>
          </div>
          <div><input type="submit" name="submit"></div>
        </div>
      </form>
    </div>
    <?php require "views/_ckeditor.php"; ?>
  <?php endif; ?>



</div>