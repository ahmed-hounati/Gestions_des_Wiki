<?php
class Authors
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getWikies()
    {
        $this->db->query('SELECT * FROM wikis');
        $row = $this->db->fetchAll();
        return $row;
    }

    public function getWikiById($id)
    {
        $this->db->query('SELECT * FROM wikis WHERE wiki_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row;
    }

    public function getCategories()
    {
        $this->db->query('SELECT * FROM categories');
        $row = $this->db->fetchAll();
        return $row;
    }

    public function addWiki($data)
    {
        $this->db->query('INSERT INTO wikis (title, content, author_id, category_id) VALUE (:title, :content, :author_id, :category_id)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':author_id', $data['author_id']);
        $this->db->bind(':category_id', $data['category_id']);
        if ($this->db->execute()) {
            return true;
        } else
            return false;
    }

    public function updateWiki($data)
    {
        $this->db->query('UPDATE wikis SET title = :title, content = :content, category_id = :category_id WHERE wiki_id = :wiki_id');
        $this->db->bind(':wiki_id', $data['wiki_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':category_id', $data['category_id']);
        if ($this->db->execute()) {
            return true;
        } else
            return false;
    }

}
