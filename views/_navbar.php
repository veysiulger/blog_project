<div class="container jc-between ai-center max navbar1">
    <div class="container jc-center">
        <nav class=" ">
            <ul class="container dir-row">
                <?php
                require_once('./classes/class.categories.php');
                $categories = new Categories();
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
                <li class="container jc-center list-li pa1 ma1">
                    <a href="login.php" class="link1 nostyle">Sign In!</a>
                </li>
                <li class="container jc-center list-li pa1 ma1">
                    <a href="login.php" class="btn1 nostyle">Register!</a>
                </li>
            </ul>
        </nav>
    </div>
</div>