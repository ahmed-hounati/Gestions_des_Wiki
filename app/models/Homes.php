<?php
class Homes
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getWikis($category_id)
    {
        $this->db->query('SELECT * FROM users WHERE category_id = :category_id');
        $this->db->bind(':category_id', $category_id);
        $row = $this->db->fetchAll();
        return $row;
    }

}
