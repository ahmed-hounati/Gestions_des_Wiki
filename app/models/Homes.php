<?php
class Homes
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function Wikies()
    {
        $this->db->query('SELECT wikis.*, categories.category_name, GROUP_CONCAT(tags.name_tag) AS tags
        FROM wikis
        LEFT JOIN categories ON wikis.category_id = categories.category_id
        LEFT JOIN wiki_tag ON wikis.wiki_id = wiki_tag.wiki_id
        LEFT JOIN tags ON wiki_tag.tag_id = tags.id_tag
        WHERE wikis.isArchived = 0
        GROUP BY wikis.wiki_id');
        $row = $this->db->fetchAll();
        return $row;
    }

    public function getWiki($id)
    {
        $this->db->query('SELECT wikis.*, users.username, categories.category_name, GROUP_CONCAT(tags.name_tag) AS tags
        FROM wikis
        LEFT JOIN categories ON wikis.category_id = categories.category_id
        LEFT JOIN wiki_tag ON wikis.wiki_id = wiki_tag.wiki_id
        LEFT JOIN tags ON wiki_tag.tag_id = tags.id_tag
        LEFT JOIN users ON users.user_id = wikis.author_id
        WHERE wikis.wiki_id = :id
        GROUP BY wikis.wiki_id
        ');
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row;
    }


    public function found_wiki($input)
    {
        $this->db->query("SELECT  categories.category_name AS category, GROUP_CONCAT(tags.name_tag) AS tags ,wikis.*
        FROM wikis
        LEFT JOIN categories ON wikis.category_id = categories.category_id
        LEFT JOIN wiki_tag ON wikis.wiki_id = wiki_tag.wiki_id
        LEFT JOIN tags ON wiki_tag.tag_id = tags.id_tag
        WHERE (wikis.title LIKE '%{$input}%' OR categories.category_name LIKE '%{$input}%' OR tags.name_tag LIKE '%{$input}%' ) and wikis.isArchived = 0
        GROUP BY wikis.wiki_id");
        return $this->db->fetchAll();
    }

}
