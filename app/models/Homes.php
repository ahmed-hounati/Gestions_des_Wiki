<?php
class Homes
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getWikis()
    {
        $this->db->query('SELECT * FROM users WHERE  email');
        $row = $this->db->fetchAll();
        return $row;
    }

}
