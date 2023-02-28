<?php require "views/_header.php"; ?>
<!--TOPBAR-->
<?php require "views/_topbar.php"; ?>
<!--NAVBAR-->
<? require "views/_navbar.php" ?>



<div class="container jc-center">
  <div class="container dir-col ai-center">
    <div class="container jc-center dir-col">
      <form action="login.php" method="POST">
        <div class="container dir-col pa1">
          <h1 class="hdr1">Register</h1>
          <p class="p1">Please fill in this form to create an account.</p>
          <hr />
          <label for="username" class="label1"><b>Username</b></label>
          <input type="text" placeholder="Enter username" name="username" id="email" />
          <label for="psw" class="label1"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="psw" />
          <hr />

          <p class="p1 pa2">
            By creating an account you agree to our
            <a href="#" class="link1 nostyle">Terms & Privacy</a>.
          </p>
          <button type="submit" class="btn1" name="submit">Login</button>
        </div>
      </form>



      <?php require_once('classes/class.validation.php'); ?>
      <?php if (isset($_POST["submit"])) : ?>
        <?php
        $userName = $_POST["username"];
        $userPassword = $_POST["password"];

        $control = new Validation($userName," ", $userPassword,  " ");
        $controlResult = $control->loginControl();
        ?>
        <?php if ($controlResult["username"] == 1 && $controlResult["password"] == 1) : ?>
          <?php
          require_once('classes/class.users.php');
          $user = new Users();
          $user = $user->getUserByUserName($userName)

          ?>
          <div class="jc-center ma1">
            <p class="dir-row success2 pa1">
              Giris basarili!
            </p>
          </div>

        <?php else : ?>
          <div class="jc-center ma1">
            <p class="dir-row error2 pa1">
              <?php foreach ($controlResult as $item) : ?>
                <?php if ($item != 1) : ?>
                  <?php
                  echo "- " . $item;
                  echo "<br>";
                  ?>
                <?php endif; ?>
              <?php endforeach; ?> </p>
          </div>
        <?php endif; ?>
      <?php endif; ?>




    </div>

  </div>
</div>
<!--  FOOTER  -->
<?php require "views/_footer.php"; ?>