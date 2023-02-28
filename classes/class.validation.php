<?php
class Validation
{

    private $userName;
    private $userEmail;
    private $userPassword;
    private $passwordRepeat;
    public function __construct($userName = " ", $userEmail = " ", $userPassword = " ", $passwordRepeat = " ")
    {

        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
        $this->passwordRepeat = $passwordRepeat;
    }

    function registerControl()
    {
        require_once("class.users.php");
        $user = new Users();


        $message = array(
            "username" => array(),
            "email" => array(),
            "password" => array()
        );

        if (trim($this->userName) == " " || $this->userName == "") {

            $message["username"] = "isim alani bos birakilamaz!";
        } elseif ($user->getUserByUserName($this->userName) != "") {
            $message["username"] = "Bu kullanici adi alinmis!";
        } elseif (strlen(trim($this->userName)) < 5 or strlen(trim($this->userName)) > 20) {
            $message["username"] = "Kullanici adi en fazla 20, en az 5 karakter olabilir!";
        } elseif (!preg_match('/^[a-z\d_]{5,20}$/i', $this->userName)) {
            $message["username"] = "Kullanici adi, sadece sayi ve harf icerebilir!";
        } else {
            $message["username"] = 1;
        }

        if (trim($this->userEmail) == " " || $this->userEmail == "") {

            $message["email"] = "mail bos birakilamaz!";
        } elseif ($user->getUserByEmail($this->userEmail) != "") {
            $message["email"] = "Bu mail zaten alinmis!";
        } elseif (!filter_var($this->userEmail, FILTER_VALIDATE_EMAIL)) {

            $message["email"] = "Gecerli mail adresi giriniz!";
        } else {
            $message["email"] = 1;
        }

        if (trim($this->userPassword) == " " || $this->userPassword == "") {

            $message["password"] = "password alani bos birakilamaz!";
        } elseif ($this->userPassword != $this->passwordRepeat) {
            $message["password"] = "Parola eslesmiyor!";
        } else {
            $message["password"] = 1;
        }
        return $message;
    }
    function loginControl()
    {

        require_once("class.users.php");
        $user = new Users();
        $userName = $user->getUserByUserName($this->userName);
        $password = $user->getPasswordByUserName($this->userName);
        $password["user_password"] = empty($password) ? " ":$password["user_password"] ;

        
        $message = array(
            "username" => array(),
            "password" => array()
        );

        if (trim($this->userName) == " " || $this->userName == "") {

            $message["username"] = "isim alani bos birakilamaz!";
        } elseif ($userName == "" || $userName == " ") {
            $message["username"] = "Boyle bir kullanici yoktur!";
        } else {
            $message["username"] = 1;
        }
        if (trim($this->userPassword) == " " || $this->userPassword == "") {

            $message["password"] = "password alani bos birakilamaz!";
        } elseif ($this->userPassword != $password["user_password"]) {
            $message["password"] = "Hatalı parola!";
        } else {
            $message["password"] = 1;
        }

        return $message;
    }
}
