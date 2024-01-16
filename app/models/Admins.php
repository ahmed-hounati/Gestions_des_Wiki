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

    public function findCategoryByName($data)
    {
        $this->db->query('SELECT * FROM categories WHERE  category_name = :category_name');
        $this->db->bind(':category_name', $data['category_name']);
        $row = $this->db->fetch();
        if ($this->db->rowCount() > 0)
            return true;
        else
            return false;
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
        if ($this->db->execute()) {
            return true;
        } else
            return false;
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
        if ($this->db->execute()) {
            return true;
        } else
            return false;
    }

    public function getWikies()
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

    public function getTags()
    {
        $this->db->query('SELECT * FROM tags');
        $tags = $this->db->fetchAll();
        return $tags;
    }

    public function findTagByName($data)
    {
        $this->db->query('SELECT * FROM tags WHERE  name_tag = :name_tag');
        $this->db->bind(':name_tag', $data['name_tag']);
        $row = $this->db->fetch();
        if ($this->db->rowCount() > 0)
            return true;
        else
            return false;
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
        if ($this->db->execute()) {
            return true;
        } else
            return false;
    }

    public function deleteTag($id)
    {
        $this->db->query('DELETE FROM tags WHERE id_tag = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else
            return false;
    }

    public function getTotalWikis()
    {
        $this->db->query('SELECT COUNT(*) as totalWikis FROM wikis');
        $totalWikis = $this->db->fetch();
        return $totalWikis;
    }

    public function getMostProlificAuthor()
    {
        $this->db->query('SELECT username, COUNT(wikis.author_id) as wikiCount
        FROM wikis
        JOIN users ON wikis.author_id = users.user_id
        GROUP BY wikis.author_id
        ORDER BY wikiCount DESC
        LIMIT 1');

        return $this->db->fetch();
    }

    public function getTotalTags()
    {
        $this->db->query('SELECT COUNT(*) as totalTags FROM tags');
        return $totalTags = $this->db->fetch();
    }

    public function getTotalAuthors()
    {
        $this->db->query('SELECT COUNT(user_id) as totalAuthors FROM users');
        return $totalAuthors = $this->db->fetch();
    }

    public function getTotalCategories()
    {
        $this->db->query('SELECT COUNT(*) as totalCategories FROM categories');
        return $totalCategories = $this->db->fetch();
    }

    public function getMostUsedCategory()
    {
        $this->db->query('SELECT categories.category_name, COUNT(wikis.category_id) as categoryCount
        FROM wikis
        JOIN categories ON wikis.category_id = categories.category_id
        GROUP BY wikis.category_id
        ORDER BY categoryCount DESC
        LIMIT 1');
        return $this->db->fetch();
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
        GROUP BY wikis.wiki_id;
        ');
        $this->db->bind(':id', $id);
        $row = $this->db->fetch();
        return $row;
    }

    public function archiveWiki($id)
    {
        $this->db->query('UPDATE wikis SET isArchived = 1 WHERE wiki_id = :id ');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

}
