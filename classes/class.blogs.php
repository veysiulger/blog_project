<?php
class Blogs
{

    public $blogID;
    public $blogTitle;
    public $blogContent;
    public $blogDate;
    public $blogUser;


    function __construct()
    {
        $connection = $this->connection();
        $queryID = $connection->query("SELECT blog_id FROM blogs");
        $queryTitle = $connection->query("SELECT blog_title FROM blogs");
        $queryContent = $connection->query("SELECT blog_content FROM blogs");
        $queryUser = $connection->query("SELECT blog_user FROM blogs");
        $queryDate = $connection->query("SELECT blog_date FROM blogs");

        $this->blogID = $queryID->fetchAll(PDO::FETCH_ASSOC);
        $this->blogTitle = $queryTitle->fetchAll(PDO::FETCH_ASSOC);
        $this->blogContent = $queryContent->fetchAll(PDO::FETCH_ASSOC);
        $this->blogUser = $queryUser->fetchAll(PDO::FETCH_ASSOC);
        $this->blogDate = $queryDate->fetchAll(PDO::FETCH_ASSOC);
    }


    public function connection()
    {

        require_once('class.DB.php');
        $newDB = new DB();
        $connection = $newDB->connection();
        return $connection;
    }
    public function getAllBlogs()
    {

        $connection = $this->connection();
        $query = $connection->query("SELECT * FROM blogs ");

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBlogByTitle($item)
    {
        $connection = $this->connection();
        $query = $connection->query("SELECT * FROM blogs WHERE blog_title='$item'");
        $query->execute();
        $blog = $query->fetch();
        return $blog;
    }
    public function controlContent($title, $blog)
    {
        $messsage = " ";
        $state = 1;
        if ($title == " " or $title == "") {
            $messsage = "Baslik bos birakilamaz!";
            $state = 0;
        } elseif (strlen(trim($title)) > 255) {
            $messsage = "Baslik en fazla 255 karakter olabilir!";
            $state = 0;
        }
        if ($blog == " " or $blog == "") {
            $messsage = "İcerik bos birakilamaz!";
            $state = 0;
        } elseif (strlen(trim($blog)) > 1000) {
            $messsage = "İcerik en fazla 1000 karakter olabilir!";
            $state = 0;
        }
 
        return array(
            "message" => $messsage,
            "state" => $state
        );
    } 

    public function addBlog($title, $blog, $user)
    {
        $connection = $this->connection();
        $query = $connection->prepare("INSERT INTO blogs SET blog_title=?, blog_content=?, blog_user=?");
        $insert = $query->execute(array($title, $blog, $user));
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
}
