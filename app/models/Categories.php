<?php
class Categories
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCategories()
    {
        $this->db->query('SELECT * FROM categories');
        $row = $this->db->fetchAll();
        return $row;
    }

    public function getWikies()
    {
        $this->db->query('SELECT * FROM wikis');
        $row = $this->db->fetchAll();
        return $row;
    }

}
