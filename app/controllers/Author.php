<?php
class Author extends Controller
{
    private $currentModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        if (($_SESSION['role'] !== 'author')) {
            redirect('users/login');
        }

        $this->currentModel = $this->model('Authors');
    }

    public function index()
    {
        $wikies = $this->currentModel->getWikies();
        $data = [
            'wikies' => $wikies,
        ];
        $this->view('author/index', $data);
    }

    public function addWiki()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $categories = $this->currentModel->getCategories();
            $tags = $this->currentModel->getTags();
            $encoded_string = $_POST['selected_tag_id'];
            $decoded_string = json_decode(html_entity_decode($encoded_string));
            $data = [
                'author_id' => $_SESSION['user_id'],
                'categories' => $categories,
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'category_id' => $_POST['category_id'],
                'tag_id' => $decoded_string,
            ];
            if (!empty($data['author_id']) && !empty($data['title']) && !empty($data['content']) && !empty($data['category_id'])) {

                if ($this->currentModel->addWiki($data)) {
                    redirect('author');
                } else {
                    die('Something wrong');
                }
            } else {
                $this->view('author/addwiki', $data);
            }
        } else {
            $categories = $this->currentModel->getCategories();
            $tags = $this->currentModel->getTags();
            $data = [
                'categories' => $categories,
                'tags' => $tags,
                'title' => '',
                'content' => '',
                'author_id' => '',
                'category_id' => ''
            ];

            $this->view('author/addwiki', $data);
        }
    }

    public function show($id)
    {
        $wiki = $this->currentModel->getWiki($id);
        $data = [
            'wiki' => $wiki,
        ];
        $this->view('author/show', $data);
    }

    public function updatewiki($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            $categories = $this->currentModel->getCategories();
            $tags = $this->currentModel->getTags();
            $encoded_string = $_POST['selected_tag_id'];
            $decoded_string = json_decode(html_entity_decode($encoded_string));
            $data = [
                'wiki_id' => $id,
                'author_id' => $_SESSION['user_id'],
                'categories' => $categories,
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'category_id' => $_POST['category_id'],
                'tag_id' => $decoded_string,
            ];
            if (!empty($data['author_id']) && !empty($data['title']) && !empty($data['content']) && !empty($data['category_id'])) {

                if ($this->currentModel->updateWiki($data)) {
                    redirect('author');
                } else {
                    die('Something wrong');
                }
            } else {
                $this->view('author/updatewiki', $data);
            }
        } else {
            $categories = $this->currentModel->getCategories();
            $tags = $this->currentModel->getTags();
            $selectedTags = $this->currentModel->getSelectedTags($id);
            $wiki = $this->currentModel->getWiki($id);
            $data = [
                'wiki_id' => $id,
                'categories' => $categories,
                'selectedTags' => $selectedTags,
                'tags' => $tags,
                'title' => $wiki->title,
                'content' => $wiki->content,
                'author_id' => $wiki->author_id,
                'category_id' => $wiki->category_id,
            ];

            $this->view('author/updatewiki', $data);
        }
    }


    public function deleteWiki($id)
    {
        if (!empty($id)) {
            $this->currentModel->deleteWiki($id);
            redirect('author');
        } else {
            redirect('author');
        }
    }


}