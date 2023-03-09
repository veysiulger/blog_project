<?php
class DB
{
    function connection()
    {
        $serverName = "localhost";
        $userName = "root";
        $password = "";

        try {

            $connection = new PDO("mysql:host=$serverName;dbname=blog_project", $userName, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $e) {

            echo "baglanti basarisiz:" . $e->getMessage();
        }
    return $connection;
    }
}
