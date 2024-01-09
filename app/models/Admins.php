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

    public function deleteCategory($id)
    {
        $this->db->query('DELETE FROM categories WHERE category_id = :category_id');
        $this->db->bind(':category_id', $id);
        $this->db->execute();
    }

    public function getWikies()
    {
        $this->db->query('SELECT * FROM wikis');
        $wikies = $this->db->fetchAll();
        return $wikies;
    }

    public function getTags()
    {
        $this->db->query('SELECT * FROM tags');
        $tags = $this->db->fetchAll();
        return $tags;
    }

    public function addTag($data)
    {
        $this->db->query('INSERT INTO tags (name_tag) VALUE (:name_tag)');
        $this->db->bind(':name_tag', $data['name_tag']);
        if ($this->db->execute()) {
            return true;
        } else
            return false;
    }

    public function getTagById($id)
    {
        $this->db->query('SELECT * FROM tags WHERE id_tag = :id');
        $this->db->bind(':id', $id);
        $tags = $this->db->fetch();
        return $tags;
    }

    public function updateTag($data)
    {
        $this->db->query('UPDATE tags SET name_tag = :name_tag WHERE id_tag = :id');
        $this->db->bind(':name_tag', $data['name_tag']);
        $this->db->bind(':id', $data['id_tag']);
        $this->db->execute();
    }

    public function deleteTag($id)
    {
        $this->db->query('DELETE FROM tags WHERE id_tag = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

}
