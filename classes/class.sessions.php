<?php
class Sessions
{



    /*function __construct($ID=" ", $name=" ", $type=" ")
    {
        $this->sessionID = $ID;
        $this->sessionUserName = $name;
        $this->sessionType = $type;
    }*/
    function sessionSet($ID=" ", $name=" ", $type=" ")
    {
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] =  $ID;
        $_SESSION["username"] = $name;
        $_SESSION["type"] = $type;
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
