<?php
require_once('./classes/class.categories.php');
require_once('./classes/class.sessions.php');

$categories = new Categories();
$session=new Sessions();
$session->sessionOpen();


$userName = " ";
$userID = " ";

if (isset($_SESSION) and !empty($_SESSION["username"])) {
    $userName = $_SESSION["username"];
    $userID = $_SESSION["id"];
}

?>
<div class="container jc-between ai-center max navbar1">
    <div class="container jc-center">
        <nav class=" ">
            <ul class="container dir-row">
                <?php

                foreach ($categories->categoryName as $item) :
                ?>
                    <li class="container jc-center list-li pa1 ma1">
                        <a href="#" class="link1 nostyle">
                            <?php echo $item["category_name"]; ?>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>
    </div>
    <!--Search Bar-->
    <div class="search-div container jc-center">
        <form action="#" class="max">
            <div class="container max">
                <input type="search" placeholder="Ara..." name="search" class="max" />
                <button type="submit" class="search-btn">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="container jc-center">
        <nav class=" ">
            <ul class="container dir-row">


                <?php if ($userName != " ") : ?>
                    <li class="container jc-center list-li pa1 ma1">
                        <a href="profile.php" class="link1 nostyle">Merhaba <?php echo $userName; ?></a>
                    </li>
                    <li class="container jc-center list-li pa1 ma1">
                        <a href="logout.php" class="btn1 nostyle">Log Out!</a>
                    </li>

                <?php else : ?>

                    <li class="container jc-center list-li pa1 ma1">
                        <a href="login.php" class="link1 nostyle">Login!</a>
                    </li>
                    <li class="container jc-center list-li pa1 ma1">
                        <a href="register.php" class="btn1 nostyle">Register!</a>
                    </li>

                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>