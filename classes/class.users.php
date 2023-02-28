<?php
class Users
{


    public $userID;
    public $userName;
    public $userEmail;
    public $userPassword;
    public $userDate;

    public function __construct()

    {

        $connection = $this->connection();
        $queryName = $connection->query("SELECT user_name FROM users");
        $queryID = $connection->query("SELECT user_id FROM users");
        $queryEmail = $connection->query("SELECT user_email FROM users");
        $queryPassword = $connection->query("SELECT user_password FROM users");
        $queryDate = $connection->query("SELECT user_date FROM users");

        $this->userName = $queryName->fetchAll(PDO::FETCH_ASSOC);
        $this->userID = $queryID->fetchAll(PDO::FETCH_ASSOC);
        $this->userEmail = $queryEmail->fetchAll(PDO::FETCH_ASSOC);
        $this->userPassword = $queryPassword->fetchAll(PDO::FETCH_ASSOC);
        $this->userDate = $queryDate->fetchAll(PDO::FETCH_ASSOC);
    }
    public function connection()
    {
        require_once('class.DB.php');

        $newDB = new DB();
        $connection = $newDB->connection();

        return $connection;
    }

    public function getUserByUserName($item)
    {
        $connection = $this->connection();
        $query = $connection->query("SELECT * FROM users WHERE  user_name='$item'");
        $query->execute();
        $user = $query->fetch();

        return $user;
    }
    public function getUserByEmail($item)
    {
        $connection = $this->connection();
        $query = $connection->query("SELECT * FROM users WHERE user_email='$item'");
        $query->execute();
        $user = $query->fetch();

        return $user;
    }


    public function addUser($userName, $userEmail, $userPassword)
    {
        $connection = $this->connection();
        $query = $connection->prepare("INSERT INTO users SET user_name=?, user_email=?, user_password=?");
        $insert = $query->execute(array($userName, $userEmail, $userPassword));
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function getPasswordByUserName($userName)
    {

        $connection = $this->connection();
        $query = $connection->query("SELECT user_password FROM users WHERE  user_name='$userName'");
        $query->execute();
        $userPassword = $query->fetch();
        return $userPassword;
    }

    public function getIDbyUserName($userName){

        $connection = $this->connection();
        $query = $connection->query("SELECT user_id FROM users WHERE  user_name='$userName'");
        $query->execute();
        $userID = $query->fetch();
        return $userID;


    }
}
