<?php

class Container extends \Emeset\Container
{

    private $db;

    public function __construct($config)
    {
        parent::__construct($config);
        $this->db = $this->Db();
    }

    // public function Links(){
    //     return new \Models\LinksDB($this->db);
    // }

    public function Example()
    {
        return new \Models\ExampleModel($this->db);
    }

    // public function Products()
    // {
    //     return new \Models\ProductsModel($this->db);
    // }

    // public function Categories()
    // {
    //     return new \Models\CategoriesModel($this->db);
    // }


    public function Db()
    {
        return new \Models\Db(
            $this->config["db"]["user"],
            $this->config["db"]["password"],
            $this->config["db"]["dbname"],
            $this->config["db"]["host"],
            $this->config["db"]["port"]
        );
    }

}