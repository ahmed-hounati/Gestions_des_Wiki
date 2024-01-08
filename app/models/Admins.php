<?php
class Admins
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

    public function addCategories($data)
    {
        $this->db->query('INSERT INTO categories (category_name) VALUE (:category_name)');
        $this->db->bind(':category_name', $data['category_name']);
        if ($this->db->execute()) {
            return true;
        } else
            return false;
    }

    public function updateCategorie($data)
    {
        $this->db->query('UPDATE categories SET category_name = :category_name WHERE category_id = :category_id');
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':category_name', $data['category_name']);
        $this->db->execute();
    }

    public function getCategoryById($id)
    {
        $this->db->query('SELECT * FROM categories WHERE category_id = :category_id');
        $this->db->bind(':category_id', $id);
        $category = $this->db->fetch();
        return $category;
    }

}
