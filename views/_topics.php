<?php
require_once('./classes/class.blogs.php');

$blogs = new Blogs();

?>
<div class="container dir-col scroller ma2 pa2">
  <?php foreach ($blogs->blogTitle as $item) : ?>
    <a class="link1"><?php echo $item["blog_title"] ?></a>
  <?php endforeach; ?>
</div>