<?php
class Admins
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getWikis($email)
    {
        $this->db->query('SELECT * FROM users WHERE  email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        if ($this->db->rowCount() > 0)
            return true;
        else
            return false;
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

}
