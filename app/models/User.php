<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function deleteUser($id)
    {
        $this->db->query("DELETE FROM users WHERE user_id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute())
            return true;
        else
            return false;
    }
    public function updateUser($firstname, $lastname, $email, $pasword, $id)
    {
        $this->db->query("UPDATE `users` SET`first_name`= :first_name, `last_name`= :last_name, `email`= :email, `pasword`=:pasword WHERE `uder_id` = :id");
        $this->db->bind(':first_name', $firstname);
        $this->db->bind(':last_name', $lastname);
        $this->db->bind(':email', $email);
        $this->db->bind(':pasword', $pasword);
        $this->db->bind(':id', $id);
        if ($this->db->execute())
            return true;
        else
            return false;
    }
    public function register($data)
    {
        $this->db->query('INSERT INTO users(username, email, password) VALUES (:username, :email, :password)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        if ($this->db->execute())
            return true;
        else
            return false;
    }

    public function findUserEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE  email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        if ($this->db->rowCount() > 0)
            return true;
        else
            return false;
    }
    public function login($email, $password)
    {
        $this->db->query("SELECT  * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->fetch();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function getInfo($id)
    {
        $this->db->query("SELECT * FROM users WHERE user_id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row;
    }



}
