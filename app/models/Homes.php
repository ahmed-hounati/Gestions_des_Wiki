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
        $this->db->query('SELECT wikis.*, categories.category_name, GROUP_CONCAT(tags.name_tag) AS tags
        FROM wikis
        LEFT JOIN categories ON wikis.category_id = categories.category_id
        LEFT JOIN wiki_tag ON wikis.wiki_id = wiki_tag.wiki_id
        LEFT JOIN tags ON wiki_tag.tag_id = tags.id_tag
        GROUP BY wikis.wiki_id');
        $row = $this->db->fetchAll();
        return $row;
    }


    public function found_wiki($input)
    {
        $this->db->query("SELECT  categories.name AS category, GROUP_CONCAT(tags.name) AS tags ,wikis.*
        FROM wikis
        LEFT JOIN categories ON wikis.category_id = categories.category_id
        LEFT JOIN wiki_tags ON wikis.wiki_id = wiki_tags.wiki_id
        LEFT JOIN tags ON wiki_tags.tag_id = tags.tag_id
        WHERE (wikis.title LIKE '%{$input}%' OR categories.name LIKE '%{$input}%' OR tags.name LIKE '%{$input}%' ) and wikis.archiver = 1
        GROUP BY wikis.wiki_id
        ");
        $this->db->execute();
        return $this->db->fetchAll();
    }
}
