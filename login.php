<?php require "views/_header.php"; ?>
<!--TOPBAR-->
<?php require "views/_topbar.php"; ?>
<!--NAVBAR-->
<? require "views/_navbar.php" ?>


<?php

require_once('classes/class.validation.php');
require_once('classes/class.users.php');
require_once('classes/class.sessions.php');

$message = array();
if (isset($_POST["submit"])) {

  $userName = $_POST["username"];
  $userPassword = $_POST["password"];
  $control = new Validation($userName, " ", $userPassword,  " ");
  $controlResult = $control->loginControl();

  if ($controlResult["username"] == 1 && $controlResult["password"] == 1) {

    $user = new Users();
    $userID = $user->getIDbyUserName($userName);

    
    $session = new Sessions();
    $session->sessionOpen();
    $session->sessionSet($userID, $userName, "user");
    
     header("location:profile.php");

    $style = "success2";
    $message = array("message" => "Kayit basarili!");
  } else {
    $style = "error2";
    $message = $controlResult;
  }
}
?>
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
      <div class="jc-center ma1">
        <p class="dir-row <?php echo $style; ?> pa1">
          <?php
          foreach ($message as $item) {
            if ($item != 1) {
              echo "- " . $item;
              echo "<br>";
            }
          }
          ?>
        </p>
      </div>
    </div>
  </div>
</div>
<!--  FOOTER  -->
<?php require "views/_footer.php"; ?>