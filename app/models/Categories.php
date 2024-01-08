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

    public function getWikies($category_id)
    {
        $this->db->query('SELECT * FROM wikis WHERE category_id = :category_id');
        $this->db->bind(':category_id', $category_id);
        $row = $this->db->fetchAll();
        return $row;
    }

}
