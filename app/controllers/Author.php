<?php
class Author extends Controller
{
    private $currentModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->currentModel = $this->model('Authors');
    }

    public function dashboard()
    {
        $wikies = $this->currentModel->getWikies();
        $data = [
            'wikies' => $wikies
        ];
        $this->view('author/dashboard', $data);
    }

    public function addWiki()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $categories = $this->currentModel->getCategories();
            $data = [
                'author_id' => $_SESSION['user_id'],
                'categories' => $categories,
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'category_id' => trim($_POST['category_id'])
            ];

            if (!empty($data['author_id']) && !empty($data['title']) && !empty($data['content']) && !empty($data['category_id'])) {
                if ($this->currentModel->addWiki($data)) {
                    redirect('author/dashboard');
                } else {
                    die('Something wrong');
                }
            } else {
                $this->view('author/addwiki', $data);
            }
        } else {
            $categories = $this->currentModel->getCategories();
            $data = [
                'categories' => $categories,
                'title' => '',
                'content' => '',
                'author_id' => '',
                'category_id' => ''
            ];

            $this->view('author/addwiki', $data);
        }
    }

    public function updatewiki($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $categories = $this->currentModel->getCategories();
            $data = [
                'author_id' => $_SESSION['user_id'],
                'wiki_id' => $id,
                'categories' => $categories,
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'category_id' => trim($_POST['category_id'])
            ];


            if (!empty($data['title']) && !empty($data['content'])) {
                $this->currentModel->updateWiki($data);
                redirect('author/dashboard');
            }
        } else {
            $wiki = $this->currentModel->getWikiById($id);
            $categories = $this->currentModel->getCategories();
            $data = [
                'categories' => $categories,
                'wiki_id' => $id,
                'title' => $wiki->title,
                'content' => $wiki->content,
                'author_id' => $wiki->author_id,
                'category_id' => $wiki->category_id,
            ];

            $this->view('author/updatewiki', $data);
        }
    }


}