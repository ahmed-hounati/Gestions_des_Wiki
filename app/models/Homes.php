<?php
class Homes
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getWikies()
    {
        $this->db->query('SELECT tags.name_tag, categories.category_name , wikis.* FROM wikis 
        INNER JOIN categories ON categories.category_id = wikis.category_id
        INNER JOIN wiki_tag ON wikis.wiki_id = wiki_tag.wiki_id
        INNER JOIN tags ON tags.id_tag = wiki_tag.tag_id');
        $row = $this->db->fetchAll();
        return $row;
    }

    public function getCategories()
    {
        $this->db->query('SELECT * FROM categories');
        $row = $this->db->fetchAll();
        return $row;
    }

}
