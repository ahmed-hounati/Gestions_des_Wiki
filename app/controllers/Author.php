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
        $data = [];
        $this->view('author/dashboard', $data);
    }

    public function addWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'content' => trim($_POST['content']),
                'author_id' => $_SESSION['user_id'],
            ];

            if (!empty($data['category_name']) && !empty($data['category_name']) && !empty($data['category_name'])) {
                if ($this->currentModel->addWiki($data)) {
                    redirect('author/dashboard');
                } else {
                    die('Something wrong');
                }
            } else {
                $this->view('author/add', $data);
            }
        } else {
            $data = [
                'category_name' => '',
            ];

            $this->view('author/add', $data);
        }
    }


}