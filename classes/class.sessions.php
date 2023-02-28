<?php
class Sessions
{

    public $sessionID;
    public $sessionUserName;
    public  $sessionType;

    function __construct($ID = " ", $name = " ", $type = " ")
    {
        $this->sessionID = $ID;
        $this->sessionUserName = $name;
        $this->sessionType = $type;
    }
    function sessionSet()
    {
        $this->sessionOpen();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] =  $this->sessionID;
        $_SESSION["username"] = $this->sessionUserName;
        $_SESSION["type"] = $this->sessionType;
    }
 
    function sessionOpen()
    {
        session_start();
    }
    function sessionClose()
    {
        session_destroy();
    }
}
