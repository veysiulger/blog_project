<?php
require_once('./classes/class.categories.php');
require_once('./classes/class.sessions.php');

$session=new Sessions();
$session->sessionOpen();
$session->sessionClose();
header('Location:login.php');

?>