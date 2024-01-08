<?php
class Authors
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

}
