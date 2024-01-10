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

}
