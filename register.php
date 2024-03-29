<?php require "views/_header.php"; ?>
<!--TOPBAR-->
<?php require "views/_topbar.php"; ?>
<!--NAVBAR-->
<? require "views/_navbar.php" ?>

<?php

require_once('classes/class.validation.php');
require_once('classes/class.users.php');
$message = array();
if (isset($_POST["submit"])) {

  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $passwordRepeat = $_POST["password_repeat"];
  $control = new Validation($username, $email, $password, $passwordRepeat);
  $controlResult = $control->registerControl();

  if ($controlResult["username"] == 1 && $controlResult["email"] == 1 && $controlResult["password"] == 1) {
    $style = "success2";
    $message = array("message" => "Kayit basarili!");
    $user = new Users();
    $result = $user->addUser($username, $email, $password);
  } else {
    $style = "error2";
    $message = $controlResult;
  }
}
?>

<div class="container jc-center">
  <div class="container dir-col ai-center">
    <div class="container jc-center dir-col">
      <form action="register.php" method="POST">
        <div class="container dir-col pa1">
          <h1 class="hdr1">Kayıt Olun!</h1>
          <p class="p1">Hesap oluşturmak için gerekli bilgileri girin!</p>
          <hr />
          <label for="username" class="label1"><b>Username</b></label>
          <input type="text" placeholder="Enter username" name="username" id="email" />

          <label for="email" class="label1"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" required />

          <label for="psw" class="label1"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="psw" />

          <label for="psw-repeat" class="label1"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="password_repeat" id="psw-repeat" />
          <hr />

          <p class="p1 pa2">

            <button type="submit" class="btn1" name="submit">Hesap Oluştur!</button>
        </div>

        <div class="container jc-center pa2">
          <p class="p1">
            Zaten bir hesabınız var mı?
            <a href="login.php" class="link1 nostyle">Giriş yapın</a>.
          </p>
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