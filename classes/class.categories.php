<?php

class Categories
{


    public $categoryName;
    public $categoryID;

    public function __construct()

    {
        require_once('class.DB.php');
        $newDB = new DB();
        $connection = $newDB->connection();
        $queryName = $connection->query("SELECT category_name FROM categories");
        $queryID = $connection->query("SELECT category_id FROM categories");
        $this->categoryName=$queryName->fetchAll(PDO::FETCH_ASSOC);
        $this->categoryID=$queryID->fetchAll(PDO::FETCH_ASSOC);
 
    }

  
}
